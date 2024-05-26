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
                $selectAdminLoginQuery->close();

                if($selectAdminVerifiedQuery = $db->prepare("SELECT * FROM `system_admins` WHERE `username` = ? AND `system_access` = 0 ")) {
                    $selectAdminVerifiedQuery->bind_param("s", $rowSelectAdminLoginQuery["username"]);
                    $selectAdminVerifiedQuery->execute();
                    $resultSelectAdminVerifiedQuery = $selectAdminVerifiedQuery->get_result();

                    if ($resultSelectAdminVerifiedQuery->num_rows > 0) {
                        $response['message'] = "You currently dont have the permission to access the System.";
                    } else {
                        session_start();
                        $_SESSION["adminLogged"] = array(   
                            "admin_id" => $rowSelectAdminLoginQuery["admin_id"],
                            "picture" => $rowSelectAdminLoginQuery["picture"],
                            "fullname" => $rowSelectAdminLoginQuery["fullname"],
                            "username" => $rowSelectAdminLoginQuery["username"],
                            "type" => $rowSelectAdminLoginQuery["type"],
                            "system_access" => $rowSelectAdminLoginQuery["system_access"]
                        );
                        $response['status'] = true;
                        $response['message'] = "Login Successful";
                        $response['logsData'] = array(
                            "admin_id" => $rowSelectAdminLoginQuery["admin_id"],
                            "action" => "login",
                            "description" => $rowSelectAdminLoginQuery["username"] . " had logged in to the system."
                        );
                    }
                    
                }
                $selectAdminVerifiedQuery->close();

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


