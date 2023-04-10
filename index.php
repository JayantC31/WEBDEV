<!DOCTYPE html>
<html>
<!-- Landing page -->	
<head>
	<title>Play Pairs</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	<!-- This links the style sheets and bootstrap to the landing page -->
</head>
<body>
	<?php include 'navbar.php'; ?>
	<!-- Add navbar to page -->
	<div id="main" style="text-align:center">
		<style>.custom-button { background-color: none; color: white; font-size: 30px; padding: 10px;}</style>
		<?php if (isset($_COOKIE['username'])): ?>
			<!-- Check if user has been registered or not -->
			<h1>Welcome to Pairs, <?php echo $_COOKIE['username'];?>!</h1><br>
			<h2><a href="pairs.php" class="btn btn-primary custom-button">Click here to play</a></h2><br>
			<h2><a href="leaderboard.php" class="btn btn-primary custom-button">Leaderboard</a></h2><br>
			<h2><a href="registration.php" class="btn btn-primary custom-button">Register different user</a></h2>
		<?php else: ?>
			<!-- If not registered then user must register -->
			<h2>You're not using a registered session?<br><br><a href="registration.php" class="btn btn-primary custom-button">Register now</a></h2>
		<?php endif; ?>
	</div>
	<!-- Add jquery and bootstrap scripts to make page dynamic and enable responsive development -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
