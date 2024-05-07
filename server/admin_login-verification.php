<?php
session_start();

$adminLogged = $_SESSION['adminLogged'];
if (empty($adminLogged)) {
    header('Location: ../pages/admin_log-in.php');
    exit;
}

if ($adminSelectQuery = $db->prepare("SELECT `username`, `type_id` FROM system_admins WHERE `username` = ? ")) {
    $adminSelectQuery->bind_param("s", $adminLogged);
    if ($adminSelectQuery->execute()) {
        $adminSelectQuery->bind_result($db_adminId, $admintype); //Declare admin fullname to $db_adminFullName.
        if (!$adminSelectQuery->fetch()) {
            header('Location: ../pages/admin_log-in.php');
            exit;
        }
    } else {
        echo "An error occurred while executing Query: " . $adminSelectQuery->error;
        http_response_code(500); // Server Error
    }
    $adminSelectQuery->close();
} else {
    echo "An error occurred while preparing Query: " . $db->error;
    http_response_code(500); // Server Error

}

?>