<?php

namespace App\Http\Controllers\QB;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GetConversionAmount;
use App\Http\Controllers\GetConversionAmountResponse;
use Artisaninweb\SoapWrapper\Facades\SoapWrapper;
use Illuminate\Http\Request;

class SoapController extends Controller {
    /**
     * @var SoapWrapper
     */
    protected $soapWrapper;

    /**
     * SoapController constructor.
     *
     * @param SoapWrapper $soapWrapper
     */
    public function __construct(SoapWrapper $soapWrapper)
    {
        $this->soapWrapper = $soapWrapper;
    }

    public function handleRequest(Request $request) {
        $this->soapWrapper->add(function ($service) {
            $service
                ->name('quickbooks_testme') // You can use any name you prefer
                ->wsdl(asset('qbwebconnectorsvc.wsdl'))
                ->trace(true);
        });

        $soapRequest = $request->getContent();
        $responseXml = $this->processQuickBooksRequest($soapRequest);

        return response($responseXml)->header('Content-Type', 'text/xml');
    }


    private function processQuickBooksRequest($requestXml)
    {
        // Add your logic to process QuickBooks requests here
        // You can use the $requestXml to extract information

        // Example: Adding a customer
        /*
        if (strpos($requestXml, '<CustomerAddRq>') !== false) {
            $responseXml = $this->addCustomer();
            return $responseXml;
        }
        */


        $this->addCustomer();

        // For other requests, return a generic success response
        return $this->successResponse();
    }
    private function addCustomer()
    {
        // Your logic to add a customer in QuickBooks goes here
        // You need to construct a QBXML request for adding a customer

        // Example QBXML for adding a customer
        $qbxml ='
        <?qbxml version="2.0"?>
		<QBXML>
			<QBXMLMsgsRq onError="stopOnError">
				<CustomerAddRq requestID="' . '1' . '">
					<CustomerAdd>
						<Name>Test -4  (' . mt_rand() . ')</Name>
						<CompanyName>Test -4 </CompanyName>
						<FirstName>Keith</FirstName>
						<LastName>Palmer</LastName>
						<BillAddress>
							<Addr1>ConsoliBYTE, LLC</Addr1>
							<Addr2>134 Stonemill Road</Addr2>
							<City>Mansfield</City>
							<State>CT</State>
							<PostalCode>06268</PostalCode>
							<Country>United States</Country>
						</BillAddress>
						<Phone>860-634-1602</Phone>
						<AltPhone>860-429-0021</AltPhone>
						<Fax>860-429-5183</Fax>
						<Email>Keith@ConsoliBYTE.com</Email>
						<Contact>Keith Palmer</Contact>
					</CustomerAdd>
				</CustomerAddRq>
			</QBXMLMsgsRq>
		</QBXML>
        ';

        // Simulate a response (replace this with actual QuickBooks interaction)
        $responseXml = '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
            <soap:Body>
                <response>$qbxml</response>
            </soap:Body>
        </soap:Envelope>
        ';

        return $responseXml;
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


    /**
     * Use the SoapWrapper
     */
    public function show()
    {
        $this->soapWrapper->add('Currency', function ($service) {
            $service
                ->wsdl('http://currencyconverter.kowabunga.net/converter.asmx?WSDL')
                ->trace(true)
                ->classmap([
                    GetConversionAmount::class,
                    GetConversionAmountResponse::class,
                ]);
        });

        // Without classmap
        $response = $this->soapWrapper->call('Currency.GetConversionAmount', [
            'CurrencyFrom' => 'USD',
            'CurrencyTo'   => 'EUR',
            'RateDate'     => '2014-06-05',
            'Amount'       => '1000',
        ]);

        var_dump($response);

        // With classmap
        $response = $this->soapWrapper->call('Currency.GetConversionAmount', [
            new GetConversionAmount('USD', 'EUR', '2014-06-05', '1000')
        ]);

        var_dump($response);
        exit;
    }
}
