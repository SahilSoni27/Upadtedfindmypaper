<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Signup</title>
    <link rel="stylesheet" href="css/loginpage.css">
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <button id="loginTab" class="active-tab" onclick="showLogin()">Sign in</button>
            <button id="signupTab" onclick="showSignup()">New account</button>
        </div>

        <!-- Display Error or Success Message -->
        <div id="messageContainer"></div>

        <!-- Login Form -->
        <div id="loginForm">
            <h2>Login</h2>
            <form method="POST" action="auth.php">
                <label for="login_email">E-mail</label>
                <input type="email" id="login_email" name="login_email" required>

                <label for="login_password">Password</label>
                <input type="password" id="login_password" name="login_password" required>

                <div class="remember-me">
                    <input type="checkbox" id="remember_me" name="remember_me">
                    <label for="remember_me">Remember me</label>
                </div>

                <button type="submit" name="login">Login</button>
            </form>
        </div>

        <!-- Signup Form -->
        <div id="signupForm" style="display:none;">
            <h2>Signup</h2>
            <form method="POST" action="auth.php">
                <label for="signup_email">E-mail</label>
                <input type="email" id="signup_email" name="signup_email" required>

                <label for="signup_password">Password</label>
                <input type="password" id="signup_password" name="signup_password" required>

                <button type="submit" name="signup">Signup</button>
            </form>
        </div>
    </div>

    <script>
        function showLogin() {
            document.getElementById('loginForm').style.display = 'block';
            document.getElementById('signupForm').style.display = 'none';
            document.getElementById('loginTab').classList.add('active-tab');
            document.getElementById('signupTab').classList.remove('active-tab');
        }

        function showSignup() {
            document.getElementById('signupForm').style.display = 'block';
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('signupTab').classList.add('active-tab');
            document.getElementById('loginTab').classList.remove('active-tab');
        }

        // Function to display message from URL parameters
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const error = urlParams.get('error');
            const message = urlParams.get('message');
            const messageContainer = document.getElementById('messageContainer');

            if (error) {
                messageContainer.innerHTML = `<div style="color: red;">${error}</div>`;
            }

            if (message) {
                messageContainer.innerHTML = `<div style="color: green;">${message}</div>`;
            }
        }
    </script>
</body>
</html>




