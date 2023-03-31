<nav class="navbar navbar-expand-md">
	<a class="navbar-brand" href="index.php" name="main">Home</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="pairs.php" name="memory">Play Pairs</a>
			</li>
			<?php if (isset($_SESSION['username'])): ?>
				<li class="nav-item">
					<a class="nav-link" href="leaderboard.php" name="leaderboard">Leaderboard</a>
				</li>
			<?php else: ?>
				<li class="nav-item">
					<a class="nav-link" href="registration.php" name="register">Register</a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
</nav>