<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    public function index()
    {
        $all_post = Post::orderBy('id', 'desc')->paginate(10);
        foreach ($all_post as $post) {
            $categories = explode(',', $post->category_id);
            foreach ($categories as $cat) {
                $postcat = DB::table('categories')->where('id', $cat)->value('category_name');
                $postcategories[] = $postcat;
                $postcat = implode(', ', $postcategories);
            }
            $post->category_id = $postcat;
            $postcategories = [];
        }
        return view('backend.posts.all-post', compact('all_post'));

    }
    public function createPost()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.posts.add-post', compact('categories'));

    }

    public function storePost(Request $request)
    {
        $post = new Post();
        $cat_id = $request->category_id;

        $post->title = $request->post_title;
        $post->slug = $request->slug;
        $post->description = $request->description;
        $post->status = $request->status;

        $post->category_id = implode(',', $cat_id);

        if (($request->image) > 0) {

            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/posts/' . $img);
            Image::make($image)->save($location);
            $post->image = $img;
        }
        $post->save();
        session()->flash('success', ' Post added !!');

        return back();

    }

    public function delete(Request $request)
    {
        $delid = $request->input('delid');
        $post = $request->bulk;
        if ($request->bulk == 1) {
            $post = Post::whereIn('id', $delid);
            $post->delete();
            session()->flash('success', 'post has deleted !!');
            return redirect()->back();
        } else {
            session()->flash('error', 'Please select item(s) first !!');
            return redirect()->back();
        }

    }

    public function editPost($id)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $edit_post = Post::find($id);
        $postcat = explode(',', $edit_post->category_id);
        // dd($postcat);
        return view('backend.posts.edit-post', compact('edit_post', 'categories', 'postcat'));

    }

    public function updatePoststore(Request $request, $id)
    {
        $post = Post::find($id);
        $cat_id = $request->category_id;

        $post->title = $request->post_title;
        $post->slug = $request->slug;
        $post->description = $request->description;
        $post->status = $request->status;

        $post->category_id = implode(',', $cat_id);

        if (($request->image) > 0) {

            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/posts/' . $img);
            Image::make($image)->save($location);
            $post->image = $img;
        }
        $post->save();
        session()->flash('success', ' Post Updated !!');

        return back();

    }
}
