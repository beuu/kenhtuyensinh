<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Comment\CommentRepositoryInterface;
use DataTables;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    protected $repoComment;
    public function __construct(CommentRepositoryInterface $repoComment)
    {
        $this->repoComment = $repoComment;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        //Comment::where('name','admin')->update(['user_id'=>6]);
        if ($request->ajax()) {

            $data = $this->repoComment->latest()->where('user_id',0)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('active', function($row){

                    $rolename = "";
                    if($row->is_approved == 0){
                        $rolename = "Ẩn";
                    }else
                    {
                        $rolename = "Hiện";
                    }

                    return $rolename;
                })
                ->rawColumns(['active'])
                ->addColumn('action', function($row){

                    $btn = '<a  href="'.route('comment.edit', $row->id).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="AN HIEN">
                        <i class="la la-refresh"></i></a><a  href="'.route('comment.show', $row->id).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="SUA">
                        <i class="la la-edit"></i></a><a  href="'.route('allslug', $row->post->slugs->slug).'" target="_blank" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="BAI VIET">
                        <i class="la la-eye"></i></a><a  href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill deleteUser" title="XOA">
                        <i class="la la-close"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])

                ->make(true);
        }
        return view('admin.comment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function storeedit(Request $request,$id)
    {
        $this->repoComment->update($id,[
            'body'=> $request->body,
            'name'=> $request->name
        ]);
        return redirect()->route('comment.index')
            ->with('success','Sửa Comment thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $data = $this->repoComment->find($id);
        return view('admin.comment.edit',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data = $this->repoComment->find($id);
        $data->is_approved = !$data->is_approved;
        $data->save();
        return redirect()->route('comment.index')
            ->with('success','Active Comment thành công');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->repoComment->update($id,[
            'body'=> $request->body,
            'name'=> $request->name
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->repoComment->delete($id);
        return redirect()->route('comment.index')
            ->with('success','Xoá Comment thành công');
    }


    public function delcommentfront($id)
    {
        $this->repoComment->delete($id);
        return redirect()->back()
            ->with('successedit','Xoá Comment thành công');
    }
}
