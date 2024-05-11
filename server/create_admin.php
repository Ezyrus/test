<?php
include '../config/config.php';

$response = array(
  'status' => false,
  'message' => ''
);

// $uploadDirectory = "../assets/images/admin_pictures/";
$createPictureName_systemAdmin = $_FILES['createPicture_systemAdmin']['name'];
$createPictureTmpName_systemAdmin = $_FILES['createPicture_systemAdmin']['tmp_name'];
// $uploadedadminprofilePath = $uploadDirectory . $add_adminprofile;
// move_uploaded_file($add_adminprofileTmpName, $uploadedadminprofilePath);

$createFullName_systemAdmin = $_POST["createFullName_systemAdmin"];
$createUsername_systemAdmin = $_POST["createUsername_systemAdmin"];
$createPassword_systemAdmin = $_POST["createPassword_systemAdmin"];
$createType_systemAdmin = $_POST["createType_systemAdmin"];

$response['message'] = "Picture Name: " . $createPictureName_systemAdmin . " Picture Tmp Name: " . $createPictureTmpName_systemAdmin;
// $response['message'] = "Full Name: " . $createFullName_systemAdmin . " Username: " . $createUsername_systemAdmin . " Password: " . $createPassword_systemAdmin . " Type: " . $createType_systemAdmin;
echo json_encode($response);
?>
