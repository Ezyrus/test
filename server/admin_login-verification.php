<?php
session_start();

if (empty($_SESSION['adminLogged'])) {
    header('Location: ../pages/admin_log-in.php');
    exit;
}

if ($adminVerificationQuery = $db->prepare("SELECT * FROM system_admins WHERE `username` = ? ")) {
    $adminVerificationQuery->bind_param("s", $_SESSION['adminLogged']["username"]);

    if ($adminVerificationQuery->execute()) {
        $resultAdminVerificationQuery = $adminVerificationQuery->get_result();

        if ($resultAdminVerificationQuery->num_rows == 0) {
            header('Location: ../pages/admin_log-in.php');
            exit;
        }
    } else {
        echo "An error occurred while executing Query: " . $adminVerificationQuery->error;
        http_response_code(500); // Server Error
    }
    $adminVerificationQuery->close();
} else {
    echo "An error occurred while preparing Query: " . $db->error;
    http_response_code(500); // Server Error
}

?>