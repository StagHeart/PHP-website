<?php
include_once "php/init.php";

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

// Check if current user has voted
$user_pick = null;
if (is_logged_in())
{
	$user_id = $_SESSION["user_id"];
	$temp_query = mysql_query("SELECT option_id FROM vote 
	                           WHERE post_id='$post_id' AND user_id='$user_id'");
	if (mysql_num_rows($temp_query) > 0)
	{
		$user_pick = mysql_fetch_array($temp_query)["option_id"];
	}
}

// Check if a user has just voted on an option
if (is_logged_in() and
    isset($_POST["vote"]))
{
	// Get the option
	$option_id = $_POST["vote"];
	
	// If the user has already voted, remove that vote
	$user_id = $_SESSION["user_id"];
	if ($user_pick != null)
		mysql_query("DELETE FROM vote WHERE post_id='$post_id' AND user_id='$user_id'");
		
	// Cast the vote
	$user_pick = $option_id;
	mysql_query("INSERT INTO vote (post_id, option_id, user_id) 
							 VALUES ('$post_id', '$option_id', '$user_id')");
}


// Make sure the poll is linked to a valid post
$query = mysql_query("SELECT * FROM post WHERE id='$post_id'");
if (mysql_num_rows($query) <= 0)
{
	header("Location: 404.php");
	die();
} else
	$post = mysql_fetch_array($query);

// Get the post info
$post_title 			= $post["title"];
$post_content			= $post["content"];
$post_time 				= date('M j, Y', strtotime($post["updated_at"])) . " at ";
$post_time				= $post_time . date('g:ia', strtotime($post["updated_at"]));
$post_author_id 	= $post["author_id"];

// Get the author's name
$temp_query = mysql_query("SELECT * FROM user WHERE id='$post_author_id'");
if (mysql_num_rows($temp_query) > 0)
	$post_author_name = mysql_fetch_array($temp_query)["real_name"];
else
	$post_author_name = "deleted";

?>

<html lang="en">
<head>
	<title>GameName - Poll</title>
	<link rel="stylesheet" href="css/styles.css" />
	<link rel="stylesheet" href="css/poll.css" />
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
		<section id="poll">
			<article>
				<?php
				echo "<h1>$post_title</h1>" , PHP_EOL;
				echo "<div class='signature'>Posted on $post_time by ";
				echo   "<address>$post_author_name</address></div>" , PHP_EOL;
				echo $post_content , PHP_EOL;
				?>
				
				<div id="vote">
					<h2>Vote</h2>
					
					<?php
					echo "<form action='poll.php?id=$poll_id' method='POST'>" , PHP_EOL;
						mysql_data_seek($poll_options, 0);
						while ($option = mysql_fetch_array($poll_options))
						{
							$option_name = $option["option_name"];
							$option_id   = $option["option_id"];
							$checked     = ($user_pick == $option_id) ? 'checked' : '';
							echo "<input type='radio' name='vote' value='$option_id' $checked/>" , PHP_EOL;
							echo "<label>$option_name</label>" , PHP_EOL;
						}
						if (!is_logged_in())
							echo "<input type='submit' value='You must be logged in to vote' disabled />" , PHP_EOL;
						else
							echo "<input type='submit' value='Cast vote' />" , PHP_EOL;
					echo "</form>";
					?>
				</div>
				
				<div id="results">
					<h2>Results</h2>
					
					<table>
						<?php
						mysql_data_seek($poll_options, 0);
						while ($option = mysql_fetch_array($poll_options))
						{
							$option_name = $option["option_name"];
							$option_id   = $option["option_id"];
							$votes = mysql_query("SELECT user_id FROM vote 
							                      WHERE post_id='$post_id' AND option_id='$option_id'");
							$vote_count  = mysql_num_rows($votes);
							echo "<tr>" , PHP_EOL;
							echo   "<td>$vote_count votes</td>" , PHP_EOL;
							echo   "<td>$option_name</td>" , PHP_EOL;
							echo "</tr>" , PHP_EOL;
						}
						?>
					</table>
				</div>
			</article>
		</section>
			
			<!--<section id="comments">
				<h1>Comments</h1>
			
				<article class="comment">
					<?php
					echo "<img src='" . get_picture("profile_image") . "' />";
					?>
					<address><a href="profile.php">Joseph Horton</a></address>
					<div class="signature">Posted on 06-15-2015 at 7:40pm</div>
					<p>I really think that your content has gone down hill lately... You should try letting that Joseph guy take over. Trololololol!</p>
				</article>
			
				<article class="comment">
					<?php
					echo "<img src='" . get_picture("profile_image") . "' />";
					?>
					<address><a href="profile.php">Joseph Horton</a></address>
					<div class="signature">Posted on 06-15-2015 at 7:40pm</div>
					<p>I really think that your content has gone down hill lately... You should try letting that Joseph guy take over. Trololololol!</p>
				</article>
			</section>
			
		</section>
		
		<aside class="sidebar">
			<h1>Popular Polls</h1>
			<a href="poll.php">Here Is An Example Title</a>
			<a href="poll.php">Here Is An Example Title</a>
			<a href="poll.php">Here Is An Example Title</a>
		</aside>
	
		<aside class="sidebar">
			<h1>Unvoted-on Polls</h1>
			<a href="poll.php">Here Is A Big Long Example Title To Wrap</a>
			<a href="poll.php">Here Is An Example Title</a>
			<a href="poll.php">Here Is An Example Title</a>
		</aside>-->
	</main>
	
	
	<!-- INSERT THE FOOTER -->
	<?php
	include_once "php/footer.php";
	?>
</body>
</html>