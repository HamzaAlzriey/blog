<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


      $posts=Post::where('published', 1)
        ->orderBy('title')
        ->paginate(10);
        // dd($posts);
        return view('home',compact('posts'));
        
    }
    public function show($id)
    {
// dd($id);
        $post=Post::find($id);
        $com=$post->comments;
              
        return view('post',compact('post'),compact('com'));  
        //   return view('register');  
        //  return view('login');  
    }

    public function getpostcat($id)
    {

        $cat=Category::find($id);
        
        // dd($cat);
        return view('getpostcat',compact('cat'));  
        //   return view('register');  
        //  return view('login');  
    }
    public function getposttag($id)
    {

        $tag=Tag::find($id);
        
        // dd($cat);
        return view('getposttag',compact('tag'));  
        //   return view('register');  
        //  return view('login');  
    }



}
