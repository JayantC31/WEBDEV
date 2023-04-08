<!DOCTYPE html>
<html>
<head>
	<title>Play Pairs</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	
</head>

<body>
	<?php include 'navbar.php'; ?>
	<div id="main" style="text-align:center">
		<style>.custom-button { background-color: none; color: white; font-size: 30px; padding: 10px;}</style>
		<?php if (isset($_COOKIE['username'])): ?>
            <h1>Leaderboard</h1>
            <h3>Latest Game : <?php echo $_COOKIE['username'];?><br> Score = , Time = </h3><br>
            <div style="background-color: grey; box-shadow: 0 0 5px grey; padding: 10px;">
                <table style="border-spacing: 2px;margin-left:auto;margin-right:auto;">
                    <thead>
                    <tr>
                        <th style="background-color: blue; color: white; padding: 5px; ">Username</th>
                        <th style="background-color: blue; color: white; padding: 5px; ">Best Score</th>
                    </tr>
                    </thead>
                    <tbody>
                    
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
