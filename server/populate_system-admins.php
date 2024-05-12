<?php
include '../config/config.php';

$response = array(
    'system_admins' => ''
  );
  
$query = "SELECT * FROM `system_admins` ORDER BY `id` DESC";
$result = $db->query($query);

$systemAdmins = array();
while ($row = $result->fetch_assoc()) {
    $systemAdmins[] = $row;
}

$response['system_admins'] = $systemAdmins;
echo json_encode($response);
?>