<!-- https://young-bayou-40048.herokuapp.com/ -->
<?php 

	if(!isset($_SESSION)) {
		session_start();
	}
	require_once("Dao.php");
	$dao = new Dao();
	
	include_once("index.html");

?>
