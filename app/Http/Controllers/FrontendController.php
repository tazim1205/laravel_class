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

    //shop details

    public function shopDetails()
    {
        return view('Frontend.User.shopDetails');
    }

    //Cart

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
        return view ('Frontend.user.contact');
    }

    
}
