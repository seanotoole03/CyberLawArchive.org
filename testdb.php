<html>
	<head></head>
	<body>
	<p> Database Connection Test File
	
	<?php
/*  $databaseURL = '//ec2-184-72-236-57.compute-1.amazonaws.com:5432/d5jnebdbvh02jr';
  $db;
 
//$dsn = "pgsql:host=$host;port=5432;dbname=$db;user=$username;password=$password";
$dsn = "pgsql:host=$host;port=5432;dbname=$db"; 

 
try{
 // create a PostgreSQL database connection
 //echo $dsn . "\n"; 
 //$db = parse_url(getenv($databaseURL));
 //echo $db . "\n"; 
 $conn = new PDO("pgsql:" . sprintf(
	"host=%s;port=%s;user=%s;password=%s;dbname=%s",
	$db["host"],
	$db["port"],
	$db["user"],
	$db["pass"],
	ltrim($db["path"], "/")
  )); 
  $conn = new PDO('pgsql:host={$host};port=5432;dbname=$db;user=$username;password=$password');
  //$conn = new PDO($dsn);
  //$conn = new PDO($dsn, $username, $password);
 
 // display a message if connected to the PostgreSQL successfully
 if($conn){
 echo "Connected to the <strong>$db</strong> database successfully!";
 }
}catch (PDOException $e){
 // report error message
 echo $e->getMessage();
} */
	$params = parse_ini_file('database.ini');
	if ($params === false) {
		throw new \Exception("Error reading database configuration file");
	}
	// connect to the postgresql database
	/*$conStr = sprintf("pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s", 
			$params['host'], 
			$params['port'], 
			$params['database'], 
			$params['user'], 
			$params['password']);*/
	$conStr = sprintf("pgsql:host=%s;\dbname=%s;user=%s;password=%s", 
			$params['host'], 
			$params['database'], 
			$params['user'], 
			$params['password']);
			
	$pdo = new \PDO($conStr);
	$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
?>
	</p>
	</body>
</html>