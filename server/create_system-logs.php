<?php
include '../config/config.php';
session_start();

$response = array(
    'status' => false,
    'message' => ''
);

$createAdminId_systemLogs = $_POST['admin_id'];
$createAction_systemLogs = $_POST['action'];
$createDescription_systemLogs = $_POST['description'];
$currentDateTime = getCurrentDateTime();

if ($createLogsQuery = $db->prepare("INSERT INTO `system_logs` (`admin_id`, `action`, `description`, `date`) VALUES (?, ?, ?, ?)")) {
    $createLogsQuery->bind_param("isss", $createAdminId_systemLogs, $createAction_systemLogs, $createDescription_systemLogs, $currentDateTime);

    if ($createLogsQuery->execute()) {
        $response['status'] = true;
        $response['message'] = "Logs Added";
    } else {
        $response['message'] = 'An error occurred while executing Query: ' . $createLogsQuery->error;
        http_response_code(500); // Server Error
    }
    $createLogsQuery->close();
} else {
    $response['message'] = 'An error occurred while preparing Query: ' . $db->error;
    http_response_code(500); // Server Error
}
?>