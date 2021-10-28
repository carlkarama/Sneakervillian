<?php
session_start();
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
    <link rel="shortcut icon" type="image/png" href="../css/stockImages/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </head>
<body>
  <header>

  </header>
    <div class="wrapper">
        <nav>
          <div class="toggle"><i class="fas fa-bars menu"></i></div>
              <ul>
                  <li><a href="../data/index_user.php">Home</a><li>
                  <li><a href="../includes/logout.inc.php" name="logoutbtn">Logout</a></li>
                  <li><a href="../data/checkout_user.php"><img src='../css/stockImages/sc.png' alt='cart' id="cartSubmitBtn"></a></li>
              </ul>
                <div id="searchpos">
                    <form action="../index_user.php" method="get">
                      <input class="myinput" type="text" name="q" placeholder="type here...">
                      <input class="mysearchbtn" type="submit" id="Search" value="search">
                    </form>
                </div>
        </nav>
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
