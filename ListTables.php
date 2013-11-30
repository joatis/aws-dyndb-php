<?php
// Include the SDK using the Composer autoloader
require "vendor/autoload.php";
use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Enum\Type;
use Aws\DynamoDb\Enum\KEYType;

// Instantiate the client with your AWS credentials
$aws = Aws\Common\Aws::factory("./config.php");
$client = $aws->get("dynamodb");


$tables = array();

// Walk through table names two at a time

do {
	$response = $client->listTables(array(
		'Limit' => 2,
		'ExclusiveStartTableName' => isset($response) ? $response['LastEvaluatedTableName'] : null
	));
	
	foreach ($response['TableNames'] as $key => $value) {
		echo "$value" . PHP_EOL;
	}
	
	$tables = array_merge($tables, $response['TableNames']);
	
}

while ($response['LastEvaluatedTableName']);

// Print total number of tables

echo "Total number of tables: ";
print_r(count($tables));
echo PHP_EOL;




