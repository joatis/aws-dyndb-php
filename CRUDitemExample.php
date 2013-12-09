<?php

// Include the SDK using the Composer autoloader
require "vendor/autoload.php";

use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Enum\Type;
use Aws\DynamoDb\Enum\AttributeAction;
use Aws\DynamoDb\Enum\ReturnValue;

// Instantiate the client with your credentials
$aws = Aws\Common\Aws::factory("./config.php");
$client = $aws->get("dynamodb");

$tableName = "ProductCatalog";

###########################################################
# Adding data to the table

echo PHP_EOL . PHP_EOL;

echo "# Adding data to thr table $tableName..." . PHP_EOL;

$response = $client->putItem(array(
	"TableName" => $tableName,
	"Item" => $client->formatAttributes(array(
		"Id" => 120,
		"Title" => "Book 120 Title",
		"ISBN" => "120-1111111111",
		"Authors" => array("Author12", "Author22"),
		"Price" => 20,
		"Category" => "Book",
		"Dimensions" => "8.5x11.0x.75",
		"InPublication" => 1,
		)
	),
	"ReturnConsumedCapacity" => 'TOTAL'
));

echo "Consumed capacity: " . $response["ConsumedCapacity"]["CapacityUnits"] . PHP_EOL;

$response = $client->putItem(array(
	"TableName" => $tableName,
	"Item" => $client->formatAttributes(array(
		"Id" => 121,
		"Title" => "Book 121 Title",
		"ISBN" => "121-1111111111",
		"Authors" => array("Authors21", "Author22"),
		"Price" => 20,
		"Category" => "Book",
		"Dimensions" => "8.5x11.0x.75",
		"Inpublication" => 1,
		)
	),
	"ReturnConsumedCapacity" => 'TOTAL'
));

echo "Consumed capacity: " . $response["ConsumedCapacity"]["CapacityUnits"] . PHP_EOL;

####################################################################
# Getting an item from the table

echo PHP_EOL . PHP_EOL;
echo "# Getting an item from table $tableName..." . PHP_EOL;

$response = $client->getItem(array(
	"TableName" => $tableName,
	"ConsistentRead" => true,
	"Key"=> array(
		"Id" => array(Type::NUMBER => 120)
	),
	"AttributeToGet" => array("Id", "ISBN", "Title", "Authors")
));
print_r($response["Item"]);


##################################################################
# Updating item attributes (add new attribute, add new values to existing set)

echo PHP_EOL . PHP_EOL;
echo "# Updating an item and returning the whole new item in table $tableName...";

$response = $client->updateItem(array(
	"TableName" => $tableName,
	"Key" => array(
		"Id" => array(Type::NUMBER => 121)
	),
	"Attributeupdates" => array(
		"NewAttribute" => array(
			"Value" => array(Type::STRING => "Some Value")
		),
		"Authors" => array(
			"Action" => AttributeAction::ADD,
			"Value"	 => array(Type::STRING_SET => array("Author YY", "Author ZZ"))
		)
	),
	"ReturnValues" => ReturnValue::ALL_NEW
));
print_r($response["Attributes"]);

###################################################################
# Conditionally updating the Price attribute, only if it has not changed.

echo PHP_EOL . PHP_EOL;
echo "# Updating an item attribute only if it has not changed in table $tableName..." . PHP_EOL;

$response = $client->updateItem(array(
	"TableName" => $tableName,
	"Key" => array(
		"Id" => array(Type::NUMBER => 121)			
	),
	"AttributeUpdates" => array(
		"Price" => array(
			"Value" => array(Type::NUMBER => 20)
		)
	),
	"Expected" => array(
			"Price" => array(
				"Value" => array(Type::NUMBER => 20)
			)
	),
	"ReturnValues" => ReturnValue::ALL_NEW
));
print_r($response["Attributes"]);


##################################################################
# Deleting an item 

echo PHP_EOL . PHP_EOL;
echo "# Deleting an item and returning its previous values from in table $tableName..." . PHP_EOL;

$response = $client->deleteItem(array(
	"TableName" => $tableName,
	"Key" => array(
		"Id" => array(Type::NUMBER => 121)
	),
	"ReturnValues" => ReturnValue::ALL_OLD
));
print_r($response["Attributes"]);

?>




