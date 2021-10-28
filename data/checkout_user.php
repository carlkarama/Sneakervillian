<?php

include('../data/cart_user.php');
require_once('../connect.php');
?>

<!-- <form action="cart.php" name="checkout_handler"> -->
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="business" value="wavyistrill-facilitator@gmail.com">
  <input type="hidden" name="currency_code" value="US">
	<table class="lit-cart-items">
		<thead>
			<h1 id="cart-header">Cart Items</h1>
			<tr>
				<th>Product</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Sub-total</th>
			</tr>
		</thead>
		<tbody>
			<?php cart();?>    
		</tbody>
	</table>
	<table class="lit-cart-items">
		<thead>
			<h1 id="cart-header">Cart Totals</h1>
			<th>Items</th>
			<th>Shipping Fee</th>
			<th>Order Totals</th>
		</thead>
		<tbody>
			<tr>
				<?php echo '<td>' . $_SESSION['item_quantity'] . '</td>'; ?> 
				<?php echo '<td class="shipping-txt">Free Shipping</td>'; ?>  
				<?php echo '<td>&#36;' . $_SESSION['item_total'] . '</td>'; ?>    
			</tr>
		</tbody>
	</table><br>
	<div id="lit-paypalbtn"><?php echo showPaypal();?></div>
</form>