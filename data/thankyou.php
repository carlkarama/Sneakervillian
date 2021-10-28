<?php

include('includes/index_head.php');
include('functions.php');
require_once('connect.php');
?>

<?php

	if (isset($_GET['tx'])) {
		
		$userID = $_SESSION['uid'];
		//mysqli_real_escape_string($connection,$_POST["uid"]);
		$amount = mysqli_real_escape_string($connection,$_GET['amt']);
		$currency = mysqli_real_escape_string($connection,$_GET['cc']);
		$transactionID = mysqli_real_escape_string($connection,$_GET['tx']);
		$status = mysqli_real_escape_string($connection,$_GET['st']);


		//$query = INSERT INTO ORDERS

		$username = $_SESSION['usern'];

		$queryForRow = "SELECT * FROM ORDER";

		$result = mysqli_query($connection,$queryForRow);

		$sql = "INSERT INTO `ORDER`(userID, transactionID, amount, payment, currencyCode) VALUES('" . $userID . "','" . $transactionID . "','" . $amount . "','" . $status . "','" . $currency . "')";

		if (mysqli_query($connection, $sql) === TRUE) {

		    echo "<div class='confirmed-payment unconfirmed-payment'>";
			echo "<p class='thankyou'>Thank you for your payment {$username}! Your transaction has been completed and we've emailed you a receipt for your purchase.</p>";
			echo "</div>";
				
		 		//echo "<script>location.replace('index_admin.php?success=order_recieved')</script>";
		 		//session_destroy();
			}

			else {
				
			    echo "<script>location.replace('index_admin.php?error=order_resubmission')</script>";
			}

		}

	else {

		echo "<script>location.replace('checkout.php?error=ppe')</script>";
	}
?>