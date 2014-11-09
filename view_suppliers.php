<?php
ob_start();
session_start();
if (!isset($_SESSION['userempid']) || !isset($_SESSION['usernaam'])) {
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}
?>
<h1>Manage Suppliers</h1>
<?php
if ($_SESSION['accesslevel']=='Supervisor')
{ echo '<a href="#" onclick="new_supplier()">Add New Supplier</a>';
}
?>
<table width="100%" id="contenttable">
	<tr class="thead">
		<td>Name</td><td>Rating</td><td>Email</td><td>Phone Number</td><td>Gender</td><td>Address</td><td>Products supplied</td><td>Working since</td>
	
	</tr>
	<?php
	require_once('connectvars.php'); 
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

$query = "select * from supplier inner join person on supplier.person_id=person.id";
		$data = mysqli_query($dbc, $query);
		while ($row=mysqli_fetch_array($data)) {
			 	echo '<tr class="tbody"><td>' . $row['name'] . '</td><td>' . $row['rating'] . '</td><td>' . $row['email'] . '</td><td>' . $row['phone'] . '</td><td>' . $row['gender'] . '</td><td>' . $row['address'] . '</td><td>' . $row['products'] . '</td><td>' . $row['working_since'] . '</td></tr>';

		}
		?>
	</table>