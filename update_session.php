<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update session variables based on the dropdown selections
    if (isset($_POST['college'])) {
        $_SESSION['college'] = $_POST['college'];
    }
    if (isset($_POST['branch'])) {
        $_SESSION['branch'] = $_POST['branch'];
    }
    if (isset($_POST['present_year'])) {
        $_SESSION['present_year'] = $_POST['present_year'];
    }

    echo "Session updated successfully!";
}
?>
