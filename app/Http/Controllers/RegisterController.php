<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function create(){
        return view ('register.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required|max:255',
            'email'=> 'required|unique:users|email:dns',
            'username'=> 'required|unique:users',
            'password'=> 'required|min:5|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration successfull! Please Login' );
    }
}
