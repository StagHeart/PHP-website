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
	
	// Get the options from post
	$options = array();
	$option_index = 1;
	while (isset($_POST["option_$option_index"]))
	{
		$options[] = $_POST["option_$option_index"];
		$option_index++;
	}
	
	// Make sure we have at least one option
	if (count($options) <= 0) {
		// TODO: Print an error to user instead
		header("Location: 404.php");
		die();
	}
	
	// Create the post
	$sql = "INSERT INTO post (author_id, title, summary, content) " .
				 "VALUES ('$user_id', '$in_title', '$in_summary', '$in_content')";
	mysql_query($sql);
	
	// Get the post id
	$query = mysql_query("SELECT id FROM post ORDER BY updated_at DESC LIMIT 1");
	$post_id = mysql_fetch_array($query)["id"];
	
	// Create the poll
	$poll_id = null;
	foreach ($options as $option_id => $option_name)
	{
		if ($poll_id == null)
		{
			$sql = "INSERT INTO poll (option_id, post_id, option_name)
			        VALUES ('$option_id', '$post_id', '$option_name')";
			mysql_query($sql);
			$poll_id = mysql_insert_id();
		} else
		{
			$sql = "INSERT INTO poll (id, option_id, post_id, option_name)
			        VALUES ('$poll_id', '$option_id', '$post_id', '$option_name')";
			mysql_query($sql);
		}
	}
	
	
	// Redirect to the new post
	header("Location: poll.php?id=$poll_id");
	die();
}

?>

<html lang="en">
<head>
	<title>GameName - Create A Poll</title>
	<link rel="stylesheet" href="css/styles.css" />
	<link rel="stylesheet" href="css/poll_create.css" />
	<script src="js/mobile_menu.js"></script>
	<script src="js/footer_fix.js"></script>
	<meta charset="utf-8" />
	
	<script>
		// This script is used to add an option to the poll
		var option_count = 2;
		function new_option()
		{
			option_count = option_count + 1;
			var name = 'option_' + option_count;
			var button_el = document.getElementById("new_option_button");
			button_el.insertAdjacentHTML('beforebegin', '<input type="text" name="' + name + '" />');
		}
	</script>
</head>
<body>
	<!-- INSERT THE HEADER -->
	<?php
	$active_nav = "polls";
	include_once "php/header.php";
	?>
	
	
	<!-- THE CONTENT -->
	<main>
		<div class="outer">
			<h1>Create A Poll</h1>
			
			<form action="poll_create.php" method="POST">
				<div class="inner">
					<label>Title</label>
					<input type="text" name="title" />
					
					<label>Summary</label>
					<textarea class="summary" name="summary"></textarea>
					
					<label>Content</label>
					<textarea class="content" name="content"></textarea>
					
					<label>Options</label>
					<input type="text" name="option_1" />
					<input type="text" name="option_2" />
					<button type="button" id="new_option_button" onclick="new_option();">Add an option</button>
					
					<input type="submit" value="Create poll" />
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