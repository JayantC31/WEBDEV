function startGame() {
    // Hide the start game button
    document.getElementById("start-game-btn").style.display = "none";
  
    // Show the timer container
    document.getElementById("timer-container").style.display = "block";
    
    // Show the score container
    document.getElementById("score-container").style.display = "block";

    document.getElementById("game-container").style.display = "block";

    document.getElementById("game-over-container").style.display = "flex";

    document.getElementById("restart-game-container").style.display = "flex";
        
    let time = 0;

    let timerInterval = setInterval(updateTimer, 1000); // Update the timer every second
    let timerStop = setInterval(stopTimer, 120000); // Stop the timer after 2 minutes
    function updateTimer() {
      time++;
      const minutes = Math.floor(time / 60).toString().padStart(2, '0');
      const seconds = (time % 60).toString().padStart(2, '0');
      const timerDisplay = `${minutes}:${seconds}`;
      document.getElementById('timer').textContent = timerDisplay;
    }
    function stopTimer() {
      clearInterval(timerInterval);
      document.getElementById('timer').textContent = timerDisplay;
    }
    
    // Add background music to the game
    const audio = new Audio('music.mp3');
    audio.volume = 1; // Keep volume at 100%
    audio.loop = true; // Loop the audio
    audio.play(); // Start playing the audio
  
    
    const cards = document.querySelectorAll('.card');
    let hasFlippedCard = false;
    let lockBoard = false;
    let firstCard = null;
    let secondCard = null;
    let moves = 0;
    let correctMoves = 0;
    let timer = null;
    let score = 0;
                
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
            if (time < 10) {
                score += Math.round(20 + moves/correctMoves);
            } else if (time < 15) {
                score += Math.round(18 + moves/correctMoves);    
            } else if (time < 30) {
                score += Math.round(15 + moves/correctMoves);
            } else if (time < 45) {
                score += Math.round(10 + moves/correctMoves);
            } else if (time < 75) {
                score += Math.round(5 + moves/correctMoves);
            } else if (time < 120) {
                score += Math.round(3 + moves/correctMoves);
            }
            document.getElementById("score").innerHTML = (score);
            firstCard = null;
            secondCard = null;
            if (correctMoves == 5) {
                checkGameCompletion();}
            firstCard.removeEventListener('click', flipCard);
            secondCard.removeEventListener('click', flipCard);
            
            
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
        if (correctMoves == 5) {
            stopTimer();
        }}

    function resetBoard() {
    [hasFlippedCard, lockBoard] = [false, false];
    [firstCard, secondCard] = [null, null];
    }

   
    function restartGame() {
        console.log("Restarting game...");
        hasFlippedCard = false;
        lockBoard = false;
        firstCard = null;
        secondCard = null;
        moves = 0;
        correctMoves = 0;
        time = 0;
        
        // Reset timer display
        document.getElementById('timer').textContent = '00:00';
        
        // Reset score and moves display
        document.getElementById('score').textContent = '0';
        document.getElementById('moves').textContent = '0';

        // Flip all cards back to their initial state
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => card.classList.remove('card-flip'));
        
        // Reload page to reload all emoji cards and start a new game
        location.reload();
        
    }
    
    function CheckGameDone(){
        // check if game is done
        if (correctMoves == 5) {
            // if game is done, user is sent to leaderboard.php
            document.cookie = `time=${time}; expires=${new Date(Date.now() + 86400e3).toUTCString()}`;
            document.cookie = `score=${score}; expires=${new Date(Date.now() + 86400e3).toUTCString()}`;
            document.cookie = `moves=${moves}; expires=${new Date(Date.now() + 86400e3).toUTCString()}`;
            window.location.href = 'leaderboard.php';
            
        }}
            


    // Get the restart button element
    const restartButton = document.getElementById('restart-btn');
    console.log(restartButton);
    // Add an event listener for when the restart button is clicked
    restartButton.addEventListener('click', restartGame);
    
    const leaderboardButton = document.getElementById('leaderboard-btn');
    console.log(leaderboardButton);
    leaderboardButton.addEventListener('click', CheckGameDone);

    






  }