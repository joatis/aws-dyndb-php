<?php

  // Include the SDK using the Composer autoloader
require "vendor/autoload.php";

use Aws\DynamoDb\DynamoDbClient;
use Aws\Common\Enum\Region;
use Aws\DynamoDb\Enum\Type;

// Instantiate the client with your AWS credentials
$aws = Aws\Common\Aws::factory("./config.php");
$client = $aws->get("dynamodb");

# Setup some local variables for dates

$oneDayAgo = date("Y-m-d H:i:s", strtotime("-1 days"));
$sevenDaysAgo = date("Y-m-d H:i:s", strtotime("-7 days"));
$fourteenDaysAgo = date("Y-m-d H:i:s", strtotime("-14 days"));
$twentyOneDaysAgo = date("Y-m-d H:i:s", strtotime("-21 days"));

$tableName = "ProductCatalog";
echo "Adding data to the $tableName table...";

$response = $client->batchWriteItem(array(
    "RequestItems" => array(
        $tableName => array(
            array(
                "PutRequest" => array(
                    "Item" => array(
                        "Id"              => array(Type::NUMBER => 1101),
                        "Title"           => array(Type::STRING => "Book 101 Title"),
                        "ISBN"            => array(Type::STRING => "111-1111111111"),
                        "Authors"         => array(Type::STRING_SET => array("Author1")),
                        "Price"           => array(Type::NUMBER => 2),
                        "Dimensions"      => array(Type::STRING => "8.5 x 11.0 x 0.5"),        
                        "PageCount"       => array(Type::NUMBER => 500),        
                        "InPublication"   => array(Type::NUMBER => 1),        
                        "ProductCategory" => array(Type::STRING => "Book")
                    )
                ),
            ),
            array(
                "PutRequest" => array(
                    "Item" => array(
                        "Id"              => array(Type::NUMBER => 102),
                        "Title"           => array(Type::STRING => "Book 102 Title"),
                        "ISBN"            => array(Type::STRING => "222-2222222222"), 
                        "Authors"         => array(Type::STRING_SET => array("Author1", "Author2")),
                        "Price"           => array(Type::NUMBER => 20), 
                        "Dimensions"      => array(Type::STRING => "8.5 x 11.0 x 0.8"), 
                        "PageCount"       => array(Type::NUMBER => 600), 
                        "InPublication"   => array(Type::NUMBER => 1), 
                        "ProductCategory" => array(Type::STRING => "Book")                    
                    )
                ),
            ),
            array(
                "PutRequest" => array(
                    "Item" => array(
                        "Id"              => array(Type::NUMBER => 103), 
                        "Title"           => array(Type::STRING => "Book 103 Title"), 
                        "ISBN"            => array(Type::STRING => "333-3333333333"), 
                        "Authors"         => array(Type::STRING_SET => array("Author1", "Author2")),
                        "Price"           => array(Type::NUMBER => 2000), 
                        "Dimensions"      => array(Type::STRING => "8.5 x 11.0 x 1.5"), 
                        "PageCount"       => array(Type::NUMBER => 600), 
                        "InPublication"   => array(Type::NUMBER => 0), 
                        "ProductCategory" => array(Type::STRING => "Book")                  
                    )
                ),
            ),
            array(
                "PutRequest" => array(
                    "Item" => array(
                        "Id"              => array(Type::NUMBER => 201), 
                        "Title"           => array(Type::STRING => "18-Bike-201"), 
                        "Description"     => array(Type::STRING => "201 Description"), 
                        "BicycleType"     => array(Type::STRING => "Road"), 
                        "Brand"           => array(Type::STRING => "Mountain A"), 
                        "Price"           => array(Type::NUMBER => 100), 
                        "Gender"          => array(Type::STRING => "M"), 
                        "Color"           => array(Type::STRING_SET => array("Red", "Black")), 
                        "ProductCategory" => array(Type::STRING => "Bicycle")            
                    )
                ),
            ),
            array(
                "PutRequest" => array(
                    "Item" => array(
                        "Id"              => array(Type::NUMBER => 202), 
                        "Title"           => array(Type::STRING => "21-Bike-202"), 
                        "Description"     => array(Type::STRING => "202 Description"), 
                        "BicycleType"     => array(Type::STRING => "Road"), 
                        "Brand"           => array(Type::STRING => "Brand-Company A"), 
                        "Price"           => array(Type::NUMBER => 200), 
                        "Gender"          => array(Type::STRING => "M"), 
                        "Color"           => array(Type::STRING_SET => array("Green", "Black")),
                        "ProductCategory" => array(Type::STRING => "Bicycle")
                    )
                ),
            ),
            array(
                "PutRequest" => array(
                    "Item" => array(
                        "Id"              => array(Type::NUMBER => 203),  
                        "Title"           => array(Type::STRING => "19-Bike-203"), 
                        "Description"     => array(Type::STRING => "203 Description"), 
                        "BicycleType"     => array(Type::STRING => "Road"), 
                        "Brand"           => array(Type::STRING => "Brand-Company B"), 
                        "Price"           => array(Type::NUMBER => 300), 
                        "Gender"          => array(Type::STRING => "W"), 
                        "Color"           => array(Type::STRING_SET => array("Red", "Green", "Black")), 
                        "ProductCategory" => array(Type::STRING => "Bicycle")                    
                    )
                ),
            ),
            array(
                "PutRequest" => array(
                    "Item" => array(
                        "Id"              => array(Type::NUMBER => 204),  
                        "Title"           => array(Type::STRING => "18-Bike-204"), 
                        "Description"     => array(Type::STRING => "204 Description"), 
                        "BicycleType"     => array(Type::STRING => "Mountain"), 
                        "Brand"           => array(Type::STRING => "Brand-Company B"), 
                        "Price"           => array(Type::NUMBER => 400), 
                        "Gender"          => array(Type::STRING => "W"), 
                        "Color"           => array(Type::STRING_SET => array("Red")), 
                        "ProductCategory" => array(Type::STRING => "Bicycle")
                    )
                ),
            ),
            array(
                "PutRequest" => array(
                    "Item" => array(
                        "Id"              => array(Type::NUMBER => 205), 
                        "Title"           => array(Type::STRING => "20-Bike-205"),
                        "Description"     => array(Type::STRING => "205 Description"),
                        "BicycleType"     => array(Type::STRING => "Hybrid"),
                        "Brand"           => array(Type::STRING => "Brand-Company C"),
                        "Price"           => array(Type::NUMBER => 500),
                        "Gender"          => array(Type::STRING => "B"),
                        "Color"           => array(Type::STRING_SET => array("Red", "Black")),
                        "ProductCategory" => array(Type::STRING => "Bicycle")            
                    )
                )
            )
        ),
    ),
));

