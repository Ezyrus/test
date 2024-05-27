<?php
include '../config/config.php';
session_start();

$response = array(
    "status" => false,
    "message" => ""
);

$uploadDirectory = "../assets/img/admin_pictures/";
$updatePictureName_systemAdmin = $_FILES['updatePicture_systemAdmin']['name'];
$updatePictureTmpName_systemAdmin = $_FILES['updatePicture_systemAdmin']['tmp_name'];
$updatePictureFilePath = $uploadDirectory . $updatePictureName_systemAdmin;

$updateId_systemAdmin = $_POST["updateId_systemAdmin"];
$updateFullName_systemAdmin = sanitizeData($db, $_POST["updateFullName_systemAdmin"]);
$updateType_systemAdmin = $_POST["updateType_systemAdmin"];
$updateSystemAccess_systemAdmin = $_POST["updateSystemAccess_systemAdmin"];

if (!empty($updatePictureName_systemAdmin)) {
    if ($updateAdminQuery = $db->prepare("UPDATE `system_admins` SET `picture` = ?, `fullname` = ?, `type` = ?, `system_access` = ? WHERE `admin_id` = ? ")) {
        $updateAdminQuery->bind_param("ssssi", $updatePictureName_systemAdmin, $updateFullName_systemAdmin, $updateType_systemAdmin, $updateSystemAccess_systemAdmin, $updateId_systemAdmin);

        if ($updateAdminQuery->execute()) {
            $response["status"] = true;
            $response["message"] = "Admin Updated";
            $response['logsData'] = array(
                "admin_id" => $_SESSION["adminLogged"]["admin_id"],
                "action" => "update",
                "description" => $_SESSION["adminLogged"]["username"] . " update admin ADMIN" . $updateId_systemAdmin . " in Admin Table."
            );
        } else {
            $response["message"] = 'An error occurred while executing Query: ' . $updateAdminQuery->error;
            http_response_code(500); // Server Error
        }
        $updateAdminQuery->close();
    } else {
        $response["message"] = 'An error occurred while preparing Query: ' . $db->error;
        http_response_code(500); // Server Error
    }
} else {
    if ($updateAdminQuery = $db->prepare("UPDATE `system_admins` SET  `fullname` = ?, `type` = ?, `system_access` = ? WHERE `admin_id` = ? ")) {
        $updateAdminQuery->bind_param("sssi", $updateFullName_systemAdmin, $updateType_systemAdmin, $updateSystemAccess_systemAdmin, $updateId_systemAdmin);

        if ($updateAdminQuery->execute()) {
            $response["status"] = true;
            $response["message"] = "Admin Updated";
            $response['logsData'] = array(
                "admin_id" => $_SESSION["adminLogged"]["admin_id"],
                "action" => "update",
                "description" => $_SESSION["adminLogged"]["username"] . " update admin ADMIN" . $updateId_systemAdmin . " in Admin Table."
            );
        } else {
            $response["message"] = 'An error occurred while executing Query: ' . $updateAdminQuery->error;
            http_response_code(500); // Server Error
        }
        $updateAdminQuery->close();
    } else {
        $response["message"] = 'An error occurred while preparing Query: ' . $db->error;
        http_response_code(500); // Server Error
    }
}


echo json_encode($response);
?>