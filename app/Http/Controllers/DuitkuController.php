<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DuitkuController extends Controller
{

    public function RequestTransaction($metode,$detailBarang){

        $user = auth()->user();
        // dd($detailBarang);

        $amount = 0;
        foreach($detailBarang as $k){

            $amount += $k['price'];


        }

        $merchantCode = env('DUITKU_MERCHANT_CODE'); // dari duitku
        $apiKey = env('DUITKU_API_KEY'); // dari duitku
        $paymentAmount = $amount;
        $paymentMethod = $metode; // VC = Credit Card
        $merchantOrderId =  'TRX-'.time();
        // $merchantOrderId = time() . ''; // dari merchant, unik
        $productDetails = 'Tes pembayaran menggunakan Duitku';
        $email = $user->email; // email pelanggan anda
        $phoneNumber = $user->no_hp; // nomor telepon pelanggan anda (opsional)
        // $additionalParam = ''; // opsional
        // $merchantUserInfo = ''; // opsional
        $customerVaName = $user->name; // tampilan nama pada tampilan konfirmasi bank
        $callbackUrl = 'https://store.hidtzz.my.id/callback/duitku'; // url untuk callback
        $returnUrl = 'https://store.hidtzz.my.id/transaction/'.$merchantOrderId; // url untuk redirect
        $expiryPeriod = 10; // atur waktu kadaluarsa dalam hitungan menit
        $signature = md5($merchantCode . $merchantOrderId . $paymentAmount . $apiKey);

        // Customer Detail
        // $firstName = "John";
        // $lastName = "Doe";

        // // Address
        // $alamat = "Jl. Kembangan Raya";
        // $city = "Jakarta";
        // $postalCode = "11530";
        // $countryCode = "ID";

        // $address = array(
        //     'firstName' => $firstName,
        //     'lastName' => $lastName,
        //     'address' => $alamat,
        //     'city' => $city,
        //     'postalCode' => $postalCode,
        //     'phone' => $phoneNumber,
        //     'countryCode' => $countryCode
        // );

        // $customerDetail = array(
        //     'firstName' => $firstName,
        //     'lastName' => $lastName,
        //     'email' => $email,
        //     'phoneNumber' => $phoneNumber,
        //     'billingAddress' => $address,
        //     'shippingAddress' => $address
        // );

        // $item1 = array(
        //     'name' => 'Test Item 1',
        //     'price' => 10000,
        //     'quantity' => 1);

        // $item2 = array(
        //     'name' => 'Test Item 2',
        //     'price' => 30000,
        //     'quantity' => 3);

        // $itemDetails = array(
        //     $item1, $item2
        // );

        // dd($itemDetails);

        /*Khusus untuk metode pembayaran OL dan SL
        $accountLink = array (
            'credentialCode' => '7cXXXXX-XXXX-XXXX-9XXX-944XXXXXXX8',
            'ovo' => array (
                'paymentDetails' => array (
                    0 => array (
                        'paymentType' => 'CASH',
                        'amount' => 40000,
                    ),
                ),
            ),
            'shopee' => array (
                'useCoin' => false,
                'promoId' => '',
            ),
        );*/

        $params = array(
            'merchantCode' => $merchantCode,
            'paymentAmount' => $paymentAmount,
            'paymentMethod' => $paymentMethod,
            'merchantOrderId' => $merchantOrderId,
            'productDetails' => $productDetails,
            // 'additionalParam' => $additionalParam,
            // 'merchantUserInfo' => $merchantUserInfo,
            'customerVaName' => $customerVaName,
            'email' => $email,
            'phoneNumber' => $phoneNumber,
            //'accountLink' => $accountLink,
            'itemDetails' => $detailBarang,
            // 'customerDetail' => $customerDetail,
            'callbackUrl' => $callbackUrl,
            'returnUrl' => $returnUrl,
            'signature' => $signature,
            'expiryPeriod' => $expiryPeriod
        );

        $params_string = json_encode($params);
        //echo $params_string;
        $url = 'https://sandbox.duitku.com/webapi/api/merchant/v2/inquiry'; // Sandbox
        // $url = 'https://passport.duitku.com/webapi/api/merchant/v2/inquiry'; // Production
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($params_string))
        );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        //execute post
        $request = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($httpCode == 200)
        {
            $result = json_decode($request, true);
            // dd($result);
            return $result;
            // dd($result);
            // header('location: '. $result['paymentUrl']);
            // echo "paymentUrl :". $result['paymentUrl'] . "<br />";
            // echo "merchantCode :". $result['merchantCode'] . "<br />";
            // echo "reference :". $result['reference'] . "<br />";
            // echo "vaNumber :". $result['vaNumber'] . "<br />";
            // echo "amount :". $result['amount'] . "<br />";
            // echo "statusCode :". $result['statusCode'] . "<br />";
            // echo "statusMessage :". $result['statusMessage'] . "<br />";
        }
        else
        {
            $request = json_decode($request);
            $error_message = "Server Error " . $httpCode ." ". $request->Message;
            dd($request);
            echo $error_message;
        }
    }

    public function KalkulatorBiaya($amount)
    {
        // Set kode merchant anda
        $merchantCode = env('DUITKU_MERCHANT_CODE');
        // Set merchant key anda
        $apiKey = env('DUITKU_API_KEY');;
        // catatan: environtment untuk sandbox dan passport berbeda

        $datetime = date('Y-m-d H:i:s');
        $paymentAmount = $amount;
        $signature = hash('sha256',$merchantCode . $paymentAmount . $datetime . $apiKey);

        $params = array(
            'merchantcode' => $merchantCode,
            'amount' => $paymentAmount,
            'datetime' => $datetime,
            'signature' => $signature
        );

        $params_string = json_encode($params);

        $url = 'https://sandbox.duitku.com/webapi/api/merchant/paymentmethod/getpaymentmethod';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($params_string))
        );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        //execute post
        $request = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($httpCode == 200)
        {
            // dd($request);
            $results = json_decode($request);
            // dd($results);
            // print_r($results, false);

            return $results->paymentFee;
        }
        else{
            $request = json_decode($request);
            $error_message = "Server Error " . $httpCode ." ". $request->Message;
            echo $error_message;
        }
    }

}
