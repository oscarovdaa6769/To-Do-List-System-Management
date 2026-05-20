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

        return redirect()->route('dashboard');
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

        return redirect()->route('dashboard');
    }

    return back()->with('error', 'Invalid credentials');

    }
    // public function update(Request $request)
    // {
    //     $user = Auth::user();

    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'nullable|min:6|same:password_confirmation',
    //     ]);

    //     $user->name = $request->name;
    //     $user->email = $request->email;

    //     // ONLY UPDATE PASSWORD IF USER TYPES ONE
    //     if ($request->password) {
    //         $user->password = Hash::make($request->password);
    //     }

    //     $user->save();

    //     return back()->with('success', 'Account updated successfully');
    // }
}
