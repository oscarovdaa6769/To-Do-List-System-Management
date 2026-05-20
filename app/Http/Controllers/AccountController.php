<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index(){
        return view('account.index', ['user' => Auth::user()]);
    }

    public function updateProfile(Request $request)
        {
            $user = Auth::user();

            if (!$user) {
                return redirect('/login');
            }

            $user->update($request->only(['name', 'email']));

            return redirect()->route('account.index')->with('status', 'profile-updated');
        }

    public function updatePassword(Request $request)
        {
            $user = Auth::user();
            if (!$user) { return redirect('/login'); }

            $user->update([
                'password' => Hash::make($request->input('password'))
            ]);

            return redirect()->route('account.index')->with('status', 'password-updated');
        }
}
