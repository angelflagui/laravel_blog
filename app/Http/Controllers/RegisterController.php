<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;

use App\Notifications\VerifyEmailNotification;
use App\Notifications\RegistrationNotification;

class RegisterController extends Controller
{
    /**
     * Display register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('users.auth.register');
    }

    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {

        $user = User::create($request->validated());

        auth()->login($user);
        $user->notify(new RegistrationNotification());
        $user->notify(new VerifyEmailNotification());
        

        return redirect('/front/posts');
    }
}
