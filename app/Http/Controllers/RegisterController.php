<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view("register.create");
    }

    public function store()
    {
       $fields = request()->validate([
            "name" => "required|min:6|max:255",
            "email" => "required|email|min:5|max:255|unique:users,email",
            "password" => "required|min:5"
        ]);

        $user = User::create($fields);

        auth()->login($user);

        session()->flash("succes", "Your account has been created");

        return redirect("/");
    }
}
