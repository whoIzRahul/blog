<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    //Function to return the login page
    public function create(){
        return view('sessions.login');
    }

    //function to accept login request and validate
    public function store(){
        // The attributes store the credentials that are sent when user tries to log in.
        //Basic validation
        $attributes = request()->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);
        //Checking the data with the database datas using auth->attempt
        if(!auth()->attempt($attributes)){
            //Codes that runs if the validation failed
            return back()
            ->withInput()
            ->withErrors(['email'=>'Could not verify the email']);
            
            //Optional return method
            // throw ValidationException::withMessages(['email'=>'The email could not be verified']);
        }

        
        return redirect('/')->with(['success'=>'Log in successfull!']);
    }

    //function to logout
    public function destroy(){
        auth()->logout();
        return redirect('/')->with(['success'=>'Logged out successfully!']);
    }
}
