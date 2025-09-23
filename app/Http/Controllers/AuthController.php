<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $validated= $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:2',
        ]);
        if (!Auth::attempt($validated)) {
            return redirect('/')
                ->withErrors(['email' => 'Pogrešan email ili lozinka.'])
                ->withInput();
        }
        return redirect()->intended('/home');
    }
    public function showLoginPage() {
        return view('loginpage');
    }
}
