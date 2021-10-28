<?php

include('index_head_b.php');
include('a_functions.php');
require_once('../connect.php');
?>
<div class="background-color">
	<div class="myfieldset-insert-product">
		<div class="row">
			<form name="handle_product" action="insert.php" method="post" enctype="multipart/form-data">
				<label>Product</label><input type="text" name="product_name" value="" placeholder="Enter item name..." required>
				<label>Brand</label><?php include('../resources/twero/select_brand.php')?>
				<label>Category</label><?php include('../resources/twero/select_category.php')?>
				<label>Description</label><textarea cols="30" rows="2" name="description" value="" placeholder="Enter description name..." required></textarea>
				<label>Image</label><input type="file" name="img" required>
				<label>Price</label><input type="text" name="price" value="" placeholder="Enter price name" required>
				<!-- <label>Stock Unit ID</label><br><input type="text" name="sku" value="" placeholder="Enter sku code..." required> -->
				<label>Quantity</label><input type="text" name="quantity" value="" placeholder="Enter quantity..." required>
				<label>Color</label><input type="text" name="color" value="" placeholder="Enter color..." required>
				<label>Size</label><input type="text" name="size" value="" placeholder="Enter size" required>
				<label>Tags</label><input type="text" name="tag" value="" placeholder="Seperate with commas" required>
				<input type="submit" id="InsertButton" value ="Insert" required>
			</form>
		</div>
	</div>
</div>
	<?php
	include('../includes/footer.php');
	mysqli_close($connection);
	?>