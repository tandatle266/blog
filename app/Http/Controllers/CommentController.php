<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Reply;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Comment::orderBy('id', 'ASC')->paginate(10);
        $rep = Reply::orderBy('id', 'ASC')->get();
        return view('admin.comment.index',['data' => $data,'rep' =>$rep]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Post::orderBy('id', 'ASC')->get();
        $cmt = Comment::orderBy('id', 'ASC')->get();
        
        return view('admin.comment.create', ['data' => $data,'cmt'=>$cmt]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $extension = $request->file_upload->extension();
            $file_name = time().'-'.'img.'.$extension;
            $file->move(public_path('uploads'),$file_name);
            $request->merge(['thumbnail' => $file_name]);
        }
        else{
            $request->merge(['thumbnail' => '']);
        }
        
        
        $id = Auth::guard('admin')->user()->id;
        $author = Admin::find($id);


        $cmt = $author->comments()->create([           
            'body'  => $request->content,
            'image'  => $request->thumbnail,                  
        ]);
        $cmt->medias()->create();
        $request->post_id <1 ? $reply = Comment::find($request->cmt_id) : $reply = Post::find($request->post_id) ;
        $a = $reply->replys()->create([
            'cmt_id' => $cmt->id ,
        ]);
        
        return redirect()->route('comment.index')->with('success','Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $data = Comment::where('id',$comment->id)->first();
        $model = Reply::where('id',$data->id)->first();        
        return view('admin.comment.edit',['data' => $data, 'model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $extension = $request->file_upload->extension();
            $file_name = time().'-'.'img.'.$extension;
            $file->move(public_path('uploads'),$file_name);
        }else{
            $file_name = $comment->thumbnail;
        }
        $request->merge(['thumbnail' => $file_name]);
        

        Comment::where('id',$comment->id)->update([           
            'image'  => $request->thumbnail,
            'body' => $request->content,                  
        ]);


    return redirect()->route('comment.index')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if($data = Reply::where('cmt_id',$comment->id)->first()){
            $data->delete();
        }
        $model = Comment::find($comment->id);
        $model->medias()->delete();
        $model->delete();

        return redirect()->route('comment.index')->with('success','Xoá thành công');
    }

    

}
