<?php
  session_start();
  session_destroy();
  header("Location: https://young-bayou-40048.herokuapp.com/index.php");
  exit;
?>