<?php
include_once "php/init.php";
?>

<html lang="en">
<head>
	<title>GameName - Game</title>
	<link rel="stylesheet" href="css/styles.css" />
	<link rel="stylesheet" href="css/game.css" />
	<script src="js/mobile_menu.js"></script>
	<script src="js/footer_fix.js"></script>
	<meta charset="utf-8" />
</head>
<body>
	<!-- INSERT THE HEADER -->
	<?php
	$active_nav = "game";
	include_once "php/header.php";
	?>
	
	
	<!-- THE CONTENT -->
	<main>
		<article>
			<h1>Game</h1>
			
			<section>
				<h2>What is it?</h2>
				<p>If you haven't already, check out the <a href="index.php">trailer</a> on the homepage.</p>
				<p>GameName is a top-down 2d survival game. The player will face endless waves of enemies, and they must survive as long as possible. The enemies will randomly spawn around the map, and each "wave" of enemies will be tougher than the last. They will not only grow stronger, faster, and smarter, but they will also grow in numbers. You will quickly be battling with hundreds of foes.</p>
				<p>The enemies are random spawned in, but the maps are pre-built, in order to ensure tight and fair battles. Randomly generated maps are great fun, but we unfortunately do not have the time to implement a good map generator, so you will have to settle for image based maps. And there is currently only one map, but you can expect to see new maps very soon! In the meantime, see how man hidden areas and easter eggs you can disover!</p>
			</section>
			
			<section>
				<h2 id="upcoming">Upcoming Features</h2>
				<p>For more up-to-date info, head over to the <a href="devlogs.php">development logs</a> to see what we're working on!</p>
				<p>I don't even know if I would consider the game to be in pre-alpha. Lots of work has to be done. However, here are some of the more note-worthy features that you can expect in the near future:</p>
				<ul>
					<li>Proper Graphics <small>(think pictures...)</small></li>
					<li>Screen Shake <small>(hell yeah!)</small></li>
					<li>A Sword <small>(yup... we're that far behind)</small></li>
					<li>Particle Effects <small>(we're going next gen here)</small></li>
					<li>More</li>
					<li>More</li>
					<li>More</li>
					<li>...</li>
				</ul>
			</section>
			
			<section>
				<h2>Who's Behind It?</h2>
				<p>Me! And two others. So there are a total of three people working on this project. All of us have jobs and school to attend to as well, so the development may be slow at times (blame finals). Want to check out some previous projects that we have worked on? Oh, actually? That's awkward...</p>
			</section>
			
			<section>
				<h2>Concept Art</h2>
				<p>Lol. You expect too much...</p>
			</section>
		</article>
		
		<aside class="sidebar">
			<h1>Can I Have It?</h1>
			<a href="downloads.php">Yes, you may.</a>
		</aside>
	</main>
	
	
	<!-- INSERT THE FOOTER -->
	<?php
	include_once "php/footer.php";
	?>
</body>
</html>