<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userAttributes = $request->validate([
            'name' => ['required'],
            'email' => ['email', 'required', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(6)]
        ]);

        $randomNumber = rand(1, 1000); // Adjust the range as needed
        $logoUrl = "https://picsum.photos/200?random=$randomNumber";

        $employerAttributes = $request->validate([
            'employer' => 'required',
        ]);

        $user = User::create($userAttributes);



        $user->employer()->create([
            'name' => $employerAttributes['employer'],
            'logo' => $logoUrl
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
