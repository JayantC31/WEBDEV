<!DOCTYPE html>
<html>
<head>
	<title>Play Pairs</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	<script type="text/javascript" src="SaveCookie.js"></script>
    <script type="text/javascript" src="startgame.js"></script>
</head>

<body>
	<?php include 'navbar.php'; ?>
    <div class="game-container" style="text-align:center">
        <button id="start-game-btn" onclick="startGame()">Start Game</button>
        <div id="game-container"  style="display: none;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2>Pairs</h2>
                    <p>Match all pairs to win</p>
                    

                    <div class="row" id="card-grid">
                        <?php
                        // Array of skin, mouth, and eye options
                        $skinOptions = glob('emoji assets/skin/*.png');
                        $mouthOptions = glob('emoji assets/mouth/*.png');
                        $eyeOptions = glob('emoji assets/eyes/*.png');

                        // Shuffle the arrays
                        shuffle($skinOptions);
                        shuffle($mouthOptions);
                        shuffle($eyeOptions);

                        // Generate 5 pairs of emojis
                        $emojis = array();
                        for ($i = 0; $i < 5; $i++) {
                            // Randomly select a skin, mouth, and eye option
                            $skin = $skinOptions[array_rand($skinOptions)];
                            $mouth = $mouthOptions[array_rand($mouthOptions)];
                            $eye = $eyeOptions[array_rand($eyeOptions)];

                            // Combine the options to create an emoji
                            $emoji = array(
                                'front' => '',
                                'back' => '<div class="emoji">'.
                                          '<img src="' . $skin . '" alt="skin" style="position: absolute; width: 40px; height: 40px;">' . 
                                          '<img src="' . $mouth . '" alt="mouth" style="position: absolute; width: 40px; height: 40px;">' .
                                          '<img src="' . $eye . '" alt="eye" style="position: absolute; width: 40px; height: 40px;"></div>'
                            );

                            // Add the emoji to the array twice to create a pair
                            $emojis[] = $emoji;
                            $emojis[] = $emoji;
                        }

                        // Shuffle the array again to mix up the pairs
                        shuffle($emojis);

                        // Create the HTML for the cards
                        foreach ($emojis as $emoji) {
                            echo '<div class="card">
                                      <div class="card-front ' . $emoji['front'] . '"></div>
                                      <div class="card-back">' . $emoji['back'] . '</div>
                                  </div>';
                        }
                        ?>
                    </div>
                    
                </div>
                
            </div>
           
        </div>
                  
    
    </div>
                  
        <div id="timer-container" style="display: none;">
            Time: <span id="timer">00:00</span><br>
            
        </div>
        <div id="score-container" style="display: none;">
            Score: <span id="score">0</span><br>
            Moves: <span id="moves">0</span><br>
        </div>  
        <div id="button-container" style="display: flex; justify-content: space-between;">
            <div id="restart-game-container" style="display: none;">
                <button id="restart-btn"onclick=restartGame()>Play again</button>
            </div>

            <div id="game-over-container"style="display: none;">
                <button id="leaderboard-btn" onclick=CheckGameDone()>submit</button>
            </div>
        </div>
        

        
    </div>
	

	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
