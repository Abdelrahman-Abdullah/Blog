<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    // Magic method __invoke because the controller does one thing
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => ['required' , 'email']]);

        try {
            $newsletter->subscribe(request('email'));
        }catch (Exception $exception){
            throw ValidationException::withMessages(
                ['email' => 'This Email Could not be subscribed, Please try another one']
            );
        }
        return redirect('/')->with('success' , 'You Subscribed Successfully');

    }
}
