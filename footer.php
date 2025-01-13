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
            text-align: center;
            padding: 15px;
            background-color: #222;
            color: #fff;
            font-size: 0.9rem;
            margin-top: auto;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin: 0;
        }

        
    </style>
</head>
<body>
    <footer>
        <p>&copy; 2024 FindMyPaper. All Rights Reserved.</p>
    </footer>
</body>
</html>
