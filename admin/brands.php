<?php

  include('index_head.php');
  require_once('../connect.php');

  if(isset($_GET['insert'])) {

  	if($_GET['insert'] == "duplicate") {
		 echo '<div class="duplicatemsg-brand">';
		 echo '<p id="duplicatemsg">Brand Already Exists</p>';
		 echo '</div>';
	 }

	 elseif($_GET['insert'] == "success") {
		 echo '<div class="successful-insert-brand">';
		 echo '<p>New Brand Added!</p>';
		 echo '</div>';
	 }
  }
?>

<div class="myfieldset_insert_brand">
  <p><b>Create New Brand</b></p>
    <form name="handleBrand" action="insert_brand.php" method="post" >
      <label><b>Brand:</b> </label>
      <input class="inputBrandtxt" type='text' name="brand" value="" placeholder="Enter Brand..." required/>
      <input class="inputBrandbtn" type="submit" name="submit_brand" id="insert_button" value="Insert" required/>
    </form>
</div>
<?php
include('../includes/footer.php');
?>
