<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BotController extends Controller
{
    public function page_bot_wa()
    {
        return view('bot.whatsapp_bot');
    }

    public function store_inform_wa(Request $request)
    {
        $user = Auth::user()->id;
    
        $id = Str::uuid();
        $data = $request->all();
        $data['id'] = $id->toString();
        $data['user_id'] = $user;
        $data['order_id'] = rand();
        $data['service'] = 'whatsapp_bot';
        $data['gross_amount'] = 50000;
        $data['status'] = 'inactive';
        $newData = Transaction::create($data);

        if (!$newData) {
            Session::flash('status', 'failed');
            Session::flash('message', 'Failed to Store the data');
        }

        Session::flash('status', 'success');
        Session::flash('message', 'Data Successfully created, please go to transaction menu to activated');
        return redirect(route('bot_wa'));
    }
    
    public function page_bot_telegram()
    {
        return view('bot.telegram_bot');
    }

    public function store_inform_telegram(Request $request)
    {
        $id = Str::uuid();
        $data = $request->all();
        $data['id'] = $id->toString();
        $data['service'] = 'telegram_bot';
        $newData = Transaction::create($data);

        if (!$newData) {
            Session::flash('status', 'failed');
            Session::flash('message', 'Failed to Store the data');
        }

        Session::flash('status', 'success');
        Session::flash('message', 'Data Successfully created, please go to transaction menu to activated');
        return redirect(route('bot_telegram'));
    }
}
