<?php
include '../config/config.php';

$response = array(
    'status' => false,
    'message' => '',
);

$admin_username = sanitizeData($db, $_POST['admin_username']);
$admin_password = sanitizeData($db, $_POST['admin_password']);

if ($selectAdminLoginQuery = $db->prepare("SELECT * FROM `system_admins` WHERE `username` = ? ")) {
    $selectAdminLoginQuery->bind_param("s", $admin_username);

     if ($selectAdminLoginQuery->execute()) {
        $resultSelectAdminLoginQuery = $selectAdminLoginQuery->get_result();

        if ($resultSelectAdminLoginQuery->num_rows > 0) {
            $rowSelectAdminLoginQuery = $resultSelectAdminLoginQuery->fetch_assoc();

            if (password_verify($admin_password, $rowSelectAdminLoginQuery["password"])) {
                session_start();
                $_SESSION["adminLogged"] = array(
                    "username" => $rowSelectAdminLoginQuery["username"],
                    "fullname" => $rowSelectAdminLoginQuery["fullname"],
                    "system_access" => $rowSelectAdminLoginQuery["system_access"],
                    "type" => $rowSelectAdminLoginQuery["type"],
                    "picture" => $rowSelectAdminLoginQuery["picture"]
                );
                $response['status'] = true;
                $response['message'] = "Login Successful";
            } else {
                $response['message'] = 'Incorrect Password';
            }
        } else {
            $response['message'] = 'Username Does Not Exist';
        }
     } else {
        $response['message'] = 'An error occurred while executing Query: ' . $selectAdminLoginQuery->error;
        http_response_code(500); // Server Error
     }
} else {
    $response['message'] = 'An error occurred while preparing Query: ' . $db->error;
    http_response_code(500); // Server Error
}

echo json_encode($response);


