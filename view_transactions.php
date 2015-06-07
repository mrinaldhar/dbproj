<?php
ob_start();
session_start();
if (!isset($_SESSION['userempid']) || !isset($_SESSION['usernaam'])) {
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}
?>
<h1>View Transactions</h1>
<table width="100%" style="width:100%; max-width:100%;" id="contenttable">
	<tr class="thead">
		<td>Staff Name</td><td>Client Name</td><td>Time</td><td>Total Cost</td><td>Mode of Payment</td><td>Products</td>
	
	</tr>
	<?php
	require_once('connectvars.php'); 
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
 if (isset($_GET['staff_id'])) {
 	if ($_GET['staff_id']!=$_SESSION['userempid'] && $_SESSION['accesslevel']!='Supervisor') {
 		$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/home.php?err=notauthorized'; 
header('Location: ' . $home_url); 
 	}
 	else {
 		$staff_id = $_GET['staff_id'];
 		 $query = "select * from receipts inner join transactions on receipts.transaction_id=transactions.id WHERE staff_id='$staff_id'";
 $data = mysqli_query($dbc, $query);
 while ($row = mysqli_fetch_array($data)) {
 	echo '<tr class="tbody"><td>' . $row['staff_name'] . '</td><td>' . $row['other_name'] . '</td><td>' . $row['time'] . '</td><td>' . $row['total_cost'] . '</td><td>' . $row['payment_mode'] . '</td><td>' . $row['list_of_items'] . '</td></tr>';
 }
 	}
 }
 else {
 $query = "select * from receipts inner join transactions on receipts.transaction_id=transactions.id";
 $data = mysqli_query($dbc, $query);
 while ($row = mysqli_fetch_array($data)) {
 	echo '<tr class="tbody"><td>' . $row['staff_name'] . '</td><td>' . $row['other_name'] . '</td><td>' . $row['time'] . '</td><td>' . $row['total_cost'] . '</td><td>' . $row['payment_mode'] . '</td><td>' . $row['list_of_items'] . '</td></tr>';
 }
}
 ?>
</table>

