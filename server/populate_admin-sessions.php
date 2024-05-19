<?php
include '../config/config.php';

$response = array(
    'admin_sessions' => ''
  );
  
$selectAdminSessionsQuery = $db->prepare("SELECT admin_sessions.session_id, admin_sessions.admin_id, system_admins.fullname, admin_sessions.status, admin_sessions.logged_in, admin_sessions.logged_out, admin_sessions.expected_end_session_time FROM `admin_sessions` INNER JOIN `system_admins` ON admin_sessions.admin_id = system_admins.admin_id");
$selectAdminSessionsQuery->execute();
$resultSelectAdminSessionsQuery = $selectAdminSessionsQuery->get_result();

$adminSessions = array();
while ($row = $resultSelectAdminSessionsQuery->fetch_assoc()) {
    $adminSessions[] = $row;
}
$resultSelectAdminSessionsQuery->close();
$response['admin_sessions'] = $adminSessions;
echo json_encode($response);
?>