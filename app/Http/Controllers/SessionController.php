<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create', []);
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'failed' => 'Your provided credentials could not be verified!.'
            ]);
        }

        session()->regenerate();

        return redirect(route('home'))->with('message',  sprintf('Welcome back - %s', auth()->user()->name));
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->route('home')->with('message', 'Logged out');
    }
}
