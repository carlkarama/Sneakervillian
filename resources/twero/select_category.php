<?php

	require_once('../connect.php');

	$query = 'SELECT * FROM CATEGORY';
	$result = mysqli_query($connection, $query);
	$count = mysqli_num_rows($result);

	for($i=0;$i<$count;$i++) {
		$row[$i]=mysqli_fetch_assoc($result);
	}
?>
<div class="myfieldset_insert_category_product">
		<select class="myinsertbtn_admin" name="category">
			<?php
				foreach($row as $next) {	
					echo "<option value='".$next['categoryID']."'>".$next['name']."</option>";
				}
			?>
		</select>
</div>
<?php
include('../includes/footer.php');
?>
