<?php
session_start();

// Make sure we're in the right directory
if (!file_exists("init.php")) 
{
	$old_path = getcwd();
	chdir("./php/");
}

// Include our files
include_once "mysql_connect.php";
include_once "counter.php";
include_once "pictures.php";
include_once "videos.php";

// Reset the directory
if ($old_path != null)
	chdir($old_path);
	
	
	
// Create some helper functions
function is_logged_in()
{
	return isset($_SESSION["user_id"]);
}

function get_user_name($user_id)
{
	// Validate the input
	if (!isset($user_id) or
	    $user_id == null)
		return false;
	
	// Get the user name
	$query = mysql_query("SELECT user_name FROM user WHERE id='$user_id'");
	if (mysql_num_rows($query) <= 0)
		return null;
	else
		return mysql_fetch_array($query)["user_name"];
}

function is_logged_in_as_admin()
{
	// Check that someone's logged in
	if (!is_logged_in())
		return false;
	
	// Check the admin table
	$user_id = $_SESSION["user_id"];
	$query = mysql_query("SELECT id FROM admin WHERE user_id='$user_id'");
	if (mysql_num_rows($query) <= 0)
		return false;
	else
		return true;
}

?>