<?php
  include('index_head.php');
  require_once('../connect.php');

  $q = (isset($_GET['q'])? $_GET['q'] : null);


  $query = "SELECT * FROM PRODUCT WHERE description LIKE '%$q%' OR name LIKE '%$q%'";
  $result = mysqli_query($connection,$query);


  $row_count = mysqli_num_rows($result);
  $arrays = array();


  for($i=0; $i<$row_count; $i++) {
      $arrays[$i] = mysqli_fetch_array($result);
  }

?>
  <div class="modify-table">
      <table class="modify-table-content">
        <tr>
          <th>ID</th>
          <th>Image</th>
          <th>Product</th>
          <th>Description</th>
          <th>Price</th>
          <th>Read More</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
        <?php
        foreach ($arrays as $next) {
            echo "<tr>";
            echo "<th>". $next['productID'] ."</th>";
            echo '<div id="modify-img">';
            echo "<th><img src = '../data/" . $next['image'] . " ' " . "alt = '" . $next['image'] . "' /></th>";
            echo "</div>";
            echo '<th>' . $next['name'] . '</th>';
            echo '<th>' . $next['description'] . '</th>';
            echo '<th>' . $next['price'] . '</th>';

            echo "<th><a href='../data/product.php?productID={$next['productID']}'>Read</a></th>";
            echo "<th><a href = 'update_form.php?productID={$next['productID']}'>Update</a></th>";
            echo "<th><a href = 'delete_confirm.php?productID={$next['productID']}'>Delete</a></th>";

            echo "</tr>";
          }
        ?>
      </table>
  </div>
