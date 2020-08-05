<?php

namespace App\Http\Controllers\Backend;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Users\UserRepositoryInterface;
use App\Repositories\Roles\RoleRepositoryInterface;
//use Hash;
//use DataTables;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{

    protected $userRepository;
    protected $roleRepository;

    public function __construct(UserRepositoryInterface $userRepository,RoleRepositoryInterface $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->middleware('permission:user-list', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        //$this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->middleware('permission:user-view', ['only' => ['show']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     * @throws Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->userRepository->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('role', function($row){
                    $rolename = "";
                    if(!empty($row->roles)){
                        foreach($row->roles as $role){
                            $rolename = $role['name']." ".$rolename;
                        }
                    }else
                    {
                        $rolename = "None";
                    }
                    return $rolename;
                })
                ->rawColumns(['role'])
                ->addColumn('action', function($row){

                    return '<a  href="'.route('user.edit', $row->id).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Sửa">
                    <i class="la la-edit"></i>
                    </a> <a  href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill deleteUser" title="Xóa">
                    <i class="la la-close"></i>
                    </a>';
                })
                ->rawColumns(['action'])

                ->make(true);
        }

        return view('admin.user.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $roles = $this->roleRepository->pluck('name','name');
        return view('admin.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = $this->userRepository->create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('user.index')
            ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);
        return view('admin.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|Response|View
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        $roles = $this->roleRepository->get(); //get all roles
        $userRole = $this->userRepository->getRole($id);
        return view('admin.user.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'roles' => 'required'
        ]);
        $input = $request->all();
        $user = $this->userRepository->find($id);
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input['password'] = $user->password;
        }
        $user->update($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('user.index')
            ->with('success','User updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        if ($id == 1) {
            return redirect()->back();
        }else {
            $this->userRepository->delete($id);
            return redirect()->route('user.index')
                ->with('success','User deleted successfully');
        }
    }
}
