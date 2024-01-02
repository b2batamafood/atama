<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\Controller;

class dashboardproductsController extends Controller
{
    public function index(){
        return view(
            'mall.dashboard.products',
            [
                "title" => "Dashboard Products"
            ]
        );
    }

    public function uploadFile(){

    }
}
