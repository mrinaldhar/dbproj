<?php
ob_start();
session_start();
if (!isset($_SESSION['userempid']) || !isset($_SESSION['usernaam'])) {
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}
?>
<h1>Manage Employees</h1>
<?php
if ($_SESSION['accesslevel']!='Supervisor')
{ 
	$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}
else {
	$deptid = $_SESSION['deptid'];
?>
<a href="#" onclick="new_employee()">Add New Employee</a><br />		<!-- Work on this -->
	<?php
	require_once('connectvars.php'); 
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
 $query = "select * from departments inner join employees on departments.id=employees.department_id inner join person on employees.person_id=person.id WHERE departments.id='$deptid'";
 $data = mysqli_query($dbc, $query);
?>
<table width="100%" id="contenttable">
	<tr class="thead">
		<td>Name</td><td>Email</td><td>Phone Number</td><td>Gender</td><td>Address</td><td>Date of Birth</td>
	
	</tr>
	<?php
 while ($row = mysqli_fetch_array($data)) {
 	echo '<tr class="tbody" onclick="editthis(4,' . $row['person_id'] . ')"><td>' . $row['name'] . '</td><td>' . $row['email'] . '</td><td>' . $row['phone'] . '</td><td>' . $row['gender'] . '</td><td>' . $row['address'] . '</td><td>' . $row['date_of_birth'] . '</td></tr>';
 }
 ?>
</table>

	<?php
}
?>