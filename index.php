<!-- https://young-bayou-40048.herokuapp.com/ -->
<?php 
	//include_once("index.php");
	if(!isset($_SESSION)) {
		session_start();
	}
	require_once("Dao.php");
	$dao = new Dao();
	
	$name_preset = "";
	$pass_preset = "";
	$signUp_name_preset = "";
	$signUp_pass_preset = "";
	$signUp_email_preset = "";
	
	if (isset($_SESSION['form'])) {
		if(isset($_SESSION['login'])){
			$name_preset = $_SESSION['form']['username'];
			$pass_preset = $_SESSION['form']['password'];
		} else if(isset($_SESSION['signup'])){
			$signUp_name_preset = $_SESSION['form']['username'];
			$signUp_pass_preset = $_SESSION['form']['password'];
			$signUp_email_preset = $_SESSION['form']['email'];
		}
	}
	
?>


<html>
	<head>
		<title>Cyber Law Archive: Archiving Cyber Law, Regulation, and Discussion from Around the Globe</title>
		<meta name="description" content="A website dedicated to the collection and preservation of law, policy, and major 
		discussions as they relate to the cyber world." />
		<meta name="keywords" content="cyber law, archive, policy, regulation, discussion, cybersecurity, hacking" />
		<meta charset="utf-8" />
		<meta author="a_complete_idiot" />
		<meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport" />
		<script src="js/jquery-3.4.1.min.js"></script>
		<link href="style.css" rel="stylesheet" />
		<link href="resources/cyber-law.png" type="image/png" rel="shortcut icon" />
		<link rel="stylesheet" href="editor.md/css/editormd.min.css" />
		<script src="editor.md/editormd.min.js"></script>
		<script src="editor.md/languages/en.js"></script>
		<script src="js/jquery.twitter.feed.js"></script>
		<script src="js/functions.js"></script>
		<script type="text/JavaScript">
			$(window).on("load", function() {
				$('#twitter-feed').dcTwitterFeed({
					id: '#cyberlaw',
					tweetId: 'cyberlaw',
					retweets: false,
					replies: false,
					avatar: false,
					results: 5,
					images: 'small'
				});
			});
		</script>
	</head>
