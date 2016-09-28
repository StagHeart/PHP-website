<?php
include_once "php/init.php";

// Make sure only admins can access this page
if (!is_logged_in_as_admin()) {
	header("Location: 404.php");
	die();
}

// Make sure a url poll_id is available
if (!isset($_GET["id"]))
{
	header("Location: 404.php");
	die();
}

// Make sure the poll_id is valid
$poll_id = $_GET["id"];
$poll_options = mysql_query("SELECT * FROM poll WHERE id='$poll_id'");
if (mysql_num_rows($poll_options) <= 0)
{
	header("Location: 404.php");
	die();
} else {
	$poll = mysql_fetch_array($poll_options);
	$post_id = $poll["post_id"];
}
	
// Delete the post associated with the poll
mysql_query("DELETE FROM post WHERE id='$post_id'");

// Delete the votes
mysql_query("DELETE FROM vote WHERE post_id='$post_id'");

// Delete the poll options
mysql_query("DELETE FROM poll WHERE id='$poll_id'");

?>

<html lang="en">
<head>
	<title>GameName - Deleted Poll</title>
	<link rel="stylesheet" href="css/styles.css" />
	<script src="js/mobile_menu.js"></script>
	<script src="js/footer_fix.js"></script>
	<meta charset="utf-8" />
</head>
<body>
	<!-- INSERT THE HEADER -->
	<?php
	$active_nav = "polls";
	include_once "php/header.php";
	?>
	
	
	<!-- THE CONTENT -->
	<main>
		<h1>Poll deleted.</h1>
		<a href="polls.php">Go back to polls</a>
	</main>
	
	
	<!-- INSERT THE FOOTER -->
	<?php
	include_once "php/footer.php";
	?>
</body>
</html>