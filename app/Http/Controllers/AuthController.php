<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\VerificationEmail;
use App\Models\BotCommend;
use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }    

    public function authenticate(Request $request) 
    {
        $credentials = $request->validate([
            'username'  => ['required'],
            'password'  => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status != 1) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
        
                Session::flash('status', 'failed');
                Session::flash('message', 'Your Account is Not Active');
                return redirect(route('login'));
            }

            $request->session()->regenerate();
            if (Auth::user()->role_id  == 1) {
                return redirect(route('dashboard'));
            }

            if (Auth::user()->role_id == 2) {
                return redirect(route('dashboard'));
            }
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Wrong Username/Password');
        return redirect(route('login'));
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store_register(UserRequest $request)
    {
        $id = Str::uuid();
        $request['id'] = $id->toString();

        $request['password'] = Hash::make($request->password);
        $request['image'] = 'default.png';
        $request['status'] = 0;
        $request['role_id'] = 2;
        $data = User::create($request->all());

        if ($data) {
            Mail::to($data->email)->send(new VerificationEmail($data));
            Session::flash('status', 'success');
            Session::flash('message', 'Create Account Success, Go to Your Email First to Active an Account');
        }

        return redirect(route('register'));
    }

    public function verified($id)
    {
        $verification = User::findOrFail($id);

        if ($verification) {
            $verification->status = 1;
            $verification->save();

            Session::flash('status', 'success');
            Session::flash('message', 'Verification Successful, Please Login');
            return redirect(route('login'));
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Verification Failed');
        return redirect(route('login'));
    }

    public function lostpwd()
    {
        return view('auth.lostpassword');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
