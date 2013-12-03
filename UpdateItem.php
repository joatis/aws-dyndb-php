<?php
require_once "DynDBConnect.php"; // returns $client for DynamoDB
use Aws\DynamoDb\Enum\Type;
use Aws\DynamoDb\Enum\KEYType;
use Aws\DynamoDb\Enum\AttributeAction;

/*
 * Using PUT to update an existing object will overwrite
 * any existing attributes that are getting updated and 
 * will add any attributes that did not exist before.
 * This update adde an Authors attribute to a item
 * that has an existing ProductCategory of "Bicycle"
 */

$response = $client->updateItem(array(
	"TableName" => "ProductCatalog",
		"Key" => array(
			"Id" => array(
				Type::NUMBER => 201
			)
		),
		"AttributeUpdates" => array(
				"Authors" => array(
					"Action" => AttributeAction::PUT,
					"Value" => array(
						Type::STRING_SET => array("Author YY", "Author ZZ")
					)
				),
				// Reduce the price. To add or subtract a value,
				// use ADD with a positive or negative number.
				"Price" => array(
						"Action" => AttributeAction::PUT,
						"Value" => array(
							Type::NUMBER => -1
						)
				),
				"ISBN" => array(
							"Action" => AttributeAction::DELETE
				)
			)
));

print_r($response);