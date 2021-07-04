<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Post::class,'post');
    }

    public function index()
    {
        $a=Comment::find(1);
        dd($a->post->title);
   
        $comments=Comment::get();
        return view('admin.comments',compact('comments'));     
    }

    public function create()
    {
        return view('');
    }
    public function edit($id)
    {
        return view('');
    }


    public function store(Request $request)
    {

        $data = $request->all();
        
        $data['content'] = request('comment');
        $data['post_id'] = request('post_id');
        $data['user_id'] =Auth::user()->id;
        Comment::Create($data);
        return back();
    }

    public function show($id)
    {
        //
    }



    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
