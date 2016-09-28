<?php
include_once "php/init.php";

// Make sure only admins can access this page
if (!is_logged_in_as_admin()) {
	header("Location: 404.php");
	die();
}

// Check for submitted data
if (isset($_POST["title"]))
{
	// Get the post variables (and user id)
	$user_id = $_SESSION["user_id"];
	$in_title = $_POST["title"];
	$in_summary = $_POST["summary"];
	$in_content = $_POST["content"];

	// Create the post
	$sql = "INSERT INTO post (author_id, title, summary, content) " .
				 "VALUES ('$user_id', '$in_title', '$in_summary', '$in_content')";
	mysql_query($sql);
	
	// Get the post id
	$query = mysql_query("SELECT id FROM post ORDER BY updated_at DESC LIMIT 1");
	$post_id = mysql_fetch_array($query)["id"];
	
	// Redirect to the new post
	header("Location: devlog.php?id=$post_id");
	die();
}

?>

<html lang="en">
<head>
	<title>GameName - Create A Development Log</title>
	<link rel="stylesheet" href="css/styles.css" />
	<link rel="stylesheet" href="css/devlog_create.css" />
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
		<div class="outer">
			<h1>Create A Development Log</h1>
			
			<form action="devlog_create.php" method="POST">
				<div class="inner">
					<label>Title</label>
					<input type="text" name="title" />
					
					<label>Summary</label>
					<textarea class="summary" name="summary"></textarea>
					
					<label>Content</label>
					<textarea class="content" name="content"></textarea>
					
					<input type="submit" value="Create" />
				</div>
			</form>
		</div>
	</main>
	
	
	<!-- INSERT THE FOOTER -->
	<?php
	include_once "php/footer.php";
	?>
</body>
</html>