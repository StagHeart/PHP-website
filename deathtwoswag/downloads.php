<?php
include_once "php/init.php";
?>

<html lang="en">
<head>
	<title>GameName - Download</title>
	<link rel="stylesheet" href="css/styles.css" />
	<link rel="stylesheet" href="css/downloads.css" />
	<script src="js/mobile_menu.js"></script>
	<script src="js/footer_fix.js"></script>
	<meta charset="utf-8" />
</head>
<body>
	<!-- INSERT THE HEADER -->
	<?php
	$active_nav = "downloads";
	include_once "php/header.php";
	?>
	
	
	<!-- THE CONTENT -->
	<main>
		<section id="downloads">
			<h1>Downloads</h1>
			
			<section class="platform">
				<h2>Windows</h2>
				<?php
				echo "<img src='" . get_picture("windows_logo") . "' />";
				?>
				<div class="links">
					<a class="accent_button" href="#">
						<div class="name">Stable Download</div>
						<div class="sub">Stable? Ha... Hahaha!</div>
					</a>
					<a class="accent_button" href="#">
						<div class="name">Unstable Download</div>
						<div class="sub">Coming Soon!</div>	
					</a>
				</div>
			</section>
		
			<section class="platform">
				<h2>Linux</h2>
				<?php
				echo "<img src='" . get_picture("linux_logo") . "' />";
				?>
				<div class="links">
					<a class="accent_button" href="#">
						<div class="name">Stable Download</div>
						<div class="sub">Let's be real...</div>
					</a>
					<a class="accent_button" href="#">
						<div class="name">Unstable Download</div>
						<div class="sub">Coming Soon!</div>	
					</a>
				</div>
			</section>
		</section>
		
		<aside class="sidebar">
			<h1>What's Next</h1>
			<a href="game.php#upcoming">Upcoming Features</a>
			<a href="devlogs.php">Development Logs</a>
		</aside>
		
		<aside class="sidebar">
			<h1>Contribute</h1>
			<a href="suggestions.php">Suggest Features</a>
			<a href="polls.php">Vote On Things</a>
		</aside>
	</main>
	
	
	<!-- INSERT THE FOOTER -->
	<?php
	include_once "php/footer.php";
	?>
</body>
</html>