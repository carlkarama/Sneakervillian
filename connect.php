<?php
$hostname = '';
$username = '';
$password = '';
$dbname = '';

$connection = mysqli_connect($hostname, $username, $password, $dbname)
	or die(mysqli_connect_error());

/*
  if($connection) {
    echo 'Connection successful';
  }
*/

?>
