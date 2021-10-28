<?php
// welcome to logos
include('../includes/index_head_user.php');
require_once('../connect.php');

echo '<div class="myuser_login">';
echo "{$_SESSION['usern']}";
// echo " - {$_SESSION['danu']}";
echo " - 😈";
echo '</div>';

?>
<div class="wrapper-main">

<!-- Trending Shoes -->
<div class="lit-header-shoes"><h3 id="trending-shoes">Trending shoes</h3></div>

    <?php

     if(isset($_GET['stock'])) {

          if($_GET['stock'] == "oos") {
           echo '<div class="oos">';
           echo '<p>We out of stock fam!</p>';
           echo '</div>';
          }
        }

      if(isset($_SESSION['uid'])) {

          $q = (isset($_GET['q'])? $_GET['q'] : null);
          $query = "SELECT * FROM PRODUCT WHERE description LIKE '%$q%' OR name LIKE '%$q%'";

          $result = mysqli_query($connection,$query);
          $row_count = mysqli_num_rows($result);

          $arrays = array();

          for($i=0; $i<$row_count; $i++) {
              $arrays[$i] = mysqli_fetch_array($result);
          }

          if(sizeof($arrays) == 0) {
            echo "<p id='noresults'>No results...</p>";
          }
           
          echo "<br>";

          echo '<div id = "products">';

          foreach($arrays as $next) {
            echo '<form name="cart" action="../data/cart_user.php" method="get">';
            echo '<section>';
            echo '<div class="typewriter">';
            echo '<h2>'.$next['name'].'</h2>';
            echo '<p>'.$next['description'].'</p>';
            echo "<a href='../data/product_user.php?productID={$next['productID']}'><img src='../images/products/shoes/".$next['image']. " ' "."alt = '".$next['image']."' id='myproductsimg'/></a>";
            echo '</div>';
            echo '<span class="lbllinks">';
            echo '<p id="pricetxt">&#36;' .$next['price']. '</p>';
            // echo "<a href='product.php?productID={$next['productID']}'>Read More</a>";
            echo "<a href='../data/cart_user.php?add={$next['productID']}'><img src='../css/stockImages/shopping-cart-icon-19.png' alt='add to cart'></a>";
            echo '</span>';
            echo '</section>';
            echo '</form>';
          }
          echo "</div>";
          include('../includes/footer.php');
          mysqli_close($connection);
      }
      else {
        //header("Location: index.php?error=nicetry");
        echo "<script>location.replace('../index.php')</script>";
        exit();
      }
    ?>
</div>