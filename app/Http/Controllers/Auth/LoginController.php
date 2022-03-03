<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $login = !auth()->attempt($request->only('email', 'password'), $request->remember);

        if($login){
            return back()->with('status', 'Invalid login details');
        }
        
        return redirect()->route('dashboard');
    }
}
