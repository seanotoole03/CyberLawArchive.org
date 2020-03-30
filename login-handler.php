<?php
  session_start();
  require_once("Dao.php");
  $dao = new Dao();
  
  $username = $_POST["username"];
  $password = $_POST["password"];
  
//  if ($username == $_POST['username'] && $password == $_POST['password']) {
  if( $dao->getLogin($username, $password) != FALSE) {
    $_SESSION['auth'] = true;
    header("Location: https://young-bayou-40048.herokuapp.com/index.php");
    exit;
  } else {
    $_SESSION['auth'] = false;
    $_SESSION['message'] = "Invalid username or password";
    header("Location: https://young-bayou-40048.herokuapp.com/index.php");
  }
?>