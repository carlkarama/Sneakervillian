<?php

	require_once('connect.php');
	include('includes/index_head.php');

	$brand = mysqli_real_escape_string($connection,$_POST["brand"]);

	//brand table
	$queryBrand = "SELECT * FROM BRAND WHERE brandName='$brand'";
	$result = mysqli_query($connection, $queryBrand);

	$count = mysqli_num_rows($result);

	$sql = "INSERT INTO BRAND(brandName) VALUES('" . $brand . "')"; 

	if($count == 1) {

		echo "<script>location.replace('brands.php?insert=duplicate')</script>";
	}

	else{

		if (mysqli_query($connection, $sql) === TRUE) {

		echo "<script>location.replace('brands.php?insert=success')</script>";

	    $brandID = mysqli_insert_id($connection);
		mysqli_free_result($result);

	} 
	else {
	    echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
		}
	}
		
?>
    
    