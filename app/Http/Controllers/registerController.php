<?php

namespace App\Http\Controllers;

use App\Mail\signupEmail;
use App\Models\User;
use App\Notifications\UserRegistrationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
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
        // dd($request->all());
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'company' => 'required',
            'email' => 'required|email:dns|unique:users',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'tax_id' => 'required',
            'document' => 'required|file|mimes:zip'
        ]);

        // dd($validatedData);

        $validatedData['password'] = $this->randomPassword();
        $password = $validatedData['password'];

        User::create($validatedData);

        Notification::route('mail', $validatedData['email'])
            ->notify(new UserRegistrationNotification($password));

        return redirect('/login')->with('success', 'Registration Success. Check your email for the password');
    }

    // public function mailTest () {
    //     $validatedData['password'] = $this->randomPassword();

    //     $password = $validatedData['password'];

    //     Notification::route('mail', 'vickyfarenza@gmail.com')
    //         ->notify(new UserRegistrationNotification($password));
    // }
}
