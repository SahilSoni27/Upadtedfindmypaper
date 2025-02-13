<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_papers";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Signup logic
if (isset($_POST['signup'])) {
    $email = $conn->real_escape_string($_POST['signup_email']);
    $password = password_hash($_POST['signup_password'], PASSWORD_DEFAULT);

    // Check if email already exists in the database
    $checkEmailQuery = "SELECT * FROM admin_users WHERE email = '$email'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        // If the email is already taken, redirect with an error message
        header("Location: login_signup.php?error=Email already taken. Please choose a different email.");
        exit;
    } else {
        // If the email is unique, insert the new user into the database
        $sql = "INSERT INTO admin_users (email, Superuser, password) VALUES ('$email', 'NO', '$password')";
        if ($conn->query($sql) === TRUE) {
            // Set a session variable to pass the user ID for the next step
            $_SESSION['user_id'] = $conn->insert_id;
            header("Location: login_signup.php?message=Signup successful. You can now log in.");
        } else {
            header("Location: login_signup.php?error=Error: " . $conn->error);
        }
        exit;
    }
}

// Login logic
if (isset($_POST['login'])) {
    $email = $conn->real_escape_string($_POST['login_email']);
    $password = $_POST['login_password'];

    $sql = "SELECT * FROM admin_users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // Set session variables for authenticated user
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_email'] = $email;
            $_SESSION['Superuser'] = $user['Superuser'];

            if ($user['Superuser'] === 'YES') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: index.php");
            }
            exit;
        } else {
            header("Location: login_signup.php?error=Invalid email or password.");
        }
    } else {
        header("Location: login_signup.php?error=Invalid email or password.");
    }
    exit;
}

$conn->close();
?>
