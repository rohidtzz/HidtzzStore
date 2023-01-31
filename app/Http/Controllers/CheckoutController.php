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


        // dd($b);
        if(request()->get('code') == null){
            return redirect()->back()->with('errors','invalid');
        }
        $code = request()->get('code');



        $harga = 0;
        $total = 0;

        foreach ($product as $m=>$value){

            // $quan +=$value['qty'];

            $harga += $value['subtotal'];

            $total = $harga;

        }

            $apiKey = env('TRIPAY_API_KEY');

            $payload = ['code' => $code];

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/merchant/payment-channel?'.http_build_query($payload),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
            ));

            $response = curl_exec($curl);
            $error = curl_error($curl);

            curl_close($curl);

            foreach(json_decode($response)->data as $s){
                if($s->code == $code){
                    $mas = [
                        'code' => $code,
                        'icon_url' => $s->icon_url,
                    ];
                } else{

                }
            }

            // dd($ma);
            // dd(json_decode($response)->data);

            // echo $response ? $response : $error;

            if(!json_decode($response)->data == true){
                return redirect()->back()->with('errors','invalid payment method');
            }

            // $mas = json_encode($ma);


            // $mas = json_decode($response)->data;




            // dd($mas);

            $tripay = new TripayController;


            // dd($code);

            $kal = $tripay->kalkulator($total,$code);



            // dd($kal);

            // $address = Address::where('user_id',$users)->first();


        return view('home.checkout',compact('product','total','mas','kal'));

    }



}
