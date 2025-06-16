<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller

{
    function auth_register(Request $request)
    {
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name' => $fname . ' ' . $lname,
            'email' => $email,
            'password' => $password,
        ]);

        return redirect('/')
            ->with('success', 'User registered successfully!');


    }
}
