<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index()
    {
      return view('backend.index');

    }

    public function settings()
    {
        return \view ('backend.settings');
    }
    public function settingsStore()
    {
        dd('hi there');
    }


}
