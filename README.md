# Web development ECM1417 - Jayant Chawla
All files

    - Contain Navbar
    - Includes links to Home/Play/Leaderboard/Register
    - Emoji shown in middle, if selected
    
    - Use Bootstrap, jquery
    - Includes multiple sounds

Index.php

    - Display welcome message
    - Button links to play/Leaderboard/Change User
    - Button link to register if not registered

Registration.php

    - Username textbox, saves as cookie
    - *Complex* - select, configure emoji avatar based on given emoji assets

Pairs.php

    - Start game button
    - *Medium* - 10 cards, random emojis
    - Emojis created from combining features
    - Game records score,moves,time taken,
    - Score calculated per correct move
    - Button to restart game, reset all values
    - Button to submit, only works if game is finished
    - Submit sends post request to leaderboard
    - Music plays during game
    - Animations when hovering over/flipping card

Leaderboard.php

    - Formatted table
    - Contains best score 
    - Works with multiple users in session

