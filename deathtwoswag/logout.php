<?php
include_once "php/init.php";

// LOGOUT
if (is_logged_in()) {
	session_destroy();
	session_start();
}
?>

<html lang="en">
<head>
	<title>GameName - Logout</title>
	<link rel="stylesheet" href="css/styles.css" />
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
		<h1>You've been logged out.</h1>
		<a href="index.php">Go back to home</a>
	</main>
	
	
	<!-- INSERT THE FOOTER -->
	<?php
	include_once "php/footer.php";
	?>
</body>
</html>