<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // validate the request
        $attributes = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // attempt to authenticate and log in the user
        // based on the provided credentials

        if (!auth()->attempt($attributes)) {
            // return back()
            //     ->withInput()
            //     ->withErrors(['email' => 'The provided credentials could not be verified']);

            throw ValidationException::withMessages([
                'email' => 'The provided credentials could not be verified'
            ]);
        }

        // session fixation
        session()->regenerate();

        // redirect with a success flash message
        redirect('/posts')->with('suceess', 'Welcome Back!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/posts')->with('success', 'Log out ! GoodBye. ');
    }
}
