<?php
include_once "php/init.php";
?>

<html lang="en">
<head>
	<title>GameName - Home</title>
	<link rel="stylesheet" href="css/styles.css" />
	<link rel="stylesheet" href="css/index.css" />
	<script src="js/mobile_menu.js"></script>
	<script src="js/footer_fix.js"></script>
	<meta charset="utf-8" />
</head>
<body>
	<!-- INSERT THE HEADER -->
	<?php
	$active_nav = "home";
	include_once "php/header.php";
	?>
	
	
	<!-- THE CONTENT -->
	<main>
		<section id="above_fold">
			<div class="wrapper">
				<?php
				$video_name = get_video("trailer");
				echo "<video src='$video_name' controls>";
				echo   "Your browser does not support the video tag.";
				echo "</video>";
				?>
			</div>
			<p>GameName is about fighting your way through endless waves of fierce enemies, and balancing your cash flow on traps, weapon upgrades, and more! Oh, and it's FREE. Why are you still reading this?<a href="downloads.php" class="accent_button">Download</a></p>
		</section>
		
		<section id="features">
			<h1>Features</h1>
			
			<div class="feature">
				<?php
				echo "<img src='" . get_picture("feature_waves") . "' />";
				?>
				<h1>Endless Waves Of Enemies</h1>
				<ul>
					<li>Battle ruthless enemies for as long as you can survive!</li>
					<li>Random spawning patterns will keep you on your toes.</li>
				</ul>
			</div>
			
			<div class="feature">
				<?php
				echo "<img src='" . get_picture("feature_pathfinding") . "' />";
				?>
				<h1>Pathfinding</h1>
				<ul>
					<li>Experience this next-generation artifical intelligence!</li>
					<li>Blazing fast A-star implementation written in C++.</li>
				</ul>
			</div>
			
			<div class="feature">
				<?php
				echo "<img src='" . get_picture("feature_custmap") . "' />";
				?>
				<h1>Map Customization</h1>
				<ul>
					<li>Maps are images. That's it!</li>
					<li>This may change soon... but let's enjoy it for now!</li>
				</ul>
			</div>
		</section>
	</main>
	
	
	<!-- INSERT THE FOOTER -->
	<?php
	include_once "php/footer.php";
	?>
</body>
</html>
