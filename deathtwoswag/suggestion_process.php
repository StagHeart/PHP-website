<?php
include_once "mysql_connect.php";

$title       = $_POST['title'];
$title       = mysql_real_escape_string($title);
$description = $_POST['description'];
$description = mysql_real_escape_string($description);

if ($queryreg = mysql_query("INSERT INTO suggestion VALUES ('','$title','$description')"))
	die("Your suggestion has been submitted! <a href='index.php'>Return to Home page</a>");
else
	echo "Error msg: \n";
	echo mysql_error() . "\n";
	die("An error occurred. Suggestion not received. <a href='index.php'>Return to Home page</a>");
?>