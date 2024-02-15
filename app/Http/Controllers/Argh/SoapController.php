<?php

namespace App\Http\Controllers\Argh;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Laminas\Soap\AutoDiscover as WsdlAutoDiscover;
use Laminas\Soap\Server as SoapServer;

class SoapController extends Controller{
    /**
     * @throws BindingResolutionException
     */
    public function wsdlAction(Request $request) {
        if (!$request->isMethod('get')) {
            //return $this->prepareClientErrorResponse('GET');
            return response()->json('yo yoyo');
        }

        //$wsdl = new WsdlAutoDiscover();
        $wsdl = asset('qbwebconnectorsvc.wsdl');

        $wsdl->setUri(route('soap-server'))
            ->setServiceName('MySoapService');


        $this->populateServer($wsdl);


        //return response()->make($wsdl->toXml())
        return response($wsdl)
            ->header('Content-Type', 'application/xml');
    }

    /**
     * @throws BindingResolutionException
     */
    public function serverAction(Request $request) {
        if (!$request->isMethod('post')) {
            return $this->prepareClientErrorResponse('POST');
        }

        $server = new SoapServer(
            route('soap-wsdl'),
            [
                'actor' => route('soap-server'),
            ]
        );

        $server->setReturnResponse(true);
        $this->populateServer($server);
        $soapResponse = $server->handle();

        return response()->make($soapResponse)->header('Content-Type', 'application/xml');
    }

    /**
     * @throws BindingResolutionException
     */
    private function prepareClientErrorResponse($allowed) {
        return response()->make('Method not allowed', 405)->header('Allow', $allowed);

    }

    private function populateServer($server): void
    {
        // Expose a class and its methods:
        $server->setClass(ResponseController::class);

        // Expose an object instance and its methods:
        // $server->setObject($this->env);

        // Expose a function:
        // $server->addFunction('Acme\Model\ping');
    }
}
