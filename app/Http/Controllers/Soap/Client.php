<?php

namespace App\Http\Controllers\Soap;

use SoapClient;

class Client
{
    protected $instance;

    public function __construct() {
        $params = array( 'uri' => '/soap/server',
            'location' => url('/soap/server'),
            'trace' => 1,
            'soap_version' => SOAP_1_2
        );

        $this->instance = new SoapClient( null, $params );

    }

    public function getDate() {
        return $this->instance->getDate();
    }
}
