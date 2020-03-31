<?php
  session_start();
  require_once("Dao.php");
  $dao = new Dao();
  
  $username = $_POST["username"];
  $password = $_POST["password"];
  //$username = 'seano';
  //$password = 'Postgres.Admiral1'
  $user;
  
//  if ($username == $_POST['username'] && $password == $_POST['password']) {
  $user = $dao->getLogin($username, $password); 	
  if($user != FALSE){
    $_SESSION['auth'] = true;
	$_SESSION['user'] = $user;
    header("Location: https://young-bayou-40048.herokuapp.com/index.php");
    exit;
  }else{
    $_SESSION['auth'] = FALSE;
    $_SESSION['message'] = "Invalid username or password";
    header("Location: https://young-bayou-40048.herokuapp.com/index.php");
  }
?>