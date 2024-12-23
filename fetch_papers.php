<?php
session_start();
include 'db_connection.php'; // Include database connection

// Get session variables
$college = isset($_SESSION['college']) ? $_SESSION['college'] : '';
$branch = isset($_SESSION['branch']) ? $_SESSION['branch'] : '';
$year = isset($_GET['year']) ? $_GET['year'] : ''; // Year comes from sidebar
$present_year = isset($_SESSION['present_year']) ? $_SESSION['present_year'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : ''; // Semester type (Mid Sem or End Sem)



// Validate inputs
if ($college && $branch && $year && $present_year && $type) {
    $sql = "SELECT subject, link 
            FROM papers 
            WHERE college = ? AND branch = ? AND year = ? AND present_year = ? AND type = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $college, $branch, $year, $present_year, $type);

    // Debugging: Show the prepared statement query
    

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="paper-item">';
            echo '<a href="' . $row['link'] . '" target="_blank">' . $row['subject'] . '</a>';
            echo '</div>';
        }
    } else {
        echo '<p>No papers found for the selected filters.</p>';
    }

    $stmt->close();
} else {
    echo '<p>Invalid filter selection. Please check your inputs.</p>';
}

$conn->close();
?>
