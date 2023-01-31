<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Cart;

use Auth;

class WelcomeController extends Controller
{

    public function index()
    {

        $product = Product::all();

        if(Auth::check()){
            $users = Auth()->user()->id;

        $cart = Cart::where('user_id',$users)->count();

        return view('home.index', compact('product','cart'));
        }
        return view('home.index', compact('product'));


    }

}
