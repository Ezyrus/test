<?php 
date_default_timezone_set('Asia/Manila'); // PHT Timezone
function getDatabase() {
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'test-projectdb';
    $connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); // OOP Approach same with bind_param()
    if ($connection->connect_error) {
        die("Can't connect to the database server. Error: " . $connection->connect_error);
    }
    return $connection;
}
$db = getDatabase(); 

function sanitizeData($connection, $data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($connection, $data);
    return $data;
}

function getCurrentDateTime() {
    $currentDateTime = (new DateTime())->format('Y-m-d H:i:s');
    return $currentDateTime;
}
function formatDateTime($dateTimeString) {
    if ($dateTimeString === '0000-00-00 00:00:00') {
        return "Invalid Date and Time";
    }
    $dateTime = new DateTime($dateTimeString);
    return $dateTime->format('F j, Y \a\t h:i:s A');
}

function formatTime($timeString) {
    $time = new DateTime($timeString);
    return $time->format('h:i:s A');
}

function formatDate($dateString) {
    $date = new DateTime($dateString);
    return $date->format('F j, Y');
}
?>