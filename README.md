aws-dyndb-php
=============

Getting stated w/ DynamoDB with aws-php-sdk

These are the files created while I learned how to access AWS DynamoDB
using the aws-php-sdk.

It assumes that the aws-php-sdk has been installed using Composer to
handle dependencies.

You will have to supply your own Access key and Secret Key to the config.php 
file.

DynDBConnect.php is an include file I wrote so I wouldn't have to re-key the 
connection information for every exercise.

AWS recommends using DynamoDB for handling sessions since one can't count on 
EC2 instances persisting. As a managed NO-SQL database solution it is very attractive, 
however be mindful of the objects (items) you store within it. When you create a 
DynamoDB instance you must provision the read and write capacity you think you'll need.

Read/write capacity is measured in units of 4KB. Reading a 6KB items counts as 2 read units.
You are also not able to read an attribute of an item without spending read capacity for the 
whole item. 

DynamoDB is more machine-gun than silver bullet. Deploy it wisely.

