<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.categories.category', compact('categories'));
    }

    public function store(Request $request)
    {

        $category = new Category();

        $category->category_name = $request->category_name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status = $request->status;
        // dd($category);
        $category->save();
        session()->flash('success', 'New category added successfully !!');

        return back();
    }

    public function edit($id)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $category = Category::find($id);
        if (!is_null($category)) {
            return view('backend.categories.editcategory', compact('category', 'categories'));
        } else {
            return redirect()->route('admin.categories');
        }
    }

    public function update(Request $request, $id)
    {

        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status = $request->status;
        //dd($category);
        $category->save();
        session()->flash('success', 'Category has updated successfully !!');

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $delid = $request->input('delid');
        $category = $request->bulk;
        if ($request->bulk == 1) {
            $category = Category::whereIn('id', $delid);
            $category->delete();
            session()->flash('success', 'Category has deleted !!');
            return redirect()->back();
        } else {
            session()->flash('error', 'Please select item(s) first !!');
            return redirect()->back();
        }

    }

}
