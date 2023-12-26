<?php

namespace App\Http\Controllers;

use App\Mail\signupEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class registerController extends Controller
{
    public function index()
    {
        return view('register', [
            "title" => "Register"
        ]);
    }

    public function randomPassword()
    {
        $rand = Str::random(20);
        return $rand;
    }

    public function addUser(Request $request)
    {
        $validatedData = $request->validate([
            'fname' => 'required ',
            'lname' => 'required',
            'company' => 'required',
            'email' => 'required|email:cfs,dns|unique:users',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $validatedData['password'] = $this->randomPassword();

        $password = $validatedData['password'];

        User::create($validatedData);

        // // send the password to email
        // $email = $validatedData['email'];

        // Mail::to($validatedData['email']->email)->send(new signupEmail($validatedData['email'], $validatedData['password']));

        return redirect('/login')->with('success', 'Registration Successful. Use this password to login : ' . $password);
    }
}
