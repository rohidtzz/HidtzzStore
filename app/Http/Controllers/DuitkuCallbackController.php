<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use App\Models\Transaction;
use Exception;

class DuitkuCallbackController extends Controller
{
    //

    public function handle(Request $request)
    {
        // dd($request->all());
        $apiKey = env('DUITKU_API_KEY'); // API key anda
        $merchantCode = isset($request->merchantCode) ? $request->merchantCode : null;
        $amount = isset($request->amount) ? $request->amount : null;
        $merchantOrderId = isset($request->merchantOrderId) ? $request->merchantOrderId : null;
        $productDetail = isset($request->productDetail) ? $request->productDetail : null;
        $additionalParam = isset($request->additionalParam) ? $request->additionalParam : null;
        $paymentMethod = isset($request->paymentCode) ? $request->paymentCode : null;
        $resultCode = isset($request->resultCode) ? $request->resultCode : null;
        $merchantUserId = isset($request->merchantUserId) ? $request->merchantUserId : null;
        $reference = isset($request->reference) ? $request->reference : null;
        // $signature = isset($request->signature) ? $request->signature : null;

        // $merchantCode = isset($_POST['merchantCode']) ? $_POST['merchantCode'] : null;
        // $amount = isset($_POST['amount']) ? $_POST['amount'] : null;
        // $merchantOrderId = isset($_POST['merchantOrderId']) ? $_POST['merchantOrderId'] : null;
        // $productDetail = isset($_POST['productDetail']) ? $_POST['productDetail'] : null;
        // $additionalParam = isset($_POST['additionalParam']) ? $_POST['additionalParam'] : null;
        // $paymentMethod = isset($_POST['paymentCode']) ? $_POST['paymentCode'] : null;
        // $resultCode = isset($_POST['resultCode']) ? $_POST['resultCode'] : null;
        // $merchantUserId = isset($_POST['merchantUserId']) ? $_POST['merchantUserId'] : null;
        // $reference = isset($_POST['reference']) ? $_POST['reference'] : null;
        // $signature = isset($_POST['signature']) ? $_POST['signature'] : null;

        //log callback untuk debug
        // file_put_contents('callback.txt', "* Callback *\r\n", FILE_APPEND | LOCK_EX);

        if(!empty($merchantCode) && !empty($amount) && !empty($merchantOrderId))
        {
            $params = $merchantCode . $amount . $merchantOrderId . $apiKey;
            $calcSignature = md5($params);

            if($calcSignature)
            {
                $Transaction = Transaction::where('reference', $reference)
                ->where('status_message', '!=', 'SUCCESS')
                ->first();
                // dd($Transaction);

                if (! $Transaction) {
                    return Response::json([
                        'success' => false,
                        'message' => 'No Transaction found or already paid: ' . $reference,
                    ]);
                }

                if($Transaction->type == 'digital'){
                    $iak = new IakController;

                    $response = $iak->topup_pulsa($Transaction->customer_id,$Transaction->code_product,$Transaction->reference);

                    $Transaction->update(['status_message' => "proses"]);
                    return Response::json([
                        'success' => true
                    ]);
                } else {
                    $Transaction->update(['status_message' => "SUCCESS"]);
                    return Response::json([
                        'success' => true
                    ]);
                }

                //Callback tervalidasi
                //Silahkan rubah status transaksi anda disini
                // file_put_contents('callback.txt', "* Success *\r\n\r\n", FILE_APPEND | LOCK_EX);

            }
            else
            {
                // file_put_contents('callback.txt', "* Bad Signature *\r\n\r\n", FILE_APPEND | LOCK_EX);
                throw new Exception('Bad Signature');
            }
        }
        else
        {
            // file_put_contents('callback.txt', "* Bad Parameter *\r\n\r\n", FILE_APPEND | LOCK_EX);
            throw new Exception('Bad Parameter');
        }
    }
}
