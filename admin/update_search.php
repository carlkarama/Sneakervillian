<?php

require_once('connect.php');

	$title = 'Search for record';
//	$style="css/nav.css";
//	$style2="css/form.css";

include('includes/head.php');
//include('includes/nav.php');

	$query='SELECT * FROM PRODUCT';
	$result=mysqli_query($connection, $query);
	$count=mysqli_num_rows($result);

	for($i=0;$i<$count;$i++) {
		$row[$i]=mysqli_fetch_array($result);
	}
?>
	<fieldset>
	<h4>Select a record to update</h4>
	<form action="update_form.php" method="get">
		<select name="productID">
			<?php
				foreach($row as $next) {
				echo "<option value='".$next['productID']."'>".$next['name']."</option>";
				}
			?>
		</select>
		<input type="submit" value="submit" name="submit" />
	</form>
	</fieldset>

<?php

include('includes/footer.php');

?>
