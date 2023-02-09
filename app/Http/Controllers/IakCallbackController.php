<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;

use App\Models\Transaction;

class IakCallbackController extends Controller
{
    public function handle(Request $request)
    {


        $data = $request->all();

        $data = json_decode($data,true);

        if($data){

            $Transaction = Transaction::where('reference', $data['ref_id'])
            ->where('status_message', '!=', 'SUCCESS')
            ->first();

            if (! $Transaction) {
                return Response::json([
                    'success' => false,
                    'message' => 'No Transaction found or already paid: ' . $data['ref_id'],
                ]);
            }

            $Transaction->update(['status_message' => $data['message']]);
            return Response::json([
                'success' => true
            ]);

        } else{

            $Transaction = Transaction::where('reference', $data['ref_id'])
            ->where('status_message', '!=', 'SUCCESS')
            ->first();

            if (! $Transaction) {
                return Response::json([
                    'success' => false,
                    'message' => 'No Transaction found or already paid: ' . $data['ref_id'],
                ]);
            }

            $Transaction->update(['status_message' => 'failed']);
            return Response::json([
                'success' => true
            ]);


        }

    }
}
