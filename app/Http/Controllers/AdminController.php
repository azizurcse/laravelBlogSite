<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function posts()
    {
        $user= Auth::user();
        $posts = Post::where('user_id',$user->id)->paginate('6');
//        $user->load('posts');
        return view('admin.posts',compact('posts'));
    }

    public function postsForm()
    {
        return view('admin.add_new_posts');
    }

    public function postsSave(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'cover_image'=>'required|image'

        ]);
        $post=new Post();
        $post->title=$request->title;
        $post->description=$request->description;
        $post->cover_image=asset('storage').'/'.$request->cover_image->store('');

        $user=Auth::user();
        $info=$user->posts()->save($post);
        if(!empty($info)){
            return redirect()->route('posts.show', ['id' =>$info->id]);
        }
    }

    public function postEditForm($post_id)
    {
        $post=Post::where('id',$post_id)->first();
        return view('admin.edit_posts',compact('post'));
    }

//    public function postsDelete($post_id)
//    {
//        Post::where('id',$post_id)->delete();
//        return redirect()->route('posts.show');
//    }
}
