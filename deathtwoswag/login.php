<?php
include_once "php/init.php";

// Check if the user is already logged in
if (is_logged_in()) 
{
	header("Location: profile.php?user_name=" . get_user_name($_SESSION["user_id"]));
	die();
}

// Reset the "login fail" msg
unset($_SESSION["login_failed"]);

// Is the user trying to login
if (isset($_POST["user_name"]) and
    isset($_POST["password"]))
{
	// Get the login creds
	$in_user_name = $_POST['user_name'];
	$in_password = $_POST['password'];
	
	// Check creds
	$query = mysql_query("SELECT * FROM user WHERE user_name='$in_user_name'");
	if (mysql_num_rows($query) > 0)
	{
		// The user name matches, so check the password
		$user = mysql_fetch_array($query);
		if ($user["password"] == md5($in_password))
		{
			// Successful login
			$_SESSION["user_id"] = $user["id"];
			
			// Redirect to the profile page
			header("Location: profile.php?user_name=" . get_user_name($user["id"]));
			die();
			
		} else
			$_SESSION["login_failed"] = true;
	} else
		$_SESSION["login_failed"] = true;
}

?>

<html lang="en">
<head>
	<title>GameName - Login</title>
	<link rel="stylesheet" href="css/styles.css" />
	<link rel="stylesheet" href="css/login.css" />
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
		<div class="inner">
			<h1>Login</h1>
			
			<?php
			if (isset($_SESSION["login_failed"]))
			{
				echo "<p>Login failed!</p>" . PHP_EOL;
			}
			?>
		
			<form action="login.php" method="POST">
				<label>Username</label>
				<input type="text" name="user_name" />
				<label>Password</label>
				<input type="password" name="password" />
				<input type="submit" value="Login" />
			</form>
		</div>
	</main>
	
	
	<!-- INSERT THE FOOTER -->
	<?php
	include_once "php/footer.php";
	?>
</body>
</html>