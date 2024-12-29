<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $atempt = Auth::attempt($attributes);

       
        if( ! $atempt){
            return back()->withErrors([
                'all' => 'The provided credentials dont match'
            ])->onlyInput('email');
        }

        $request->session()->regenerate();
        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
