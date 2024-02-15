<?php

namespace App\Http\Controllers\Soap;

class Server
{
    public function __construct() {
    }

    public function getDate() {
        return date('Y-m-d');
    }
}
