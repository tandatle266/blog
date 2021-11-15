<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){     
        if(Auth::check() || Auth::guard('admin')->check()) {
            return redirect()->route('site.post');
        }
        return redirect()->route('site.login');
    }
    public function post(){
        $data = Post::orderBy('id','DESC')->paginate(10);
        
        return view('site.post',['data' => $data]);
       
    }

    public function post_detail( $slug){ 
               
        $data = Post::where('slug',$slug)->first();
        
         //dd($data->replys->count());
        // dd($data->replys[1]->comment->replys[1]->comment);
        return view('site.post_detail',['post' => $data]);
       
    }
    

    public function comment_store(Request $request){ 
        
        $request->merge(['thumbnail' => '']);
        
        
        
        $id = Auth::user()->id;
        $author = User::find($id);

       
        $cmt = $author->comments()->create([           
            'body'  => $request->body,
            'image'  => $request->thumbnail,                  
        ]);
        


        empty($request->post_id)?  $reply = Comment::find($request->reply_id) : $reply = Post::find($request->post_id) ;
        $reply->replys()->create([
            'cmt_id' => $cmt->id ,
        ]);
        
        return redirect()->back();
       
    }

    public function like_post( $post){ 
        $user = Auth::user();
        $likedPost = $user->likedPosts()->where('post_id', $post)->count();
       // dd($likedPost);
        $likedPost === 0 ? $user->likedPosts()->attach($post)   :  $user->likedPosts()->detach($post) ;
        return redirect()->back();
    }

    public function user_liked(){ 
        $user = Auth::user();
        $liked = $user->likedPosts()->orderBy('created_at', 'ASC')->get();
        
        return view('site.mypage_like',['data' => $liked]);
    }

    public function user_posted(Request $request){ 
        if ($request->getMethod() == 'GET') {
            return view('site.mypage_post');
        }
       
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $extension = $request->file_upload->extension();
            $file_name = time().'-'.'img.'.$extension;
            $file->move(public_path('uploads'),$file_name);
            $request->merge(['thumbnail' => $file_name]);
        }
        else{
            $request->merge(['thumbnail' => 'No image']);
        }       
        $id = Auth::user()->id;
        $author = User::find($id);

        $author->posts()->create([           
            'title'  => $request->title,
            'slug'  => $request->slug,
            'url'  => $request->slug,
            'thumbnail'  => $request->thumbnail,
            'content' => $request->content,           
        ]);
        
       
        return redirect()->route('site.post.detail', ['slug'=> $request->slug])->with('success','Thêm mới thành công');
    }

    public function user_profile(){ 
        $user = Auth::user();
        $model = User::find($user->id);
        $comment = $model->comments;
        
        $model = User::find($user->id);
        $who_like = $model->posts;
        //dd($who_like = $model->posts[0]->likedUser[0]);
        //dd($who_like = $model->posts[0]->likedUser[0]->pivot);
        
       
        return view('site.mypage_profile',['comment' => $comment, 'data'=> $who_like]);
    }
}
