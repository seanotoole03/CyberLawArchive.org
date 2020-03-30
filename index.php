<!-- https://young-bayou-40048.herokuapp.com/ -->
<?php 
	//include_once("index.html");
	if(!isset($_SESSION)) {
		session_start();
	}
	require_once("Dao.php");
	$dao = new Dao();
?>


<html>
	<head>
		<title>Cyber Law Archive: Archiving Cyber Law, Regulation, and Discussion from Around the Globe</title>
		<meta name="description" content="A website dedicated to the collection and preservation of law, policy, and major 
		discussions as they relate to the cyber world." />
		<meta name="keywords" content="cyber law, archive, policy, regulation, discussion, cybersecurity, hacking" />
		<meta charset="utf-8" />
		<meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport" />
		<link href="style.css" rel="stylesheet" />
		<link href="resources/cyber-law.png" type="image/png" rel="shortcut icon" />
		<script>
			function myFunction()
			{
			alert("Operational!"); // this is the message in ""
			}
			
			function openLogin() {
			  document.getElementById("login").style.display = "block";
			}

			function closeLogin() {
			  document.getElementById("login").style.display = "none";
			}
		</script>
	</head>
<!--	<header> CyberLawArchive.org </header> -->
	<body>
		<div class="top-window">
			<a class="img" href="index.php"> <img class="logo" src="resources/cyber-law.png" alt="a gavel in front of a laptop screen"
			title="clip art cyber law image from online public domain source"/> </a>
			<a class="logo" href="index.php"> <logo-text> Cyber Law Archive </logo-text> </a>
			<ul class="user-interaction"> 
				<?php 
					if(isset($_SESSION["username"])){
				?>
					<li> User: <? $_SESSION["username"] ?> </li>
					<li class="user-interaction"><a class="nav-link" href="./logout.php"> Logout </a></li>
					<?php }else{ ?>
					<li class="user-interaction"><a class="nav-link" onclick="openLogin()">  Login </a></li>
					<li class="user-interaction"><a class="nav-link"  href="./login.html"> Sign Up </a></li>
				<?php } ?>

				<li class="user-interaction"><a class="nav-link"  href="./contact.html"> Contact Us </a></li>
				<li class="user-interaction"><input type="button" onclick="myFunction()" value="Test box"></li>
			</ul>
			
		</div>
		<div class="nav-bar">
			<hr/>
			<ul class="nav-bar">
				<li class="nav-bar"><a class="nav-link" href="./intl.html"> International </a></li>
				<li class="nav-bar"><a class="nav-link"  href="./country.html"> By Country </a></li>
				<li class="nav-bar"><a class="nav-link"  href="./resources.html"> Legal Resources </a></li>
				<li class="nav-bar"><a class="nav-link"  href="./about.html"> About </a></li>
			</ul>
			<hr/>
		</div>
		<div class="row main">
			<div class="column main content">
			<ul>
				<li><h1>An Archive of Cyber Law Content</h1></li>
				<li><p><b> This site exists to collect, compile, and serve as a backup storage for important documents related to cyber law
					across recent history.</b></p></li>
			</ul>
			</div>
			<div class="column main side-panel">
			<ul>
				<li><b> Side Panel Placeholder </b></li>
			</ul>
			</div>
		</div>
		<div class="footer" id="footer">
			<ul class="user-interaction bottom"> 
				<li class="user-interaction"><a class="nav-link"  href="./contact.html"> Contact Us </a></li>
			</ul>
		</div>
		
		<div class="form-popup" id="login">
		  <form action="/login-handler.php" method= "post" class="form-container">
			<h1>Login</h1>

			<label for="username"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="username" required>

			<label for="password"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password" required>

			<button type="submit" class="btn">Login</button>
			<button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
		  </form>
		</div>
	</body>
</html>
