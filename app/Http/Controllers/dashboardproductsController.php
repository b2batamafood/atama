<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardproductsController extends Controller
{
    public function index(){
        return view(
            'dashboard/products',
            [
                "title" => "Dashboard Products"
            ]
        );
    }

    public function uploadFile(){

    }
}
