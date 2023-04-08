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
            document.getElementById("score").innerHTML = correctMoves;
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
    
    setInterval(myFunction, 1000);


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
            // Save time, score, and moves as cookies
            document.cookie = "time=" + time + ";";
            document.cookie = "score=" + correctMoves + ";";
            document.cookie = "moves=" + moves + ";";
            
            

        }}

    function resetBoard() {
    [hasFlippedCard, lockBoard] = [false, false];
    [firstCard, secondCard] = [null, null];
    }
  }