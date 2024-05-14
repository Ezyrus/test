<?php 
include '../config/config.php';

$response = array(
    "status" => false,
    "message" => " "
);

$id_systemAdmin = $_POST['id_systemAdmin'];

if ($deleteAdminQuery = $db->prepare("DELETE FROM `system_admins` WHERE `id` = ?")) {
    $deleteAdminQuery->bind_param('i', $id_systemAdmin);

    if ($deleteAdminQuery->execute()) {
        $response["status"] = true;
        $response["message"] = "Admin Deleted";
    } else {
        $response["message"] = 'An error occurred while executing Query: ' . $deleteAdminQuery->error;
        http_response_code(500); // Server Error
    }
} else {
    $response["message"] = 'An error occurred while preparing Query: ' . $db->error;
    http_response_code(500); // Server Error
}

echo json_encode($response);
?>