<?php 
include '../config/config.php';

$response = array(
    "status" => false,
    "message" => ""
);

$id_systemAdmin = $_POST["id_systemAdmin"];

if ($readAdminQuery = $db->prepare("SELECT * FROM `system_admins` WHERE `id` = ? ")) {
    $readAdminQuery->bind_param("i", $id_systemAdmin);
    
    if ($readAdminQuery->execute()) {
        $resultReadAdminQuery = $readAdminQuery->get_result();

        if ($resultReadAdminQuery->num_rows > 0) {
            $response["status"] = true;
            $response["message"] = "Admins Retrieved";

            $rowReadAdminQuery = $resultReadAdminQuery->fetch_assoc();
            $response["systemAdminsData"] = $rowReadAdminQuery;
        }

    } else {
        $response['message'] = 'An error occurred while executing Query: ' . $readAdminQuery->error;
        http_response_code(500); // Server Error
    }
} else {
    $response['message'] = 'An error occurred while preparing Query: ' . $db->error;
    http_response_code(500); // Server Error
}



echo json_encode($response);
?>