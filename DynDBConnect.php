<?php
// Include the SDK using the Composer autoloader
require "vendor/autoload.php";
use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Enum\Type;
use Aws\DynamoDb\Enum\KEYType;

// Instantiate the client with your AWS credentials
$aws = Aws\Common\Aws::factory("./config.php");
$client = $aws->get("dynamodb");