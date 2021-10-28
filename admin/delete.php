<?php

include('index_head.php');
echo "<div id='container'>";
echo "<div class='date'>";


    $productID = $_GET['productID'];
    $img = $_GET['image'];

    require_once('../connect.php');
  
    $query = "DELETE FROM PRODUCT WHERE productID = $productID";
  
        if (mysqli_query($connection, $query)) {

          $path = '../images/'.$img;
          unlink($path);
          
          echo "<p>Record {$productID} has been deleted";
        } else {
          echo "Error: " .$query . "<br>" . mysqli_error($connection);
        }
    //close database fann_get_total_connections
  
    mysqli_close($connection);
  
    echo '</div>';
    echo '</div>';
?>
