<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
        $attributes = request()->validate([
            'name' => ['required','max:50','min:5'],
            'username' => ['required','max:15','min:4',Rule::unique('users','username')],
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => ['required','max:20','min:8']
        ]);

        $user = User::create($attributes);

        // Logging the user 
        auth()->login($user);

        //Use this when you dont use mutators
        // User::create(['name' => $attributes['name'], 'username' => $attributes['username'], 'email' => $attributes['email'], 'password' => bcrypt($attributes['password'])]);
        return redirect('/')->with(['success'=>'The user has been successfully registered!']);
    }
}
