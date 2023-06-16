<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Notifications\ResetPaswordNotification;
use Illuminate\Routing\Controller;

/**
 * Class ResetPasswordController
 *
 * @package App\Http\Controllers
 */
class ResetPasswordController extends Controller
{
    /**
     * Show the forgot password email form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showEmail()
    {
        return view('users.auth.forgot-password');
    }

    /**
     * Send the password reset email.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function emailRequest(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $token = Str::random(60);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $user = User::where('email', $request->email)->first();

        $user->notify(new ResetPaswordNotification($token));

        return redirect()->route('welcome');
    }

    /**
     * Show the password reset form.
     *
     * @param string $token
     * @return \Illuminate\Contracts\View\View
     */
    public function showPassword($token)
    {
        return view('users.auth.reset-password', ['token' => $token]);
    }

    /**
     * Reset the user's password.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function ressetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        $token = $request->input('token');
        $password = Hash::make($request->password);
        $tokenData = DB::table('password_resets')->where('token', $token)->first();

        if ($tokenData) {
            $user = User::where('email', $tokenData->email)->firstOrFail();

            $user->update(['password' => $password]);

            DB::table('password_resets')->where('email', $tokenData->email)->delete();

            return redirect()->route('login.show');
        } else {
            return redirect()->route('password.email');
        }
    }
}
