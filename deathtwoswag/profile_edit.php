<?php
include_once "php/init.php";

// Make sure we're logged in
if (!is_logged_in())
{
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

// Get the other user info
$user = mysql_fetch_array($query);
$user_id        = $user["id"];
$user_website   = ($user["website"] != 'null') ? $user["website"] : '';
$user_bio       = ($user["bio"] != 'null') ? $user["bio"] : '';
$user_real_name = $user["real_name"];

// Make sure this is the user that's logged in
if ($user_id != $_SESSION["user_id"])
{
	header("Location: 404.php");
	die();
}

// Check if the user submitted new values
if (isset($_POST["real_name"]))
{
	// Get the new values
	$in_user_real_name = $_POST["real_name"];
	$in_user_website   = $_POST["website"];
	$in_user_bio       = $_POST["bio"];
	
	// Update the table
	$sql = "UPDATE user SET real_name='$in_user_real_name',
	                        website='$in_user_website',
													bio='$in_user_bio'
	                    WHERE id='$user_id'";
	mysql_query($sql);
	
	// Redirect the user to the profile page
	header("Location: profile.php?user_name=$user_name");
	die();
}

?>

<html lang="en">
<head>
	<title>GameName - Edit Profile</title>
	<link rel="stylesheet" href="css/styles.css" />
	<link rel="stylesheet" href="css/devlog_create.css" />
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
		<div class="outer">
			<h1>Edit Profile</h1>
			
			<?php
			echo "<form action='profile_edit.php?user_name=$user_name' method='POST'>" , PHP_EOL;
			echo   "<div class='inner'>" , PHP_EOL;
			echo     "<label>Name</label>" , PHP_EOL;
			echo     "<input type='text' name='real_name' value='$user_real_name' />" , PHP_EOL;
					
			echo     "<label>Website</label>" , PHP_EOL;
			echo     "<input type='text' name='website' value='$user_website' />" , PHP_EOL;
					
			echo     "<label>Bio</label>" , PHP_EOL;
			echo     "<textarea name='bio'>$user_bio</textarea>" , PHP_EOL;
					
			echo     "<label>Profile Picture</label>" , PHP_EOL;
			echo     "<p>Coming Soon!</p>" , PHP_EOL;
					
			echo     "<input type='submit' value='Update' />" , PHP_EOL;
			echo   "</div>" , PHP_EOL;
			echo "</form>" , PHP_EOL;
			?>
		</div>
	</main>
	
	
	<!-- INSERT THE FOOTER -->
	<?php
	include_once "php/footer.php";
	?>
</body>
</html>