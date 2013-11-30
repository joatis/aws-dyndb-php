<?php
// Include the SDK using the Composer autoloader
require "vendor/autoload.php";

use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Enum\ComparisonOperator;
use Aws\DynamoDb\Enum\Type;

// Instantiate the client with your AWS credentials
$aws = Aws\Common\Aws::factory("./config.php");
$client = $aws->get("dynamodb");

$fourteenDaysAgo = date("Y-m-d H:i:s", strtotime("-14 days"));

$response = $client->query(array(
		"TableName" => "Reply",
		"KeyConditions" => array(
				"Id" => array(
						"ComparisonOperator" => ComparisonOperator::EQ,
						"AttributeValueList" => array(
								array(Type::STRING => "Amazon DynamoDB#DynamoDB Thread 2")
						)
				),
				"ReplyDateTime" => array(
						"ComparisonOperator" => ComparisonOperator::GE,
						"AttributeValueList" => array(
								array(Type::STRING => $fourteenDaysAgo)
						)
				)
		)
));

print_r ($response['Items']);

?>