echo "done." . PHP_EOL;



$tableName = "Forum";
echo "Adding data to the $tableName table...";

$response = $client->batchWriteItem(array(
    "RequestItems" => array(
        $tableName => array(
            array(
                "PutRequest" => array(
                    "Item" => array(
                        "Name"     => array(Type::STRING => "Amazon DynamoDB"),
                        "Category" => array(Type::STRING => "Amazon Web Services"),
                        "Threads"  => array(Type::NUMBER => 0),
                        "Messages" => array(Type::NUMBER => 0),
                        "Views"    => array(Type::NUMBER => 1000)
                    )
                )
            ),
            array(
                "PutRequest" => array(
                    "Item" => array(
                        "Name"     => array(Type::STRING => "Amazon S3"),
                        "Category" => array(Type::STRING => "Amazon Web Services"),
                        "Threads"  => array(Type::NUMBER => 0)
                    )
                )
            ),
        )
    )
));

echo "done." . PHP_EOL;


$tableName = "Reply";
echo "Adding data to the $tableName table...";

$response = $client->batchWriteItem(array(
    "RequestItems" => array(
        $tableName => array(
            array(
                "PutRequest" => array(
                    "Item" => array(
                        "Id"            => array(Type::STRING => "Amazon DynamoDB#DynamoDB Thread 1"),
                        "ReplyDateTime" => array(Type::STRING => $fourteenDaysAgo), 
                        "Message"       => array(Type::STRING => "DynamoDB Thread 1 Reply 2 text"),
                        "PostedBy"      => array(Type::STRING => "User B")
                    )
                )
            ),
            array(
                "PutRequest" => array(
                    "Item" => array(
                        "Id"            => array(Type::STRING => "Amazon DynamoDB#DynamoDB Thread 2"), 
                        "ReplyDateTime" => array(Type::STRING => $twentyOneDaysAgo), 
                        "Message"       => array(Type::STRING => "DynamoDB Thread 2 Reply 3 text"),
                        "PostedBy"      => array(Type::STRING => "User B")
                    )
                )
            ),
            array(
                "PutRequest" => array(
                    "Item" => array(
                        "Id"            => array(Type::STRING => "Amazon DynamoDB#DynamoDB Thread 2"),
                        "ReplyDateTime" => array(Type::STRING => $sevenDaysAgo),
                        "Message"       => array(Type::STRING => "DynamoDB Thread 2 Reply 2 text"),
                        "PostedBy"      => array(Type::STRING => "User A")
                    )
                )
            ),
            array(
                "PutRequest" => array(
                    "Item" => array(
                        "Id"            => array(Type::STRING => "Amazon DynamoDB#DynamoDB Thread 2"),
                        "ReplyDateTime" => array(Type::STRING => $oneDayAgo), 
                        "Message"       => array(Type::STRING => "DynamoDB Thread 2 Reply 1 text"),
                        "PostedBy"      => array(Type::STRING => "User A")
                    )
                )
            )
        ),
    )
  ));

echo "done." . PHP_EOL;

?>
