   <?php
      include '../config.php';
      session_start();
      session_destroy();
      header('Location: ../pages/log-in.php');
   ?>