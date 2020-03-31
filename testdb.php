
<?php
 
//require_once 'dbconfig.php';
  private $host = 'ec2-184-72-236-57.compute-1.amazonaws.com';
  private $dbname = 'd5jnebdbvh02jr';
  private $username = 'rnxnybdobgoqry';
  private $password = '6bd6d8623ad04c85a8407c24244314680ae89a962e15e546674b78d14c90a9ff';
  private $port = '5432';
 
$dsn = "pgsql:host=$host;port=5432;dbname=$db;user=$username;password=$password";
 
try{
 // create a PostgreSQL database connection
 $conn = new PDO($dsn);
 
 // display a message if connected to the PostgreSQL successfully
 if($conn){
 echo "Connected to the <strong>$db</strong> database successfully!";
 }
}catch (PDOException $e){
 // report error message
 echo $e->getMessage();
}
?>