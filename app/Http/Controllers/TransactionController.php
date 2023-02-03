<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\Shipping;

use Carbon\Carbon;

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class TransactionController extends Controller
{
    //

    public function store(Request $request)
    {

        // dd($request->all());
        // $product = Product::find($request->product_id);

        $users = Auth()->user()->id;

        if(!Cart::where('user_id',$users)->first()){
            return redirect()->back()->with('errors','invalid');
        }

        // if(!Order::where('user_id',$users)->where('status', 'pending')->get()){
        //     return redirect()->back()->with('errors','invalid');
        // }

        $product = Cart::with('product')->where('user_id',$users)->get();
        // dd($product);

        $cart = Cart::where('user_id',$users)->get();

        foreach($cart as $g){
            $d[] = [
                'qty' =>$g->qty,
                'subtotal' => $g->subtotal,
                'product_id' => $g->product_id,
                'image' => Product::find($g->product_id)->image
            ];
        }

        // dd($d);

        foreach($product as $l){

            $j[] = Product::find($l->product_id);
            $m[] = $l;
            // $m[] = $l;


        }

        // foreach($m as $p){
        //     $h[] = $p->qty;
        // }

        // dd($m);
        // foreach($m as $o){
        //     $f = $o->qty;
        // }




            // dd($b);

        foreach($m as $k){

            // dd($k);

            for($x = 0; $x < $k->qty; $x++){
                $datas[] = [
                    "name" => Product::find($k->product_id)->name,
                    "price" => Product::find($k->product_id)->price,
                    "quantity" => 1,
                    "image_url"=> Product::find($k->product_id)->image
                ];
            }
                // $b[] = [
                //     "name" => Product::find($k->product_id)->name,
                //     "price" => Product::find($k->product_id)->price,
                //     "quantity" => 1
                // ];



        }

        if($request->metode == "SP"){
            $push = [
                "name" => "fee",
                "quantity" => 1,
                "price" => $request->fee,
            ];
            $asd = array_push($datas,$push);
        } else{

        }






        // dd($datas);

        foreach($datas as $dat){
            $detailBarang[] = $dat;
        }

        // dd($kjs);
        // Order::create([
        //     'data' => json_encode($b),
        //     'user_id' => $users,
        //     'status' => 'pending'
        // ]);

        // dd($request->totals);

        $duitku = new DuitkuController;

        $response = $duitku->requestTransaction($request->metode,$detailBarang);

        // dd($response);

        // $product = Order::where('user_id', $users)->get();

        // $method = $request->method;
        // dd($request->all());

        // $tripay = new TripayController;

        // $tipa = $tripay->requestTransaction($method,$kjs);

        // dd($tipa->qr_url);

        // dd($kjs);



        Cart::where('user_id',$users)->delete();
        $a = json_encode($response,true);
        $response = json_decode($a);

        // dd($response);

        if($request->metode == 'SP'){


            $trans = Transaction::create([
                'amount' => $response->amount,
                'reference' => $response->reference,
                'merchant_code' => $response->merchantCode,
                'data' => json_encode($d),
                'status_message' => "UNPAID",
                'user_id' => $users,
                // 'expired' => $response->expired_time,
                'qr' => $response->qrString,
                'fee' => $request->fee,
                'sign' => $response->signature,
            ]);

            // $shipping = Shipping::create([
            //     'data' => json_encode($push),
            //     'status_message' => "proses",
            //     // 'cost' => $request->cost,
            //     'cost' => $request->cost,
            //     'user_id' => $users,
            //     'transaction_id'=> $trans->id
            // ]);
        }else if($request->metode == "DA"){
            $trans = Transaction::create([
                'amount' => $response->amount,
                'reference' => $response->reference,
                'merchant_code' => $response->merchantCode,
                'data' => json_encode($d),
                'status_message' => "UNPAID",
                'user_id' => $users,
                'paymentUrl' => $response->paymentUrl,
                'fee' => $request->fee,
                'sign' => $response->signature
                // 'qr' => $response->qrString,
            ]);
        }else{
            $trans = Transaction::create([
                'amount' => $response->amount,
                'reference' => $response->reference,
                'merchant_code' => $response->merchantCode,
                'data' => json_encode($d),
                'status_message' => "UNPAID",
                'user_id' => $users,
                'vaNumber' => $response->vaNumber,
                'paymentUrl' => $response->paymentUrl,
                'fee' => $request->fee,
                'sign' => $response->signature
                // 'qr' => $response->qrString,
            ]);
            // $shipping = Shipping::create([
            //     'data' => json_encode($push),
            //     'status' => "proses",
            //     // 'cost' => $request->cost,
            //     'cost' => $request->cost,
            //     'user_id' => $users,
            //     'transaction_id'=> $trans->id
            // ]);
        }

        // if($tipa->payment_method == 'QRIS' || $tipa->payment_method == 'QRISC' || $tipa->payment_method == 'QRIS2'){


        //     $trans = Transaction::create([
        //         'amount' => $tipa->amount,
        //         'reference' => $tipa->reference,
        //         'merchant_ref' => $tipa->merchant_ref,
        //         'data' => json_encode($d),
        //         'status' => $tipa->status,
        //         'user_id' => $users,
        //         'expired' => $tipa->expired_time,
        //         'qr' => $tipa->qr_url,
        //     ]);

        //     // $shipping = Shipping::create([
        //     //     'data' => json_encode($push),
        //     //     'status' => "proses",
        //     //     // 'cost' => $request->cost,
        //     //     'cost' => $request->cost,
        //     //     'user_id' => $users,
        //     //     'transaction_id'=> $trans->id
        //     // ]);
        // } else{
        //     $trans = Transaction::create([
        //         'amount' => $tipa->amount,
        //         'reference' => $tipa->reference,
        //         'merchant_ref' => $tipa->merchant_ref,
        //         'data' => json_encode($d),
        //         'status' => $tipa->status,
        //         'expired' => $tipa->expired_time,
        //         'user_id' => $users
        //     ]);
        //     // $shipping = Shipping::create([
        //     //     'data' => json_encode($push),
        //     //     'status' => "proses",
        //     //     // 'cost' => $request->cost,
        //     //     'cost' => $request->cost,
        //     //     'user_id' => $users,
        //     //     'transaction_id'=> $trans->id
        //     // ]);
        // }



        // Order::where('user_id',$users)->delete();

        $stoc = Product::find(1);
        // dd($stock);

        Product::find(1)->update([
            'stock' => $stoc->stock-1
        ]);

        return redirect('transaction/'.$response->reference)->withSuccess('Transaction berhasil di buat');

    }

    public function detail($references)
    {

        $datas = Transaction::where('reference',$references)->get();

        $status = $datas[0]->status_message;
        $total = $datas[0]->amount;
        $qr = $datas[0]->qr;
        $data = json_decode($datas[0]->data);

        $vaNumber = $datas[0]->vaNumber;

        if($datas[0]->qr == null){
            $qr = false;
            return view('home.transaction.detail',compact('datas','data','status','total','qr','vaNumber'));
        }

        // dd($status);

        return view('home.transaction.detail',compact('datas','data','status','total','qr','vaNumber'));

        // $tripay = new TripayController;

        // $data = $tripay->detailTransaction($references);

        // // dd($data);
        // $data_kita = Transaction::where('reference',$references)->get('qr');

        // if(json_decode($data)->success == false){
        //     return redirect()->back()->with('errors','reference not found');
        // }
        //     $data = json_decode($data)->data;

        //     if(!$data_kita){
        //         return redirect()->back()->with('errors','reference not found');
        //     }


        // $total_fee = $data->total_fee;
        // $total = $data->amount;
        // $payment_method = $data->payment_method;

        // $qr = Transaction::where('reference',$references)->get('qr')[0]->qr;

        // $status = Transaction::where('reference',$references)->first()->status;
        // $datas = Transaction::where('reference',$references)->get()[0];
        // $exp = $datas->expired;
        // $datas = json_decode($datas->data);

        // $transs = Transaction::where('reference',$references)->first();
        // $pengiriman = Shipping::where('transaction_id',$transs->id)->first();



        // if($qr == null){
        //     $qr = false;
        //     return view('transaction.detail',compact('data','total_fee','total','payment_method','qr','status','datas','exp','pengiriman'));
        // }
        // return view('home.transaction.detail',compact('data','total_fee','total','payment_method','qr','status','datas','exp','pengiriman'));

    }


    public function show()
    {

        $users = Auth()->user()->id;

        $data = Transaction::where('user_id',$users)->get();

        return view('home.transaction',compact('data'));


    }

    public function show_all()
    {

        // $users = Auth()->user()->id;

        $data = Transaction::paginate(10);
        // dd($data);


        return view('home.transaction',compact('data'));


    }

    public function transaction_pulsa(Request $request)
    {

        // dd($request->all());

        $tripay = new TripayController;

        $tripaypulsa = $tripay->requestTransactionPulsa($request->all());

        $d[] = [
            'qty' => 1,
            'subtotal' => $tripaypulsa->amount,
            'product_id' => null,
            'image' => 'gambarPulsa.jpg'
        ];

        $user = auth()->user();

        $trans = Transaction::create([
            'amount' => $tripaypulsa->amount,
            'reference' => $tripaypulsa->reference,
            'merchant_ref' => $tripaypulsa->merchant_ref,
            'data' => json_encode($d),
            'status' => $tripaypulsa->status,
            'user_id' => $user->id,
            'expired' => $tripaypulsa->expired_time,
            'qr' => $tripaypulsa->qr_url,
            'customer_id' => $request->nohp,
            'product_code' => $request->code
        ]);

        return redirect('transaction/'.$tripaypulsa->reference)->withSuccess('Transaksi berhasil di buat');



    }
}
