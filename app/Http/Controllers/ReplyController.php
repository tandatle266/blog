<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

use Illuminate\Support\Facades\Auth;
class ReplyController extends Controller
{
    public function store(Request $request,  $comment){
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $extension = $request->file_upload->extension();
            $file_name = time().'-'.'img.'.$extension;
            $file->move(public_path('uploads'),$file_name);
            $request->merge(['thumbnail' => $file_name]);
        }
        else{
            $request->merge(['thumbnail' => '#']);
        }
        

        $id = Auth::guard('admin')->user()->id;
        $author = Admin::find($id);


        $cmt = $author->comments()->create([           
            'body'  => $request->content,
            'image'  => $request->thumbnail,                  
        ]);
    
        $reply = Post::find($request->post_id);
        $reply->replys()->create([
            'cmt_id' => $cmt->id ,
        ]);
        
        return redirect()->route('comment.index')->with('success','Thêm mới thành công');
    }
}
