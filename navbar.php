<?php
include 'auth_check.php';
session_start();
include 'db_connection.php';  // Include the database connection

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindMyPaper</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/navbar.css">
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <div class="left-section">
        <div class="menu-icon" onclick="toggleSidebar()">☰</div>
        <div class="brand">FindMyPaper</div>
        <div class="separator"></div>

        <!-- College Dropdown -->
        <select id="college" name="college" onchange="updateSession()">
            <option value="">Select College</option>
            <?php
            $query = "SELECT DISTINCT college FROM papers";
            $colleges = $conn->query($query);
            while ($row = $colleges->fetch_assoc()) {
                $selected = isset($_SESSION['college']) && $_SESSION['college'] == $row['college'] ? 'selected' : '';
                echo "<option value='{$row['college']}' $selected>{$row['college']}</option>";
            }
            ?>
        </select>
        <div class="separator"></div>

        <!-- Branch Dropdown -->
        <select id="branch" name="branch" onchange="updateSession()">
            <option value="">Select Branch</option>
            <?php
            $query = "SELECT DISTINCT branch FROM papers";
            $branches = $conn->query($query);
            while ($row = $branches->fetch_assoc()) {
                $selected = isset($_SESSION['branch']) && $_SESSION['branch'] == $row['branch'] ? 'selected' : '';
                echo "<option value='{$row['branch']}' $selected>{$row['branch']}</option>";
            }
            ?>
        </select>
        <div class="separator"></div>

        <!-- Year Dropdown -->
        <select id="present_year" name="present_year" onchange="updateSession()">
            <option value="">Select Year</option>
            <?php
            $query = "SELECT DISTINCT present_year FROM papers";
            $years = $conn->query($query);
            while ($row = $years->fetch_assoc()) {
                $selected = isset($_SESSION['present_year']) && $_SESSION['present_year'] == $row['present_year'] ? 'selected' : '';
                echo "<option value='{$row['present_year']}' $selected>{$row['present_year']}</option>";
            }
            ?>
        </select>
    </div>

    <!-- Profile and Location Icons -->
    <div class="icons">
        <div class="location-container" onclick="alert('Location clicked!')">
            <div class="location-icon"><i class="fas fa-map-marker-alt"></i></div> <!-- Font Awesome location icon -->
            <div class="location-text">Location</div> <!-- Location text -->
        </div>
        <div class="profile-icon" onclick="toggleDropdown()">
            <img src="assests\images\profileicon.png" alt="Profile Icon" class="rounded-circle" width="30" height="30">
            <div class="profile-dropdown" id="profileDropdown">
                <a href="#">Profile</a>
                <a href="#">My Purchases</a>
                <div class="dropdown-divider"></div>
                <a href="#">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Sidebar menu -->
<div class="sidebar" id="sidebar">
    <h3>Menu</h3>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Notes</a></li>
        <li><a href="#">Previous Papers</a></li>
        <li><a href="#">Resources</a></li>
        <li><a href="#">Contact Us</a></li>
    </ul>
</div>

<script>
    // Function to toggle sidebar
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('open');
    }

    // Function to toggle profile dropdown
    function toggleDropdown() {
        const dropdown = document.getElementById('profileDropdown');
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    }

    // Function to update session via AJAX and refresh the page
    function updateSession() {
        const college = document.getElementById('college').value;
        const branch = document.getElementById('branch').value;
        const presentYear = document.getElementById('present_year').value;

        const formData = new FormData();
        formData.append('college', college);
        formData.append('branch', branch);
        formData.append('present_year', presentYear);

        fetch('update_session.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data); // Optionally handle the server's response

            // Reload the page after updating the session to retain the selected values
            location.reload();
        })
        .catch(error => {
            console.error('Error updating session:', error);
        });
    }

    // Close dropdown if clicked outside
    window.onclick = function(event) {
        const dropdown = document.getElementById('profileDropdown');
        if (!event.target.matches('.profile-icon') && !event.target.matches('.profile-dropdown')) {
            dropdown.style.display = 'none';
        }
    };
</script>

</body>
</html>
