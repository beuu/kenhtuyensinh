<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Slug\SlugRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Tag\TagRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\View\View;
use DB;
use Yajra\DataTables\DataTables;
use App\Http\Requests\Admin\Post\CreateRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;

class PostController extends Controller
{
    protected $repoPost;
    protected $repoSlug;
    protected $repoCate;
    protected $repoTag;
    public function __construct(TagRepositoryInterface $repoTag,PostRepositoryInterface $repoPost,SlugRepositoryInterface $repoSlug,CategoryRepositoryInterface $repoCate)
    {
        $this->repoPost = $repoPost;
        $this->repoSlug = $repoSlug;
        $this->repoCate = $repoCate;
        $this->repoTag = $repoTag;
        $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index','store']]);
        $this->middleware('permission:post-create', ['only' => ['create','store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:post-delete', ['only' => ['destroy']]);

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
        if ($request->ajax()) {

            if(!empty($request->filter_gender))
            {   $datass = $request->filter_gender;
                $data = Post::query()->whereHas('cates', function ($query) use($datass){
                    $query->where('cate_id',$datass);
                })->with('slugs')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('slug', function($row){
                        return $row->slugs->slug;
                    })
                    ->rawColumns(['slug'])
                    ->addColumn('cate', function($row){
                        $catename = "";
                        if(!empty($row->cates)){
                            foreach($row->cates as $role){
                                $catename = $role['title']." ".$catename;
                            }
                        }else
                        {
                            $catename = "None";
                        }
                        return $catename;
                    })
                    ->rawColumns(['cate'])
                    ->addColumn('action', function($row){
                        return '<a  href="'.route('post.edit', $row->id).'" data-toggle="tooltip" target="_blank"   data-id="'.$row->id.'" data-original-title="Edit" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                        <i class="la la-edit"></i></a> <a  href="'.route('allslug', $row->slugs->slug).'" target="_blank" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="View" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                        <i class="la la-eye"></i></a><a  href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill deleteUser" title="View">
                        <i class="la la-close"></i></a>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }else{
                //$data = $this->repoPost->with('slugs')->limit(1000)->get();
                //dd($data);
                $data = Post::with(['slugs','cates'])->select('id','title')->orderBy('id','DESC')->latest();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('cate', function($row){
                        $catename = "";
                        if(!empty($row->cates)){
                            foreach($row->cates as $role){
                                $catename = $role['title']." , ".$catename;
                            }
                        }else
                        {
                            $catename = "None";
                        }
                        return $catename;
                    })
                    ->rawColumns(['cate'])
                    ->addColumn('action', function($row){
                        return '<a  href="'.route('post.edit', $row->id).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                    <i class="la la-edit"></i></a> <a  href="'.route('allslug', $row->slugs->slug).'" target="_blank" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="View" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                    <i class="la la-eye"></i></a><a  href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill deleteUser" title="View">
                    <i class="la la-close"></i></a>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);

            }

        }
        $datas= $this->repoCate->all();
        return view('admin.post.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $tags  = $this->repoTag->select()->limit(2000)->get();
        $data= $this->repoCate->all();

        return view('admin.post.create',compact('data','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $inputs = $request->except(['_token','slug','type']);
        $inputs['uid'] = Auth::id();
        $request->index_seo == NULL ? ($inputs['index_seo'] = 0) : ($inputs['index_seo'] = 1);
        $request->public == NULL ? ($inputs['public'] = 0) : ($inputs['public'] = 1);
        $data = $this->repoPost->create($inputs);
        $idSlugs = $this->repoSlug->create([
            'slug'=>$request->slug,
            'type'=>$request->type,
            'refid'=>$data->id
        ]);
        $data->tag()->sync($request->input('tag'));
        $data->cates()->sync((array)$request->input('cate'));
        if($idSlugs->wasRecentlyCreated === false){
            $this->repoPost->delete($data->id);
        }else{
            return redirect()->route('post.index')
                ->with('success','Tạo mới bài viết thành công');
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
     * @return Factory|View
     */
    public function edit($id)
    {
        $data2 = $this->repoPost->find($id);
        $tags = $this->repoTag->pluck('name', 'id');
        $data = $this->repoCate->all();
        return view('admin.post.edit',compact('data2','data','tags'));
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
        $data = $this->repoPost->find($id);
        $slug = $this->repoSlug->where('refid',$id);
        $rslug = $request->only('slug','type');
        $rslug['refid'] = $id;
        $inputs = $request->except('slug','slugs','_token','_method','tag','type','cate');
        $request->index_seo == NULL ? ($inputs['index_seo'] = 0) : ($inputs['index_seo'] = 1);
        $request->public == NULL ? ($inputs['public'] = 0) : ($inputs['public'] = 1);
        $this->repoPost->update($id,$inputs);
        if ($slug->slug != $request->slug){
            $data->slugs()->delete();
            $this->repoSlug->create($rslug);
        }else {
            $this->repoSlug->update($slug->id,$rslug);
        }
        $data->tag()->sync((array)$request->input('tag'));
        $data->cates()->sync((array)$request->input('cate'));
        return redirect()->back()
            ->with('success','Sửa bài viết thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $data = $this->repoPost->find($id);
        $slug = $this->repoSlug->where('refid',$data->id)->first();
        $slug->delete();
        $data->delete();
        return redirect()->route('post.index')
            ->with('success','Xóa bài viết thành công');
    }
}
