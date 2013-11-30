<?php
require_once "DynDBConnect.php"; // returns $client for DynamoDB
use Aws\DynamoDb\Enum\Type;
use Aws\DynamoDb\Enum\KEYType;

$response = $client->getItem(array(
	"TableName" => "ProductCatalog",
	"Key" => array(
		"Id" => array( Type::NUMBER	=> 104 )
	)
));

print_r($response['Item']);



