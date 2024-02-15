<?php

namespace App\Http\Controllers\RandQ;

use App\Http\Controllers\Soap\Response;

Trait Qb {
    var $response = '';

    public function __construct() {
        $this->response = new Response();
    }

    public function clientVersion($param = '') {
        $this->response->clientVersionResult = "";
        return $this->response;
    }

    public function serverVersion() {
        $this->response->serverVersionResult = "";
        return $this->response;
    }

    public function authenticate($param = '') {
        if(($param->strUserName == QB_LOGIN) && ($param->strPassword == QB_PASSWORD))
            $this->response->authenticateResult = array(QB_TICKET, "");
        else
            $this->response->authenticateResult = array("", "nvu");

        return $this->response;
    }

    public function connectionError($param = '') {
        $this->response->connectionErrorResult = "connectionError";
        return $this->response;
    }

    public function getLastError($param = '') {
        $this->response->getLastErrorResult = "getLastError";
        return $this->response;
    }

    public function closeConnection($param = '') {
        $this->response->closeConnectionResult = "Complete";
        return $this->response;
    }
}
