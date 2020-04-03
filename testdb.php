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
			 echo "Connected to the <strong>$params['dbname']</strong> database successfully!";
			 }
		}catch (PDOException $e){
		 // report error message
		 echo $e->getMessage();
		}
	?>
	</p>
	</body>
</html>