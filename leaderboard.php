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

<div id="main" style="text-align:center; background-color: grey; box-shadow: 0 0 5px grey; padding: 10px;">

        <style>.custom-button { background-color: none; color: white; font-size: 30px; padding: 10px;}</style>
        <?php if (isset($_COOKIE['username'])): ?>
            <h1>Leaderboard</h1>
            <h5>Latest Game for <?php echo $_COOKIE['username'];?> :
            <br> Score = <?php echo $score; ?>, Time = <?php echo $time; ?> secs, Moves = <?php echo $moves; ?></h5><br>
            
            <div style="background-color: grey; box-shadow: 0 0 5px grey; padding: 10px;">
    <div style="text-align: center;">
        <?php
             // Start session
            session_start();

            // Initialize leaderboard data structure
            if (!isset($_SESSION['leaderboard'])) {
                $_SESSION['leaderboard'] = array();
            }

            // Retrieve the cookie values
            $time = isset($_COOKIE['time']) ? $_COOKIE['time'] : 0;
            $score = isset($_COOKIE['score']) ? $_COOKIE['score'] : 0;
            $username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';

            // Check if current user's data already exists in leaderboard
            if ($username && isset($_SESSION['leaderboard'][$username])) {
                // Check if the current score is greater than the existing score
                $existing_score = max(array_column($_SESSION['leaderboard'][$username]['submissions'], 'score'));
                if ($score > $existing_score) {
                    // Replace the existing score with the new score
                    $_SESSION['leaderboard'][$username]['submissions'] = array(array("score" => $score));
                }
            } elseif ($username) {
                // Add new user's data to leaderboard
                $_SESSION['leaderboard'][$username] = array(
                    "username" => $username,
                    "submissions" => array(array("score" => $score)),
                );
            }

            // Display leaderboard for all users
            echo "<table>";

            // Sort leaderboard array in descending order based on highest score
            usort($_SESSION['leaderboard'], function($a, $b) {
                $a_score = max(array_column($a['submissions'], 'score'));
                $b_score = max(array_column($b['submissions'], 'score'));
                return $b_score - $a_score;
            });

            echo "<table style='border-spacing: 2px; margin: 0 auto;'>";

            echo "<tr><th style='background-color: blue;'>Username</th><th style='background-color: blue;'>Score</th></tr>";
            
            foreach ($_SESSION['leaderboard'] as $data) {
                $username = $data['username'];
                $submissions = $data['submissions'];
                $highest_score = 0;
                
                foreach ($submissions as $submission) {
                    $score = $submission['score'];
                    if ($score > $highest_score) {
                        $highest_score = $score;
                    }
                }
                
                echo "<tr><td>$username</td><td>$highest_score</td></tr>";
            }
            
            echo "</table>";
        ?>
    </div>
</div>

        <?php else: ?>
        <?php endif; ?>   
    </div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>