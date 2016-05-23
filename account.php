<?php
include 'LiquidClient-php/autoload.php';

echo '<h2>Example Account API :</h2><hr><br>';

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

	echo '<br><hr><b>Using AccountApi() :</b><hr><br>';
	$account = new \Liquid\Client\Api\AccountApi($apiClient);

	// retrieve account's balance
	echo '<b>retrieve account`s balance :</b><br><br>';
	list($response, $httpHeader) = $account->retrieveAccountsBalance();
	echo json_encode($response);
	echo '<br><br>';

	// list all prices applied for current account
	echo '<b>list all prices applied for current account :</b><br><br>';
	list($response, $httpHeader) = $account->listAllPricesAccount();
	echo json_encode($response);
	echo '<br><br>';

	// list all account's transactions
	echo '<b>list all account`s transactions :</b><br><br>';
	list($response, $httpHeader) = $account->listAccountsTransactions(2, '', 'deposit');
	echo json_encode($response);
	echo '<br><br>';

	// retrieve an account's transactions
	echo '<b>retrieve an account`s transactions :</b><br><br>';
	list($response, $httpHeader) = $account->retrieveAccountTransactions(26154);
	echo json_encode($response);
	echo '<br><br>';

} catch (Liquid\Client\ApiException $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
    echo '<br>HTTP response headers: ', $e->getResponseHeaders(), "\n";
    echo '<br>HTTP response body: ', $e->getResponseBody(), "\n";
    echo '<br>HTTP status code: ', $e->getCode(), "\n";
}
