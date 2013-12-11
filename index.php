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
	<li><a href="CRUDItemExample.php">CRUD Item Example</a></li>
	<li><a href="BatchOperations.php">Batch Operations</a></li>
	</ul>
	<h2>Query &amp; Scan</h2>
	<p>There are 2 API calls that can be used on a table to retrieve 
	data, Query and Scan. A Query is more efficient and retrieves the
	items that match a key or a set of keys based on some comparison. 
	A scan reads all the items in a table and filters out the items that
	do not match a filter condition. Use a Query whenever possible.</p>
	
	<p>There is a limit of 1MB per operation so keep this in mind (along 
	with the general size of your items) when making these requests.</p>
	
	<h3>Pagination, LastEvaluatedKey and ExclusiveStartKey</h3>
	<p>When you Query or scan a table the results are divided into 1MB
	chunks. If your result set is &gt; 1MB of data you'll have to spend 
	another operation to get the next 1MB of data. When you request attributes
	that end up as a result set greater than 1MB, <code>ExclusiveStartKey</code> 
	is set to the key of the first result to be returned in the next operation.
	The last returned key value is placed in <code>LastEvaluatedKey.</code> When 
	a result set is exhausted <code>LastEvaluatedKey</code> is set to NULL.
	
	<h3>Count and ScannedCount</h3>
	<p>In a request, setting the <code>Count</code> parameter to true will provide
	the total number of items that matched the scan filter of a query or scan condition 
	instead of a list consisting of the matching items.</p>
	<p>In a response, DynamoDB returns a <code'Count</code> value for the 
	number of matching items in a request. If the result set is greater than 1MB than
	<code>Count</code> is a partial count of the number of items that matched.</p>
	<p>Scan operations also return a <code>ScannedCount</code> value which is the number 
	of items scanned <i>BEFORE</i> any filter was applied.</p>
	
	<h3>Limit</h3>
	<p>In a request the <code>Limit</code> parameter constricts the number of items 
	to process before returning results. For scan requests the limit returns he first x number 
	of items that match a filter request. For query operations it limits the number of matches.
	Keep using <code>LastEvaluatedKey</code> to get the total number of items incase an item is 
	greater than 1MB.</p>
	
	<h2>Parallel Scan</h2>
	<p>Scan operations are sequential and return in 1MB chunks. The larger the table the 
	longer the scan will take to complete. To cut down onthe time a scan can be broken down 
	into <i>Segments</i> and multipe threads or processes and scan each segment in 
	parallel. To create parallel scans each worker is given 2 parameters:
	<dl>
		<dt><code>Segment</code></dt>
		<dd>A segment to be scanned by that worker.</dd>
		<dt><code>TotalSegments</code></dt>
		<dd>The total of segments to be scanned. This must match the 
		number of workers.</dd>
	</dl>
	Segments are zero based. Use Limit to prevent 1 Worker from starving the the workers
	by consuming all the provisioned throughput.</p>
	
	
	
	
	</body>
</html>
