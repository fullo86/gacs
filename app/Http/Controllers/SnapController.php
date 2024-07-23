<?php

namespace App\Http\Controllers;

use App\Models\DetailTrx;
use App\Models\Transaction;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class SnapController extends Controller
{
    public function index()
    {
        $transactions = Transaction::orderBy('created_at','desc')->get();

        return view('transactions.transaction', ['transactions' => $transactions]);
    }

    public function confirmTrx(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $request['order_id'] = $transaction->order_id;
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
            }
        }
    }

    // public function transactions(Request $request)
    // {
    //     $id = Str::uuid();
    //     $data = $request->all();
    //     $data['id'] = $id->toString();
    //     $data['order_id'] = rand();

    //     $params = array(
    //         'transaction_details' => array(
    //             'order_id'        => $data['order_id'],
    //             'gross_amount'    => $dataTrx[0]->total_price,
    //         ),
    //         'customer_details'    => array(
    //             'customer'        => $dataTrx[0]->recipient_name == null ? auth()->guard('customer')->user()->name : $dataTrx[0]->recipient_name,
    //             'email'           => $dataTrx[0]->email,
    //             'phone'           => $dataTrx[0]->phone,
    //         ),
    //     );
    //     $snapToken = \Midtrans\Snap::getSnapToken($params);
    // }   
}
