<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagReques;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TagController extends Controller
{
    public function index()
    {
        $tag=Tag::get();
        return view('admin.tags',compact('tag'));        
    }

    public function create()
    {
       
        return view('admin.createTag');
    }
    public function edit(Tag $tag)
    {
        return view('admin.editTag' ,compact('tag'));
    }



    public function store(Request $request)
    {
        // dd(request('nametag'));
        
        // $validated = $request->validated();
        // dd($validated);
        // ----------OR
        // $request->validate( [
        //     'name' => 'required|max:220',
        // ]);
        // ----------OR
        // $this->validate($request, [
        //     'name' => 'required|max:15',
        // ]);

        $data['name'] = request('nametag');
        // dd($data);
        Tag::Create($data);

        return redirect()->route('post.index');
    }

    public function show($id)
    {
        //
    }



    public function update(StoreTagReques $request, Tag $tag)
    {
       
        $id=request('id');
        $tag=Tag::find($id);
        $data['name'] = request('name');

        $tag->update($data);

        return Redirect::back();
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();
        return Redirect::back();
    }

    public function show_all()
    {
        $tags=Tag::paginate(2);
        return view('_admin.tags',compact('tags'));
    }
}
