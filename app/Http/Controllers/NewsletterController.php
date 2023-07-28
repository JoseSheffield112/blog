<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use mysql_xdevapi\Exception;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);


        try{
            $newsletter->subscribe(request('email'));

        } catch(Exception $e){
            throw ValidationException::withMessages([
                'email' => 'This email couldn\'t be added'
            ]);
        }

        return redirect('/')->with('success', 'You have been added to our newsletter!');
    }
}
