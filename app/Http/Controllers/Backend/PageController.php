<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Slug\SlugRepositoryInterface;
use App\Repositories\Page\PageRepositoryInterface;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class PageController extends Controller
{
    protected $repoSlug,$repoPage;
    public function __construct(SlugRepositoryInterface $repoSlug,PageRepositoryInterface $repoPage)
    {
        $this->repoSlug = $repoSlug;
        $this->repoPage = $repoPage;
        $this->middleware('permission:page-list|page-create|page-edit|page-delete', ['only' => ['index','store']]);
        $this->middleware('permission:page-create', ['only' => ['create','store']]);
        $this->middleware('permission:page-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:page-delete', ['only' => ['destroy']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->repoPage->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    return '<a  href="'.route('page.edit', $row->id).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                        <i class="la la-edit"></i>
                    </a><a  href="'.route('allslug', $row->slugs->slug).'" target="_blank" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="View" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                    <i class="la la-eye"></i>
                    </a><a  href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill deleteUser" title="View">
                    <i class="la la-close"></i>
                    </a>';
                })
                ->rawColumns(['action'])

                ->make(true);
        }
        return view('admin.page.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required',
                'slug' => 'required|unique:slugs',
                'description' => 'required',
                'content' => 'required',
            ]);
        } catch (ValidationException $e) {
        }
        $idSlug = $this->repoSlug->insertGetId($request->only('slug','type'));
        $input = $request->except('_token','type','slug');
        $input['uid'] = Auth::id();
        $input['slug_id'] = $idSlug;
        $data = $this->repoPage->create($input);
        if($data->wasRecentlyCreated === false){
            $this->repoSlug->delete($idSlug);
        }else{
            return redirect()->route('page.index')
                ->with('success','Tạo mới trang thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|Response|View
     */
    public function edit($id)
    {
        $data2 = $this->repoPage->find($id);
        return view('admin.page.edit',compact('data2'));
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->repoPage->find($id);
        try {
            $this->validate($request, [
                'title' => 'required',
                'slug' => 'required|unique:slugs,slug,' . $data->slug_id,
                'description' => 'required',
                'content' => 'required',
            ]);
        } catch (ValidationException $e) {
        }

        $this->repoSlug->update($data->slug_id,$request->only('slug'));
        $this->repoPage->update($id,$request->except('slug','_token','_method'));
        return redirect()->route('page.index')
            ->with('success','Sửa trang thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse|Response
     */
    public function destroy($id)
    {
        $this->repoPage->deleteWithSlug($id);
        return redirect()->route('page.index')
            ->with('success','Xóa trang thành công');
    }
}
