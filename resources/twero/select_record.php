<?php

require_once('../connect.php');

	$title = 'Search for record';


	$query = 'SELECT * FROM PRODUCT';
	$result = mysqli_query($connection, $query);
	$count = mysqli_num_rows($result);

	for($i=0;$i<$count;$i++) {
		$row[$i]=mysqli_fetch_array($result);
	}
?>
<div class="myfieldset_update_admin">
 <p>Select a record to update</p>
	<form action="update_form.php" method="get">
		<select class="myselectbtn_admin" name="productID">
			<?php
				foreach($row as $next) {
				echo "<option value='".$next['productID']."'>".$next['name']."</option>";
				}
			?>
		</select>
	<input class="submit_update_btn_admin" type="submit" value="submit" name="submit" />
 </form>
</div>

<?php
include('../includes/footer.php');
?>
