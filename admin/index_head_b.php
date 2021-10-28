<?php
session_start();

echo '<div class="myadmin_login">';
echo "{$_SESSION['usern']}";
echo " - {$_SESSION['rwot']}";
echo '</div>';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Sneakervillain.com</title>
  	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <meta name="Sneakervillain" content="Welcome to Australia's No.1 Sneaker Spot">
    <meta name="Trending" content="Latest Off-White Drops, Air Jordans, Balenciaga's and many more">
    <meta name="Jobs" content="Become part of the innovative team behind Australia's growing sneaker depot">
  	<link rel="stylesheet" type="text/css" href="../css/adminstyle.css">
  	<link rel="stylesheet" type="text/css" href="../css/admin-readmore.css">
    <link rel="stylesheet" type="text/css" href="../css/user-index.css">
    <link rel="stylesheet" type="text/css" href="../css/slide.css">
  	<link rel="shortcut icon" type="image/png" href="../css/stockImages/favicon.png">
    <script type="text/javascript" src="../resources/js/TweenMax.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </head>
<body>
  <header>

  </header>
  	<div class="wrapper">
        <nav>
          <div class="toggle"><i class="fas fa-bars menu"></i></div>
              <ul>
                  <li><a href="../admin/index_admin.php">Home</a><li>
                  <li><a href="modify.php">Modify</a></li>
                  <li><a href="brands.php">Brands</a></li>
                  <li><a href="category.php">Categories</a></li>
                  <li><a href="../admin/insert_form.php">Insert</a></li>
                  <li><a href="../includes/logout.inc.php" name="logoutbtn">Logout</a></li>
                  <li><a href="../data/checkout.php"><img src='../css/stockImages/sc.png' alt='cart' id="cartSubmitBtn"></a></li> 
                  <!-- <li><a href="../admin/dogtic.php"><img src="../css/stockImages/admin-avatar.png" alt="dashboard" id="dashboard-btn"></a></li> -->
                  <li><a href="../admin/b/admin/index.php" target="_blank"><img src="../css/stockImages/admin-avatar.png" alt="dashboard" id="dashboard-btn2"></a></li>
                  <!-- <li><a href="../admin/a/public/index.html"><img src="../css/stockImages/admin-avatar.png" alt="dashboard" id="dashboard-btn"></a></li> -->
              </ul>
                <div id="searchpos">
                    <form action="index_admin.php" method="get">
                      <input class="myinput" type="text" name="q" placeholder="type here...">
                      <input class="mysearchbtn" type="submit" id="Search" value="search">
                    </form>
                </div>
        </nav>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript">
          $(document).ready(function() {
             $('.menu').click(function() {
               $('ul').toggleClass('active');
              })
            }) 
        </script>
    </div>
 
</body>