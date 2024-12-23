<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindMyPaper</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1e1e1e;
            padding: 15px 30px;
            color: #e0e0e0;
        }
        .navbar .brand {
            font-size: 1.8em;
            font-weight: bold;
            color: #ffffff;
            text-decoration: none;
            transition: text-shadow 0.3s;
        }
        .navbar .brand:hover {
            text-shadow: 2px 2px 4px rgba(70, 130, 180, 0.5);
        }
        .navbar .nav-button {
            background-color: #333;
            color: #e0e0e0;
            border: 2px solid transparent;
            border-radius: 20px;
            padding: 8px 20px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: color 0.3s, border-color 0.3s;
        }
        .navbar .nav-button:hover {
            color: #4682B4;
            border-color: #4682B4;
        }

        /* Main container */
        .main-container {
            width: 70%;
            background-color: #e0e0e0;
            padding: 160px 30px;
            text-align: left;
            margin-left: 0;
            position: relative;
            color: #121212;
            flex-grow: 1;
        }

        .main-container h2 {
            font-size: 2.5em;
            font-weight: bold;
            margin: 0;
        }

        /* Style for the image */
        .main-container img {
            position: absolute;
            right: -30%;
            top: 45%;
            transform: translateY(-50%);
            width: 40%;
            height: 75%;
            z-index: 0;
            opacity: 0.9;
        }

        /* Knowledge container */
        .knowledge-container {
            display: flex;
            align-items: center;
            background-color: #1e1e1e;
            color: #e0e0e0;
            width: 100%;
            max-width: 100%;
            margin-top: 20px;
            margin-bottom: 40px;
            padding: 40px 0;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.4);
        }

        /* Image style for quiz icon */
        .knowledge-container img {
            width: 80px;
            height: 80px;
            margin-right: 20px;
        }

        /* Text area style */
        .knowledge-text {
            flex: 1;
        }

        .knowledge-text h2 {
            font-size: 2em;
            font-weight: bold;
            margin: 0;
            color: #ffffff;
        }

        .knowledge-text .line {
            width: 50px;
            height: 4px;
            background-color: #4682B4;
            margin: 15px 0;
            border-radius: 2px;
        }

        .knowledge-text p {
            font-size: 1.1em;
            color: #b0b0b0;
            margin: 0;
        }

        /* Features Section */
        .features-container {
            background-color: #282828;
            padding: 40px 0;
            border-radius: 12px;
            margin: 40px 0;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.4);
        }
        .features-container h2 {
            font-size: 2em;
            color: #ffffff;
            margin-bottom: 15px;
            text-align: center;
        }
        .feature {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .feature img {
            width: 50px;
            height: 50px;
            margin-right: 15px;
        }
        .feature p {
            font-size: 1.1em;
            color: #b0b0b0;
        }

        /* Footer */
        .footer {
            background-color: #1e1e1e;
            color: #e0e0e0;
            text-align: center;
            padding: 15px;
            font-size: 0.9em;
        }
        .footer a {
            color: #4682B4;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s;
        }
        .footer a:hover {
            color: #e0e0e0;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <a href="#" class="brand">FindMyPaper</a>
    <a href="#" class="nav-button">Login | Join</a>
</nav>

<!-- Main Container -->
<div class="main-container">
    <h2>Access Your Study Materials Anytime, Anywhere</h2>
    <img src="https://via.placeholder.com/800x400.png?text=Sample+Image" alt="Decorative Image"> <!-- Placeholder image -->
</div>

<!-- Page Content -->
<div style="padding: 20px;">
    <h1>Welcome to FindMyPaper</h1>
    <p>Your one-stop platform for accessing notes, previous year papers, and study guides tailored for students. Join our community and enhance your academic journey.</p>
</div>

<!-- Features Section -->
<div class="features-container">
    <h2>Why Choose FindMyPaper?</h2>
    <div class="feature">
        <img src="https://via.placeholder.com/50.png?text=Notes" alt="Notes Icon"> <!-- Placeholder icon for notes -->
        <p>Access a comprehensive library of curated study materials, including notes and exam papers.</p>
    </div>
    <div class="feature">
        <img src="https://via.placeholder.com/50.png?text=Community" alt="Community Icon"> <!-- Placeholder icon for community -->
        <p>Connect with peers and contribute to a collaborative, student-driven content library.</p>
    </div>
    <div class="feature">
        <img src="https://via.placeholder.com/50.png?text=Personalized" alt="Personalized Icon"> <!-- Placeholder icon for recommendations -->
        <p>Receive personalized recommendations based on your academic needs and interests.</p>
    </div>
</div>

<!-- Knowledge Container -->
<div class="knowledge-container">
    <!-- Test Icon Image -->
    <img src="https://via.placeholder.com/80.png?text=Quiz+Icon" alt="Quiz Icon"> <!-- Placeholder quiz icon -->
    
    <!-- Text Content -->
    <div class="knowledge-text">
        <h2>Measure Your Knowledge</h2>
        <div class="line"></div>
        <p>Challenge yourself with quizzes and test your knowledge on various subjects to track your progress.</p>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    <p>&copy; 2024 FindMyPaper. All rights reserved. | 
       <a href="#">Privacy Policy</a> |
       <a href="#">Terms of Service</a> |
       <a href="#">Contact Us</a>
    </p>
</div>

</body>
</html>
