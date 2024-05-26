<?php
include '../config/config.php';
session_start();

$createAdminId_systemLogs = $_SESSION["adminLogged"]["admin_id"];
$createAction_systemLogs = "logout";
$createDescription_systemLogs = $_SESSION["adminLogged"]["username"] . " had logged out to the system.";
$currentDateTime = getCurrentDateTime();

if ($createLogsQuery = $db->prepare("INSERT INTO `system_logs` (`admin_id`, `action`, `description`, `date`) VALUES (?, ?, ?, ?)")) {
   $createLogsQuery->bind_param("isss", $createAdminId_systemLogs, $createAction_systemLogs, $createDescription_systemLogs, $currentDateTime);

   if ($createLogsQuery->execute()) {
      $response['status'] = true;
      $response['message'] = "Logs Added";

      $_SESSION = array();
      session_destroy();
      header('Location: ../pages/admin_log-in.php');
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