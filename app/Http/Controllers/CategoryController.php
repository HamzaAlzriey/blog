<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryReques;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = Category::get();
        return view('admin.categories', compact('categorys'));
    }

    public function create()
    {
        return view('admin.createCategory');
    }
    public function edit(Category $category)
    {
        return view('admin.editCategory', compact('category'));
    }


    public function store(StoreCategoryReques $request)
    {
        $validated = $request->validated();
        $data['name'] = request('name');
        Category::Create($data);

        return redirect()->route('post.index');
    }

    public function show($id)
    {
        // $Post=Post::find($id);
        return view('admin.showPost', compact('Post'));
    }




    public function update(StoreCategoryReques $request )
    {
        $id=request('id');
        $category=Category::find($id);

        $data['name'] = request('name');

        $category->update($data);

        return Redirect::back();
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return Redirect::back();
    }
    public function show_all()
    {
        $category=Category::paginate(2);
        return view('_admin.categories',compact('category'));
    }

}
