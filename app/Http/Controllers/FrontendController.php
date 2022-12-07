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

    //shopDetails

    public function shopDetails()
    {
        return view('Frontend.User.shopDetails');
    }
        
    //cart

    public function cart()
    {
        return view('Frontend.User.cart');
    }
    
    //checkout

    public function checkout()
    {
        return view('Frontend.User.checkout');
    }

    //contact

    public function contact()
    {
        return view('Frontend.User.contact');
    }
}
