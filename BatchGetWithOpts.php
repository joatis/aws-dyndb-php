<?php
require_once "DynDBConnect.php"; // returns $client for DynamoDB
use Aws\DynamoDb\Enum\Type;
use Aws\DynamoDb\Enum\KEYType;

/*
 * batchGetItem allows you to return multiple items from one
 * or more tables. It you just need one item from a table use
 * getItem instead.
 */



/*
 * The following request will fetch the "Threads" attribute froom the 
 * "Forum" table with items that have matching kkeys. 
 */

$response = $client->batchGetItem(array(
	"RequestItems" => array(
		"Forum" => array( 
			"Keys" => array(
				array( // Key #1
					"Name" => array(Type::STRING => "Amazon S3" )
				),
				array( // Key #2
					"Name" => array( Type::STRING => "Amazon DynamoDB" )
				)
			),
			"AttributesToGet" => array("Threads")
		),
	)
));

print_r($response[Responses]);






