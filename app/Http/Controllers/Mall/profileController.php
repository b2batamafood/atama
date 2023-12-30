<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\Controller;

class profileController extends Controller
{
    public function index()
    {
        return view('mall.profile', [
            "title" => "Profile"
        ]);
    }
}
