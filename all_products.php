<?php
ob_start();
session_start();
if (!isset($_SESSION['userempid']) || !isset($_SESSION['usernaam'])) {
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}
?>
<h1>Manage Products</h1>
	<?php
	$deptid = $_GET['deptviewid']; 
	require_once('connectvars.php'); 
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$query = "SELECT * from products";
		$data = mysqli_query($dbc, $query);
		?>

		<a href="#" onclick="new_product()">Add a product</a>

		<table width="100%" id="contenttable">
	<tr class="thead">
		<td>Product Name</td><td>Price per unit</td><td>Category</td><td>Shelf</td><td>Inventory</td><td>Supplier Name</td>
	
	</tr>
	<?php
 while ($row = mysqli_fetch_array($data)) {
 	echo '<tr class="tbody" onclick="editthis(1,' . $row['id'] .')"><td>' . $row['name'] . '</td><td>' . $row['price_per_unit'] . '</td><td>' . $row['product_category'] . '</td><td>' . $row['quantity_on_shelf'] . '</td><td>' . $row['quantity_in_inventory'] . '</td><td>' . $row['supplier_name'] . '</td></tr>';
 }
 ?>
</table>