<?php

  require_once('../connect.php');
  include('../admin/index_head.php');

  $productID = $_GET['productID'];
  $query = "SELECT * FROM PRODUCT WHERE productID = $productID";
  $result = mysqli_query($connection, $query);
  $row = mysqli_fetch_array($result);

  echo "<div class='myfieldset-delete'>";
  echo "<h3>Delete Record</h3>";

  //Details of record to be deleted
  // echo '<p>Product Id: ' . $row['productID'] . '</p>';
  echo '<p>Product Name: ' .$row['name'] . '</p>';
  echo '<p>Description: ' .$row['description'] . '</p>';
  echo '<p>Image Name: ' .$row['image'] . '</p>';
  echo '<p>Price: $' .$row['price'] . '</p>';

  //hyperlinks for delete and cancel
  echo "<p class='confirm_delete'>Are you sure you want to delete this record?</p>";
  // echo "<p>";
  echo "<a id='delete-product' name='delete' href='delete.php?productID={$row['productID']}&image={$row['image']}'>Delete<a/>";
  echo "<a id='cancel-deletion' href='index_admin.php?productID={$row['productID']}'>   Cancel<a/>";
  echo "</div>";
  echo "</div>";

//close database connection
mysqli_close($connection);
?>


<!-- <div class="myfieldset-delete">
    <h3>Delete Record</h3>
    <p>Product Name: <?php $row['name']?></p>
    <p>Product Desc: <?php $row['description']?></p>
    <p>Product Price: <?php $row['price']?></p>

    <p class="confirm_delete">Are you sure you want to delete this record?</p>
    <a href="delete.php?productID={$row['productID']}">Delete</a>
    <a href="index_admin.php?productID={$row['productID']}">Cancel</a>
  </div>
</div>

<?mysql_close($connection);?> -->
