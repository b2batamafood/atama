<?php

namespace App\Http\Controllers\QB;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Qb_Clients;
use Illuminate\Http\Request;

class QuickbookTestingController extends Controller {
    public function sendRequest(Request $request) {
        $qbClients = new QbClients();

        // Assuming QB_TICKET is defined somewhere
        $ticket = QB_TICKET;

        // Validate the ticket
        if ($request->input('ticket') == $ticket) {
            // Process the sendRequestXML logic
            $response = $qbClients->sendRequestXML($request->all());

            return response($response, 200);
        }

        return response("Invalid ticket.", 401);
    }

    public function receiveRequest(Request $request){
        $qbClients = new QbClients();

        // Assuming QB_TICKET is defined somewhere
        $ticket = QB_TICKET;

        // Validate the ticket
        if ($request->input('ticket') == $ticket) {
            // Process the receiveResponseXML logic
            $response = $qbClients->receiveResponseXML($request->all());

            return response($response, 200);
        }

        return response("Invalid ticket.", 401);
    }
}
