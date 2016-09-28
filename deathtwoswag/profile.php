<?php
include_once "php/init.php";

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

// Get the other user info
$user = mysql_fetch_array($query);
$user_id        = $user["id"];
$user_website   = $user["website"];
$user_bio       = $user["bio"];
$user_real_name = $user["real_name"];
?>

<html lang="en">
<head>
	<title>GameName - Profile</title>
	<link rel="stylesheet" href="css/styles.css" />
	<link rel="stylesheet" href="css/profile.css" />
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
		<section id="profile">
			<?php
			if (is_logged_in() and 
			    ($user_id == $_SESSION["user_id"] or is_logged_in_as_admin()))
			{
				echo "<a href='profile_edit.php?user_name=$user_name' class='accent_button mgmt'>Edit Profile</a>" , PHP_EOL;
				echo "<a href='profile_delete.php?user_name=$user_name' class='accent_button mgmt'>Delete Profile</a>" , PHP_EOL;
			}
			
			echo   "<h1>$user_name's Profile</h1>" , PHP_EOL;
			echo   "<img src='" . get_picture("profile_image") . "' />" , PHP_EOL;

			echo   "<div class='details'>" , PHP_EOL;
			
			// USERS's NAME
			echo     "<label>Name</label>" , PHP_EOL;
			echo     "<h2 class='long_word'>$user_real_name</h2>", PHP_EOL;
			
			// USER's WEBSITE
			echo     "<label>Website</label>" , PHP_EOL;
			if ($user_website != null)
				echo   "<h2 class='long_word'>$user_website</h2>" , PHP_EOL;
			else
				echo   "<p class='none_given'>None.</p>" , PHP_EOL;
				
			// USER's BIO
			echo     "<label>Bio</label>" , PHP_EOL;
			if ($user_bio != null)
				echo   "<p>$user_bio</p>" , PHP_EOL;
			else
				echo   "<p class='none_given'>None.</p>" , PHP_EOL;
				
			echo   "</div>" , PHP_EOL;
			?>
		</section>
		
		<!--<aside class="sidebar">
			<h1>Recent Activity</h1>
			<p>Commented on a dev log, <a href="devlog.php">"And So It Begins!"</a></p>
			<p>Voted on a poll, <a href="poll.php">"Here Is An Example Title"</a></p>
		</aside>-->
	</main>
	
	
	<!-- INSERT THE FOOTER -->
	<?php
	include_once "php/footer.php";
	?>
</body>
</html>