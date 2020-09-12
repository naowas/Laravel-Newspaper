<?php

namespace App\Http\Controllers;

use App\Category;
use App\Settings;
use Illuminate\Support\Facades\DB;

class frontController extends Controller
{

    public function __construct()
    {
        $categories = Category::where('status', 'ON')->get();
        $settings = Settings::limit(1)->orderBy('id', 'desc')->get();
        $a = Settings::orderBy('id', 'desc')->pluck('social');
        $a = explode(',', $a);
        $a = str_replace(array('[', ']', '"', '\\'), '', $a);

        $ico = Settings::orderBy('id', 'desc')->pluck('social');
        foreach($a as $social){
            $icon = explode('.',$social);
           // $icon = str_replace(array('[', ']',',', '"', '\\'), '', $a);

            $icon = $icon[1];
            $icons[] = $icon;
        }

        view()->share([
            'categories' => $categories,
            'settings' => $settings,
            'a' => $a,
            'icons' => $icons,
        ]);
    }

    public function index()
    {
        $featured = DB::table('posts')->where('category_id', 'like', '%9%' )->orderBy('id','desc')->get();
        $generel = DB::table('posts')->where('category_id', 'like', '%10%' )->orderBy('id','desc')->get();
        $business = DB::table('posts')->where('category_id', 'like', '%2%' )->orderBy('id','desc')->get();
        return view('frontend.index',compact('featured','generel','business'));
    }

    public function category()
    {
        return view('frontend.category');

    }
    public function post()
    {
        return view('frontend.article');

    }

}
