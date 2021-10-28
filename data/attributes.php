<?php

	require_once('../connect.php');

	$query = 'SELECT * FROM BRAND';
	$result = mysqli_query($connection, $query);
	$count = mysqli_num_rows($result);

	for($i = 0; $i < $count; $i++) {
		$row[$i]=mysqli_fetch_assoc($result);
	}
?>
<div class="myfieldset_insert_brand_product">
		<select class="myinsertbtn_admin" name="brand" id="brand">
			<?php
				foreach($row as $next) {	
					echo "<option value='".$next['brandID']."'>".$next['brandName']."</option>";
				}
			?>
		</select>
</div>
<?php
include('../includes/footer.php');
?>