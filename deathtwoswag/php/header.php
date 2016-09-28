
<?php
if ($active_nav == null)
	$active_nav = "";
else
	$active_nav = strtolower($active_nav);
?>

<header>
	<div class="inner">
		<?php
		echo "<input id='mobile_button' type='image' onclick='toggleMenu();' src='";
		echo get_picture("mini_menu_button") . "' />";
		?>
		<div class="logo">Logo</div>
		<nav>
			<div id="general_links">
				<a href="index.php"
				  <?php if ($active_nav == 'home') echo " class='active'" ?>>
					Home</a>
				<a href="downloads.php"
				  <?php if ($active_nav == 'downloads') echo " class='active'" ?>>
					Download</a>
				<a href="game.php"
				  <?php if ($active_nav == 'game') echo " class='active'" ?>>
					Game</a>
				<a href="devlogs.php"
				  <?php if ($active_nav == 'devlogs') echo " class='active'" ?>>
					Dev Logs</a>
				<a href="polls.php"
				  <?php if ($active_nav == 'polls') echo " class='active'" ?>>
					Polls</a>
			</div>
			<div id="profile_links">
				<?php
				if (is_logged_in()) {
					$user_name = get_user_name( $_SESSION["user_id"] );
					echo "<a href='profile.php?user_name=$user_name' class='accent_button'>Profile</a>" . PHP_EOL;
					echo "<a href='logout.php' class='accent_button'>Logout</a>";
				}
				else {
					echo "<a href='login.php' class='accent_button'>Login</a>" . PHP_EOL;
					echo "<a href='signup.php' class='accent_button'>Sign Up</a>";
				}
				?>
			</div>
		</nav>
	</div>
	<nav id="mobile_menu">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="downloads.php">Download</a></li>
			<li><a href="game.php">Game</a></li>
			<li><a href="devlogs.php">Dev Logs</a></li>
			<li><a href="polls.php">Polls</a></li>
			<?php
			if (isset( $_SESSION['username'] )) {
				echo "<li><a href='member.php'>" . $_SESSION['username'] . "</a></li>";
				echo "<li><a href='logout.php'>Logout</a></li>";
			}
			else {
				echo "<li><a href='login.php'>Login</a></li>";
				echo "<li><a href='signup.php'>Sign Up</a></li>";
			}
			?>
		</ul>
	</nav>
</header>
