<!DOCTYPE html>
<html>
	<head>
	<title>Getting Started with DynamoDB Using the aws-php-sdk</title>
	</head>
	<body>
	<h1>DynamoDB - PHP</h1>
	<p>This is a record of my work as I used the aws-php-sdk to interact with 
	DynamoDB. The exercises were followed from: <a href="http://docs.aws.amazon.com/amazondynamodb/latest/developerguide/GettingStartedDynamoDB.html">http://docs.aws.amazon.com/amazondynamodb/latest/developerguide/GettingStartedDynamoDB.html</a> 
	between 11-2013 to 12-2013.  Development environment was Eclipse (Kepler) on Windows 8.1</p>
	<h2>Working with Tables</h2>
	<ul>
		<li><a href="UploadData.php">Upload Data</a></li>
		<li><a href="Query14Days.php">Query for thread in the past 14 days</a></li>
		<li><a href="CreateTable.php">Create Table ExampleTable</a></li>
		<li><a href="UpdateTable.php">Update Table ExampleTable (Read/Write Capacity)</a></li>
		<li><a href="DeleteTable.php">Delete Table ExampleTable</a></li>
		<li><a href="ListTables.php">List Tables w/ Pagination</a></li>
	</ul>
	<h2>Working with Items</h2>
	<ul>
	<li><a href="PutItem.php">Put an item</a></li>
	<li><a href="GetItem.php">Get an item</a></li>
	<li><a href="GetItemWithOpts.php">Get an item with optional parameters:</a>
		<ul>
			<li>AttributesToGet:</li>
				<ul>
					<li>Id</li>
					<li>Authors</li>
				</ul>
			<li>ConsistentRead</li>
		</ul>
	</li>
	<li><a href="BatchWrite.php">Batch Write</a></li>
	<li><a href="BatchGet.php">Batch Get</a></li>
	<li><a href="BatchGetWithOpts.php">Batch Get with optional parameters:</a>
		<ul>
			<li>AttributesToGet:</li>
				<ul>
					<li>Threads</li>
				</ul>
		</ul>
	</li>
	<li><a href="UpdateItem.php">Update Item</a></li>
	<li><a href="ConditionalUpdate.php">Conditional Update (Specifying Optional Parameters)</a>
		<ul>
			<li>A ConditionalCheckFailedException is thrown if the condition is not met.</li>
		</ul>
	</li>
	<li><a href="DeleteItem.php">Delete Item</a></li>
	<li><a href="ConditionalDeleteItem.php">Delete Item (Specifying Optional Parameters)</a></li>
		<ul>
			<li>Deletes an item if its specified attribute has a particular value</li>
		</ul>
	</ul>
	</body>
</html>
