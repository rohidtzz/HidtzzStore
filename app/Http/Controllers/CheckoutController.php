<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Product;

use App\Models\Order;
use App\Models\Address;

use Illuminate\Support\Facades\Input;


class CheckoutController extends Controller
{

    public function index()
    {

        $users = Auth()->user()->id;

        if(!Cart::where('user_id',$users)->first()){
            return redirect()->back()->with('errors','invalid');
        }


        // $product = Cart::where('user_id',$users)->get();
        $product = Cart::with('product')->where('user_id',$users)->get();



        $harga = 0;
        $total = 0;

        foreach ($product as $m=>$value){

            // $quan +=$value['qty'];

            $harga += $value['subtotal'];

            $total = $harga;

        }




        $cart = Cart::where('user_id',$users)->count();
        return view('home.checkout',compact('product','total','cart'));

    }



}
