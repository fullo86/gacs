<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordSettingsRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('users.users', ['listUsers' => $users]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit-user', ['account' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data =  $request->all();

        $data['updated_at'] = Carbon::now();
        $user->update($data);

        Session::flash('status', 'success');
        Session::flash('message', 'Successfully Updated');
        return redirect(route('account' , $user->id));
    }

    public function change_password($id)
    {
        $user = User::findOrFail($id);

        return view('users.change-password', ['account' => $user]);
    }

    public function store_new_password(PasswordSettingsRequest $request, $id)
    {
        $data = User::findOrFail($id);
        if ($data) {
            if (!Hash::check($request->old_password, auth()->user()->password)) {
                Session::flash('status', 'failed');
                Session::flash('message', 'Wrong Old Password');
                return redirect(route('change-password', $data->id));
            }

            if ($request->new_password != $request->repeat_password) {
                Session::flash('status', 'failed');
                Session::flash('message', 'Confirmation password is not Match');
                return redirect(route('change-password', $data->id));
            }

            $data->update([
                'password' => Hash::make($request->new_password)
            ]);

            Session::flash('status', 'success');
            Session::flash('message', 'Password Updated');
            return redirect(route('change-password', $data->id));
        }
    }
}

