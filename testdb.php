<!-- https://young-bayou-40048.herokuapp.com/ -->
<?php 
	//include_once("index.php");
	if(!isset($_SESSION)) {
		session_start();
	}
	require_once("Dao.php");
	$dao = new Dao();
?>

<html>
	<head></head>
	<body>
	<p> Database Connection Test File
	<?php
		$params = parse_ini_file('database.ini');
		if ($params === false) {
			throw new \Exception("Error reading database configuration file");
		}
		print_r($params);
		// connect to the postgresql database
		try{
			$conStr = sprintf("pgsql:host=%s;dbname=%s;user=%s;password=%s", 
					$params['host'], 
					$params['dbname'], 
					$params['username'], 
					$params['password']);
					
			$pdo = new \PDO($conStr);
			$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			 // display a message if connected to the PostgreSQL successfully
			if($pdo){
			 echo "Connected to the database successfully!";
			 }
		}catch (PDOException $e){
		 // report error message
		 echo $e->getMessage();
		}
		
		$dao->get();
	?>
	</p>
	</body>
</html>