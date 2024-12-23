<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engineering Branches</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJzQ6QJvAu6h3A25a1pzWbFkmP1wbFj5lrP5dyV0VST+gS+Qgy4CEXtOd6zF" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .branch-button {
            font-size: 18px;
            padding: 10px;
            text-align: center;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            height: 70px;
            width: 525px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.3s ease-in-out;
            margin-bottom: 20px;
            overflow: hidden;
            word-wrap: break-word;
            text-overflow: ellipsis;
        }
        .branch-button:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
        }
        .branch-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 10px;
        }
        .branch-title {
            text-align: center;
            margin-bottom: 40px;
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }
        .branch-button i, .branch-button img {
            font-size: 35px;
            margin-right: 15px;
        }
        @media (max-width: 768px) {
            .branch-button {
                width: 400px;
                height: 60px;
            }
            .branch-title h2 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="branch-title">
            <h2>Engineering Branches</h2>
        </div>

        <div class="row branch-container">
            <button class="btn btn-secondary branch-button" onclick="redirectToBranch('cse')">
                <i class="bi bi-laptop"></i> Computer Engineering
            </button>
            <button class="btn btn-dark branch-button" onclick="redirectToBranch('ict')">
                <i class="bi bi-globe"></i> Information & Communication Technology
            </button>
        </div>

        <div class="row branch-container">
            <button class="btn btn-success branch-button" onclick="redirectToBranch('ee')">
                <i class="bi bi-battery-full"></i> Electrical Engineering
            </button>
            <button class="btn btn-primary branch-button" onclick="redirectToBranch('ece')">
                <i class="bi bi-broadcast"></i> Electronics & Communication Engineering
            </button>
        </div>

        <div class="row branch-container">
            <button class="btn btn-warning branch-button" onclick="redirectToBranch('civil')">
                <i class="bi bi-building"></i> Civil Engineering
            </button>
            <button class="btn btn-danger branch-button" onclick="redirectToBranch('mech')">
                <i class="bi bi-gear"></i> Mechanical Engineering
            </button>
        </div>

        <div class="row branch-container">
            <button class="btn btn-info branch-button" onclick="redirectToBranch('chem')">
                <img src="https://img.icons8.com/ios/50/000000/test-tube.png" alt="Chemical Engineering"> Chemical Engineering
            </button>
            <button class="btn btn-primary branch-button" onclick="redirectToBranch('petro')">
                <i class="bi bi-fuel-pump"></i> Petroleum Engineering
            </button>
        </div>

        <div class="row branch-container">
            <button class="btn btn-success branch-button" onclick="redirectToBranch('bio')">
                <i class="bi bi-flower1"></i> Biotechnology
            </button>
        </div>
    </div>

    <!-- JavaScript to handle the redirection with parameters -->
    <script>
        function redirectToBranch(branch) {
            window.location.href = 'dashboard.php?branch=' + branch;
        }
    </script>

    <!-- Bootstrap JS (Optional for any interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0pL0q6EdP5gI+YOTa5FfmGZj4CpFQ4R1G0v8g8GFi/FlRmzt" crossorigin="anonymous"></script>
</body>
</html>
