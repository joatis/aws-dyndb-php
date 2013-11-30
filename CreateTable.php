<?php
// Include the SDK using the Composer autoloader
require "vendor/autoload.php";
use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Enum\Type;
use Aws\DynamoDb\Enum\KEYType;

// Instantiate the client with your AWS credentials
$aws = Aws\Common\Aws::factory("./config.php");
$client = $aws->get("dynamodb");

$tableName = "ExampleTable";

#####################################################
# Create a new Amazon DynamoDB table

echo "# Creating table $tableName..." . PHP_EOL;

$result = $client->createTable(array(
	"TableName" => $tableName,
	"AttributeDefinitions" => array(
		array(
			"AttributeName" => "Id",
			"AttributeType" => Type::NUMBER
		)
	),
	"KeySchema" => array(
		array(
			"AttributeName" => "Id",
			"KeyType" => KeyType::HASH
		)
	),
	"ProvisionedThroughput" => array(
		"ReadCapacityUnits" => 5,
		"WriteCapacityUnits" => 6
	)	
));

print_r($result->getPath('Tabledescription'));

$client->waitUntilTableExists(array("TableName" => $tableName));
echo "table $tableName has been created." . PHP_EOL;

