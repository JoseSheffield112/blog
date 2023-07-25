<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }

    public function store(){
        // authorise
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        // login
        if(auth()->attempt($attributes)){
            return redirect('/')->with('success', 'Welcome back!');
        }
        // redirect
        throw ValidationException::withMessages([
            'email' => 'This email couldn\'t be verified'
        ]);
    }

    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success', 'Successfully logged out');
    }
}
