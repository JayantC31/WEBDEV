<?php
// This is used to save the emoji options as cookies
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the selected avatar parts
    $skin = $_POST['skin'] ?? '';
    $mouth = $_POST['mouth'] ?? '';
    $eyes = $_POST['eyes'] ?? '';
    // Save the selected avatar parts as a cookie
    setcookie('avatar_skin', $skin, time() + 86400, '/');
    setcookie('avatar_mouth', $mouth, time() + 86400, '/');
    setcookie('avatar_eyes', $eyes, time() + 86400, '/');
    // Call the JavaScript function to save the username as a cookie
    echo '<script>saveUsernameCookie();</script>';
    // Redirect to the success page
    header('Location: index.php');
    exit;
}