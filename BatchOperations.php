<?php

/* Put an item in the Forum table
 * Put and Delete an item from the Thread table
 */

// Include the SDK using the Composer autoloader
require 'vendor/autoload.php';

use Aws\DynamoDb\DynamoDbClient;
use Aws\Common\Enum\Region;
use Aws\DynamoDb\Enum\Type;

// Instantiate the client with your AWS access keys
$aws = Aws\Common\Aws::factory("./config.php");
$client = $aws->get("dynamodb");

$tableNameOne = "Forum";
$tableNameTwo = "Thread";

$response = $client->batchWriteItem(array(
	"RequestItems" => array(
		$tableNameOne => array(
			array(
				"PutRequest" => array(
					"Item" => array(
						"Name" => array(Type::STRING => "Amazon S3 Forum"),
						"Threads" => array(Type::NUMBER => 0)
					))
			)
		),
		$tableNameTwo => array(
				array(
					"PutRequest" => array(
						"Item" => array(
								"ForumName" => array(Type::STRING => "Amazon S3 Forum"),
								"Subject" => array(Type::STRING => "My Sample question"),
								"Message" => array(Type::STRING => "Message Text."),
								"KeywordTags" => array(Type::STRING_SET => array("Amanazon S3", "Bucket"))						
				))
		),
			array(
				"DeleteRequest" => array(
					"Key" => array(
						"ForumName" =>array(Type::STRING => "Some hash value"),
						"Subject" => array(Type::STRING => "Some range key")
					))
			)
		)
	)
));

?>