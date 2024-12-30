<?php
include 'auth_check.php';
session_start();
include 'db_connection.php';  // Include the database connection

// Check if the user is logged in
if (!isset($_SESSION['user_logged_in']) || !$_SESSION['user_logged_in']) {
    header("Location: login_signup.html");
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
    <title>FindMyPaper</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/navbar2.css">
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <div class="left-section">
        <div class="menu-icon" onclick="toggleSidebar()">☰</div>
        <div class="brand">FindMyPaper</div>
        <div class="separator"></div>   
    </div>

    <!-- Profile and Location Icons -->
    <div class="icons">
        <div class="profile-icon" onclick="toggleDropdown()">
            <img src="assests/images/profileicon.png" alt="Profile Icon" class="rounded-circle" width="30" height="30">
            <div class="profile-dropdown" id="profileDropdown">
                <a href="profile.php">Profile</a>
                <div class="dropdown-divider"></div>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Sidebar menu -->
<div class="sidebar" id="sidebar">
    <h3>Menu</h3>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="index.php">Previous Papers</a></li>
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
        // event.stopPropagation(); // Prevent the event from bubbling up to the window onclick
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
