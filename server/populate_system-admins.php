<?php
include '../config/config.php';

// Define your query
$query = "SELECT * FROM `system_admins`";

// Execute the query
$result = $conn->query($query);

// Fetch data and format as JSON
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}


echo json_encode($data);
?>