<!--	<header> CyberLawArchive.org </header> -->
	<body>
		<div class="top-background index">
		<div class="top-window">
			<a class="img" href="index.php"> <img id="logo-img" class="logo" src="resources/cyber-law.png" alt="a gavel in front of a laptop screen"
			title="clip art cyber law image from online public domain source"/> </a>
			<a id="logo-img" class="logo" href="index.php"> <logo-text> Cyber Law Archive </logo-text> </a>
			<ul id="user-interaction" class="user-interaction"> 
				<?php
					if (isset($_SESSION['errors']) && isset($_SESSION['login'])) { //echo "<b> {$_SESSION['errors'][0]} </b>";
					 ?> <script> $(window).on("load", function(){ openLogin(); }); </script> <?php
					unset($_SESSION['user']);} ?>
				<?php 
					if(isset($_SESSION['user'])){
				?>
					<li class="user-interaction"> User: <?php echo $_SESSION['user'] ?> </li>
					<li class="user-interaction"><a class="nav-link" href="./logout.php"> Logout </a></li>
					<?php }else{ ?>
					<li class="user-interaction"><a class="nav-link" href="#" onclick="openLogin()">  Login </a></li>
					<li class="user-interaction"><a class="nav-link"  href="#" onclick="openSignUp()"> Sign Up </a></li>
				<?php } ?>

				<li class="user-interaction"><a class="nav-link"  href="./contact.php"> Contact Us </a></li>
			</ul>
		</div>
		</div>
		<div id="login" class="form-popup modal" >	
			<div id="login-content" class="modal-content">
			  <form action="./login-handler.php" method= "post" class="form-container">
				<h1>Login</h1>

				<label for="username"><b>Username</b></label>
				<input type="text" value="<?php echo $name_preset; ?>" placeholder="Enter Username" name="username" required>
		
				<label for="password"><b>Password</b></label>
				<input type="password" value="<?php echo $pass_preset; ?>" placeholder="Enter Password" name="password" required>
				
				<?php
					if (isset($_SESSION['errors']) && isset($_SESSION['login'])) {
					  foreach ($_SESSION['errors'] as $error) {
						echo "<div class='error'>{$error}</div>";
					  }
					  
					  unset($_SESSION['errors']);				  
					  
					} ?>	
				<button type="submit" class="btn">Login</button>
				<button type="button" class="btn cancel" onclick="closeLogin()">Close</button>
			  </form>
			</div>
		</div>
		<div id="signUp" class="form-popup modal" >	
			<div id="signUp-content" class="modal-content">
			  <form action="./signup_handler.php" method= "post" class="form-container">
				<h1>Sign Up</h1>

				<label for="username"><b>Username</b></label>
				<input type="text" value="<?php echo $signUp_name_preset; ?>" placeholder="Enter Username" name="username" required>

				<label for="password"><b>Password</b></label>
				<input type="password" value="<?php echo $signUp_pass_preset; ?>"  placeholder="Enter New Password" name="password" required>
				
				<label for="password"><b>Password</b></label>
				<input type="password" placeholder="Confirm New Password" name="password2" required>
				
				<label for="email"><b>Email Address</b></label>
				<input type="text" value="<?php echo $signUp_email_preset; ?>" placeholder="Enter Contact Email Address" name="email" required>
				<?php
					if (isset($_SESSION['errors'])&& isset($_SESSION['signup'])) {
					  foreach ($_SESSION['errors'] as $error) {
						echo "<div class='error'>{$error}</div>";
					  }
					  unset($_SESSION['errors']);
					} ?>	
				<button type="submit" class="btn">Register</button>
				<button type="button" class="btn cancel" onclick="closeSignUp()">Close</button>
			  </form>
			</div>
		</div>
		<div class="nav-bar">
			<hr/>
			<ul class="nav-bar">
				<li class="nav-bar"><a class="nav-link" href="./intl.php"> International </a></li>
				<li class="nav-bar"><a class="nav-link"  href="./country.php"> By Country </a></li>
				<li class="nav-bar"><a class="nav-link"  href="./resources.php"> Legal Resources </a></li>
				<li class="nav-bar"><a class="nav-link"  href="./about.php"> About </a></li>
			</ul>
			<hr/>
		</div>
		<div class="row main">
			<div class="column main content">
			<ul>
				<li><h1>An Archive of Cyber Law Content</h1></li>
				<li><p><b> This site exists to collect, compile, and serve as a backup storage for important documents related to cyber law
					across recent history.</b></p></li>
				<li> </li>
				<li><p><b>Sample markdown editor test insert-- used and visible by authorized users only.</b></p></li>
			</ul>
			<?php if(isset($_SESSION['user'])) { if($dao->getPermissions($_SESSION['user']) == 1) { ?>
			<div id="editor">
				<!-- Tips: Editor.md can auto append a `<textarea>` tag -->
				<textarea style="display:none;">### Hello Editor.md !</textarea>
			</div>
			<script type="text/javascript">
				$(function() {
					var editor = editormd("editor", {
						// width: "100%",
						// height: "100%",
						// markdown: "xxxx",     // dynamic set Markdown text
						path : "editor.md/lib/"  // Autoload modules mode, codemirror, marked... dependents libs path
					});
				});
			</script>
			<?php } } ?>
			</div>
			<div class="column main side-panel">
			<a class="twitter-timeline" href="https://twitter.com/SeanDOToole1?ref_src=twsrc%5Etfw">Tweets by SeanDOToole1</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			<!-- <div id="twitter-feed"></div> -->
			<a href="https://twitter.com/intent/tweet?button_hashtag=cyberlaw&ref_src=twsrc%5Etfw" class="twitter-hashtag-button" data-show-count="false">Tweet #cyberlaw</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			<!-- <ul>
				<li>Feed implementation courtesy of <a href="http://www.designchemical.com/blog/index.php/jquery/jquery-tutorial-create-a-jquery-twitter-feed-plugin/">designchemical.com</a></li>
			</ul> -->
			</div>
			
		</div>
		<div class="footer" id="footer">
			<ul class="user-interaction bottom"> 
				<li class="user-interaction"><a class="nav-link"  href="./contact.php"> Contact Us </a></li>
			</ul>
		</div>
	</body>
</html>
