<?php
include 'SwaggerClient-php/autoload.php';

$apiClient = new \Swagger\Client\ApiClient();

// set API host, default: 'https://api.liqu.id/v1'
$apiClient->getConfig()->setHost('https://api.liquid.jcamp.net/v1');
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
		$queryParams['limit'] = 2;
		$queryParams['tld'] = 'com';
		list($response, $header) = $apiClient->callApi(
			'/domains',
			'GET',
			$queryParams,
			array(),
			array()
		);
		echo json_encode($response);
	} catch (Swagger\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// check availability of a domain name
	echo '<b>Check availability of a domain name menggunakan fungsi callApi() :</b><br><br>';
	try {
		$queryParams['domain'] = 'example.com';
		list($response, $header) = $apiClient->callApi(
			'/domains/availability',
			'GET',
			$queryParams,
			array(),
			array()
		);
		echo json_encode($response);
	} catch (Swagger\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// create a new customer
	echo '<b>Create a new customer menggunakan fungsi callApi() :</b><br><br>';
	try {
		$formParams['email']          = 'arya+1510@jogjacamp.co.id';
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
			'/customers',
			'POST',
			array(),
			$formParams,
			array()
		);
		echo json_encode($response_create);
	} catch (Swagger\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// add fund to a customer
	echo '<b>Add fund to a customer menggunakan fungsi callApi() :</b><br><br>';
	try {
		$customer_id = 18;
		$formParams['amount'] = $apiClient->getSerializer()->toFormValue(1);
		$formParams['description'] = $apiClient->getSerializer()->toFormValue('test add fund');
		list($response, $header) = $apiClient->callApi(
			'/customers/'.$customer_id.'/transactions/fund',
			'POST',
			array(),
			$formParams,
			array()
		);
		echo json_encode($response);
	} catch (Swagger\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// retrieve account's balance
	echo '<b>Retrieve accounts balance menggunakan fungsi callApi() :</b><br><br>';
	try {
		list($response, $header) = $apiClient->callApi(
			'/account/balance',
			'GET',
			array(),
			array(),
			array()
		);
		echo json_encode($response);
	} catch (Swagger\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// update a customer
	echo '<b>Update a customer menggunakan fungsi callApi() :</b><br><br>';
	try {
		$customer_id = 18;
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
			'/customers/'.$customer_id,
			'PUT',
			array(),
			$formParams,
			array()
		);
		echo json_encode($response);
	} catch (Swagger\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// delete a customer
	echo '<b>Delete a customer menggunakan fungsi callApi() :</b><br><br>';
	try {
		$customer_id = $response_create->customer_id;
		list($response, $header) = $apiClient->callApi(
			'/customers/'.$customer_id,
			'DELETE',
			array(),
			array(),
			array()
		);
		echo json_encode($response);
	} catch (Swagger\Client\ApiException $e) {
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
		$reseller = new \Swagger\Client\Api\ResellersApi($apiClient);
		list($response_create, $header) = $reseller->createReseller(
			'arya+105@jogjacamp.co.id',
			'Arya Prast',
			'Reseller12',
			'Arya JCamp',
			'Pajangan',
			'Bantul',
			'Yogyakarta',
			'ID',
			'55321',
			62,
			8579321465,
			'USD'
		);
		echo json_encode($response_create);
	} catch (Swagger\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// retrieve all reseller
	echo '<b>Retrieve all reseller menggunakan fungsi contact di ResellersApi() :</b><br><br>';
	try{
		$reseller = new \Swagger\Client\Api\ResellersApi($apiClient);
		list($response, $httpHeader) = $reseller->listResellers_(2);
		echo json_encode($response);
	} catch (Swagger\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// retrieve a customer
	echo '<b>Retrieve a customer menggunakan fungsi contact di CustomersApi() :</b><br><br>';
	try{
		$customer = new \Swagger\Client\Api\CustomersApi($apiClient);
		list($response, $httpHeader) = $customer->contact(18);
		echo json_encode($response);
	} catch (Swagger\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// retrieve domains
	echo '<b>Retrieve domains menggunakan fungsi retrieve di DomainsApi() :</b><br><br>';
	try{
		$domains = new \Swagger\Client\Api\DomainsApi($apiClient);
		list($response, $httpHeader) = $domains->retrieve(2);
		echo json_encode($response);
	} catch (Swagger\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// check availability of a domain name
	echo '<b>Check availability of a domain name menggunakan fungsi availability di DomainsApi() :</b><br><br>';
	try{
		$domains = new \Swagger\Client\Api\DomainsApi($apiClient);
		list($response, $httpHeader) = $domains->availability('example.com');
		echo json_encode($response);
	} catch (Swagger\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// retrieve account's balance
	echo '<b>Retrieve account`s balance menggunakan fungsi retrieveAccountsBalance di AccountApi() :</b><br><br>';
	try {
		$account = new \Swagger\Client\Api\AccountApi($apiClient);
		list($response, $header) = $account->retrieveAccountsBalance();
		echo json_encode($response);
	} catch (Swagger\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// add fund to a reseller
	echo '<b>Add fund to a reseller menggunakan fungsi addFundReseller di BillingApi() :</b><br><br>';
	try {
		$billing = new \Swagger\Client\Api\BillingApi($apiClient);
		list($response, $header) = $billing->addFundReseller(113, 1, 'test add fund');
		echo json_encode($response);
	} catch (Swagger\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// Update a reseller
	echo '<b>Update a reseller using ResellersApi() :</b><br><br>';
	try {
		$reseller = new \Swagger\Client\Api\ResellersApi($apiClient);
		list($response, $header) = $reseller->updateReseller(
			113, 
			'arya+15@jogjacamp.co.id', 
			'Arya Prast',
			'Arya JCamp',
			'Pajangan',
			'Bantul',
			'Yogyakarta',
			'ID',
			'55321',
			62,
			8579321465,
			'USD'
		);
		echo json_encode($response);
	} catch (Swagger\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// delete a reseller
	echo '<b>Delete a reseller menggunakan fungsi delete_ di ResellersApi() :</b><br><br>';
	try {
		$reseller_id = $response_create->reseller_id;
		$reseller = new \Swagger\Client\Api\ResellersApi($apiClient);
		list($response, $header) = $reseller->delete_($reseller_id);
		echo json_encode($response);
	} catch (Swagger\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';
