<?php
include 'LiquidClient-php/autoload.php';

$apiClient = new \Liquid\Client\ApiClient();

// set API host, default: 'https://api.liqu.id/v1'
$apiClient->getConfig()->setHost('https://api.liqu.id/v1');
// $apiClient->getConfig()->setHost('https://api.domainsas.com/v1');

// set Reseller ID
$apiClient->getConfig()->setUsername('1');

// set Reseller API Key
$apiClient->getConfig()->setPassword('123');

// set to true to debug script
$apiClient->getConfig()->setDebug(false);

	// retrieve all domains
	echo '<b>Retrieve all domains menggunakan fungsi callApi() :</b><br><br>';
	try {
		$resourcePath   = '/domains';
		$method         = 'GET';
		$formParams     = array();
		$headerParams   = array();

		$queryParams['limit'] = 2;
		$queryParams['tld']   = 'com';

		list($response, $header) = $apiClient->callApi(
		    $resourcePath,
		    $method,
		    $queryParams,
		    $formParams,
		    $headerParams
		);
		echo json_encode($response);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// create a new customer
	echo '<b>Create a new customer menggunakan fungsi callApi() :</b><br><br>';
	try {
		$resourcePath   = '/customers';
		$method         = 'POST';
		$queryParams    = array();
		$headerParams   = array();

		$formParams['email']          = 'arya+1555@jogjacamp.co.id';
		$formParams['name']           = 'Arya Prast';
		$formParams['password']       = 'Customer12';
		$formParams['company']        = 'Arya JCamp';
		$formParams['address_line_1'] = 'Pajangan';
		$formParams['city']           = 'Bantul';
		$formParams['state']          = 'Yogyakarta';
		$formParams['country_code']   = 'ID';
		$formParams['zipcode']        = '55321';
		$formParams['tel_cc_no']      = 62;
		$formParams['tel_no']         = 857321654;

		list($response_create, $header) = $apiClient->callApi(
		    $resourcePath,
		    $method,
		    $queryParams,
		    $formParams,
		    $headerParams
		);
		echo json_encode($response_create);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// check availability of a domain name
	echo '<b>Check availability of a domain name menggunakan fungsi callApi() :</b><br><br>';
	try {
		$resourcePath   = '/domains/availability';
		$method         = 'GET';
		$formParams     = array();
		$headerParams   = array();

		$queryParams['domain'] = 'example.com';

		list($response, $header) = $apiClient->callApi(
		    $resourcePath,
		    $method,
		    $queryParams,
		    $formParams,
		    $headerParams
		);
		echo json_encode($response);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// add fund to a customer
	echo '<b>Add fund to a customer menggunakan fungsi callApi() :</b><br><br>';
	try {
		$customer_id    = 18;
		$resourcePath   = '/customers/'.$customer_id.'/transactions/fund';
		$method         = 'POST';
		$queryParams    = array();
		$headerParams   = array();

		$formParams['amount']      = 1;
		$formParams['description'] = 'test add fund';

		list($response, $header) = $apiClient->callApi(
		    $resourcePath,
		    $method,
		    $queryParams,
		    $formParams,
		    $headerParams
		);
		echo json_encode($response);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// retrieve account's balance
	echo '<b>Retrieve accounts balance menggunakan fungsi callApi() :</b><br><br>';
	try {
		$resourcePath   = '/account/balance';
		$method         = 'GET';
		$queryParams    = array();
		$headerParams   = array();
		$formParams     = array();

		list($response, $header) = $apiClient->callApi(
		    $resourcePath,
		    $method,
		    $queryParams,
		    $formParams,
		    $headerParams
		);
		echo json_encode($response);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// update a customer
	echo '<b>Update a customer menggunakan fungsi callApi() :</b><br><br>';
	try {
		$customer_id    = 18;

		$resourcePath   = '/customers/'.$customer_id;
		$method         = 'PUT';
		$queryParams    = array();
		$headerParams   = array();

		$formParams['email']          = 'arya+321@jogjacamp.co.id';
		$formParams['name']           = 'Arya Prast';
		$formParams['company']        = 'Arya JCamp';
		$formParams['address_line_1'] = 'Pajangan';
		$formParams['city']           = 'Bantul';
		$formParams['state']          = 'Yogyakarta';
		$formParams['country_code']   = 'ID';
		$formParams['zipcode']        = '55321';
		$formParams['tel_cc_no']      = 62;
		$formParams['tel_no']         = 857321654;

		list($response, $header) = $apiClient->callApi(
		    $resourcePath,
		    $method,
		    $queryParams,
		    $formParams,
		    $headerParams
		);
		echo json_encode($response);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// delete a customer
	echo '<b>Delete a customer menggunakan fungsi callApi() :</b><br><br>';
	try {
		$customer_id = $response_create->customer_id; //32;

		$resourcePath   = '/customers/'.$customer_id;
		$method         = 'DELETE';
		$queryParams    = array();
		$headerParams   = array();
		$formParams     = array();

		list($response, $header) = $apiClient->callApi(
		    $resourcePath,
		    $method,
		    $queryParams,
		    $formParams,
		    $headerParams
		);
		echo json_encode($response);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	echo '<b>===============================================================</b>';
	echo '<br><br>';

	// create a new reseller
	echo '<b>Create a new reseller using ResellersApi() :</b><br><br>';
	try {
		$reseller = new \Liquid\Client\Api\ResellersApi($apiClient);

		$email 				= 'arya+105@jogjacamp.co.id';
		$name 				= 'Arya Prast';
		$password 			= 'Reseller12';
		$company 			= 'Arya JCamp';
		$address_line_1 	= 'Pajangan';
		$city 				= 'Bantul';
		$state 				= 'Yogyakarta';
		$country_code 		= 'ID';
		$zipcode 			= '55321';
		$tel_cc_no 			= 62;
		$tel_no 			= 8579321465;
		$selling_currency 	= 'USD';
		$address_line_2 	= null;
		$address_line_3 	= null;
		$alt_tel_cc_no 		= null;
		$alt_tel_no 		= null;
		$mobile_cc_no 		= null;
		$mobile_no 			= null;
		$fax_cc_no 			= null;
		$fax_no 			= null;

		list($response_create, $header) = $reseller->createReseller(
			$email,
			$name,
			$password,
			$company,
			$address_line_1,
			$city,
			$state,
			$country_code,
			$zipcode,
			$tel_cc_no,
			$tel_no,
			$selling_currency,
			$address_line_2,
			$address_line_3,
			$alt_tel_cc_no,
			$alt_tel_no,
			$mobile_cc_no,
			$mobile_no,
			$fax_cc_no,
			$fax_no
		);
		echo json_encode($response_create);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// retrieve all reseller
	echo '<b>Retrieve all reseller menggunakan fungsi contact di ResellersApi() :</b><br><br>';
	try{
		$reseller = new \Liquid\Client\Api\ResellersApi($apiClient);

		$limit 					= 2;
		$page_no 				= null;
		$reseller_id 			= null;
		$email 					= null;
		$name 					= null;
		$company 				= null;
		$city 					= null;
		$state 					= null;
		$country_code 			= null;
		$status 				= null;
		$creation_date_start 	= null;
		$creation_date_end 		= null;
		$total_receipts_start 	= null;
		$total_receipts_end 	= null;

		list($response, $httpHeader) = $reseller->listResellers_(
			$limit,
			$page_no,
			$reseller_id,
			$email,
			$name,
			$company,
			$city,
			$state,
			$country_code,
			$status,
			$creation_date_start,
			$creation_date_end,
			$total_receipts_start,
			$total_receipts_end
		);
		echo json_encode($response);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// retrieve a customer
	echo '<b>Retrieve a customer menggunakan fungsi contact di CustomersApi() :</b><br><br>';
	try{
		$customer = new \Liquid\Client\Api\CustomersApi($apiClient);

		$customer_id = 18;

		list($response, $httpHeader) = $customer->contact(
			$customer_id
		);
		echo json_encode($response);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// retrieve domains
	echo '<b>Retrieve domains menggunakan fungsi retrieve di DomainsApi() :</b><br><br>';
	try{
		$domains = new \Liquid\Client\Api\DomainsApi($apiClient);
		
		$limit               = 2;
		$page_no             = null;
		$domain_id           = null;
		$reseller_id         = null;
		$customer_id         = null;
		$show_child_orders   = null;
		$tld                 = null;
		$status              = null;
		$domain_name         = null;
		$privacy_protection_enabled = null;
		$creation_time_start = null;
		$creation_time_end   = null;
		$expiry_date_start   = null;
		$expiry_date_end     = null;
		$reseller_email      = null;
		$customer_email      = null;
		$exact_domain_name   = null;

		list($response, $httpHeader) = $domains->retrieve(
		    $limit, 
		    $page_no, 
		    $domain_id, 
		    $reseller_id, 
		    $customer_id, 
		    $show_child_orders, 
		    $tld, 
		    $status, 
		    $domain_name, 
		    $privacy_protection_enabled, 
		    $creation_time_start, 
		    $creation_time_end, 
		    $expiry_date_start, 
		    $expiry_date_end, 
		    $reseller_email, 
		    $customer_email, 
		    $exact_domain_name
		);
		echo json_encode($response);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// check availability of a domain name
	echo '<b>Check availability of a domain name menggunakan fungsi availability di DomainsApi() :</b><br><br>';
	try{
		$domains = new \Liquid\Client\Api\DomainsApi($apiClient);

		$domain = 'example.com';

		list($response, $httpHeader) = $domains->availability(
			$domain
		);
		echo json_encode($response);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// retrieve account's balance
	echo '<b>Retrieve account`s balance menggunakan fungsi retrieveAccountsBalance di AccountApi() :</b><br><br>';
	try {
		$account = new \Liquid\Client\Api\AccountApi($apiClient);

		list($response, $header) = $account->retrieveAccountsBalance();
		echo json_encode($response);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// add fund to a reseller
	echo '<b>Add fund to a reseller menggunakan fungsi addFundReseller di BillingApi() :</b><br><br>';
	try {
		
		$billing = new \Liquid\Client\Api\BillingApi($apiClient);

		$reseller_id    = 113;
		$amount         = 150;
		$description    = 'add fund from API';

		list($response, $header) = $billing->addFundReseller(
		    $reseller_id,
		    $amount,
		    $description
		);
		echo json_encode($response);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// Update a reseller
	echo '<b>Update a reseller using ResellersApi() :</b><br><br>';
	try {
		$reseller = new \Liquid\Client\Api\ResellersApi($apiClient);

		$reseller_id    = 113;
		$email          = 'arya+15@jogjacamp.co.id';
		$name           = 'Arya Prast';
		$company        = 'Arya JCamp';
		$address_line_1 = 'Pajangan';
		$city           = 'Bantul';
		$state          = 'Yogyakarta';
		$country_code   = 'ID';
		$zipcode        = '55321';
		$tel_cc_no      = 62;
		$tel_no         = 8579321465;
		$selling_currency  = 'USD';
		$address_line_2 = null;
		$address_line_3 = null;
		$alt_tel_cc_no  = null;
		$alt_tel_no     = null;
		$mobile_cc_no   = null;
		$mobile_no      = null;
		$fax_cc_no      = null;
		$fax_no         = null;

		list($response, $header) = $reseller->updateReseller(
		    $reseller_id,
		    $email,
		    $name,
		    $company,
		    $address_line_1,
		    $city,
		    $state,
		    $country_code,
		    $zipcode,
		    $tel_cc_no,
		    $tel_no,
		    $selling_currency,
		    $address_line_2,
		    $address_line_3,
		    $alt_tel_cc_no,
		    $alt_tel_no,
		    $mobile_cc_no,
		    $mobile_no,
		    $fax_cc_no,
		    $fax_no
		);
		echo json_encode($response);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// delete a reseller
	echo '<b>Delete a reseller menggunakan fungsi delete_ di ResellersApi() :</b><br><br>';
	try {
		$reseller = new \Liquid\Client\Api\ResellersApi($apiClient);

		$reseller_id = $response_create->reseller_id;

		list($response, $header) = $reseller->delete_(
			$reseller_id
		);
		echo json_encode($response);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';
