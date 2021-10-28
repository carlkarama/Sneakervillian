<?php
  require_once('../connect.php');
  include('../admin/index_head.php');

  if(!isset($_POST['submit'])) {
    echo "Unauthorised Access";
  }
  else {
    
    $productID = mysqli_real_escape_string($connection,$_POST['productID']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);

    $query = "UPDATE PRODUCT SET name = '$name', description = '$description' WHERE productID = '$productID'";

    if(mysqli_query($connection, $query)) {
      echo "<p> You have successfully updated {$name}</p>";
    }
    else {
      echo '<p> There was a problem updating the record</p>';
      echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
  }
?>
