<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => ['required','email']]);
        try{
            $newsletter->subscribe(request('email')); // creating newletter class and calling the subscibe function
        }catch(Exception $e){
            return redirect('/#newsletter')->withInput()->withErrors(['email'=>'Enter a valid email!']);
        }
        return redirect('/')->with(['success'=>'Your email is now subscribed for newsletter!']);
    }
}
