<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }    

    public function register()
    {
        return view('auth.register');
    }

    public function store_register(Request $request)
    {
        $id = Str::uuid();
        $request['id'] = $id->toString();

        $request['password'] = Hash::make($request->password);
        $request['image'] = 'default.png';
        $request['role_id'] = 2;
        $data = User::create($request->all());

        if ($data) {
            Session::flash('status', 'success');
            Session::flash('message', 'Create Account Success, Please Login');
        }

        return redirect( route('register') );
    }
}
