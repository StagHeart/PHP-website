<?php
include_once "php/init.php";

// Check if we're already logged in
if (is_logged_in()) 
{
	header("Location: profile.php?user_name=" . get_user_name($_SESSION["user_id"]));
	die();
}

// Reset the sign up fail msg
unset($_SESSION["signup_fail"]);

// Is the user trying to sign up
if (isset($_POST["user_name"]) and
		isset($_POST["real_name"]) and
		isset($_POST["password2"]) and
    isset($_POST["password2"]))
{
	// Get the sign up creds
	$in_user_name = $_POST["user_name"];
	$in_real_name = $_POST["real_name"];
	$in_password1 = $_POST["password1"];
	$in_password2 = $_POST["password2"];

	// Check basic creds requirements
	if (strlen($in_user_name) < 1)
		$_SESSION["signup_fail"] = "Username is empty";
	else
	if (strlen($in_user_name) > 25)
		$_SESSION["signup_fail"] = "Username is over 25 characters";
	else
	if (strlen($in_real_name) < 1)
		$_SESSION["signup_fail"] = "Real name is empty";
	else
	if (strlen($in_real_name) > 25)
		$_SESSION["signup_fail"] = "Real name is over 25 characters";
	else
	if (strlen($in_password1) < 6)
		$_SESSION["signup_fail"] = "Password is under 6 characters";
	else
	if (strlen($in_password1) > 25)
		$_SESSION["signup_fail"] = "Password is over 25 characters";
	else
	if ($in_password1 != $in_password2)
		$_SESSION["signup_fail"] = "Passwords do not match";
		
	// Check if the user already exists
	if (!isset($_SESSION["signup_fail"]))
	{
		$query = mysql_query("SELECT * FROM user WHERE user_name='$in_user_name'");
		if (mysql_num_rows($query) > 0)
			$_SESSION["signup_fail"] = "Username is already taken";
	}
	
	// Check if there was an error
	if (!isset($_SESSION["signup_fail"]))
	{
		// Create the user
		$crypt_password = md5($in_password1);
		$sql = "INSERT INTO user (user_name, real_name, password) " .
		       "VALUES ('$in_user_name', '$in_real_name', '$crypt_password')";
		mysql_query($sql);
		
		// Get the user id
		$query = mysql_query("SELECT id FROM user WHERE user_name='$in_user_name'");
		$user_id = mysql_fetch_array($query)["id"];
		
		// Log the new user in
		$_SESSION["user_id"] = $user_id;
		
		// Redirect the user to the profile page
		header("Location: profile.php?user_name=" . get_user_name($user_id));
		die();
	}
}
?>

<html lang="en">
<head>
	<title>GameName - Sign Up</title>
	<link rel="stylesheet" href="css/styles.css" />
	<link rel="stylesheet" href="css/signup.css" />
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
			<h1 id="signup">Signup</h1>
			
			<?php
			if (isset($_SESSION["signup_fail"]))
			{
				$fail_reason = $_SESSION["signup_fail"];
				echo "<p>Signup failed: $fail_reason.</p>" . PHP_EOL;
			}
			?>
			
			<form action="signup.php" method="POST">
				<label>Username</label>
				<input type="text" name="user_name" />
				<label>Name</label>
				<input type="text" name="real_name" />
				<label>Password</label>
				<input type="password" name="password1" />
				<label>Confirm Password</label>
				<input type="password" name="password2" />
				<input type="submit" value="Register" />
			</form>
		</div>
	</main>
	
	
	<!-- INSERT THE FOOTER -->
	<?php
	include_once "php/footer.php";
	?>
</body>
</html>