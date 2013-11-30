<?php
require_once "DynDBConnect.php"; // returns $client for DynamoDB
use Aws\DynamoDb\Enum\Type;
use Aws\DynamoDb\Enum\KEYType;

/*
 * From the 'Working with Items' Guide:
 * Note that the key:value pair specified in the 
 * array parameter to the batchWriteItem uses syntax 
 * required by the underlying Amazon DynamoDB API. 
 * For more information, see BatchWriteItem.
 */
$tableNameOne = "Forum";
$tablenameTwo = "Thread";

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
		$tablenameTwo => array(
			array(
				"PutRequest" => array(
						"Item" => array(
							"ForumName" => array(Type::STRING => "Amazon S3 Forum"),
							"Subject" => array(Type::STRING => "My sample question"),
							"Message" => array(Type::STRING => "Message Text."),
							"KeywordTags" => array(Type::STRING_SET => array("Amazon S3", "Bucket"))
						))
			),
			array(
					"DeleteRequest" => array(
						"Key" => array(
								"ForumName" =>array(Type::STRING => "Some hash value"),
								"Subject" => array(Type::STRING => "Some range key")
						))
			),
		),
	)
));





