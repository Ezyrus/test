   <?php
      include '../config/config.php';
      session_start();
      $_SESSION = array();
      session_destroy();
      header('Location: ../pages/admin_log-in.php');
   ?>