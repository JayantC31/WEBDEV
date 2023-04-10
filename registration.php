<!DOCTYPE html>
<html>
<!-- Registration page -->
<head>
	<title>Play Pairs</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	<!-- This links the style sheets and bootstrap to the page -->
	<script type="text/javascript" src="SaveCookie.js"></script>
	<!-- This links the javascript to the page -->
</head>

<body>
	<?php include 'navbar.php'; ?>
	<!-- Add navbar to page -->
	<div id="main" style="text-align:center; backdrop-filter: blur(15px);">
		<style>.custom-button { background-color: none; color: white; font-size: 30px; padding: 10px;}
		</style>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<!-- Save as username cookie -->
					<form action="emoji_cookies.php" method="post" onsubmit="return saveUsernameCookie();">
						<div class="form-group">
							<!-- This is the form for the user to register their username -->
							<h1>Username</h1>
							<input type="text" class="form-control" id="username" name="username">
							<span class="text-danger" id="username-error"></span>
						</div>
						<!-- Save as emoji cookie based on the 3 features -->
						<div class="form-group">
							<h1>Select your avatar</h1>
							<fieldset>
								<legend>Skin</legend>
								<?php
								// Specify the directory path
								$dir = 'emoji assets/skin/';
								// Get all files in the directory
								$files = scandir($dir);
								// Loop through the files and display each image
								foreach($files as $file) {
									// Only display image files
									if(pathinfo($file, PATHINFO_EXTENSION) == 'png') {
										// Get the file path
										$filePath = $dir . $file;
										echo '<img src="' . $filePath . '" alt="skin" width="40" height="40">';
										echo ' </t>';
										// Display the image with a radio button
										echo '<input type="radio" name="skin" value="' . $filePath . '" >';
										echo ' </t>';
									}
								}
								?>
							</fieldset>
							<fieldset>
								<legend>Mouth</legend>
								<?php
								// Specify the directory path
								$dir = 'emoji assets/mouth/';
								// Get all files in the directory
								$files = scandir($dir);
								// Loop through the files and display each image
								foreach($files as $file) {
									// Only display image files
									if(pathinfo($file, PATHINFO_EXTENSION) == 'png') {
										// Get the file path
										$filePath = $dir . $file;
										echo '<img src="' . $filePath . '" alt="mouth" width="50" height="50">';
										echo ' </t>';
										// Display the image with a radio button
										echo '<input type="radio" name="mouth" value="' . $filePath . '">';
										echo ' </t>';
									}
								}
								?>
							</fieldset>
							<fieldset>
								<legend>Eyes</legend>
								<?php
								// Specify the directory path
								$dir = 'emoji assets/eyes/';
								// Get all files in the directory
								$files = scandir($dir);
								// Loop through the files and display each image
								foreach($files as $file) {
									// Only display image files
									if(pathinfo($file, PATHINFO_EXTENSION) == 'png') {
										// Get the file path
										$filePath = $dir . $file;
										echo '<img src="' . $filePath . '" alt="eyes" width="50" height="50">';
										echo ' </t>';
										// Display the image with a radio button
										echo '<input type="radio" name="eyes" value="' . $filePath . '">';
										echo ' </t>';
									}
								}
								?>
							</fieldset>	
						</div>
						<!-- This is the button to send the user back to the landing page and save the cookies  -->
						<button type="submit" class="btn btn-primary">Register</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Add jquery and bootstrap scripts to make page dynamic and enable responsive development -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
