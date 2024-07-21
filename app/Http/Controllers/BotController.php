<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BotController extends Controller
{
    public function page_bot_wa()
    {
        return view('bot.whatsapp_bot');
    }

    public function page_bot_telegram()
    {
        return view('bot.telegram_bot');
    }
}
