<?php
include_once "php/init.php";
?>

<html lang="en">
<head>
	<title>GameName - Suggestions</title>
	<link rel="stylesheet" href="css/styles.css" />
	<link rel="stylesheet" href="css/suggestions.css" />
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
			<h1>Suggestions</h1>
			<form action="suggestion_process.php" id="suggestion_form" method="POST">
				<div class="inner">
					<label>Title</label>
					<input placeholder="Your title..." type="text" name="title" />
					<label>Description</label>
					<textarea placeholder="Enter a description..." name="description"></textarea>
					<input type="submit" value="Submit" />
				</div>
			</form>
		</div>
		
		<aside class="sidebar">
			<h1>Before Suggesting</h1>
			<p>Before you submit anything, have you checked out the <a href="polls.php">polls</a> to make sure that your idea has not already been suggested?</p>
		</aside>
		
		<aside class="sidebar">
			<h1>How To Submit</h1>
			<ol>
				<li>Think of a fantastic idea.</li>
				<li>Write a fantastic title for this idea.</li>
				<li>Explain the idea throughly.</li>
				<li>Hit submit.</li>
				<li>???</li>
				<li>Profit.</li>
			</ol>
		</aside>
	</main>
	
	
	<!-- INSERT THE FOOTER -->
	<?php
	include_once "php/footer.php";
	?>
</body>
</html>