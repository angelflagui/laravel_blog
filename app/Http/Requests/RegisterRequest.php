<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'email' => 'required|email:rfc,dns|unique:users,email',
            'name' => 'required|unique:users,name',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ];

    }
    public function messages()
    {

        return [
        'email.required' => 'Email is required',
        'email.email' => 'Email is not valid',
        'email.unique' => 'Email is already taken',
        'username.required' => 'Username is required',
        'username.unique' => 'Username is already taken',
        'password.required' => 'Password is required',
        'password.min' => 'Password must be at least 8 characters',
        'password_confirmation.required' => 'Password confirmation is required',
        'password_confirmation.same' => 'Password confirmation must be the same as password'
    ];

    }
}
