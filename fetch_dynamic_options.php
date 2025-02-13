<?php

session_start();
include 'db_connection.php';

$response = [];

if (isset($_GET['college']) && !isset($_GET['branch'])) {
    $college = $_GET['college'];
    $query = $conn->prepare("SELECT DISTINCT branch FROM papers WHERE college = ?");
    $query->bind_param('s', $college);
    $query->execute();
    $result = $query->get_result();

    $response['branches'] = [];
    while ($row = $result->fetch_assoc()) {
        $response['branches'][] = $row['branch'];
    }
} elseif (isset($_GET['college'], $_GET['branch'])) {
    $college = $_GET['college'];
    $branch = $_GET['branch'];
    $query = $conn->prepare("SELECT DISTINCT present_year FROM papers WHERE college = ? AND branch = ?");
    $query->bind_param('ss', $college, $branch);
    $query->execute();
    $result = $query->get_result();

    $response['present_years'] = [];
    while ($row = $result->fetch_assoc()) {
        $response['present_years'][] = $row['present_year'];
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
