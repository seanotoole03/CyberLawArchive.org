<html>
	<head></head>
	<body>
	<p>
	<?php
  $databaseURL = '//ec2-184-72-236-57.compute-1.amazonaws.com:5432/d5jnebdbvh02jr';
  $db;
//require_once 'dbconfig.php';
  $host = 'ec2-184-72-236-57.compute-1.amazonaws.com';
  $dbname = 'd5jnebdbvh02jr';
  $username = 'rnxnybdobgoqry';
  $password = '6bd6d8623ad04c85a8407c24244314680ae89a962e15e546674b78d14c90a9ff';
  $port = '5432';
 
//$dsn = "pgsql:host=$host;port=5432;dbname=$db;user=$username;password=$password";
$dsn = "pgsql:host=$host;port=5432;dbname=$db"; 

 
try{
 // create a PostgreSQL database connection
 //echo $dsn . "\n"; 
 //$db = parse_url(getenv($databaseURL));
 //echo $db . "\n"; 
/* $conn = new PDO("pgsql:" . sprintf(
	"host=%s;port=%s;user=%s;password=%s;dbname=%s",
	$db["host"],
	$db["port"],
	$db["user"],
	$db["pass"],
	ltrim($db["path"], "/")
  )); */
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
}
?>
</p>
	</body>
</html>