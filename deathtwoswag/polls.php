<?php
include_once "php/init.php";
?>

<html lang="en">
<head>
	<title>GameName - Polls</title>
	<link rel="stylesheet" href="css/styles.css" />
	<link rel="stylesheet" href="css/polls.css" />
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
		<section id="polls">
			<?php
			if (is_logged_in_as_admin())
				echo "<a href='poll_create.php' id='create_poll' class='accent_button'>Create</a>" , PHP_EOL;
			?>
			<h1>Polls</h1>
			
			<?php
			$all_polls = mysql_query("SELECT * FROM poll");
			while ($poll = mysql_fetch_array($all_polls)) 
			{
				// Check that the poll connects to a valid post
				$poll_id					= $poll["id"];
				$post_id 					= $poll["post_id"];
				$temp_query				= mysql_query("SELECT * FROM post WHERE id=$post_id");
				if (mysql_num_rows($temp_query) <= 0)
					continue;
				$post = mysql_fetch_array($temp_query);
			
				// Get the post info
				$post_title 			= $post["title"];
				$post_summary			= $post["summary"];
				$post_time 				= date('M j, Y', strtotime($post["updated_at"]));
				$post_author_id 	= $post["author_id"];
				
				// Get the author's name
				$author_names = mysql_query("SELECT * FROM user WHERE id='$post_author_id'");
				if (mysql_num_rows($author_names) > 0)
					$post_author_name = mysql_fetch_array($author_names)["real_name"];
				else
					$post_author_name = "deleted";
					
				// Output the article
				echo "<article>" . PHP_EOL;
				echo   "<h2><a href='poll.php?id=$poll_id'>$post_title</a></h2>" . PHP_EOL;
				echo   "<p>$post_summary</p>" . PHP_EOL;
				echo   "<div class='signature'>Posted on $post_time by ";
				echo   "<address>$post_author_name</address>" . PHP_EOL;
				echo "</article>";
			}
			?>
			
			<!--<a id="goto_older" href="#">Older Posts</a>
			<a id="goto_newer" href="#">Newer Posts</a>-->
		</section>
		
		<aside class="sidebar">
			<h1>Filter Settings</h1>
			
			<h2>Sort by</h2>
			<input type="radio" checked />
			<label>Date</label>
			<input type="radio" />
			<label>Author</label>
			<input type="radio" />
			<label>Popularity</label>
			
			<h2>Order</h2>
			<input type="radio" />
			<label>Ascending</label>
			<input type="radio" checked />
			<label>Descending</label>
		</aside>
	</main>
	
	
	<!-- INSERT THE FOOTER -->
	<?php
	include_once "php/footer.php";
	?>
</body>
</html>