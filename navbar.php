<?php
// include 'auth_check.php';
session_start();
include 'db_connection.php';  // Include the database connection

// Check if the user is logged in
// if (!isset($_SESSION['user_logged_in']) || !$_SESSION['user_logged_in']) {
//     header("Location: login_signup.php");
//     exit;
// }

// Get the current user's email
// $userEmail = $_SESSION['user_email'];

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
    <link rel="stylesheet" href="css/navbar.css">
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <div class="left-section">
    <div class="menu-icon" onclick="toggleSidebar()" style="color: white;">☰</div>
        <div class="brand">FindMyPaper</div>
        <div class="separator"></div>

        <!-- College Dropdown -->
        <select id="college" name="college" onchange="fetchBranchesAndUpdateSession()" style="border-radius: 11px;">
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
        <select id="branch" name="branch" onchange="fetchPresentYearsAndUpdateSession()"style="border-radius: 11px;">
            <option value="">Select Branch</option>
            <?php
            if (isset($_SESSION['college'])) {
                $query = "SELECT DISTINCT branch FROM papers WHERE college = '{$_SESSION['college']}'";
                $branches = $conn->query($query);
                while ($row = $branches->fetch_assoc()) {
                    $selected = isset($_SESSION['branch']) && $_SESSION['branch'] == $row['branch'] ? 'selected' : '';
                    echo "<option value='{$row['branch']}' $selected>{$row['branch']}</option>";
                }
            }
            ?>
        </select>
        <div class="separator"></div>

        <!-- Year Dropdown -->
        <select id="present_year" name="present_year" onchange="updateSession()" style="border-radius: 11px;">
            <option value="">Select Sem</option>
            <?php
            if (isset($_SESSION['college']) && isset($_SESSION['branch'])) {
                $query = "SELECT DISTINCT present_year FROM papers WHERE college = '{$_SESSION['college']}' AND branch = '{$_SESSION['branch']}'";
                $years = $conn->query($query);
                while ($row = $years->fetch_assoc()) {
                    $selected = isset($_SESSION['present_year']) && $_SESSION['present_year'] == $row['present_year'] ? 'selected' : '';
                    echo "<option value='{$row['present_year']}' $selected>{$row['present_year']}</option>";
                }
            }
            ?>
        </select>

    </div>

    <!-- Profile and Location Icons -->
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
        <li><a href="dashboard.php">Previous Papers</a></li>
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

    function fetchBranchesAndUpdateSession() {
        const college = document.getElementById('college').value;

        if (college) {
            fetch(`fetch_dynamic_options.php?college=${college}`)
                .then(response => response.json())
                .then(data => {
                    const branchDropdown = document.getElementById('branch');
                    branchDropdown.innerHTML = `<option value="">Select Branch</option>`;
                    data.branches.forEach(branch => {
                        branchDropdown.innerHTML += `<option value="${branch}">${branch}</option>`;
                    });

                    updateSession(); // Update session for college
                    // Clear present_year dropdown since it's dependent on branch
                    document.getElementById('present_year').innerHTML = `<option value="">Select Sem</option>`;
                })
                .catch(error => console.error('Error fetching branches:', error));
        }
    }

    function fetchPresentYearsAndUpdateSession() {
        const college = document.getElementById('college').value;
        const branch = document.getElementById('branch').value;

        if (college && branch) {
            fetch(`fetch_dynamic_options.php?college=${college}&branch=${branch}`)
                .then(response => response.json())
                .then(data => {
                    const yearDropdown = document.getElementById('present_year');
                    yearDropdown.innerHTML = `<option value="">Select Sem</option>`;
                    data.present_years.forEach(year => {
                        yearDropdown.innerHTML += `<option value="${year}">${year}</option>`;
                    });

                    updateSession(); // Update session for branch
                })
                .catch(error => console.error('Error fetching present years:', error));
        }
    }

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



    // // Function to update session via AJAX and refresh the page
    // function updateSession() {
    //     const college = document.getElementById('college').value;
    //     const branch = document.getElementById('branch').value;
    //     const presentYear = document.getElementById('present_year').value;

    //     const formData = new FormData();
    //     formData.append('college', college);
    //     formData.append('branch', branch);
    //     formData.append('present_year', presentYear);

    //     fetch('update_session.php', {
    //         method: 'POST',
    //         body: formData
    //     })
    //     .then(response => response.text())
    //     .then(data => {
    //         console.log(data); // Optionally handle the server's response

    //         // Reload the page after updating the session to retain the selected values
    //         location.reload();
    //     })
    //     .catch(error => {
    //         console.error('Error updating session:', error);
    //     });
    // }

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
