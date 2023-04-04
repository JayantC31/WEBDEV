<!DOCTYPE html>
<html>
<head>
	<title>Play Pairs</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	<script type="text/javascript" src="SaveCookie.js"></script>
    <script src="startgame.js"></script>
</head>

<body>
	<?php include 'navbar.php'; ?>
    <div class="game-container" style="text-align:center">
        <button id="start-game-btn" onclick="startGame()">Start Game</button>
        <div id="game-container"></div>
        <div id="timer-container" style="display: none;">
            Time: <span id="timer">00:00</span>
        </div>
        <div id="score-container" style="display: none;">
            Score: <span id="score">0</span>
        </div>  
    </div>
	

	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
