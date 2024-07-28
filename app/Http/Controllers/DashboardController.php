<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function dashboard()
    {
        return view('dashboard-page');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'comments' => 'required',
        ]);

        Mail::to('genieacsbot@outlook.com')->send(new ContactFormMail($request));

        FacadesAlert::success('Success', 'Your Message Has Been Send.')->persistent(true, false);

        return back();
    }
}
