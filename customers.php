<?php
include 'LiquidClient-php/autoload.php';

echo '<h2>Example Customer API :</h2><hr><br>';

$apiClient = new \Liquid\Client\ApiClient();

// set API host, default: 'https://api.liqu.id/v1'
$apiClient->getConfig()->setHost('https://api.liqu.id/v1');
// $apiClient->getConfig()->setHost('http://api.domainsas.com/v1');

// set Reseller ID
$apiClient->getConfig()->setUsername('1');

// set Reseller API Key
$apiClient->getConfig()->setPassword('123');

// set to true to debug script
$apiClient->getConfig()->setDebug(false);

try {
	// create a new customer
	// echo '<b>Create a new customer :</b><br><br>';
	// $formParams['email'] = 'arya+'.rand(0,5).'@jogjacamp.co.id';
	// list($response, $header) = $apiClient->callApi(
	// 	'/customers',
	// 	'POST',
	// 	array(),
	// 	$formParams,
	// 	array()
	// );
	// echo json_encode($response);
	// echo '<br><br>';

	// add fund to a customer
	// echo '<b>Add fund to a customer :</b><br><br>';
	// $customer_id = 18;
	// $formParams['amount'] = $apiClient->getSerializer()->toFormValue(1);
	// $formParams['description'] = $apiClient->getSerializer()->toFormValue('test add fund');
	// list($response, $header) = $apiClient->callApi(
	// 	'/customers/'.$customer_id.'/transactions/fund',
	// 	'POST',
	// 	array(),
	// 	$formParams,
	// 	array()
	// );
	// echo json_encode($response);
	// echo '<br><br>';

	// retrieve account's balance
	echo '<b>Retrieve accounts balance :</b><br><br>';
	list($response, $header) = $apiClient->callApi(
		'/account/balance',
		'GET',
		array(),
		array(),
		array()
	);
	echo json_encode($response);
	echo '<br><br>';

	echo '<br><hr><b>Using CustomersApi() :</b><hr><br>';
	$customer = new \Liquid\Client\Api\CustomersApi($apiClient);

	// retrieve all customer
	echo '<b>Retrieve all customer :</b><br><br>';
	list($response, $httpHeader) = $customer->allCustomer(2);
	echo json_encode($response);
	echo '<br><br>';

	// create a new customer
	echo '<b>Create a new customer :</b><br><br>';
	// list($response, $header) = $customer->createCustomer(
	// 	'arya+'.rand(0,5).'@jogjacamp.co.id', 
	// 	'Arya Prast '.rand(0,5), 
	// 	'Customer12', 
	// 	'Arya Jogjacamp '.rand(0,5), 
	// 	'Umbulharjo, Yogyakarta', 
	// 	'Yogyakarta', 
	// 	'Yogyakarta', 
	// 	'ID',
	// 	'56321',
	// 	62,
	// 	321654987
	// );
	// echo json_encode($response);
	echo '<br><br>';

	// list all prices settings for customers
	echo '<b>list all prices settings for customers :</b><br><br>';
	list($response, $httpHeader) = $customer->customerPrices();
	echo json_encode($response);
	echo '<br><br>';

	// Generates a temporary password for the specified Customer
	echo '<b>Generates a temporary password for the specified Customer :</b><br><br>';
	list($response, $httpHeader) = $customer->generatesATemporaryPassword(18);
	echo json_encode($response);
	echo '<br><br>';

	// retrieve a customer
	echo '<b>Retrieve a customer :</b><br><br>';
	list($response, $httpHeader) = $customer->contact(18);
	echo json_encode($response);
	echo '<br><br>';

	// update a customer
	echo '<b>update a customer :</b><br><br>';
	list($response, $header) = $customer->updateCustomer(
		19,
		'arya+'.rand(0,5).'@jogjacamp.co.id', 
		'Arya Prast '.rand(0,5), 
		'Arya Jogjacamp '.rand(0,5), 
		'Umbulharjo, Yogyakarta', 
		'Yogyakarta', 
		'Yogyakarta', 
		'ID',
		'56321',
		62,
		321654987
	);
	echo json_encode($response);
	echo '<br><br>';

	// delete a customer
	echo '<b>delete a customer :</b><br><br>';
	try {
		list($response, $httpHeader) = $customer->deleteCustomer(17);
		echo json_encode($response);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// retrieve a customer's default ns
	echo '<b>retrieve a customer`s default ns :</b><br><br>';
	list($response, $httpHeader) = $customer->nsCustomer(18);
	echo json_encode($response);
	echo '<br><br>';

} catch (Liquid\Client\ApiException $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
    echo '<br>HTTP status code: ', $e->getCode(), "\n";
}
