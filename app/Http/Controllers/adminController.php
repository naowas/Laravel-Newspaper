<?php

namespace App\Http\Controllers;
use App\Category;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class adminController extends Controller
{
    public function index()
    {
        return view('backend.index');

    }
    //     Array methode
    public function settings()
    {

        $settings = Settings::limit(1)->orderBy('id', 'desc')->get();
        $a = Settings::orderBy('id', 'desc')->pluck('social');
        $a = explode(',', $a);
        $a = str_replace(array('[', ']', '"', '\\'), '', $a);
        return view('backend.settings', compact('settings', 'a'));
    }
    public function settingsStore(Request $request)
    {
        $settings = new Settings();

        $urls = $request->url;
        $settings->social = implode(',', $urls);
        $settings->about = $request->about;
        if (($request->image) > 0) {

            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/settings/' . $img);
            Image::make($image)->save($location);
            $settings->image = $img;
        }
        $settings->save();
        session()->flash('success', 'New Settings Added !!');

        return back();

    }

    public function settingsUpdate(Request $request, $id)
    {

        $settings = Settings::find($id);
        $urls = $request->url;
        $settings->social = implode(',', $urls);
        $settings->about = $request->about;
        if (($request->image) > 0) {

            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/settings/' . $img);
            Image::make($image)->save($location);
            $settings->image = $img;
        }

        $settings->save();
        session()->flash('success', ' Settings Updated !!');
        return back();

    }

    public function createPost()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.posts.add-post',compact('categories'));

    }
}
