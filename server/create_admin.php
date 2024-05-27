<?php
include '../config/config.php';
session_start();

$response = array(
  'status' => false,
  'message' => ''
);

$uploadDirectory = "../assets/img/admin_pictures/";
$createPictureName_systemAdmin = $_FILES['createPicture_systemAdmin']['name'];
$createPictureTmpName_systemAdmin = $_FILES['createPicture_systemAdmin']['tmp_name'];
$createPictureFilePath = $uploadDirectory . $createPictureName_systemAdmin;

$createFullName_systemAdmin = sanitizeData($db, $_POST["createFullName_systemAdmin"]);
$createUsername_systemAdmin = sanitizeData($db, $_POST["createUsername_systemAdmin"]);
$createPassword_systemAdmin = sanitizeData($db, $_POST["createPassword_systemAdmin"]);
$createType_systemAdmin = $_POST["createType_systemAdmin"];

if ($selectAdminQuery = $db->prepare("SELECT * FROM `system_admins` WHERE `username` = ? ")) {
  $selectAdminQuery->bind_param("s", $createUsername_systemAdmin);
  $selectAdminQuery->execute();
  $resultSelectAdminQuery = $selectAdminQuery->get_result();

  if ($resultSelectAdminQuery->num_rows > 0) {
    $response['message'] = 'Username is already taken.';
    $selectAdminQuery->close();
  } else {
    $createPasswordHashed_systemAdmin = password_hash($createPassword_systemAdmin, PASSWORD_DEFAULT);
    $systemAccess = 1;  
    $addedBy = $_SESSION["adminLogged"]["username"];
    $currentDateTime = getCurrentDateTime();

    if ($insertAdminQuery = $db->prepare("INSERT INTO `system_admins` (`picture`, `fullname`, `username`, `password`, `type`, `system_access`, `added_by`, `date_registered`) VALUES (?,?,?,?,?,?,?,?)")) {
      $insertAdminQuery->bind_param("ssssssss", $createPictureName_systemAdmin, $createFullName_systemAdmin, $createUsername_systemAdmin, $createPasswordHashed_systemAdmin, $createType_systemAdmin, $systemAccess, $addedBy, $currentDateTime);
      move_uploaded_file($createPictureTmpName_systemAdmin, $createPictureFilePath);

      if ($insertAdminQuery->execute()) {
        $response['status'] = true;
        $response['message'] = "Admin Added";
        $response['logsData'] = array(
          "admin_id" => $_SESSION["adminLogged"]["admin_id"],
          "action" => "create",
          "description" => $_SESSION["adminLogged"]["username"] . " created admin " . $createUsername_systemAdmin . " in Admin Table."
      );
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
  $response['message'] = 'An error occurred while preparing Query: ' . $db->error;
  http_response_code(500); // Server Error
}

echo json_encode($response);
?>
