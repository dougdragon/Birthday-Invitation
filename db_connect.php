<?php
/* 
 CONNECT-DB.PHP
 Allows PHP to connect to the database
*/

// grab the secrets
require('../../secrets_lol.php');

// connect to db
$link = mysql_connect(MYSQL_DB, MYSQL_USER, MYSQL_PASSWORD);

if (!$link) {
	die('Could not connect: ' . mysql_error());
	}

?>