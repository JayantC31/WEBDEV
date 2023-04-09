<!DOCTYPE html>
<html>
<head>
	<title>Play Pairs</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	
</head>

<body>
	<?php include 'navbar.php'; ?>
    <?php
    // Retrieve the cookie values
    $time = isset($_COOKIE['time']) ? $_COOKIE['time'] : 0;
    $score = isset($_COOKIE['score']) ? $_COOKIE['score'] : 0;
    $moves = isset($_COOKIE['moves']) ? $_COOKIE['moves'] : 0;
    ?>


	<div id="main" style="text-align:center">
		<style>.custom-button { background-color: none; color: white; font-size: 30px; padding: 10px;}</style>
		<?php if (isset($_COOKIE['username'])): ?>
            <h1>Leaderboard</h1>
            <h5>Latest Game : <?php echo $_COOKIE['username'];?>
            <br> Score = <?php echo $score; ?>, Time = <?php echo $time; ?> secs, Moves = <?php echo $moves; ?></h5><br>
            
            <div style="background-color: grey; box-shadow: 0 0 5px grey; padding: 10px;">
                <table style="border-spacing: 2px;margin-left:auto;margin-right:auto;">
                    <thead>
                    <tr>
                        <th style="background-color: blue; color: white; padding: 5px; display:inline-table">Username</th>
                        <th style="background-color: blue; color: white; padding: 5px; display:inline-table ">Best Score</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                // Initialize leaderboard data structure
                $leaderboard = array();
                session_start();

                // Check if cookies exist for current user
                if (isset($_COOKIE['time']) && isset($_COOKIE['score'])) {
                    // Get current user's submission details from cookies
                    $time = $_COOKIE['time'];
                    $score = $_COOKIE['score'];
                    $username = $_COOKIE['username'];
                    
                    // Check if current user's data already exists in leaderboard
                    if (isset($leaderboard[$username])) {
                        // Update existing data with new submission
                        array_push($leaderboard[$username], array("time" => $time, "score" => $score));
                    } else {
                        // Add new user's data to leaderboard
                        $leaderboard[$username] = array(array("time" => $time, "score" => $score));
                    }
                }

                // Display leaderboard for all users
                foreach ($leaderboard as $user => $submissions) {
                    echo "<h2>$user's Leaderboard:</h2>";
                    echo "<table>";
                    echo "<tr><th>Time</th><br><br><th>Score</th><th></th></tr>";
                    foreach ($submissions as $submission) {
                        echo "<tr><td>" . $submission['time'] . "</td><td>" . $submission['score'] . "</td><td>" . "</td></tr>";
                    }
                    echo "</table>";
                }
                ?>
                    </tbody>
                </table>
            </div>




            <?php else: ?>
		<?php endif; ?>   
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
