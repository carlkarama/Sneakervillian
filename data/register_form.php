<!DOCTYPE>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width-device, initial-scale=1" charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../css/masterform.css">
  	<link rel="shortcut icon" type="image/png" href="../css/stockImages/favicon.png">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Lets Get It</title>
  </head>
  <body>
    <form class="register-container" action="../includes/register.inc.php" method="POST">
          <?php
            if(isset($_GET['error'])) {
              if($_GET['error'] == "emptyfields&userid") {
                echo '<div id="emptyfieldmsg">';
                echo '<p>bro fill in all fields</p>';
                echo '</div>';
              }
              else if($_GET['error'] == "invaliduid&mail") {
                echo '<div id="invaliduid_mail">';
                echo '<p>Bro ur username and email are messed up</p>';
                echo '</div>';
              }

              else if($_GET['error'] == "invalidmail&userid") {
                echo '<div id="invaliduid_mail">';
                echo '<p>Fix up your email and username</p>';
                echo '</div>';
              }

              else if($_GET['error'] == "usertaken&mail") {
                echo '<div id="usertaken">';
                echo '<p>Damn! Someone already snatched it</p>';
                echo '</div>';
              }
            }
          ?>
        <div class="login-box">
      		<h1>Register</h1>
      			<!-- Username -->
      			<div class="textbox">
      				<i class="fas fa-user"></i>
      				<input type="text" placeholder="Username" name="userid" value="" required>
      			</div>
      		  <!-- Password -->
      			<div class="textbox">
      				<i class="fas fa-lock"></i>
      				<input type="password" placeholder="Password" name="pword" value="" required>
      			</div>
            <!-- First Name -->
      			<div class="textbox">
      				<i class="fas fa-signature"></i>
      				<input type="text" placeholder="First Name" name="fname" value="" required>
      			</div>
            <!-- Last Name -->
      			<div class="textbox">
      				<i class="fas fa-signature"></i>
      				<input type="text" placeholder="Last Name" name="lname" value="" required>
      			</div>
            <!-- Email -->
      			<div class="textbox">
      				<i class="fas fa-envelope"></i>
      				<input type="email" placeholder="Email" name="mail" value="" required>
      			</div>
            <p>By creating an account you agree to </p><a href="#">Terms & Privacy?</a>

      			<!-- <input class="btn" type="button" name="" value="Sign In"> -->
            <button type="submit" class="btn" value="" name="register-submit">Register</button>
      			<a href="../index.php">Already a member | Sign In!</a><br>
      			<!-- <a href="#">Lost your password? Get new one</a> -->
      	</div>
      </form>
      <!-- width ="1440" height="810"-->
      <video autoplay muted loop id="myVideo">
        <source src="../video/homecover.mp4" type="video/mp4">
      </video>
  </body>
</html>
