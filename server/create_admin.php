<?php
include '../config.php';
session_start();
$response = array(
  'status' => false,
  'message' => ''
);

$createFullName_systemAdmin = sanitizeData(getDatabase(), $_POST['createFullName_systemAdmin']);
$createUsername_systemAdmin = sanitizeData(getDatabase(), $_POST['createUsername_systemAdmin']);
$createPassword_systemAdmin = sanitizeData(getDatabase(), $_POST['createPassword_systemAdmin']);
$createType_systemAdmin = sanitizeData(getDatabase(), $_POST['createType_systemAdmin']);
$current_dt = (new DateTime())->format('Y-m-d H:i:s');

if ($selectAdminQuery = $db->prepare("SELECT * FROM `system_admins` WHERE `username` = ?")) {
  $selectAdminQuery->bind_param("s", $createUsername_systemAdmin);
  $selectAdminQuery->execute();
  $selectAdminQuery->store_result();

  if ($selectAdminQuery->num_rows > 0) {
    $response['message'] = 'Username is already taken.';
    $selectAdminQuery->close();
  } else {
    $createPassword_systemAdminHashed = password_hash($createPassword_systemAdmin, PASSWORD_DEFAULT);

    if ($insertAdminQuery = $db->prepare("INSERT INTO `system_admins` (`admin_picture`, `username`, `password`, `type_id`, `full_name`, `time_added`) VALUES (?,?,?,?,?,?)")) {
      $insertAdminQuery->bind_param("ssssss", $add_adminprofile, $createUsername_systemAdmin, $createPassword_systemAdminHashed, $createType_systemAdmin, $createFullName_systemAdmin, $current_dt);

      if ($insertAdminQuery->execute()) {
        $response['status'] = true;
        $response['message'] = 'Admin has been successfully added.';
        $response['admin_id'] = $admin_id;
        $response['action'] = "add";
        $response['description'] = "Admin: <b>" . strtoupper($admin_username) . "</b> Added $createUsername_systemAdmin on <b>System Admin.</b>";
      } else {
        $response['message'] = 'An error occurred while executing Query: ' . $insertAdminQuery->error;
        http_response_code(500); // Server Error
      }
      $insertAdminQuery->close();
    } else {
      $response['message'] = 'An error occurred while preparing Query: ' . $db->error;
      http_response_code(500); // Server Error
    }
  }
} else {
  $response['status'] = false;
  $response['message'] = 'An error occurred while preparing Query: ' . $db->error;
  http_response_code(500); // Server Error
}
} else {
    $response['message'] = 'Error fetching admin ID: ' . mysqli_error(getDatabase());
  }
echo json_encode($response);
?>
