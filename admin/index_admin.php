<?php

require_once('../connect.php');
include('../admin/index_head.php');
include('../resources/twero/select_record.php');
include('../resources/twero/select_record_delete.php');
?>

       <!-- Trending Sellers -->
        <!-- <div class="main-container">
                  <div id="highlights">
                      <div id="arrow-left"><a href="#"><i class="fa fa-arrow-left"></i></a></div>
                         <div class="reel">
                           <ul>
                              <li><img id="showcase" src="../images/trending/active/a1.png"></li>
                              <li><img id="showcase" src="../images/trending/active/a2.png"></li>
                              <li><img id="showcase" src="../images/trending/active/a3.png"></li>                                
                              <li><img id="showcase" src="../images/trending/active/a4.png"></li>
                              <li><img id="showcase" src="../images/trending/active/a5.png"></li>
                              <li><img id="showcase" src="../images/trending/active/a6.png"></li>  
                              <li><img id="showcase" src="../images/trending/active/a7.png"></li>       
                            </ul>      
                        </div><div id="arrow-right"><a href="#"><i class="fa fa-arrow-right"></i></a></div></div>

                <div class="strips">
                    <div class="s-one"></div>
                    <div class="s-two"></div>
                    <div class="s-three"></div>
                </div>
          </div> -->

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
            echo '<form name="cart" action="../data/cart.php" method="get">';
            echo '<section>';
            echo '<div class="typewriter">';
            echo '<h2>'.$next['name'].'</h2>';
            echo '<p>'.$next['description'].'</p>';
            echo "<img src= '../images/products/shoes/".$next['image']. " ' "."alt = '".$next['image']."' id='myproductsimg'/>";
            echo '</div>';
            echo '<span class="lbllinks">';
            echo '<p id="pricetxt">&#36;' .$next['price']. '</p>';
            // echo "<a href='product.php?productID={$next['productID']}'>Read More</a>";
            echo "<a href='../data/cart.php?add={$next['productID']}'><img src='../css/stockImages/shopping-cart-icon-19.png' alt='add to cart'></a>";
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