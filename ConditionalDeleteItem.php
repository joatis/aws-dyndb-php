<?php
require_once "DynDBConnect.php"; // returns $client for DynamoDB
use Aws\DynamoDb\Enum\Type;
use Aws\DynamoDb\Enum\ReturnValue;

/*
 * Deletes an item based on optional parameters and returns the 
 * item & its attributes before being deleted.
 * In this example the product will only be deleted if its
 * InPublication attribute is equal to 0 (false)
 */

$response = $client->deleteItem(array(
	"TableName" => "ProductCatalog",
	"Key" => array(
		"Id" => array(
			Type::NUMBER => 103
		)
	),
	"Expected" => array(
			"InPublication" => array( "Value" => array(Type::NUMBER => "0" ) )
		),
	"ReturnValues" => ReturnValue::ALL_OLD
));


print_r($response);