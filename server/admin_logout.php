   <?php
      include '../config/config.php';
      session_start();

      session_destroy();
      header('Location: ../pages/admin_log-in.php');
   ?>