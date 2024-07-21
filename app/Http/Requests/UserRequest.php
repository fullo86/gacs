<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username'      => 'required|min:8|unique:users',
            'password'      => 'required|min:8',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email:rfc'
        ];
    }

    public function messages()
    {
        return [
            'username.required'     => 'Username Required',
            'username.min'          => 'Username Character Minimum is :min',
            'username.unique'       => 'Username Already Registered',
            'password.required'     => 'Password Required',
            'password.min'          => 'Minimum password must be at least :min characters',
            'first_name.required'   => 'First Name Required',
            'last_name.required'    => 'Last Name Required',
            'email.required'        => 'Email Required',
            'email.email'           => 'Email is not Valid'
        ];
    }
}
