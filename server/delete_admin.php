<?php
include '../config/config.php';
session_start();

$response = array(
    "status" => false,
    "message" => " "
);

$deleteId_systemAdmin = $_POST['deleteId_systemAdmin'];

if ($deleteAdminQuery = $db->prepare("DELETE FROM `system_admins` WHERE `admin_id` = ?")) {
    $deleteAdminQuery->bind_param('i', $deleteId_systemAdmin);

    if ($deleteAdminQuery->execute()) {
        $response["status"] = true;
        $response["message"] = "Admin Deleted";
        $response['logsData'] = array(
            "admin_id" => $_SESSION["adminLogged"]["admin_id"],
            "action" => "delete",
            "description" => $_SESSION["adminLogged"]["username"] . " delete admin ADMIN" . $deleteId_systemAdmin . " in Admin Table."
        );
    } else {
        $response["message"] = 'An error occurred while executing Query: ' . $deleteAdminQuery->error;
        http_response_code(500); // Server Error
    }
    $deleteAdminQuery->close();
} else {
    $response["message"] = 'An error occurred while preparing Query: ' . $db->error;
    http_response_code(500); // Server Error
}

echo json_encode($response);
?>