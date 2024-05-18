<?php
include '../config/config.php';

$response = array(
    'system_admins' => ''
  );
  
$selectSystemAdminsQuery = $db->prepare("SELECT * FROM `system_admins` ORDER BY `id` DESC");
$selectSystemAdminsQuery->execute();
$resultSelectSystemAdminsQuery = $selectSystemAdminsQuery->get_result();

$systemAdmins = array();
while ($row = $resultSelectSystemAdminsQuery->fetch_assoc()) {
    $systemAdmins[] = $row;
}
$resultSelectSystemAdminsQuery->close();
$response['system_admins'] = $systemAdmins;
echo json_encode($response);
?>