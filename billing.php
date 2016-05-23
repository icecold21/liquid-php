<?php
include 'LiquidClient-php/autoload.php';

echo '<h2>Example Billing API :</h2><hr><br>';

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
	// echo '<b>Retrieve accounts balance :</b><br><br>';
	// list($response, $header) = $apiClient->callApi(
	// 	'/account/balance',
	// 	'GET',
	// 	array(),
	// 	array(),
	// 	array()
	// );
	// echo json_encode($response);
	// echo '<br><br>';

	echo '<br><hr><b>Using BillingApi() :</b><hr><br>';
	$billing = new \Liquid\Client\Api\BillingApi($apiClient);

	// retrieve a customer's balance
	echo '<b>retrieve a customer`s balance :</b><br><br>';
	list($response, $httpHeader) = $billing->customerBalance(18);
	echo json_encode($response);
	echo '<br><br>';

	// list all transactions of a customer
	echo '<b>list all transactions of a customer :</b><br><br>';
	list($response, $httpHeader) = $billing->allCustomerTransaction(18, 2, '', 'deposit');
	echo json_encode($response);
	echo '<br><br>';

	// cancel a customer's pending invoice
	echo '<b>cancel a customer`s pending invoice :</b><br><br>';
	try {
		list($response, $httpHeader) = $billing->cancelCustomerInvoice(18, 26171);
		echo json_encode($response);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// add debit note to a customer
	echo '<b>add debit note to a customer :</b><br><br>';
	list($response, $httpHeader) = $billing->addDebitCustomer(18, 1, 'debit note');
	echo json_encode($response);
	echo '<br><br>';

	// execute a customer's pending Orderonly
	echo '<b>execute a customer`s pending Orderonly :</b><br><br>';
	try {
		list($response, $httpHeader) = $billing->executeCustomerInvoice(18, 26171, 1);
		echo json_encode($response);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	echo '<br><br>';

	// add fund to a customer
	echo '<b>add fund to a customer :</b><br><br>';
	list($response, $httpHeader) = $billing->addFundCustomer(18, 10, 'add fund');
	echo json_encode($response);
	echo '<br><br>';

	// pay a customer's transaction keep invoice
	echo '<b>pay a customer`s transaction keep invoice :</b><br><br>';
	try {
		list($response, $httpHeader) = $billing->payCustomerInvoice(18, 26171, 1);
		echo json_encode($response);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	
	echo '<br><br>';

	// pay a customer's transaction add only
	echo '<b>pay a customer`s transaction add only :</b><br><br>';
	try {
		list($response, $httpHeader) = $billing->payAddOnly(18, 26171);
		echo json_encode($response);
	} catch (Liquid\Client\ApiException $e) {
	    echo 'Caught exception: ', $e->getMessage(), "\n";
	    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
	    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
	    echo '<br>HTTP status code: ', $e->getCode(), "\n";
	}
	
	echo '<br><br>';

	// retrieve a customer's transaction
	echo '<b>retrieve a customer`s transaction :</b><br><br>';
	list($response, $httpHeader) = $billing->customerTransaction(18, 26171);
	echo json_encode($response);
	echo '<br><br>';

	// retrieve a sub reseller's balance
	echo '<b>retrieve a sub reseller`s balance :</b><br><br>';
	list($response, $httpHeader) = $billing->resellerBalance(113);
	echo json_encode($response);
	echo '<br><br>';

	// list all transactions of a sub reseller
	echo '<b>list all transactions of a sub reseller :</b><br><br>';
	list($response, $httpHeader) = $billing->allResellerTransaction(113, 2);
	echo json_encode($response);
	echo '<br><br>';

	// add fund to a reseller
	echo '<b>add fund to a reseller :</b><br><br>';
	list($response, $httpHeader) = $billing->addFundReseller(113, 10, 'add fund');
	echo json_encode($response);
	echo '<br><br>';

	// retrieve a reseller's transactions
	echo '<b>retrieve a reseller`s transactions :</b><br><br>';
	list($response, $httpHeader) = $billing->resellerTransaction(113, 26175);
	echo json_encode($response);
	echo '<br><br>';

} catch (Liquid\Client\ApiException $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
    echo '<br>HTTP status code: ', $e->getCode(), "\n";
}
