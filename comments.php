<!-- Form Tags: foundation of the interactive web -->
<html>
	<head> 
		<title>Leave a comment</title>
	</head>
	<body>
		<h1> Leave a Comment! </h1>
		<form name="commentForm" action="comments.php" method="POST">
		  <div>
			Username: <input type="text" name="username">
		  </div>
		  <div>
			Leave a comment: <input type="text" name="comment">
		  </div>
		  <div>
			<input type="submit" name="commentButton" value="Submit">
		  </div>
		  <input type="hidden" name="form" value="comment">
		</form>
		<?php
			echo "<pre>" . print_r($_POST,1) . "</pre>";
			file_put_contents("comments.dat", "{$_POST['username']} | {$_POST['comment']}\n" ,
			 FILE_APPEND | LOCK_EX );
		?>
		<?php
			$comments = explode( "\n", trim(file_get_contents("comments.dat")));
			echo print_r($contents,1);
		?>
		
		
	</body>
</html>