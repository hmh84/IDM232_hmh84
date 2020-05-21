<?php
// Create database connection

// Local
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "cookbook";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Online

// Check the connection is good with no errors
if (mysqli_connect_errno()) {
		die ("Database connection failed: " .
				mysqli_connect_error() .
				" (" . mysqli_connect_errno() . ")"
		);
}
?>