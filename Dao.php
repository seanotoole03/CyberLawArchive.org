<?php
require_once 'KLogger.php';

class Dao {

  private $host = 'ec2-184-72-236-57.compute-1.amazonaws.com';
  private $dbname = 'd5jnebdbvh02jr';
  private $username = 'rnxnybdobgoqry';
  private $password = '6bd6d8623ad04c85a8407c24244314680ae89a962e15e546674b78d14c90a9ff';
  private $port = '5432';
  private $logger;

  public function __construct() {
    $this->logger = new KLogger("log.txt", KLogger::WARN);
  }

  public function getConnection() {
    try {
       $connection = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->dbname};user={$this->username}; dbname={$this->password)}";
    } catch (Exception $e) {
      $this->logger->LogError("Couldn't connect to the database: " . $e->getMessage());
      return null;
    }
    return $connection;
  }
  
  public function testUserDB() {
	$conn = $this->getConnection();
	if(is_null($conn)) {
      return;
    }
	try {
	  $stmt = $conn->prepare('SELECT * FROM Users');
	  $stmt->execute();
	} catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }
  }
  
  public function getLogin($username, $password) {
	$conn = $this->getConnection();
	if(is_null($conn)) {
	  $this->logger->LogError("Couldn't connect to the database.");
      return;
    }
	try {
	  $stmt = $conn->prepare("SELECT * FROM Users WHERE username='{$username}' AND password='{$password}'");
	  $user = $conn->query($stmt);
	  if($user == FALSE) {
		?> <p> Database Error: <?= $conn->errorInfo()[2] ?> </p>
		<?php 
		return FALSE;
	  } else {
		return $user;
	  }
	} catch(Exception $e) {
	  $this->logger->LogError("Couldn't connect to the database: " . $e->getMessage());
      echo print_r($e,1);
      exit;
    }  
  }
  
  public function getUsers() {
    $conn = $this->getConnection();
    if(is_null($conn)) {
      return;
    }
    try {
      return $conn->query("SELECT * FROM Users", PDO::FETCH_ASSOC);
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }
  }  

/**
  public function getComments() {
    $conn = $this->getConnection();
    if(is_null($conn)) {
      return;
    }
    try {
      return $conn->query("select image, comment_id, comment, date_entered  from comment order by date_entered desc", PDO::FETCH_ASSOC);
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }
  }

  public function saveComment ($comment, $destination) {
    $this->logger->LogDebug("Saving a comment [{$comment}]");
    $conn = $this->getConnection();
    $saveQuery = "insert into comment (comment, image) values (:comment, :destination)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":comment", $comment);
    $q->bindParam(":destination", $destination);
    $q->execute();
  }

  public function deleteComment ($id) {
    $conn = $this->getConnection();
    $deleteQuery = "delete from comment where comment_id = :id";
    $q = $conn->prepare($deleteQuery);
    $q->bindParam(":id", $id);
    $q->execute();
  }
*/
}