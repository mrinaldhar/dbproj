<?php
ob_start();
session_start();
if (!isset($_SESSION['userempid']) || !isset($_SESSION['usernaam'])) {
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}
?>
<h1>Manage Customers</h1>
<a href="#" onclick="new_user()">Add customer</a>
<table width="100%" style="width:100%; max-width:100%;" id="contenttable">
	<tr class="thead">
		<td>Name</td><td>Email</td><td>Phone Number</td><td>Gender</td><td>Address</td><td>Visits</td><td>Date of Birth</td>
	
	</tr>
	<?php
	require_once('connectvars.php'); 
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
 $query = "select * from customer inner join person on customer.person_id=person.id";
 $data = mysqli_query($dbc, $query);
 while ($row = mysqli_fetch_array($data)) {
 	echo '<tr class="tbody" onclick="editthis(2,'.$row['person_id'] . ')"><td>' . $row['name'] . '</td><td>' . $row['email'] . '</td><td>' . $row['phone'] . '</td><td>' . $row['gender'] . '</td><td>' . $row['address'] . '</td><td>' . $row['number_of_visits'] . '</td><td>' . $row['date_of_birth'] . '</td></tr>';
 }
 ?>
</table>
