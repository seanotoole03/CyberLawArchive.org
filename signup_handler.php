<?php
  session_start();
  require_once("Dao.php");
  $dao = new Dao();
  
  $username = $_POST["username"];
  $password = $_POST["password"];
  $confirm_password = $_POST["password2"];
  $email = $_POST["email"];
  
  if(strcmp($password, $confirm_password) != 0){
	$errors[] = "Passwords do not match.";  
  }
  
  if(preg_match('/[[:alnum:]_\-\.]{3,25}/', $username) === 1){
	if(preg_match('/[[:alnum:]_\-\.]{3,50}/', $password) === 1){
	  $user = $dao->createUser($username, $password, $email); 
	}	
  } else {
	if(strlen($username) > 25 || strlen($username) < 3){
		$errors[] = "Error, username should be within 3-25 alphanumeric characters"; 
	} else if(strlen($password) > 50 || strlen($password) < 3) {
		$errors[] = "Error, password should be within 3-50 alphanumeric characters"; 
	} else {
		$errors[] = "Error, username and password should only contain alphanumeric characters, and/or '_', '-', '.' symbols"; 
	}
  } 
  
  if($user != FALSE){
    $_SESSION['auth'] = TRUE;
	$_SESSION['user'] = $username;	

    header("Location: https://young-bayou-40048.herokuapp.com/index.php");
    exit;
  }else{
    $_SESSION['auth'] = FALSE;
    $_SESSION['message'] = "Error, user not created";
	unset($_SESSION['user']);
	unset($_COOKIE['user']);
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