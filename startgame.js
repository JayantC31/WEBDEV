function startGame() {
    // Hide the start game button
    document.getElementById("start-game-btn").style.display = "none";
  
    // Show the timer container
    document.getElementById("timer-container").style.display = "block";
    
    let time = 0;
    let timerInterval = setInterval(updateTimer, 1000);
    
    function updateTimer() {
      time++;
      const minutes = Math.floor(time / 60).toString().padStart(2, '0');
      const seconds = (time % 60).toString().padStart(2, '0');
      const timerDisplay = `${minutes}:${seconds}`;
      document.getElementById('timer').textContent = timerDisplay;
    }
  
    

    // Add game elements to the game container
    // ...
  }