<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananDigitalController extends Controller
{


    public function operator($category_id){
        $hijau = new HijaupayController;

        $data = $hijau->OperatorPrabayar($category_id);

        // dd($data);

        return response()->json($data);
    }

    public function product($operator_id,$category_id){
        $hijau = new HijaupayController;

        $data = $hijau->ProdukPrabayar($operator_id,$category_id);

        // dd($data);

        return response()->json($data);
    }

    public function pricelist_pulsa(){
        $hijau = new Iak/IakController;

        $data = $hijau->pricelist()->pricelist;

        // dd($data);

        foreach($data as $d){

            if($d->product_type == 'pulsa'){

                $dat[] = [
                    "product_code" => $d->product_code,
                    "product_description" => $d->product_description,
                    "product_nominal" => $d->product_nominal,
                    "product_details" => $d->product_details,
                    "product_price" => $d->product_price,
                    "product_type" => $d->product_type,
                    "active_period" => $d->active_period,
                    "status" => $d->status,
                    "icon_url" => $d->icon_url
                    // 'type' => $d->product_code
                ];

            }
        }
        $data = json_encode($dat,true);
        $data = json_decode($data);
        // dd($dat);


        return response()->json($data);
    }

    public function pricelist_dana(){
        $hijau = new IakController;

        $data = $hijau->pricelist()->pricelist;

        // dd($data);

        foreach($data as $d){

            if($d->product_description == 'DANA'){

                $dat[] = [
                    "product_code" => $d->product_code,
                    "product_description" => $d->product_description,
                    "product_nominal" => $d->product_nominal,
                    "product_details" => $d->product_details,
                    "product_price" => $d->product_price,
                    "product_type" => $d->product_type,
                    "active_period" => $d->active_period,
                    "status" => $d->status,
                    "icon_url" => $d->icon_url
                    // 'type' => $d->product_code
                ];

            }
        }
        $data = json_encode($dat,true);
        $data = json_decode($data);
        // dd($dat);


        return response()->json($data);
    }

    public function iak_kategori($kategori){


        if($kategori == 'pulsa'){

            return view('home.layanan.pulsa');

        }else if($kategori == 'dana'){

            $hijau = new IakController;

            $data = $hijau->pricelist()->pricelist;

            // dd($data);

            foreach($data as $d){

                if($d->product_description == 'DANA'){

                    $dat[] = [
                        "product_code" => $d->product_code,
                        "product_description" => $d->product_description,
                        "product_nominal" => $d->product_nominal,
                        "product_details" => $d->product_details,
                        "product_price" => $d->product_price,
                        "product_type" => $d->product_type,
                        "active_period" => $d->active_period,
                        "status" => $d->status,
                        "icon_url" => $d->icon_url
                        // 'type' => $d->product_code
                    ];

                }
            }
            $data = json_encode($dat,true);
            $data = json_decode($data);

            return view('home.layanan.dana',compact('data'));

        }else if($kategori == 'ovo'){

            $hijau = new IakController;

            $data = $hijau->pricelist()->pricelist;

            // dd($data);

            foreach($data as $d){

                if($d->product_description == 'OVO'){

                    $dat[] = [
                        "product_code" => $d->product_code,
                        "product_description" => $d->product_description,
                        "product_nominal" => $d->product_nominal,
                        "product_details" => $d->product_details,
                        "product_price" => $d->product_price,
                        "product_type" => $d->product_type,
                        "active_period" => $d->active_period,
                        "status" => $d->status,
                        "icon_url" => $d->icon_url
                        // 'type' => $d->product_code
                    ];

                }
            }
            $data = json_encode($dat,true);
            $data = json_decode($data);

            return view('home.layanan.ovo',compact('data'));

        }else if($kategori == 'gopay'){

            $hijau = new IakController;

            $data = $hijau->pricelist()->pricelist;

            // dd($data);

            foreach($data as $d){

                if($d->product_description == 'GoPay E-Money'){

                    $dat[] = [
                        "product_code" => $d->product_code,
                        "product_description" => $d->product_description,
                        "product_nominal" => $d->product_nominal,
                        "product_details" => $d->product_details,
                        "product_price" => $d->product_price,
                        "product_type" => $d->product_type,
                        "active_period" => $d->active_period,
                        "status" => $d->status,
                        "icon_url" => $d->icon_url
                        // 'type' => $d->product_code
                    ];

                }
            }
            $data = json_encode($dat,true);
            $data = json_decode($data);

            return view('home.layanan.gopay',compact('data'));
        } else{
            return redirect()->back();
        }


    }

    public function prefix_pulsa($operator){

        $hijau = new IakController;

        $data = $hijau->pricelist()->pricelist;

        $tripay = new TripayController;

        foreach($data as $d){

            if($d->product_type == 'pulsa' && $d->product_description == $operator ){

                $harga  = $tripay->kalkulator($d->product_price+500,"QRIS");
                // $array = [
                //     'total' => $dat[0]['product_price']+$harga[0]->total_fee->customer
                // ];

                // array_push($dat,$array);

                $dat[] = [
                    "product_code" => $d->product_code,
                    "product_description" => $d->product_description,
                    "product_nominal" => $d->product_nominal,
                    "product_details" => $d->product_details,
                    "product_price" => $d->product_price+500+$harga[0]->total_fee->customer,
                    "product_type" => $d->product_type,
                    "active_period" => $d->active_period,
                    "status" => $d->status,
                    "icon_url" => $d->icon_url
                ];




            }
        }

        // dd($dat);
        // $harga  = $tripay->kalkulator($dat[0]['product_price'],"QRIS");

        // dd($harga[0]->total_fee->customer);

        // $array = [
        //     'total' => $dat[0]['product_price']+$harga[0]->total_fee->customer
        // ];

        // array_push($dat,$array);

        // dd($dat);

        $data = json_encode($dat,true);
        $data = json_decode($data);

        return response()->json($data);

    }

    public function filter_pulsa($code){

        $hijau = new IakController;

        $data = $hijau->pricelist()->pricelist;

        $tripay = new TripayController;



        foreach($data as $d){

            if($d->product_code == $code ){

                $harga  = $tripay->kalkulator($d->product_price+500,"QRIS");

                $dat[] = [
                    "product_code" => $d->product_code,
                    "product_description" => $d->product_description,
                    "product_nominal" => $d->product_nominal,
                    "product_details" => $d->product_details,
                    "product_price" => $d->product_price+500+$harga[0]->total_fee->customer,
                    "product_type" => $d->product_type,
                    "active_period" => $d->active_period,
                    "status" => $d->status,
                    "icon_url" => $d->icon_url,
                    "price" => $d->product_price+500
                ];

            }
        }
        // dd($dat);

        // $harga  = $tripay->kalkulator($dat[0]['product_price'],"QRIS");

        // dd($harga[0]->total_fee->customer);

        // $array = [
        //     'total' => $dat[0]['product_price']+$harga[0]->total_fee->customer
        // ];

        // array_push($dat,$array);

        // dd($dat);




        $data = json_encode($dat,true);
        $data = json_decode($data);

        // dd($data);

        return response()->json($data);

    }
}
