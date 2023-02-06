<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;

class IakCallbackController extends Controller
{
    public function handle(Request $request)
    {


        $rawRequestInput = file_get_contents("php://input");

        $arrRequestInput = json_decode($rawRequestInput, true);
        // print_r($arrRequestInput);

        $cart = Cart::create([
            'qty' => '1',
            'subtotal' => 'asd',
            'user_id' => 1,
            'product_id' => 1
        ]);

        // $_id = $arrRequestInput['id'];
        // $_externalId = $arrRequestInput['external_id'];
        // $_userId = $arrRequestInput['user_id'];
        // $_status = $arrRequestInput['status'];
        // $_paidAmount = $arrRequestInput['paid_amount'];
        // $_paidAt = $arrRequestInput['paid_at'];
        // $_paymentChannel = $arrRequestInput['payment_channel'];
        // $_paymentDestination = $arrRequestInput['payment_destination'];




    }
}
