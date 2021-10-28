<?php

	require_once('connect.php');
	include('includes/index_head.php');

	$category = mysqli_real_escape_string($connection,$_POST["category"]);

	//brand table
	$queryCategory = "SELECT * FROM CATEGORY WHERE name='$category'";
	$result = mysqli_query($connection, $queryCategory);

	$count = mysqli_num_rows($result);

	$sql = "INSERT INTO CATEGORY(name) VALUES('" . $category . "')"; 

	if($count == 1) {

		echo "<script>location.replace('category.php?insert=duplicate')</script>";
	}

	else{

		if (mysqli_query($connection, $sql) === TRUE) {

	    echo "<script>location.replace('category.php?insert=success')</script>";

	    $categoryID = mysqli_insert_id($connection);
		mysqli_free_result($result);

	} 
	else {
	    echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
		}
	}
		
?>