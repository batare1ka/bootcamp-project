<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view("sessions.create");
    }

    public function store()
    {
        $fields = request()->validate([
            "email" => "required|exists:users,email",
            "password" => "required"
        ]);
        if (!auth()->attempt($fields)) {

            throw ValidationException::withMessages([
                "email" => "Your email or password is incorrect!"
            ]);
        }
        session()->regenerate();
        return redirect("/")->with("succes", "Welcome to CloKids!");
    }

    public function destroy()
    {
        auth()->logout();

        return redirect("/")->with("succes", "Goodbye!");
    }
}
