<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data = Post::orderBy('id', 'ASC')->paginate(10);
        
        return view('admin.post.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.post.create');
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

        $post = $author->posts()->create([           
            'title'  => $request->title,
            'slug'  => $request->slug,
            'url'  => $request->slug,
            'thumbnail'  => $request->thumbnail,
            'content' => $request->content,           
        ]);
        
       $post->medias()->create();
        return redirect()->route('post.index')->with('success','Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data = Post::where('id',$post->id)->first();
       
        return view('admin.post.detail',['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data = Post::where('id',$post->id)->first();
        return view('admin.post.edit',['data' => $data]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $extension = $request->file_upload->extension();
            $file_name = time().'-'.'img.'.$extension;
            $file->move(public_path('uploads'),$file_name);
        }else{
            $file_name = $post->thumbnail;
        }
        $request->merge(['thumbnail' => $file_name]);
        
         Post::where('id',$post->id)->update([           
            'title'  => $request->title,
            'slug'  => $request->slug,
            'url'  => $request->slug,
            'thumbnail'  => $request->thumbnail,
            'content' => $request->content,                  
        ]);


    return redirect()->route('post.index')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $model = Post::find($post->id);
        $model->medias()->delete();
        $model->delete();
        return redirect()->route('post.index')->with('success','Xoá thành công');
    }
}
