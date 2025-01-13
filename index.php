<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>

    <?php include('navbar.php'); ?>

    <div class="container-wrapper">
        <!-- Sliding Sidebar -->
        <div class="slide-sidebar" id="sidebar">
            <h3>Filters</h3>
            <div class="expandable-section">
                <div class="expandable-header" onclick="toggleSection('year-options')">Year</div>
                <div id="year-options" class="radio-options">
                    <!-- Year options will be populated here dynamically -->
                </div>
            </div>
        </div>

        <div class="page">
            <div class="container">
                <h1>Welcome to the Student Dashboard</h1>
                <p>Here you can access previous year papers.</p>
            </div>

            <!-- Display Papers List -->
            <div id="papers-list">
                <!-- List of papers will be dynamically populated here -->
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function showExamOptions(yearOptions) {
            // Toggle the semester options based on selected year
            document.querySelectorAll('.exam-options').forEach(function (element) {
                element.style.display = 'none';
            });
            document.getElementById(yearOptions).style.display = 'block';
        }

        function fetchPapers() {
            const college = "<?php echo $_SESSION['college']; ?>"; // Get selected college from session
            const branch = "<?php echo $_SESSION['branch']; ?>"; // Get selected branch from session
            const presentYear = "<?php echo $_SESSION['present_year']; ?>"; // Get present year from session
            const year = $("input[name='year']:checked").val(); // Get selected year
            const semester = $("input[name='semester']:checked").val(); // Get selected semester (type)

            // Validate inputs
            if (!year || !semester) {
                // alert("Please select both year and semester.");
                return;
            }

            // Determine type (Mid Sem or End Sem)
            let type = "";
            if (semester.includes("mid-sem")) {
                type = "Mid Sem";
            } else if (semester.includes("end-sem")) {
                type = "End Sem";
            }

            // Perform AJAX request
            $.ajax({
                url: 'fetch_papers.php', // Backend endpoint
                method: 'GET',
                data: {
                    college: college,
                    branch: branch,
                    year: year,
                    present_year: presentYear, // Passing the present year
                    type: type
                },
                success: function (response) {
                    // Populate papers dynamically
                    $('#papers-list').html(response);
                },
                error: function () {
                    alert('Error fetching papers. Please try again later.');
                }
            });
        }

        function fetchSidebarOptions() {
            const college = "<?php echo $_SESSION['college']; ?>";
            const branch = "<?php echo $_SESSION['branch']; ?>";
            const presentYear = "<?php echo $_SESSION['present_year']; ?>";

            $.ajax({
                url: 'fetch_sidebar_options.php',
                method: 'GET',
                data: {
                    college: college,
                    branch: branch,
                    present_year: presentYear
                },
                success: function (response) {
                    $('#year-options').html(response);
                },
                error: function () {
                    alert('Error fetching sidebar options. Please try again later.');
                }
            });
        }

        $(document).ready(function() {
            fetchSidebarOptions();
        });

        // Trigger fetchPapers when semester or year is selected
        $(document).on('change', "input[name='semester']", fetchPapers);
        $(document).on('change', "input[name='year']", fetchPapers);

    </script>

    <?php include('footer.php'); ?>

</body>

</html>
