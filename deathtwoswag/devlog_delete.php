<?php
include_once "php/init.php";

// Make sure only admins can access this page
if (!is_logged_in_as_admin()) {
	header("Location: 404.php");
	die();
}

// Make sure a url post_id is available
if (!isset($_GET["id"]))
{
	header("Location: 404.php");
	die();
}

// Make sure the post_id is valid
$post_id = $_GET["id"];
$query = mysql_query("SELECT * FROM post WHERE id='$post_id'");
if (mysql_num_rows($query) <= 0)
{
	header("Location: 404.php");
	die();
} else
	$post = mysql_fetch_array($query);
	
// Delete the post
mysql_query("DELETE FROM post WHERE id='$post_id'");

?>

<html lang="en">
<head>
	<title>GameName - Deleted Development Log</title>
	<link rel="stylesheet" href="css/styles.css" />
	<script src="js/mobile_menu.js"></script>
	<script src="js/footer_fix.js"></script>
	<meta charset="utf-8" />
</head>
<body>
	<!-- INSERT THE HEADER -->
	<?php
	$active_nav = "devlogs";
	include_once "php/header.php";
	?>
	
	
	<!-- THE CONTENT -->
	<main>
		<h1>Post deleted.</h1>
		<a href="devlogs.php">Go back to development logs</a>
	</main>
	
	
	<!-- INSERT THE FOOTER -->
	<?php
	include_once "php/footer.php";
	?>
</body>
</html>