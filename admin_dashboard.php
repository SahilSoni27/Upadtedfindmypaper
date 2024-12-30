<?php
session_start();
include 'auth_check.php'; // Start the session to store success/failure messages
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- Display Success/Failure Message -->
    <?php
    if (isset($_SESSION['update_message'])) {
        echo '<div>' . $_SESSION['update_message'] . '</div>';
        unset($_SESSION['update_message']);
    }
    ?>

    <!-- Button to Trigger Database Update -->
    <form action="practiceapi/index.php" method="POST" id="updateForm">
        <button type="submit" id="updateBtn" name="update_database" onclick="handleButtonClick(event)">Update Database</button>
    </form>

    <script>
        // Handle button click to show processing state
        function handleButtonClick(event) {
            event.preventDefault(); // Prevent the form from submitting immediately

            // Disable the button and change its text to "Processing..."
            $("#updateBtn").prop("disabled", true);
            $("#updateBtn").text("Processing...");

            // Submit the form via AJAX
            $.ajax({
                url: $("#updateForm").attr('action'), // Target file (index.php)
                type: "POST",
                data: { update_database: true }, // Send the POST data to trigger the database update
                success: function(response) {
                    // Handle success (Message can be set inside index.php)
                    alert("Database update was successful!");
                    $("#updateBtn").prop("disabled", false); // Enable the button
                    $("#updateBtn").text("Update Database"); // Reset button text

                    // Optionally, you can update a div with success message
                    // For example, show a message from the response (if you want)
                    $("body").append('<div>' + response + '</div>');
                },
                error: function(xhr, status, error) {
                    // Handle error
                    alert("An error occurred: " + error);
                    $("#updateBtn").prop("disabled", false); // Enable the button
                    $("#updateBtn").text("Update Database"); // Reset button text
                }
            });
        }
    </script>
</body>
</html>
