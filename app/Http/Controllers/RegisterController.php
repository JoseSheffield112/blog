<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
           'name' => ['required', 'max:255'],
           'username' => ['required', 'max:255'],
           'password' => ['required', 'min:8', 'max:255', Rule::unique('users', 'username')],
           'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has successfully been created!');
    }
}
