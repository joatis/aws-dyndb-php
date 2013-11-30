<?php
require_once "DynDBConnect.php"; // returns $client for DynamoDB
use Aws\DynamoDb\Enum\Type;
use Aws\DynamoDb\Enum\KEYType;

$response = $client->putItem(array(
	"TableName" => "ProductCatalog",
	"Item" => array(
		"Id"	=> array( Type::NUMBER	=> 104 ), //Primary Key
		"Title" => array( Type::STRING => "Book 104 Title" ),
		"ISBN"  => array( Type::STRING => "111-1111111111" ),
		"Price" => array( Type::NUMBER => 25 ),
		"Authors" => array( Type::STRING_SET => array("Author1", "Author2") )
			)
));

print_r($response);



