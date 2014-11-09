<?php
ob_start();
session_start();
if (!isset($_SESSION['userempid']) || !isset($_SESSION['usernaam'])) {
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}
?>

<h1>New transaction</h1>
<?php
	require_once('connectvars.php'); 
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
if ($_GET['type']=='supp') {
	if ($_SESSION['accesslevel']=='Supervisor') {
		echo '<select id="supplierid">';
		$query = "select * from supplier inner join person on supplier.person_id=person.id";
		$data = mysqli_query($dbc, $query);
		while ($row=mysqli_fetch_array($data)) {
			echo '<option>' . $row['name'] . '</option>';
		}
		echo '</select>';



	}
	else {
		echo 'You do not have authorization to make a supplier transaction.';
	}
}
else {
	?>

<table width="100%" id="contenttable">
	<tr class="thead">
		<td>Name of Product</td><td>Quantity</td><td>Price per unit</td><td colspan="2">Total price</td>
	</tr>
	<tr class="tbody">
<!-- <div class="ui-widget"> -->
	<td><input type="hidden" id="itemid" name="itemid" /><input type="text" id="q" name="q" placeholder="Search for a product" autocomplete="off" style="background-color:transparent; width:100%; max-width:100%; font-size:1.1em;" onkeypress="products_ajax()" /></td>
	<td><input type="text" id="quantity" name="quantity" placeholder="Quantity" style="background-color:transparent; width:100%; max-width:100%; font-size:1.1em;" onkeyup="products_calculate_1()" /></td>
	<td><span id="price_current_unit" style="background-color:transparent; width:100%; max-width:100%;" >N/A</span></td><td><span style="background-color:transparent; width:100%; max-width:100%;" id="price_current_total">N/A</span></td>
	<td style="cursor:pointer; text-align:center; border:1px solid black;" onclick="add_item_to_cart()">Add to cart</td>
</tr>
<!-- </div> -->
<!-- <form action="add_transaction.php" method="POST" onsubmit="proceedtopay()">
<input type="hidden" id="type" name="type" value="cust" />
<input type="hidden" id="totalcost" name="totalcost" />
<input type="text" id="payment_mode" name="payment_mode" placeholder="Payment Mode" />
<input type="hidden" id="list_of_items" name="list_of_items" />
<input type="submit" />
</form> -->
</table>
<div id="more"></div>
<?php
}

?>

</body>