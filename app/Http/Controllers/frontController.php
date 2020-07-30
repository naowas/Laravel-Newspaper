<?php

namespace App\Http\Controllers;

use App\Category;

class frontController extends Controller
{

    public function __construct()
    {
        $categories = Category::where('status', 'ON')->get();
        view()->share([
            'categories' => $categories,
        ]);
    }

    public function index()
    {
        return view('frontend.index');
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
