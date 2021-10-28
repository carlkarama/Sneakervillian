<?php

include('../admin/index_head.php');
include('details.php');
require_once('../connect.php');

$productPage = $_GET['productID'];

$query = "SELECT * FROM PRODUCT WHERE productID = '$productPage'";
$result = mysqli_query($connection,$query);

$row = mysqli_fetch_array($result);
echo '<br><br><br>';
echo '<section class="productPage">';
echo '<h2>'.$row['name'].'</h2>';
echo '<p>'.$row['description'].'</p>';
echo "<img src = '".$row['image']. " ' "."alt = '".$row['price']."' />";
echo '<div class="manage-order">';
echo '<div class="cart-info">';
echo '<hr>';

echo '<span class="lblsizes"><p>PICK YOUR SIZE</p></span>';
echo '<span class="size-icons">';
echo '<a href="#">XS</a>';
echo '<a href="#">S</a>';
echo '<a href="#">M</a>';
echo '<a href="#">L</a>';
echo '<a href="#">XL</a>';
echo '</span>';//span size button
echo '<span class="lblquantity"><p>QUANTITY</p><br></span>';
echo '<div class="mybody">';
echo '<p>This is the read more text letting you know. <br>All items in store are currently limited to 1 item</p>';
echo '</div>';
echo '</div>';
//echo '</span>';
echo '<div class="add-to-cartbtn">';
echo "<a href='cart.php?add={$next['productID']}'>Add to Cart</a>";
echo '</div>';//add to cart div
echo '</div>';//cart-info div
echo '</div>'; //manage-order div
echo '<p>Price: ' .$row['price']. '</p>';
echo '</section>';

include('includes/footer.php');
mysqli_close($connection);
?>
