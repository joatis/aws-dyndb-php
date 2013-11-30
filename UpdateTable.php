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

$result = $client->updateTable(array(
	"TableName" => $tableName,
	"ProvisionedThroughput" => array(
		"ReadCapacityUnits" => 6,
		"WriteCapacityUnits" => 7
	)	
));

$client->waitUntilTableExists(array("TableName" => $tableName));
echo "New provisioned throughput settings:." . PHP_EOL;

echo "Read capacity units:" . $response['Table']['ProvisionedThroughput']['ReadCapacityUnits'] . PHP_EOL;
echo "Write capacity units:" . $response['Table']['ProvisionedThroughput']['WriteCapacityUnits'] . PHP_EOL;




