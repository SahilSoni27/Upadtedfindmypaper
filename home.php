<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindMyPaper</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #00274d;
            padding: 15px 30px;
            color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar .brand {
            font-size: 1.8em;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            transition: color 0.3s;
        }

        .navbar .brand:hover {
            color: #1e90ff;
        }

        .navbar .nav-button {
            background-color: #1e90ff;
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        .navbar .nav-button:hover {
            background-color: #fff;
            color: #1e90ff;
            transform: scale(1.05);
        }
        

        /* Hero Section */
        .hero {
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px 30px;
            background-color: #eaf2f8;
        }

        .hero-text {
            max-width: 60%;
        }

        .hero-text h1 {
            font-size: 2.8em;
            font-weight: bold;
            color: #00274d;
            margin-bottom: 20px;
        }

        .hero-text p {
            font-size: 1.2em;
            margin: 20px 0;
            color: #444;
            line-height: 1.6;
        }
        .hero-text .nav-button{
            background-color: #1e90ff;
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        .hero-text .nav-button:hover {
            background-color: #fff;
            color: #1e90ff;
            transform: scale(1.05);
        }

        .hero img {
            max-width: 35%;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
        }
        .hero video {
            max-width: 35%;
            max-height: 356px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
        }

        .hero .nav-button {
            margin-top: 20px;
        }

        /* Features Section */
        .features {
            padding: 40px 20px;
            background-color: #fff;
        }

        .features h2 {
            text-align: center;
            font-size: 2em;
            color: #00274d;
            margin-bottom: 30px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .feature {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .feature:hover {
            transform: translateY(-5px);
        }

        .feature i {
            font-size: 50px;
            color: #1e90ff;
        }

        .feature h3 {
            font-size: 1.4em;
            margin: 15px 0;
            color: #00274d;
        }

        .feature p {
            color: #555;
        }

        /* Footer */
        .footer {
            background-color: #1e1e1e;
            color: #ccc;
            text-align: center;
            padding: 20px;
            font-size: 0.9em;
            margin-top: auto;
        }

        .footer a {
            color: #1e90ff;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s;
        }

        .footer a:hover {
            color: #fff;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                text-align: center;
            }

            .hero-text {
                max-width: 100%;
            }

            .hero img {
                max-width: 100%;
                margin-top: 20px;
            }
            .hero video{
                max-width: 100%;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="#" class="brand">FindMyPaper</a>
        <a href="login_signup.html" class="nav-button">Login</a>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-text">
            <h1>Find Your Study Materials with Ease</h1>
            <p>Access curated notes, previous year papers, and study guides tailored to your academic needs. Join our platform to elevate your learning experience!</p>
            <a href="index.php" class="nav-button">Past Papers</a>
        </div>
        
        <video autoplay loop muted src="css/findmypaper.mp4">FindMyPaper</video>
    </section>

    <!-- Features Section -->
    <section class="features">
        <h2>Why Choose Us?</h2>
        <div class="features-grid">
            <div class="feature">
                <i class="material-icons">library_books</i>
                <h3>Extensive University Papers</h3>
                <p>Access a wide collection of past papers from various universities.</p>
            </div>
            <div class="feature">
                <i class="material-icons">group</i>
                <h3>Growing Resource Hub</h3>
                <p>Currently offering university papers, with plans to add college notes soon.</p>
            </div>
            <div class="feature">
                <i class="material-icons">insights</i>
                <h3>Future Personalization</h3>
                <p>Tailored academic recommendations coming soon!</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 FindMyPaper. All rights reserved. | 
            <a href="#">Privacy Policy</a> |
            <a href="#">Terms of Service</a> |
            <a href="#">Contact Us</a>
        </p>
    </footer>
</body>
</html>
