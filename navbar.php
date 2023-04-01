<nav class="navbar navbar-expand-md">
	<a class="navbar-brand" href="index.php" name="main">Home</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<div style="display: flex; justify-content: center; align-items: center; height: 40px;">
					<div style="position: absolute; top: 10%; left: 50%; transform: translate(-10%, -50%);">
						<?php
							// Check if the avatar parts cookie exists
							if (isset($_COOKIE['avatar_skin']) && isset($_COOKIE['avatar_mouth']) && isset($_COOKIE['avatar_eyes'])) {
								// Get the selected avatar parts from the cookie
								$skin = $_COOKIE['avatar_skin'];
								$mouth = $_COOKIE['avatar_mouth'];
								$eyes = $_COOKIE['avatar_eyes'];
								// Display the selected avatar parts
								echo '<img src="' . $skin . '" alt="skin" style="position: absolute; width: 40px; height: 40px;">';
								echo '<img src="' . $mouth . '" alt="mouth" style="position: absolute; width: 40px; height: 40px;">';
								echo '<img src="' . $eyes . '" alt="eyes" style="position: absolute; width: 40px; height: 40px;">';
							}
						?>
					</div>
				</div>
			</li>
		
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