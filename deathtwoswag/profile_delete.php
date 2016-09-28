<?php
include_once "php/init.php";

// Make sure this a user is logged in
if (!is_logged_in()) {
	header("Location: 404.php");
	die();
}

// Make sure a url user name is available
if (!isset($_GET["user_name"])) 
{
	header("Location: 404.php");
	die();
}

// Make sure the user name is valid
$user_name = $_GET["user_name"];
$query = mysql_query("SELECT * FROM user WHERE user_name='$user_name'");
if (mysql_num_rows($query) <= 0)
{
	header("Location: 404.php");
	die();
}

// Make sure it's this user that's logged in, OR it's an admin
$user_id = mysql_fetch_array($query)["id"];
if ($user_id != $_SESSION["user_id"] &&
    !is_logged_in_as_admin())
{
	header("Location: 404.php");
	die();
}

// Logout the user
if ($user_id == $_SESSION["user_id"])
{
	session_destroy();
	session_start();
}
	
// Delete the user's votes
mysql_query("DELETE FROM vote WHERE user_id='$user_id'");

// Delete the user
mysql_query("DELETE FROM user WHERE id='$user_id'");

// LEAVE any posts or polls created by them

?>

<html lang="en">
<head>
	<title>GameName - Deleted Profile</title>
	<link rel="stylesheet" href="css/styles.css" />
	<script src="js/mobile_menu.js"></script>
	<script src="js/footer_fix.js"></script>
	<meta charset="utf-8" />
</head>
<body>
	<!-- INSERT THE HEADER -->
	<?php
	$active_nav = "";
	include_once "php/header.php";
	?>
	
	
	<!-- THE CONTENT -->
	<main>
		<h1>Profile deleted.</h1>
		<a href="home.php">Go back to home</a>
	</main>
	
	
	<!-- INSERT THE FOOTER -->
	<?php
	include_once "php/footer.php";
	?>
</body>
</html>