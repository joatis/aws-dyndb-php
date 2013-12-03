<?php
require_once "DynDBConnect.php"; // returns $client for DynamoDB
use Aws\DynamoDb\Enum\Type;
use Aws\DynamoDb\Enum\KEYType;

/*
 * batchGetItems allows you to return multiple items from one
 * or more tables. It you just need one item from a table use
 * getItem instead.
 */

/* When I created the tables and loaded data it was on
 * 11/22/2013. The ReplyDateTime was keyed off that date
 * Instead of using these calculated valuesI'm making the 
 * dates literal so they will work on my instance.
 * $sevenDaysAgo = date("Y-m-d H:i:s", strtotime("-7 days"));
 * $twentyOneDaysAgo = date("Y-m-d H:i:s", strtotime("-21 days"));
 */

$sevenDaysAgo = '2013-11-16 06:06:47';
$twentyOneDaysAgo = '2013-11-02 06:06:47';

/*
 * The following request will get an item in the Forum table,
 * and 2 items from the Reply table 

 */

$response = $client->batchGetItem(array(
	"RequestItems" => array(
		"Forum" => array( 
			"Keys" => array(
				array( // Key #2
					"Name" => array(Type::STRING => "Amazon DynamoDB")
				)
			)
		),
		"Reply" => array(
			"Keys" => array(
				array( # Key #1
					"Id" => array(Type::STRING => "Amazon DynamoDB#DynamoDB Thread 2"),
					"ReplyDateTime" => array(Type::STRING => $sevenDaysAgo),
				),
				array( # Key #2
					"Id" => array( Type::STRING => "Amazon DynamoDB#DynamoDB Thread 2"),
					"ReplyDateTime" => array( Type::STRING => $twentyOneDaysAgo),	
				),
			)
		),
	)
));

print_r($response[Responses]);






