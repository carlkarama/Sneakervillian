<?php
  include('../admin/index_head.php');

  $productID= $_GET['productID'];
  require_once('../connect.php');


  $query = "SELECT * FROM PRODUCT WHERE productID = $productID";
  $result = mysqli_query($connection, $query);


  $row = mysqli_fetch_array($result);
  $name = $row['name'];
  $description = $row['description'];

   if(sizeof($row) == 0) {
            echo "<p id='noresults'>No results...</p>";
     }

  echo $description;
?>
<div class="myfieldset">
<h3>Update Record Details</h>
  <form method="post" action="../admin/update.php" enctype="multipart/form-data">
    <input type="hidden" name="productID" value="<?php echo $productID?> " />

    <div class="row">
      <label for="name">Item Name</label>
      <input type="text" name="name" placeholder="Update <?php echo $name?>..." value="" required/>
      <!-- echo $name -->
    </div>

    <div class="row">
      <label for="description">Description</label>
      <textarea cols="50" rows="5" placeholder="Update <?php echo $description?>..." name="description" required></textarea>
      <!-- echo $description -->
    </div>

    <div class="row">
      <input type="submit" name="submit" value="Update" />
    </div>
    <!-- <div class="row">
      <input type="submit" name="submit" value="Update" />
    </div> -->
  </form>
</div>
