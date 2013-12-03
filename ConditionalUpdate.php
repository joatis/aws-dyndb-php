<?php
require_once "DynDBConnect.php"; // returns $client for DynamoDB
use Aws\DynamoDb\Enum\Type;
use Aws\DynamoDb\Enum\KEYType;
use Aws\DynamoDb\Enum\AttributeAction;
use Aws\DynamoDb\Enum\ReturnValue;

/*
 * This call will update price only if the value of the current
 * price is 20.00.
 * The ReturnValue::ALL_NEW specifies that the response should 
 * contain all the new/current values of the item after processing.
 */

/* From the text:
 * Along with the required parameters, you can also specify optional parameters 
 * for the updateItem function including an expected value that an attribute 
 * must have if the update is to occur. 
 * 
 * !!! IMPORTANT !!!
 * If the condition you specify is not met, 
 * then the AWS SDK for PHP throws a ConditionalCheckFailedException. 
 * 
 * For example, 
 * the following PHP code snippet conditionally updates a book item price to 25. 
 * It specifies the following optional parameters:
 * 	An Expected parameter that sets the condition that the price should be 
 *  updated only if the existing price is 20.00.
 *  A RETURN_ALL_NEW enumeration value for the ReturnValues parameter that 
 *  specifies the response should include all of the item's current attribute 
 *  values after the update.
 */

$response = $client->updateItem(array(
	"TableName" => "ProductCatalog",
	"Key" => array(
		"Id" => array(
			Type::NUMBER => 201
		)
	),
	"Expected" => array(
		"Price" => array( "Value" => array(Type::NUMBER => "20.00") )
	),
	"AttributeUpdates" => array(
		"Price" => array(
			"Action" => AttributeAction::PUT,
			"Value" => array(
				Type::NUMBER => "22.00"
			)
		)
	),
	"ReturnValues" => ReturnValue::ALL_NEW
));


print_r($response);