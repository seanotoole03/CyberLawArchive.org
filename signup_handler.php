<?php
  session_start();
  require_once("Dao.php");
  $dao = new Dao();
  
  $username = $_POST["username"];
  $password = $_POST["password"];
  $confirm_password = $_POST["password2"];
  $email = $_POST["email"];
  $index = 0;
  
  if(preg_match('/[[:alnum:]_\-\.]{3,50}/', $username) === 1){
	if(preg_match('/[[:alnum:]_\-\.]{3,50}/', $password) === 1){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			$user = $dao->createUser($username, (password_hash($password, PASSWORD_DEFAULT)), $email);
		}
	}	
  } else {
	if(strlen($username) > 50 || strlen($username) < 3){
		$errors[$index] = "Error, username should be within 3-50 alphanumeric characters"; 
		$index++;
	} if(strlen($password) > 50 || strlen($password) < 3) {
		$errors[$index] = "Error, password should be within 3-50 alphanumeric characters";
		$index++;
	}   if(strcmp($password, $confirm_password) != 0){
		$errors[$index] = "Passwords do not match.";
		$index++;
    } if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[$index] = "Error, invalid email address format or charset. Should use standard alphanumeric characters and ___@___.__ format";
		$index++;
	} if(!(preg_match('/[[:alnum:]_\-\.]{3,50}/', $username) === 1) || !(preg_match('/[[:alnum:]_\-\.]{3,50}/', $password) === 1)) {
		$errors[$index] = "Error, username and password should only contain alphanumeric characters, and/or '_', '-', '.' symbols"; 
		$index++;
	}
  } 
  
  if($user != FALSE){
    $_SESSION['auth'] = TRUE;
	$_SESSION['user'] = $username;	
	unset($_SESSION['login']);
	unset($_SESSION['signup']);

    header("Location: https://young-bayou-40048.herokuapp.com/index.php");
    exit;
  }else{
	unset($_SESSION['login']);	
	unset($_SESSION['user']);
	$_SESSION['signup'] = TRUE;
    $_SESSION['auth'] = FALSE;
    $_SESSION['message'] = "Error, user not created";
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