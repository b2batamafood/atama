<?php

namespace App\Http\Controllers\Soap;

use App\Http\Controllers\Controller;

class SoapClientController extends Controller {
    public function index() {
        $client = new Client;
        $client->getDate();
    }
}
