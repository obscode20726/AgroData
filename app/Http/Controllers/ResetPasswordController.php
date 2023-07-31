<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/farmer/dashboard';

    public function __construct()
    {
        $this->middleware('guest:farmer');
    }

    // Optional: If you want to specify a custom password reset view, you can override the showResetPasswordForm method
    public function showResetPasswordForm(Request $request, $token)
    {
        return view('farmer.passwords.email')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
