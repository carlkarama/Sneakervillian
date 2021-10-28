<!DOCTYPE html>
<html>
<!-- Created by Carl Karama for Utopian Societys -->
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/master.css">
	<link rel="shortcut icon" type="image/png" href="css/stockImages/favicon.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
	</script>
	<![endif]-->
</head>
<body>
	<div class="itslitbg">
 <form action="includes/login.inc.php" method="post">
	 <?php
	 	echo '<div class="errormsg">';
		 if(isset($_GET['error'])) {

			 if($_GET['error'] == "emptyfields") {
				 echo '<div id="emptyfieldmsg">';
				 echo '<p>bro fill in all fields</p>';
				 echo '</div>';
			 }
			 else if($_GET['error'] == "sqlerror") {
				 echo '<div id="sqlerrormsg">';
				 echo '<p>The system is down!</p>';
				 echo '</div>';
			 }
			 else if($_GET['error'] == "nouser") {
				 echo '<div id="nouserdmsg">';
				 echo '<p>Bro you do not exist! Click the Sign Up Below</p>';
				 echo '</div>';
			 }
			 else if($_GET['error'] == "wrongpassword") {
				 echo '<div id="wrongpassmsg">';
				 echo '<p>Your password is not correct</p>';
				 echo "</div>";
			 }
		}


		 echo '</div>';
	 ?>
	
	<div class="login-box">
		<h1>Login</h1>
			<!-- Username -->
			<div class="textbox">
				<i class="fas fa-user"></i>
				<input type="text" placeholder="Username" name="uname" value="" required>
			</div>
		  <!-- Password -->
			<div class="textbox">
				<i class="fas fa-lock"></i>
				<input type="password" placeholder="Password" name="pass" value="" required>
			</div>
			<!-- Login -->
			<!-- <input class="btn" type="button" name="" value="Sign In"> -->
			<button type="submit" class="btn" value="signin" name="signinbtn">Sign In</button>
			<a href="data/register_form.php">Don't have an account? Sign Up!</a><br>
			<!-- <a href="#">Lost your password? Get new one</a> -->

	</div>
</form>
	<!-- The video -->
	<video playsinline autoplay muted loop id="myVideo" preload="metadata">
		<!--This is the link to the video file 1440x799-->
		<source src="video/homecover.mp4" type="video/mp4">
	</video>
</div>
</body>
</html>
