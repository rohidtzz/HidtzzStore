<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\Shipping;

use Validator;

use Carbon\Carbon;


class TransactionController extends Controller
{
    //

    public function store(Request $request)
    {

        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'metode' => ['required', 'string'],
            'totals' => ['required', 'integer'],
            'fee' => ['required','integer'],
        ]);

        if($validator->fails()) {
            return back()->with('errors', $validator->messages())->withInput();
        }

        $users = Auth()->user()->id;

        if(!Cart::where('user_id',$users)->first()){
            return redirect()->back()->with('errors','invalid');
        }


        $product = Cart::with('product')->where('user_id',$users)->get();

        $cart = Cart::where('user_id',$users)->get();

        foreach($cart as $g){
            $d[] = [
                'qty' =>$g->qty,
                'subtotal' => $g->subtotal,
                'product_id' => $g->product_id,
                'image' => Product::find($g->product_id)->image
            ];
        }

        foreach($product as $l){

            $j[] = Product::find($l->product_id);
            $m[] = $l;


        }

        foreach($m as $k){

            for($x = 0; $x < $k->qty; $x++){
                $datas[] = [
                    "name" => Product::find($k->product_id)->name,
                    "price" => Product::find($k->product_id)->price,
                    "quantity" => 1,
                    "image_url"=> Product::find($k->product_id)->image
                ];
            }

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

        foreach($datas as $dat){
            $detailBarang[] = $dat;
        }


        $duitku = new DuitkuController;

        $response = $duitku->requestTransaction($request->metode,$detailBarang,$request->fee,$d);

        // dd($response['code']);

        if($response['code'] != 200){
            return redirect('/checkout')->with('errors','Transaction gagal');
        }

        Cart::where('user_id',$users)->delete();
        return redirect('transaction/'.$response['reference'])->withSuccess('Transaction berhasil di buat');

    }

    public function detail($references)
    {

        if($references == null || $references == ''){
            return redirect('/transaction')->with('errors','Transaction not found');
        }

        $datas = Transaction::where('reference',$references)->first();

        if(!$datas){
            return redirect('/transaction')->with('errors','Transaction not found');
        }

        $status = $datas->status_message;
        $total = $datas->amount;
        $qr = $datas->qr;
        $fee = $datas->fee;
        $data = json_decode($datas->data);

        $subtotal = 0;
        foreach($data as $k){
            $subtotal += $k->subtotal;
        }

        $vaNumber = $datas->vaNumber;
        $users = Auth()->user()->id;
        $cart = Cart::where('user_id',$users)->count();
        if($datas->qr == null){
            $qr = false;
            return view('home.transaction.detail',compact('datas','data','status','total','qr','vaNumber','fee','subtotal','cart'));
        }

        // dd($status);

        return view('home.transaction.detail',compact('datas','data','status','total','qr','vaNumber','fee','subtotal','cart'));


    }


    public function show()
    {

        $users = Auth()->user()->id;

        $data = Transaction::where('user_id',$users)->get();
        $cart = Cart::where('user_id',$users)->count();

        return view('home.transaction',compact('data','cart'));


    }

    public function show_all()
    {

        $users = Auth()->user()->id;

        $data = Transaction::all();
        // dd($data);

        $cart = Cart::where('user_id',$users)->count();
        return view('home.transaction',compact('data','cart'));


    }

    public function transaction_pulsa(Request $request)
    {

        // dd($request->all());

        $detailBarang[] = [
            'qty' => 1,
            'subtotal' => $request->harga,
            'product_id' => null,
            'image' => 'gambarPulsa.jpg'
        ];
        // dd($detailBarang);
        $duitku = new DuitkuController;

        $response = $duitku->requestTransactionPulsa($request->harga,"BR");


        $a = json_encode($response,true);
        $response = json_decode($a);


        $users = Auth()->user()->id;

        $trans = Transaction::create([
            'amount' => $response->amount,
            'reference' => $response->reference,
            'merchant_code' => $response->merchantCode,
            'data' => json_encode($detailBarang),
            'status_message' => "UNPAID",
            'user_id' => $users,
            'customer_id' => $request->nohp,
            // 'expired' => $response->expired_time,
            // 'qr' => $response->qrString,
            'type' => 'digital',
            'code_product' => $request->code,
            'vaNumber' => $response->vaNumber,
            // 'fee' => $request->fee,
            // 'sign' => $response->signature,
        ]);


        // $trans = Transaction::create([
        //     'amount' => $response->amount,
        //     'reference' => $response->reference,
        //     'merchant_code' => $response->merchantCode,
        //     'data' => json_encode($detailBarang),
        //     'status_message' => "UNPAID",
        //     'user_id' => $users,
        //     // 'expired' => $response->expired_time,
        //     'qr' => $response->qrString,
        //     'type' => 'digital',
        //     'code_product' => $request->code,
        //     // 'vaNumber' => $response->vaNumber,
        //     // 'fee' => $request->fee,
        //     // 'sign' => $response->signature,
        // ]);

        // $trans = Transaction::create([
        //     'amount' => $tripaypulsa->amount,
        //     'reference' => $tripaypulsa->reference,
        //     'merchant_ref' => $tripaypulsa->merchant_ref,
        //     'data' => json_encode($d),
        //     'status' => $tripaypulsa->status,
        //     'user_id' => $user->id,
        //     'expired' => $tripaypulsa->expired_time,
        //     'qr' => $tripaypulsa->qr_url,
        //     'customer_id' => $request->nohp,
        //     'product_code' => $request->code
        // ]);

        return redirect('transaction/'.$response->reference)->withSuccess('Transaksi berhasil di buat');



    }
}
