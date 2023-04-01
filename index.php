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
