<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->authorizeResource(Post::class,'post');
    }
    public function index()
    {
        
        $posts = Post::paginate(2);
        // return view('admin.posts',compact('Post'));  
        return view('_admin.index', compact('posts'));
    }

    public function create()
    {
        $Categorys = Category::get();
        return view('admin.createPost', compact('Categorys'));
    }
    public function edit(Post $post)
    { 
      
          $tags=Tag::get();
        return view('_admin.details', compact('post','tags'));
    }


    public function store(Request $request, Post $post)
    {
        // $post = Post::create($request->except('image'));
                if ($post->is_admin) {
            $data['published'] = 1;
        }

        $name = $post->userAvatar($request);
        $data['image'] = $name;
        $data['title'] = request('title');
        $data['body'] = request('body');

        $data['category_id'] = request('category_id');
        $data['user_id'] = Auth::user()->id;
        // dd($data);
        $post=Post::Create($data);
        $post->tags()->attach($request->tag_id);
        return back();
    }

    public function show($id)
    {
        $Post = Post::find($id);
        return view('admin.showPost', compact('Post'));
    }




    public function update(Request $request, Post $post)
    {
        //way 1
        // $this->authorize('update',$post);

        //way 2
        // if(request()->user()->cannot('update',$post)){
        // return '0';
        // }
         
        $name = $post->userAvatar($request);
        // if ($post->is_admin) {
        //     $data['published'] = 1;
        // }
        $data['image'] = $name;
        $data['title'] = request('title');
        $data['body'] = request('body');
        $data['category_id'] = request('category_id');
        $data['user_id'] = Auth::user()->id;
        $post->Update($data);
        $post->tags()->sync($request->tag_id);
        return redirect()->route('post.index');
    }


    public function destroy(Post $post)
    {
       

        $post->delete();
        $post->tags()->detach();
        return redirect()->route('post.index');
    }

    public function show_all()
    {
        $posts = Post::paginate(2);
        return view('_admin.posts', compact('posts'));
    }

    public function active(Post $post)
    {
        $post->published = !$post->published;
        $post->save();
        return Redirect::back();
    }
}
