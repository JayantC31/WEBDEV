<!DOCTYPE html>
<html>
<head>
	<title>Play Pairs</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	
</head>

<body>
	<?php include 'navbar.php'; ?>
	<div id="main" style="text-align:center">
		<style>.custom-button { background-color: none; color: white; font-size: 30px; padding: 10px;}</style>
		<?php if (isset($_COOKIE['username'])): ?>
			<h1>Welcome to Pairs, <?php echo $_COOKIE['username'];?>!</h1><br>
			<?php
				// Check if the avatar parts cookie exists
				if (isset($_COOKIE['avatar_skin']) && isset($_COOKIE['avatar_mouth']) && isset($_COOKIE['avatar_eyes'])) {
					// Get the selected avatar parts from the cookie
					$skin = $_COOKIE['avatar_skin'];
					$mouth = $_COOKIE['avatar_mouth'];
					$eyes = $_COOKIE['avatar_eyes'];
					
					// Display the selected avatar parts
					echo '<h1>Your selected avatar:</h1>';
					echo '<img src="' . $skin . '" alt="skin" width="100" height="100">';
					echo '<img src="' . $mouth . '" alt="mouth" width="100" height="100">';
					echo '<img src="' . $eyes . '" alt="eyes" width="100" height="100">';

				} else {
					// Display the default avatar
					echo '<h1>PLEASE SELECT AVATAR BEFORE STARTING</h1>';
				}
			?>
			<h2><a href="pairs.php" class="btn btn-primary custom-button">Click here to play</a></h2><br>
			<h2><a href="leaderboard.php" class="btn btn-primary custom-button">Leaderboard</a></h2>
		<?php else: ?>
			<h2>You're not using a registered session?<br><br><a href="registration.php" class="btn btn-primary custom-button">Register now</a></h2>
		<?php endif; ?>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
