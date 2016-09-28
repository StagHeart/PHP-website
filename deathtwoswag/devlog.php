<?php
include_once "php/init.php";

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
	<title>GameName - Development Log</title>
	<link rel="stylesheet" href="css/styles.css" />
	<link rel="stylesheet" href="css/devlog.css" />
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
		<section id="post">
			<article>
				<?php
				if (is_logged_in_as_admin())
					echo "<a href='devlog_delete.php?id=$post_id' id='delete_log' class='accent_button'>Delete</a>" , PHP_EOL;
				echo "<h1>$post_title</h1>" , PHP_EOL;
				echo "<div class='signature'>Posted on $post_time by ";
				echo   "<address>$post_author_name</address></div>" , PHP_EOL;
				echo $post_content , PHP_EOL;
				?>
			</article>
		</section>
		<!--<section id="post">
			<article>
				<h1>And So It Begins!</h1>
				<div class="signature">Jamie Syme on Feb 6, 2015 at 7:30pm</div>
			
				<p>The project has begun! Or, well... it began a little while ago. January 20th to be exact. But the development log starts here! We've been in development for a couple weeks now, so let me give you a quick summary.</p>
				
				<h2>Where We're At</h2>
				
				<p>We have a player. And a camera. And some tiles. We also have some basic enemies that pathfind around the map (thank you A-Star). When the player is in sight, the enemy will charge at you like a bull! Only it's quite a bit less dramatic than that.</p>
		
				<p>We also have arrows! Or balls. I don't know, they're kind of round for testing purposes right now, but they will be arrows eventually! For now, though, they'll be sticky, do-nothing balls.</p>
				
				<h2>Where We're Going</h2>
				
				<p>What I want to get implemented right away is health. I want to turn this game into a GAME. Not just a tilemap with some simple physics, simple pathfinding, and simple enemies... it's all too basic. Oh right, I should probably explain the game.</p>
				
				<p>The game is going to be an endless wave-based shooter. You'll begin on round one, where a few easy enemies will spawn around the map. Eventually, the waves will get harder and harder, at which point you will most likely die. That's the plan, anyways. </p>
				
				<p>We are still trying to figure out a lot about where this game is going, and we're going to try and get the community involved with the game decisions if we can. For now, here is what we're thinking about:</p>
				
				<ul>
					<li>Originally we planned for a top-down view, but now we are considering going isometric. </li>
					<li>The theme is probably going to medevial/fantasy (so expect swords and arrows, etc).</li>
					<li>We're considering classes, or some sort of leveling system, but that's further down the road.</li>
					<li>I'm not sure what the plan is for in-game power-ups yet.</li>
					<li>Multiplayer is a maybe, we'll see where the game takes us.</li>
					<li>We're discussing implementing destroyable tiles, so you can setup some sort of base to funnel the enemies, but only if we can work out the technical and gameplay aspects.</li>
				</ul>
				
				<p>As you can see, a lot of the game ideas are still up in the air. We're uncertain about a lot, but we did this on purpose to allow ourselves some breathing room. I also want to point out that we are developing the website alongside the game, so please bear with us! </p>
				
				<h2>What's The Purpose Of This</h2>
				
				<p>These posts are meant to act as a development log for us, and for you, but it may also act like a blog at times. I don't know. Is there a difference between a development log and a blog? Shall we call it a dlog? I would assume that a blog has longer posts compared to development logs. Ahh well, it will probably contain long and short posts, so expect both!</p>
				
				<p>Anywho, enough rambling! Thank you for reading, more development logs are on their way.</p>
			</article>
			
			<section id="comments">
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
			<h1>Older Posts</h1>
			<a href="devlog.php">Here Is An Example Title</a>
			<a href="devlog.php">Here Is An Example Title</a>
			<a href="devlog.php">Here Is An Example Title</a>
		</aside>
		
		<aside class="sidebar">
			<h1>Newer Posts</h1>
			<a href="devlog.php">Here Is A Big Long Example Title To Wrap</a>
			<a href="devlog.php">Here Is An Example Title</a>
			<a href="devlog.php">Here Is An Example Title</a>
		</aside>-->
	</main>
	
	
	<!-- INSERT THE FOOTER -->
	<?php
	include_once "php/footer.php";
	?>
</body>
</html>