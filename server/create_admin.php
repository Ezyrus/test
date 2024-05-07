<?php
include '../config.php';
session_start();
$response = array(
  'status' => false,
  'message' => ''
);
$admin_username = $_SESSION['adminLogged'];

// Fetch admin_id from system_admins
$adminIdQuery = "SELECT admin_id FROM system_admins WHERE username = '$admin_username'";
$adminIdResult = mysqli_query(getDatabase(), $adminIdQuery);

if ($adminIdResult && mysqli_num_rows($adminIdResult) > 0) {
    $adminIdRow = mysqli_fetch_assoc($adminIdResult);
    $admin_id = $adminIdRow['admin_id'];

$uploadDirectory = "../assets/images/admin_pictures/";
$add_adminprofile = $_FILES['add_adminprofile']['name'];
$add_adminprofileTmpName = $_FILES['add_adminprofile']['tmp_name'];
$uploadedadminprofilePath = $uploadDirectory . $add_adminprofile;
move_uploaded_file($add_adminprofileTmpName, $uploadedadminprofilePath);

$createUsername_admin = sanitizeData(getDatabase(), $_POST['createUsername_admin']);
$createPassword_admin = sanitizeData(getDatabase(), $_POST['createPassword_admin']);
$createType_admin = sanitizeData(getDatabase(), $_POST['createType_admin']);
$createFullName_admin = sanitizeData(getDatabase(), $_POST['createFullName_admin']);
$current_dt = (new DateTime())->format('Y-m-d H:i:s');

if ($selectAdminQuery = $db->prepare("SELECT * FROM `system_admins` WHERE `username` = ?")) {
  $selectAdminQuery->bind_param("s", $createUsername_admin);
  $selectAdminQuery->execute();
  $selectAdminQuery->store_result();

  if ($selectAdminQuery->num_rows > 0) {
    $response['message'] = 'Username is already taken.';
    $selectAdminQuery->close();
  } else {
    $createPassword_adminHashed = password_hash($createPassword_admin, PASSWORD_DEFAULT);

    if ($insertAdminQuery = $db->prepare("INSERT INTO `system_admins` (`admin_picture`, `username`, `password`, `type_id`, `full_name`, `time_added`) VALUES (?,?,?,?,?,?)")) {
      $insertAdminQuery->bind_param("ssssss", $add_adminprofile, $createUsername_admin, $createPassword_adminHashed, $createType_admin, $createFullName_admin, $current_dt);

      if ($insertAdminQuery->execute()) {
        $response['status'] = true;
        $response['message'] = 'Admin has been successfully added.';
        $response['admin_id'] = $admin_id;
        $response['action'] = "add";
        $response['description'] = "Admin: <b>" . strtoupper($admin_username) . "</b> Added $createUsername_admin on <b>System Admin.</b>";
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
