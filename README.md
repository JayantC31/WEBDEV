# Web development ECM1417 - Jayant Chawla(720018152)
# Candiate number: 241275
# Jayant Chawla VM number: 60787

To access VM: ssh -p 60787 ecm1417@ml-lab-4d78f073-aa49-4f0e-bce2-31e5254052c7.ukwest.cloudapp.azure.com

Via ssh: ssh -p 60787 ecm1417@ml-lab-4d78f073-aa49-4f0e-bce2-31e5254052c7.ukwest.cloudapp.azure.com

To access game on web: http://ml-lab-4d78f073-aa49-4f0e-bce2-31e5254052c7.ukwest.cloudapp.azure.com:60787/index.php

All files

    - Contain Navbar
    - Includes links to Home/Play/Leaderboard/Register
    - Emoji shown in middle of navbar, if selected
    
    - Uses Bootstrap, jquery

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

