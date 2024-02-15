<?php

namespace App\Http\Controllers\RandQ;

use App\Http\Controllers\Controller;
use Artisaninweb\SoapWrapper\Facades\SoapWrapper;
use Illuminate\Http\Request;
use QuickBooksOnline\API\XSD2PHP\src\com\mikebevz\xsd2php\SoapServer;

class ServerController extends Controller {
    protected $server;

    public function __construct() {
    }

    public function handleRequest(Request $request) {
        /*$this->soapWrapper->add(function ($service) {
            $service
                ->name('quickbooks_testme') // You can use any name you prefer
                ->wsdl(asset('qbw_connector.wsdl'))
                ->trace(true)
                ->cache(WSDL_CACHE_NONE);
        });*/

        $server = new SoapServer(asset('qbw_connector.wsdl'), array('cache_wsdl' => WSDL_CACHE_NONE));
        //$server->setClass("Qb_Clients");
        $server->handle();

        $soapRequest = $request->getContent();

        return response($soapRequest)->header('Content-Type', 'text/xml');
    }

    private function successResponse()
    {
        // A generic success response
        $responseXml = '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
            <soap:Body>
                <response>Request processed successfully</response>
            </soap:Body>
        </soap:Envelope>
        ';

        return $responseXml;
    }
}
