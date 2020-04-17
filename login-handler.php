<?php
  session_start();
  require_once("Dao.php");
  $dao = new Dao();
  
  $username = $_POST["username"];
  $password = $_POST["password"];
  $_COOKIE['test'] = 'testText';
  $_COOKIE['passhash'] = (password_hash($password, PASSWORD_DEFAULT));
  //$username = 'seano';
  //$password = 'Postgres.Admiral1'
  $user = FALSE;
//  if ($username == $_POST['username'] && $password == $_POST['password']) {
  if(preg_match('/[[:alnum:]_\-\.]{3,50}/', $username) === 1){
	if(preg_match('/[[:alnum:]_\-\.]{3,50}/', $password) === 1){
	  $user = $dao->getLogin($username, (password_hash($password, PASSWORD_DEFAULT)));
	  $_COOKIE['passhash'] = (password_hash($password, PASSWORD_DEFAULT));
	  $_COOKIE['hashtest'] = password_verify($password,(password_hash($password, PASSWORD_DEFAULT)));
	}	
  }
  
  if($user != FALSE){
	
    $_SESSION['auth'] = TRUE;
	$_SESSION['user'] = $username;	
    header("Location: https://young-bayou-40048.herokuapp.com/index.php");
    exit;
  }else{
	unset($_SESSION['signup']);
	$_SESSION['login'] = TRUE;
    $_SESSION['auth'] = FALSE;
    $_SESSION['message'] = "Invalid username or password";
	unset($_SESSION['user']);
/*	unset($_COOKIE['user']);
	unset($_COOKIE);*/
	$errors = array();
	$errors[]="Invalid username or password.";
    // validate
	
	if (0 < count($errors)) {
		$_SESSION['form'] = $_POST;
		$_SESSION['errors'] = $errors;
		header("Location: https://young-bayou-40048.herokuapp.com/index.php");
		exit;
    }

  }
  
  	
  //unset($_SESSION['form']);

  require_once 'Dao.php';
  $dao = new Dao();
  header("Location: https://young-bayou-40048.herokuapp.com/index.php");
  exit;
?>