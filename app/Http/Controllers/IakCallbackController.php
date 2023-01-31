<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;

class IakCallbackController extends Controller
{

    public function s()
    {

        $data = '{
            "data": {
              "ref_id": "order002",
              "status": "1",
              "product_code": "xld25000",
              "customer_id": "0817777215",
              "price": "25000",
              "message": "SUCCESS",
              "sn": "123456789",
              "balance": "997061249",
              "tr_id": "3482",
              "rc": "00",
              "sign": "96e1028f6beaa817ee3670a39c01c69d"
            }
          }';

        $lagi = json_decode($data)->data->message;

          return response()->json($lagi, 200);
        //   dd($data);


    }

    public function handle(Request $request)
    {

        // $data = file_get_contents("php://input");
        // dd($data);

        Transaction::create([
            'amount' => 123,
            'reference' => "13",
            'merchant_ref' => "asd",
            'data' => json_encode($request->all()),
            'status' => "unpaid",
            'user_id' => 1,
            'expired' => 12313,
            'qr' => "123",
            'customer_id' => "123123",
            'product_code' => "12312321"
        ]);

        // $data = $request->all();

        // return response()->json($data);

        // return response()->json();

        // $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        // $json = $request->getContent();

        // return $json;

        /*
        |--------------------------------------------------------------------------
        | Proses callback untuk open payment
        |--------------------------------------------------------------------------
        */

        // $invoice = Invoice::where('unique_ref', $uniqueRef)
        //     ->where('status', 'UNPAID')
        //     ->first();

        // if (! $invoice) {
        //     return Response::json([
        //         'success' => false,
        //         'message' => 'Invoice not found or current status is not UNPAID',
        //     ]);
        // }

        // if ((int) $data->total_amount !== (int) $invoice->total_amount) {
        //     return Response::json([
        //         'success' => false,
        //         'message' => 'Invalid amount. Expected: ' . $invoice->total_amount . ' - Got: ' . $data->total_amount,
        //     ]);
        // }

        // switch ($data->status) {
        //     case 'PAID':
        //         $invoice->update(['status' => 'PAID']);
        //         return Response::json(['success' => true]);

        //     case 'EXPIRED':
        //         $invoice->update(['status' => 'EXPIRED']);
        //         return Response::json(['success' => true]);

        //     case 'FAILED':
        //         $invoice->update(['status' => 'FAILED']);
        //         return Response::json(['success' => true]);

        //     default:
        //         return Response::json([
        //             'success' => false,
        //             'message' => 'Unrecognized payment status',
        //         ]);
        // }
    }
}
