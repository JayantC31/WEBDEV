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
        <div id="game-container" style="display: none;">
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
                    <script>
                        // Get all the cards
                        const cards = document.querySelectorAll('.card');
                        let hasFlippedCard = false;
                        let lockBoard = false;
                        let firstCard = null;
                        let secondCard = null;
                        let moves = 0;
                        let correctMoves = 0;
                        let timer = null;
                                    
                        cards.forEach(card => {
                        card.addEventListener('click', () => {
                            // Check if both cards have already been matched
                            if (firstCard && secondCard) {
                            return;
                            }
                            
                            card.classList.toggle('card-flip');
                            moves++;
                            document.getElementById("moves").innerHTML = moves;



                            if (!firstCard) {
                            // This is the first card that has been clicked
                            firstCard = card;
                            } else if (!secondCard) {
                            // This is the second card that has been clicked
                            secondCard = card;

                            // Compare the contents of the two cards
                            if (firstCard.querySelector('.card-back').innerHTML === secondCard.querySelector('.card-back').innerHTML) {
                                // The cards match, keep them flipped over
                                correctMoves++;
                                firstCard = null;
                                secondCard = null;
                                firstCard.removeEventListener('click', flipCard);
                                secondCard.removeEventListener('click', flipCard);
                                checkGameCompletion();
                                
                            } else {
                                // The cards don't match, flip them back over
                                setTimeout(() => {
                                firstCard.classList.toggle('card-flip');
                                secondCard.classList.toggle('card-flip');
                                firstCard = null;
                                secondCard = null;
                                }, 1000);
                            }
                            }
                        });
                        });





                        function disableCards() {
                        firstCard.removeEventListener('click', flipCard);
                        secondCard.removeEventListener('click', flipCard);

                        resetBoard();
                        
                        checkGameCompletion();
                        }

                        function unflipCards() {
                        lockBoard = true;

                        setTimeout(() => {
                            firstCard.classList.remove('selected');
                            secondCard.classList.remove('selected');

                            resetBoard();
                        }, 1000);
                        }

                        function checkGameCompletion() {
                        const flippedCards = document.querySelectorAll('.card-flip');
                        setTimeout(()=> {
                            if (flippedCards.length === cards.length) {
                            // All pairs have been matched, game is completed
                            print('Congratulations! You have completed the game!');
                            
                            
                        } }, 1000);
                        
                        }


                        function resetBoard() {
                        [hasFlippedCard, lockBoard] = [false, false];
                        [firstCard, secondCard] = [null, null];
                        }
                    </script>   
                    

                </div>
                
            </div>
           
        </div>
                  
    
    </div>
    
        <div id="timer-container" style="display: none;">
            Time: <span id="timer">00:00</span>
            
        </div>
        <div id="score-container" style="display: none;">
            Score: <span id="score">0</span><br>
            Moves: <span id="moves">0</span>
        </div>
        
        

        
    </div>
	

	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
