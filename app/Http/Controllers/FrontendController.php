<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('Frontend.Layouts.home');
    }

    //shop

    public function shop()
    {
        return view('Frontend.User.shop');
    }
}
