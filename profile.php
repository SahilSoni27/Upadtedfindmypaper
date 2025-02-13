<?php
session_start();
include 'auth_check.php';
include 'db_connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_logged_in']) || !$_SESSION['user_logged_in']) {
    header("Location: login_signup.php");
    exit;
}

// Get the current user's email
$userEmail = $_SESSION['user_email'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <?php include('navbar2.php'); ?>
    <div class="profile-container">
        <h1>Profile</h1>
        <p><b>Email</b>: <?php echo $userEmail; ?></p>
        <p class="welcome-message">Thank you for choosing <span>FindMyPaper!</span> We're excited to help you find past college and university papers. </p>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
