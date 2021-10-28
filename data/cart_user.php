<?php

include('../includes/index_head_user.php');
include('../resources/twero/functions.php');
//include('checkout.php');
require_once('../connect.php');


//echo "loading...";

	if (isset($_GET['add'])) {

		//adding to cart
		$item = mysqli_real_escape_string($connection, $_GET['add']);	
		//$item = (isset($_GET['add'])? $_GET['add'] : null);	

		$query = "SELECT * FROM PRODUCT_CHILDREN WHERE productID = $item";
		$result = mysqli_query($connection, $query);
		//$row_count = mysqli_num_rows($result);

		while($row = mysqli_fetch_array($result)) {

			if($row['quantity'] != $_SESSION['productID' . $item]) {
				
				$_SESSION['productID' . $item] +=1;

				echo "<script>location.replace('../data/checkout_user.php')</script>";

			}

				else {

				//session_destroy();
				echo "<script>location.replace('../data/index_user.php?stock=oos')</script>";
				}

				if (!$result) {
				    die('Invalid query: ' . mysql_error());
			}
		}
	}

	if (isset($_GET['remove'])) {
		
		//remove items from cart
		$remove_item = mysqli_real_escape_string($connection, $_GET['remove']);

		$_SESSION['productID' . $remove_item]--;

		if ($_SESSION['productID' . $remove_item] < 1) {

			unset($_SESSION['item_total']);
			unset($_SESSION['item_quantity']);
			
			echo "<script>location.replace('../data/checkout_user.php?item_msg=air')</script>";

			if ($_SESSION['productID' . $remove_item] = 0) {

				echo "<script>location.replace('../data/checkout_user.php?item_msg=z')</script>";
			}
		}

		else {

			echo "<script>location.replace('../data/checkout_user.php?item_msg=ir')</script>";
		}
	}

	if (isset($_GET['delete'])) {

		//delete items from cart
		$delete_item = mysqli_real_escape_string($connection, $_GET['delete']);

		$_SESSION['productID' . $delete_item] = '0';

		unset($_SESSION['item_total']);
		unset($_SESSION['item_quantity']);
		
		echo "<script>location.replace('../data/checkout_user.php?item_msg=id')</script>";
	}

	function cart() {

		global $connection;

		$total = 0;
		$itemQuantity = 0;
		$item_name = 1;
		$item_number = 1;
		$amount = 1;
		$quantity = 1;

		foreach ($_SESSION as $name => $value) {

			if ($value > 0) {
				
				if (substr($name, 0, 9) == "productID") {

				$length = strlen($name - 9);
				$id = substr($name, 9, $length);

				$query = "SELECT * FROM PRODUCT WHERE productID = $id";

				$result = mysqli_query($connection, $query);

				while ($row = mysqli_fetch_array($result)) {

					$sub = $row['price'] * $value;
					$itemQuantity += $value; 

						echo "<tr>";	
						//echo $_SESSION['productID' . $id];
						echo "<br>";	
						echo '<td>' . $row['name'] . '</td>';
						echo '<td>&#36;' . $row['price'] . '</td>';
						//echo '<td>' . $_SESSION['productID' . $id] . '</td>'; 
						echo '<td>' . $value . '</td>'; 
						echo '<td>&#36;' . $sub . '</td>';
						echo "<td id='cart-add'><a href='../data/cart_user.php?add={$row['productID']}'><img src='css/stockrespimg/add.png' alt='add item' height='30' width='30'></a></td>";
						echo "<td id='cart-remove'><a href='../data/cart_user.php?remove={$row['productID']}'><img src='css/stockrespimg/remove.png' alt='remove item' height='30' width='30'></a></td>";
						echo "<td id='cart-delete'><a href='../data/cart_user.php?delete={$row['productID']}'><img src='css/stockrespimg/delete.png' alt='delete item' height='30' width='30'></a></td>";
						echo "</tr>";

		                echo "<input type='hidden' name='item_name_{$item_name}' value='{$row['name']}'>";
					    echo "<input type='hidden' name='item_number_{$item_number}' value='{$row['productID']}'>";
					    echo "<input type='hidden' name='amount_{$amount}' value='{$row['price']}'>";
					    echo "<input type='hidden' name='quantity_{$quantity}' value='{$value}'>";

			            //echo $product;

			            $item_name++;
						$item_number++;
						$amount++;
						$quantity++;
				}	

				$_SESSION['item_quantity'] = $itemQuantity;
				//$_SESSION['item_shipping'] = $total += $sub;
				$_SESSION['item_total'] = $total += $sub;
			}				
		}			
	}
}

function showPaypal() {

	if (isset($_SESSION['item_quantity']) && $_SESSION['item_quantity'] >=1) {

	echo "<input type='image' name='upload' src='https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif' alt='PayPal - The safer, easier way to pay online'>";
	}
}