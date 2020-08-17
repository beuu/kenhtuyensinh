<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CreateRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Slug\SlugRepositoryInterface;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    protected $cateRepository;
    protected $repoSlug;
    public function __construct(CategoryRepositoryInterface $cateRepository,SlugRepositoryInterface $repoSlug)
    {
        $this->cateRepository = $cateRepository;
        $this->repoSlug = $repoSlug;
        $this->middleware('permission:postc-list|postc-create|postc-edit|postc-delete', ['only' => ['index','store']]);
        $this->middleware('permission:postc-create', ['only' => ['create','store']]);
        $this->middleware('permission:postc-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:postc-delete', ['only' => ['destroy']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $data = $this->cateRepository->with('slugs')->orderBy('id','DESC')->get();
        if ($request->ajax()) {

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('parent', function($row){
                    if(!empty($row->parent)){
                        $rolename = $row->parent['title'];
                    }else
                    {
                        $rolename = "None";
                    }
                    return $rolename;
                })
                ->rawColumns(['parent'])
                ->addColumn('slug', function($row){
                    return $row->slugs->slug;
                })
                ->rawColumns(['slug'])
                ->addColumn('action', function($row){
                    return '<a  href="'.route('postcate.edit', $row->id).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                    <i class="la la-edit"></i>
                    </a> <a  href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill deleteUser" title="View">
                    <i class="la la-close"></i>
                    </a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.postcate.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {   $datas = $this->cateRepository->all();
        return view('admin.postcate.create',compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $input = $request->except('_token','slug','type');
        $data = $this->cateRepository->insertGetId($input);
        $input['refid'] = $data;
        $slug = $this->repoSlug->insertGetId(array('slug' => $request->slug,
            'type' => $request->type,
            'refid' => $data));
        if($slug === false){
            $this->cateRepository->where('id',$data)->delete();
        }else{
            return redirect()->route('postcate.index')
                ->with('success','Tọa mới danh mục thành công');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function show($id)
    {
        $data = $this->cateRepository->find($id);
        return view('admin.postcate.show',compact('data'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $datas = $this->cateRepository->all();
        $data = $this->cateRepository->find($id);
        return view('admin.postcate.edit',compact('data','datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $this->cateRepository->find($id);
        $slug = $this->repoSlug->where('refid',$id);
        $inputs = $request->except('slug','slugs','type','_token','_method' );
        $request->index_seo == NULL ? ($inputs['index_seo'] = 0) : ($inputs['index_seo'] = 1);
        $this->cateRepository->update($id,$inputs);
        $rslug = $request->only('slug','type');
        $rslug['refid'] = $id;
        if ($slug->slug != $request->slug){
            $data->slugs()->delete();
            $this->repoSlug->create($rslug);
        }else {
            $this->repoSlug->update($slug->id,$rslug);
        }

        return back()
            ->with('success','Sửa danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->cateRepository->deleteWithSlug($id);
        return redirect()->route('postcate.index')
            ->with('success','Xóa danh mục thành công');
    }
}
