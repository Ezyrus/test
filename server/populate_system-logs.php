<?php
include '../config/config.php';

$response = array(
    'system_logs' => ''
  );
  
$selectSystemLogsQuery = $db->prepare("SELECT system_logs.logs_id, system_admins.fullname, system_logs.action, system_logs.description, system_logs.date FROM `system_logs` INNER JOIN `system_admins` ON system_logs.admin_id = system_admins.admin_id ORDER BY `date` DESC");
$selectSystemLogsQuery->execute();
$resultSelectSystemLogsQuery = $selectSystemLogsQuery->get_result();

$systemLogs = array();
while ($row = $resultSelectSystemLogsQuery->fetch_assoc()) {
    $systemLogs[] = $row;
}
$resultSelectSystemLogsQuery->close();
$response['system_logs'] = $systemLogs;
echo json_encode($response);
?>