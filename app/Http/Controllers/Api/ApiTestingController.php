<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use QuickBooksOnline\API\DataService\DataService;

class ApiTestingController extends Controller {

    private $config, $OAuth2LoginHelper = '';

    public function __construct() {
        $this->config = config('quickbook');
    }

    public function auth(){
        $dataService = DataService::Configure(array(
            'auth_mode' => 'oauth2',
            'ClientID' => $this->config['client_id'],
            'ClientSecret' => $this->config['client_secret'],
            'RedirectURI' => $this->config['redirect_uri'],
            'scope' => $this->config['scopes'],
            'baseUrl' => $this->config['base_url'],
        ));

        $this->OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
        $authorizationCodeUrl = $this->OAuth2LoginHelper->getAuthorizationCodeURL();

        // TODO: Auth form outside of the sdk
        return redirect()->away($authorizationCodeUrl);
    }

    public function callback(Request $request) {
        //$accessToken = $this->OAuth2LoginHelper->exchangeAuthorizationCodeForToken($request->auth, $this->config['realm_id']);
        return response()->json($request);
    }

    public function getData(){

        // Directly use OAuth Token
        $dataService = DataService::Configure([
            'auth_mode' => 'oauth2',
            'ClientID' => $this->config['client_id'],
            'ClientSecret' => $this->config['client_secret'],
            'accessTokenKey' => $this->config['access_token'],
            'refreshTokenKey' => $this->config['refresh_token'],
            'QBORealmID' => $this->config['realm_id'],
            'baseUrl' => $this->config['base_url'],
        ]);

        $query = 'Select * from Customer startposition 1 maxresults 5';
        $data = $dataService->Query($query);

        return response()->json($data);
    }
}
