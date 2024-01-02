<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class settingController extends Controller
{
    public function index()
    {
        return view('mall.setting', [
            "title" => "Setting"
        ]);
    }

    public function edit(Request $request)
    {
        // get the users information
        $user = Auth::user();

        if ($request->has('editField')) {
            User::where('id', $user['id'])->update([
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'company' => $request->input('company'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address')
            ]);
            return redirect('/setting')->with('successChangeProfile', 'Profile updated');
        }

        elseif ($request->has('changePassword')) {
            $request->validate([
                'current' => 'required',
                'new' => 'required|min:8',
                'confirmnew' => 'required|same:new'
            ]);

            // check if the current password equals to our db
            if (!(Hash::check($request->current, $user->password))) {
                return redirect()->back()->with('currentpwError', 'Incorrect current password!');
            }

            // if the current password equals to our db
            $user['password'] = Hash::make($request->input('confirmnew'));
            User::where('id', $user['id'])
                ->update(['password' => $user['password']]);
            return redirect('/setting')->with('successChange', 'Change password success!');
        }
    }
}
