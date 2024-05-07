<?php
include '../config.php';

$response = array(
    'status' => false,
    'message' => '',
    'admin_id' => '',
    'action' => '',
    'description' => ''
);

$logInUsername_adminValidation = sanitizeData(getDatabase(), $_POST["logInUsername_adminValidation"]);
$logInPassword_adminValidation = sanitizeData(getDatabase(), $_POST["logInPassword_adminValidation"]);


if ($adminSelectQuery = $db->prepare("SELECT `admin_id`, `username`, `password`, `type_id` FROM `system_admins` WHERE `username` = ?")) {
    $adminSelectQuery->bind_param("s", $logInUsername_adminValidation);

    if ($adminSelectQuery->execute()) {
        $adminSelectQuery->bind_result($db_admin_adminID, $db_admin_username, $db_admin_password, $admin_type);

        if ($adminSelectQuery->fetch()) {
            if (password_verify($logInPassword_adminValidation, $db_admin_password)) {
                $response['status'] = true;
                $response['icon'] = 'success';
                $response['message'] = 'Admin Found!';
                session_start();
                $_SESSION['adminLogged'] = $db_admin_username;
                $_SESSION['adminrole'] = $admin_type;
                $response['redirect'] = 'dashboard.php';
                $response['admin_id'] = $db_admin_adminID;
                $response['action'] = "login";
                $response['description'] = "Admin: <b>" . strtoupper($db_admin_username) . "</b> Just logged on to the System";
            } else {
                $response['message'] = 'Wrong password.';
            }
        } else {
            $response['message'] = 'Admin does not exist.';
        }
    } else {
        $response['message'] = 'An error occurred while executing Query: ' . $adminSelectQuery->error;
        http_response_code(500); // Server Error
    }
    $adminSelectQuery->close();
} else {
    $response['message'] = 'An error occurred while preparing Query: ' . $db->error;
    http_response_code(500); // Server Error
}
echo json_encode($response);


