<?php

session_start();
include 'db_connection.php';

if (isset($_GET['college'], $_GET['branch'], $_GET['present_year'])) {
    $college = $_GET['college'];
    $branch = $_GET['branch'];
    $presentYear = $_GET['present_year'];

    // Query to get the years based on college, branch, and present_year
    $query = $conn->prepare("SELECT DISTINCT year FROM papers WHERE college = ? AND branch = ? AND present_year = ?");
    $query->bind_param('sss', $college, $branch, $presentYear);
    $query->execute();
    $result = $query->get_result();

    $options = '';
    while ($row = $result->fetch_assoc()) {
        $year = $row['year'];
        $options .= '<label><input type="radio" name="year" value="' . $year . '" onclick="showExamOptions(\'' . $year . '-options\')"> ' . $year . '</label>';
        $options .= '<div id="' . $year . '-options" class="exam-options" style="display: none;">';

        // Query to get available types for the specific year
        $typeQuery = $conn->prepare("SELECT DISTINCT type FROM papers WHERE college = ? AND branch = ? AND present_year = ? AND year = ?");
        $typeQuery->bind_param('ssss', $college, $branch, $presentYear, $year);
        $typeQuery->execute();
        $typeResult = $typeQuery->get_result();

        // Check if the types are available
        while ($typeRow = $typeResult->fetch_assoc()) {
            $type = $typeRow['type'];
            if ($type === 'Mid Sem') {
                $options .= '<label><input type="radio" name="semester" value="mid-sem-' . $year . '"> Mid Sem</label>';
            } elseif ($type === 'End Sem') {
                $options .= '<label><input type="radio" name="semester" value="end-sem-' . $year . '"> End Sem</label>';
            }
        }

        $options .= '</div>';
    }

    echo $options;
} else {
    echo 'Invalid request';
}
?>
