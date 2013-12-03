<?php
require_once "DynDBConnect.php"; // returns $client for DynamoDB
use Aws\DynamoDb\Enum\Type;

/*
 * Simply delete an item from a table using the primary key
 */

$response = $client->deleteItem(array(
	"TableName" => "ProductCatalog",
	"Key" => array(
		"Id" => array(
			Type::NUMBER => 101
		)
	)
));


print_r($response);