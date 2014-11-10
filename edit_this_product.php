<?php
ob_start();
session_start();
if (!isset($_SESSION['userempid']) || !isset($_SESSION['usernaam'])) {
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}
?>
<h1>Update this product</h1>
<?php
require_once('connectvars.php'); 
$pid = $_GET['id'];
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
 $query = "select * from products WHERE id = '$pid' LIMIT 1";
 $data = mysqli_query($dbc, $query);
 while ($row = mysqli_fetch_array($data)) {

?>	<form method="POST" action="update.php">
<table width="100%" style="width:100%; max-width:100%;" id="contenttable">

	<tr class="tbody">
		<td>Product name</td><td><input type="text" id="c_name" name="c_name" value="<?php echo $row['name']; ?>" /></td>
	</tr>
	<tr class="tbody">
		<td>Price per unit</td><td><input type="text" id="c_ppu" name="c_ppu" value="<?php echo $row['price_per_unit']; ?>" /></td>
	</tr>
	<tr class="tbody">
		<td>Quantity on shelf</td><td><input type="text" id="c_qos" name="c_qos" value="<?php echo $row['quantity_on_shelf']; ?>" /></td>
	</tr>
	<tr class="tbody">
		<td>Quantity in Inventory</td><td><input type="text" id="c_qii" name="c_qii" value="<?php echo $row['quantity_in_inventory']; ?>" /></td>
	</tr>
	<tr class="tbody">
		<td>Product category</td><td><input type="text" id="c_cat" name="c_cat" value="<?php echo $row['product_category']; ?>" /></td>
	</tr>
	<input type="hidden" id="id" name="id" value="<?php echo $pid; ?>" />
	<input type="hidden" id="type" name="type" value="product" />
	<input type="submit" value="Update" />
</table>
</form>
<button onclick="deletethis(4, <?php echo $pid; ?>)">Delete this record</button>
 <?php
}
?>