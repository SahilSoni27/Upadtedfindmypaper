<?php
session_start();
include 'db_connection.php';  // Include the database connection

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'];

// Get the current user's email (if logged in)
$userEmail = $isLoggedIn ? $_SESSION['user_email'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindMyPaper</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/navbar2.css">
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <div class="left-section">
        <div class="menu-icon" onclick="toggleSidebar()" style="color: white;">☰</div>
        <div class="brand">FindMyPaper</div>
        <div class="separator"></div>   
    </div>

    <!-- Profile and Login Icons -->
    <div class="icons">
        <?php if ($isLoggedIn): ?>
            <!-- Show profile icon and dropdown if logged in -->
            <div class="profile-icon" onclick="toggleDropdown()">
                <img src="img/user.png" alt="Profile Icon" class="rounded-circle" width="30" height="30">
                <div class="profile-dropdown" id="profileDropdown">
                    <a href="profile.php">Profile</a>
                    <div class="dropdown-divider"></div>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        <?php else: ?>
            <!-- Show login button if not logged in -->
            <a href="login_signup.php" class="login-button">Login</a>
        <?php endif; ?>
    </div>
</div>

<!-- Sidebar menu -->
<div class="sidebar" id="sidebar">
    <h3>Menu</h3>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="dashboard.php">Past Papers</a></li>
        <li><a href="notes.php">Notes</a></li>
        <li><a href="contactus.php">Contact Us</a></li>
    </ul>
</div>

<script>
    // Function to toggle sidebar
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('open');
    }

    // Function to toggle profile dropdown
    function toggleDropdown(event) {
        const dropdown = document.getElementById('profileDropdown');
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    }

    // Close dropdown if clicked outside
    window.onclick = function(event) {
        const dropdown = document.getElementById('profileDropdown');
        if (!event.target.closest('.profile-icon')) {
            dropdown.style.display = 'none';
        }
    };
</script>

</body>
</html>
