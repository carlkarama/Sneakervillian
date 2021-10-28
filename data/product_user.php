<?php

include('../includes/index_head_user.php');
require_once('../connect.php');

  if(isset($_GET['productID'])) {
    
    $pid = $_GET['productID'];

    $sql = "SELECT p.productID as productID, p.name as productName,
            p.image as productImage, p.description as productDescription, b.brand as brandName, cat.category as categoryName, 
            p.price as productPrice, p.createdOn as fire, c.colorID as colorID, c.color as productColor, s.size as productSize, COUNT(c.color) AS NoColors
            
            FROM `PRODUCT_ATTRIBUTE` AS pa
            INNER JOIN `PRODUCT` AS p
            ON pa.productID = p.productID
            INNER JOIN `COLORS` AS c 
            ON pa.colorID = c.colorID
            INNER JOIN `BRAND` as b
            ON b.brandID = p.brandID
            INNER JOIN `PRODUCT_TAG` as pt
            ON pt.productID = p.productID
            INNER JOIN `CATEGORY` AS cat
            ON p.categoryID = cat.categoryID
            INNER JOIN `SIZE` AS s
            ON pa.sizeID = s.sizeID

            WHERE pa.productID = '$pid' 
            GROUP BY c.color";

    $result = mysqli_query($connection, $sql);

    $row_count = mysqli_num_rows($result);

    $arrays = array();

    for($i=0; $i<$row_count; $i++) {
        //$arrays[$i] = mysqli_fetch_array($result);

        $arrays[$i] = mysqli_fetch_assoc($result);

    }

    ?>
  

    <?
    
    $arrayOfColors = array();
    $arrayOfSizes = array();

    foreach($arrays as $next) {
        
      $productID = $next['productID'];
      $productName = $next['productName'];
      $brandName = $next['brandName'];
      $categoryName = $next['categoryName'];
      $image = $next['productImage'];
      $description = $next['productDescription'];
      $price = $next['productPrice'];
      $value = $next['productSize'];
      $createdOn = $next['fire'];
      $colorQuantity = $next['NoColors'];
      $color = $next['productColor'];
      $colorID = $next['colorID'];
      //$values = $next['value'];
      //$quantities = $next['quantity'];
      
      //echo $next['colorID'];
      //$next['color'];
      //echo '<pre>:'; 
      
      //var_dump($next);
      
      //echo "<p>  $color  </p>";
     
      array_push($arrayOfColors, $color);
      array_push($arrayOfSizes, $value);
      
        }
  } else {
    echo "No Product To Show";
  }
  
 
  ?>

        <!-- start here for product page -->

        <?php include('../data/details.php');?>
        


        <!-- The product image and its details -->
        <div class="product-container">
                  <div class="product-gallery">
                      <?php
                        //echo "<img src='../images/products/shoes/".$next['image']. " ' "."alt = '".$next['image']."' id='product-image'/>";
                        echo "<img src='../images/products/shoes/". $image . " ' "."alt = '".$image."' id='product-image'/>";
                      ?>
                  </div>
        </div>

        <!-- Product details -->
        <div class="product-details">
                  <!-- brand -->
                  <div class="brand">
                      <div class="product-brand-tag">
                          <?php echo $brandName ?>
                      </div>    
                  </div>

                  <!-- category -->
                  <div class="category">
                      <div class="product-category-tag">
                          <?php echo $categoryName ?>
                      </div>    
                  </div>
                  
                  <!-- product name -->
                  <div class="product-name">
                            <p class="product-n"><?php echo $productName ?></p>
                  </div>

                  <!-- product price -->
                  <div class="product-price">
                            <p class="product-p">$<?php echo $price ?></p>
                  </div>
                  
                  <!-- product attributes -->
                  <div class="product-attributes">

                        <select class="product-select-attributes" name="p-attrib" id="p-attrib">
                            <?php
                            
                              echo "<option selected>Color</option>";
                             
                             for($i = 0; $i < count($arrayOfColors); $i++) {
                                 echo "<option value=$i>$arrayOfColors[$i]</option>";
                             }
                    
                            ?>
                      </select>

                    <br>
                    <hr>


                  <select class="product-select-attributes" name="p-attrib" id="p-attrib">
                          <?php
                            echo "<option selected>Size</option>";
                            for($x = 0; $x < count($arrayOfSizes); $x++) {
                                 echo "<option value=$x>$arrayOfSizes[$x]</option>";
                             }
                            ?>
                    </select>
                  
                  </div>

                  <!-- add to cart button -->
                  <div class="product-add-to-cart">
                          <div class="product-atc">
                              <a href="#">Add To Cart</a>
                          </div>
                  </div>

                  <!-- description window -->
                  <div class="product-description">
                          <div class="product-d">
                              <p href="#"><?php echo $description . " Released: " . $createdOn ?></p>
                          </div>
                  </div>

        </div>

        <!-- end her for product page -->

        <?   
            include('../includes/footer.php');
            mysqli_close($connection);
        ?>