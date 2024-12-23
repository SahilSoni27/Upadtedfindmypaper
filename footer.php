<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Example</title>
    <style>
        /* Ensures the body takes up the full height of the screen */
        html, body {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;  /* Makes the body a flex container with column direction */
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            width: 100%; /* Ensures the footer spans the entire width of the screen */
            box-sizing: border-box; /* Ensures padding doesn't affect the width calculation */
        }

        footer p {
            margin: 5px 0;
        }

        footer a {
            color: #f1f1f1;
            margin: 0 10px;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <footer>
        <p>&copy; 2024 Your Company Name. All Rights Reserved.</p>
        <p>
            <a href="#">Privacy Policy</a> |
            <a href="#">Terms of Service</a>
        </p>
    </footer>
</body>
</html>
