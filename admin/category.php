<?php

  include('index_head.php');
  require_once('../connect.php');

  if(isset($_GET['insert'])) {

  	if($_GET['insert'] == "duplicate") {
		 echo '<div class="duplicatemsg-category">';
		 echo '<p id="duplicatemsg">Already Exists</p>';
		 echo '</div>';
	 }

	 elseif($_GET['insert'] == "success") {
		 echo '<div class="successful-insert-category">';
		 echo '<p>New Category Added!</p>';
		 echo '</div>';
	 }
  }
?>

<div class="myfieldset_insert_category">
  <p><b>Create New Category</p>
    <form name="handleCategory" action="insert_category.php" method="post" >
      <label>Category </label></b>
      <input class="input_cat_txt" type='text' name="category" value="" placeholder="Enter Category..." required/>
      <input class="input_cat_btn" type="submit" name="submit_category" id="insert_button" value="Insert" required/>
    </form>
</div>
<?php
include('../includes/footer.php');
?>