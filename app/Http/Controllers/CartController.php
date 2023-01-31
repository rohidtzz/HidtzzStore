<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Cart;
use App\Models\Transaction;

use Auth;

class CartController extends Controller
{
    public function index()
    {

        $users = Auth()->user()->id;
        // $product = Cart::where('user_id',$users)->get();
        $product = Cart::with('product')->where('user_id',$users)->get();

        // dd($product);

        $harga = 0;
        $total = 0;

        foreach ($product as $m=>$value){

            // $quan +=$value['qty'];

            $harga += $value['subtotal'];

            $total = $harga;

        }

        $apiKey = env('TRIPAY_API_KEY');

        // $payload = ['code' => 'BRIVA'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_FRESH_CONNECT  => true,
        CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/merchant/payment-channel',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
        CURLOPT_FAILONERROR    => false,
        CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        // echo $response ? $response : $error;

        $mas = json_decode($response);

        if($mas->success == true){
            $mas = json_decode($response)->data;
        } else {
            $mas = json_decode($response);
        }

        // dd($mas);


        // dd($harga);
        // return view('home.cart');
        return view('home.cart',compact('product','total','mas'));

    }

    public function create_layanan_digital(Request $request)
    {




    }


    public function create($id)
    {

        $user = Auth()->user()->id;

        $price = Product::find($id);

        $trans = Transaction::find(Auth()->user()->id);


        // if($trans){
        //     return redirect()->back()->with('errors', '1 akun hanya bisa beli 1');
        // }
        // dd($trans);

        // if($price == null){
        //     return redirect()->back()->with('errors', 'invalid');
        // }

        // dd($price);

        $cart = Cart::where('user_id',$user)->where('product_id',$id)->first();

        // dd($cart);

        if($cart){
            // dd($cart);
            // $cart = $cart[0];

            $cek = Cart::where('product_id',$id)->where('user_id',$user)->update([
                'qty' => $cart->qty+1,
                'subtotal' => $cart->subtotal+$price->price
            ]);

            return redirect('/cart')->withSuccess('Add Product Berhasil');
        }

        $cek = Cart::create([
            'qty' => 1,
            'subtotal' => $price->price,
            'user_id' => $user,
            'product_id' => $id

        ]);

        return redirect('/cart')->withSuccess('Add Product Cart Success');
    }

    public function delete($id)
    {

        $users = Auth()->user()->id;

        $cart = Cart::where('user_id',$users)->where('id',$id)->delete();

        if(!$cart){
            return redirect()->back()->with('errors', 'Delete Product Cart Failed');
        }

        return redirect()->back()->withSuccess('Delete Product Cart Success');

    }

    public function plus($id)
    {

        $users = Auth()->user()->id;

        // $cek = Cart::find($id)->first();
        $cek = Cart::where('product_id',$id)->where('user_id',$users)->first();
        $pr = Product::find($id);

        if($pr == null || $cek == null){
            return redirect()->back()->with('errors', 'invalid');
        }
        // dd($l);



        if($cek->qty == 10){
            return redirect()->back()->with('errors','Product tidak bisa melebihi batas');
        }

        // dd($cek->price + $pr);

        $cart = Cart::where('user_id',$users)->where('product_id',$id)->update([
            'qty' => $cek->qty+1,
            'subtotal' => $cek->subtotal+$pr->price
        ]);
        // dd($cart);

        if(!$cart){
            return redirect()->back()->with('errors', 'Tamabah quantity Product Failed');
        }

        return redirect()->back()->withSuccess('tambah Product Success');

    }

    public function minus($id)
    {

        $users = Auth()->user()->id;

        $cek = Cart::where('product_id',$id)->where('user_id',$users)->first();
        $pr = Product::find($id);

        if($pr== null || $cek == null){
            return redirect()->back()->with('errors', 'invalid');
        }
        // dd($pr);

        if($cek->qty == 1){
            return redirect()->back()->with('errors','Product tidak bisa dikurangi');
        }

        $cart = Cart::where('user_id',$users)->where('product_id',$id)->update([
            'subtotal' => $cek->subtotal-$pr->price,
            'qty' => $cek->qty-1
        ]);

        // $cart = Cart::where('user_id',$users)->where('product_id',$id)->delete();



        if(!$cart){
            return redirect()->back()->with('errors', 'Kurangin Product Failed');
        }

        return redirect()->back()->withSuccess('kurangin Product Success');

    }
}
