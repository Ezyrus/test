<?php
include '../config/config.php';
session_start();
$response = array(
  'status' => false,
  'message' => ''
);

echo json_encode($response);
?>
