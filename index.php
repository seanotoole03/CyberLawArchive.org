<!-- https://young-bayou-40048.herokuapp.com/ -->
<?php 
	//include_once("index.html");
	if(!isset($_SESSION)) {
		session_start();
	}
	require_once 'Dao.php';
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
			alert("I am an alert box!"); // this is the message in ""
			}
		</script>
	</head>
<!--	<header> CyberLawArchive.org </header> -->
	<body>
		<div class="top-window">
			<a class="img" href="index.html"> <img class="logo" src="resources/cyber-law.png" alt="a gavel in front of a laptop screen"
			title="clip art cyber law image from online public domain source"/> </a>
			<a class="logo" href="index.html"> <logo-text> Cyber Law Archive </logo-text> </a>
			<ul class="user-interaction"> 
				<?php 
					if(isset($_SESSION["username"])){
				?>
					<li> User: <? $_SESSION["username"] ?> </li>
					<li class="user-interaction"><a class="nav-link" href="./logout.php"> Logout </a></li>
					<?php }else{ ?>
					<li class="user-interaction"><a class="nav-link" href="./login.html"> Login </a></li>
					<li class="user-interaction"><a class="nav-link"  href="./login.html"> Sign Up </a></li>
				<?php } ?>

				<li class="user-interaction"><a class="nav-link"  href="./contact.html"> Contact Us </a></li>
			</ul>
			<input type="button" onclick="myFunction()" value="Show alert box">
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
	</body>
</html>