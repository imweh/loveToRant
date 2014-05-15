<?php
$dbhost = "localhost";			// Database Host - local
$dbuser = "root";				// User - local
$dbpass = "root";				// Password - local
$dbname = "love_to_rant";	// Name of Database - local

mysql_connect( $dbhost, $dbuser, $dbpass ) or die( mysql_error() );
mysql_select_db( $dbname ) or die( mysql_error() );
?>
