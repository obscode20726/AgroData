<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Password as PasswordFacade;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordEmail;


class FarmerAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('farmer.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $remember = $request->has('remember'); // Check if "Remember Me" is checked
    
        if (Auth::guard('farmer')->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect()->intended('/farmer/dashboard');
        }
    
        return redirect()->route('farmer.login')->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::guard('farmer')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function showRegistrationForm()
    {
        return view('farmer.register');
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->route('farmer.register')->withErrors($validator)->withInput();
        }

        $farmer = Farmer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($farmer)); // Trigger the Registered event

        return redirect()->route('farmer.login')->with('message', 'Registration successful! Please check your email to verify your account.');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:farmers'],
            'password' => ['required', 'confirmed', 'min:8', 'strong_password'],
        ], [
            'password.regex' => 'The password must start with a capital letter and contain at least one number and one symbol.',
        ]);
    }

    public function showResetForm(Request $request, $token = null)
{
    return view('farmer.passwords.email')->with(
        ['token' => $token, 'email' => $request->email]
    );
}

public function sendResetLinkEmail(Request $request)
{
    $request->validate(['email' => 'required|email']);

    $response = PasswordFacade::broker('farmers')->sendResetLink(
        $request->only('email')
    );

    return $response == PasswordFacade::RESET_LINK_SENT
        ? redirect()->route('farmer.passwords.reset', ['token' => $response])->with('status', trans($response))
        : back()->withErrors(['email' => trans($response)]);
}


public function resetPassword(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8|strong_password',
    ]);

    $response = $this->broker()->reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $this->resetPasswordForUser($user, $password);
        }
    );

    if ($response == PasswordFacade::PASSWORD_RESET) {
        // Send the password reset email
        Mail::to($request->email)->send(new ResetPasswordEmail());

        // Redirect directly to the password reset form with token and email
        return redirect()->route('farmer.passwords.reset', [
            'token' => $request->token,
            'email' => $request->email,
        ])->with('status', trans($response));
    } else {
        return back()->withErrors(['email' => trans($response)]);
    }
}


    protected function resetPasswordForUser($user, $password)
    {
        $user->forceFill([
            'password' => Hash::make($password),
        ])->save();
    }
}
