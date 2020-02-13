##base.php

<?php
	print("Hello world!");
	$user_name = "loser";
	$user_age = 23;
	$pass = "pzwd";
?>

##basic User object
<?php
	class User {
		private $name;
		private $pass;
		
		public function __construct($name, $pass){
			$this->name = $name;
			$this->pass = $pass;
		}
	}
?>