<?php

namespace App\Http\Controllers;

use App\Events\TrxUpdated;
use App\Models\DetailTrx;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SnapController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('detailTrx')->orderBy('created_at','desc')->get();

        foreach ($transactions as $value) {
            if ($value->transaction_status == 'settlement') {
                $value->status = 'active';
                $value->save();
                return view('transactions.transaction', ['transactions' => $transactions]);
            }
        }

        return view('transactions.transaction', ['transactions' => $transactions]);
    }

    public function confirmTrx(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $request['order_id'] = $transaction->order_id;
        $request['trx_id'] = $transaction->id;
        $data = $request->all();
        DetailTrx::create($data);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $params = array(
            'transaction_details' => array(
                'order_id'        => $transaction->order_id,
                'gross_amount'    => $transaction->gross_amount,
            ),
            'customer_details'    => array(
                'first_name'      => $transaction->first_name,
                'last_name'       => $transaction->last_name,
                'email'           => $transaction->email
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('transactions.checkout', ['transaction' => $transaction, 'snapToken' => $snapToken]);
    }    

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'settlement') {
                $order = DetailTrx::find($request->order_id);
                    $order->update(['transaction_status' => $request->transaction_status, 
                    'status_code' => $request->status_code, 
                    'payment_type' => $request->payment_type, 
                    'transaction_time' => $request->transaction_time, 
                    'bank' => $request->payment_type == 'echannel' ? 'mandiri' : ($request->va_numbers[0]['bank'] ?? null),
                    'va_number' => isset($request->va_numbers) ? $request->va_numbers[0]['va_number'] : (isset($request->permata_va_number) ? $request->permata_va_number : $request->bill_key),
                ]);

                $this->trigger($order->trx_id);
            }
        }
        return redirect(route('transactions'));
    }

    public function trigger($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->status = 'active';
        $transaction['start_date'] = Carbon::now()->format('d-m-Y');
        $transaction['end_date']   = Carbon::now()->addDays(30)->format('d-m-Y');        
        $transaction->save();

        $this->start_service($transaction->id);
    }

    public function start_service($id)
    {
        $active = Transaction::findOrFail($id);
        $url = "http://genieacsbot.online/check/devices.php?token=".$active->token."&url_api=".$active->url."&mac=".$active->mac;

        if ($active->status == 'active') 
        {
            $response = Http::get($url);

            if ($response->successful()) {
                $responseData = [
                    'success' => true,
                    'message' => 'Service Active',
                ];
            } else {
                $responseData = [
                    'success' => false,
                    'message' => 'Service Failed to Active',
                ];
            }
        }else{
            $responseData = [
                'success' => false,
                'message' => 'Transaction code is not Active',
            ];
        }
        return response()->json($responseData);
    }
}
