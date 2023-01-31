<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IakController extends Controller
{
    public function pricelist(){

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://prepaid.iak.dev/api/pricelist',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "status": "all",
            "username": "085156850530",
            "sign": "20bd20a6dc2dc713bce366af2377471f"
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response)->data;
    }

    public function topup_pulsa($customer_id,$product_code,$reference){

        $username = "08515685053039463d3a6c0700e6593C".$reference;
        $key = "39463d3a6c0700e6593C";
        $ref = $reference;


        $sign = md5($username);


        // dd($key);

        // $data = '{
        //     "customer_id": "0822188989892",
        //     "product_code": "htelkomsel10000",
        //     "ref_id": "1",
        //     "username": "085156850530",
        //     "sign": "3864aa8fc5bb3a0c2724504cf9f60ba7"
        // }';

        $data = array(
            "customer_id"=> $customer_id,
            "product_code"=> $product_code,
            "ref_id"=> $ref,
            "username"=> "085156850530",
            "sign"=> $sign
        );

        // dd(json_encode($data));

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://prepaid.iak.dev/api/top-up',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response);
    }
}
