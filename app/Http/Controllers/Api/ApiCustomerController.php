<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use QuickBooksOnline\API\DataService\DataService;

class ApiCustomerController extends Controller {
    private $config;
    public function __construct() {
        $this->config = config('quickbook');
    }

    public function index(): View {
        $dataService = DataService::Configure([
            'auth_mode' => 'oauth2',
            'ClientID' => $this->config['client_id'],
            'ClientSecret' => $this->config['client_secret'],
            'accessTokenKey' => $this->config['access_token'],
            'refreshTokenKey' => $this->config['refresh_token'],
            'QBORealmID' => $this->config['realm_id'],
            'baseUrl' => $this->config['base_url'],
        ]);

        $query = 'Select * from Customer startposition 1';
        $data = $dataService->Query($query);

        return view('admin.customers.index', [
            'users' => $data
        ]);
    }
}
