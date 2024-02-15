<?php

namespace App\Http\Controllers\Soap;

use App\Http\Controllers\Controller;
use SoapServer;

class SoapServerController extends Controller {



    public function index() {
        //$params = array( 'uri' => url('/soap/server') );
        $params = array('cache_wsdl' => WSDL_CACHE_NONE);
        $server = new SoapServer( asset('qbwebconnectorsvc.wsdl'), $params );
        $server->setClass( Server::class );
        $server->handle();
    }
}
