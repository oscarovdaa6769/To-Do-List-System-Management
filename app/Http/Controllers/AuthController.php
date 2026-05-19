<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showSignUp()
    {
        return view('auth.signup');
    }

    public function signUp(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('acc');
    }
    public function showLogin()
    {
        return view('auth.login');
    }

    public function logIn(Request $request)
    {
        $user = User::where('email', $request->email)->first();
         if ($user && Hash::check($request->password, $user->password)) {

        Auth::login($user);

        return redirect()->route('acc');
    }

    return back()->with('error', 'Invalid credentials');

    }
}