<?php
ob_start();
session_start();
if (!isset($_SESSION['userempid']) || !isset($_SESSION['usernaam'])) {
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}
?>
<h1>Employees you supervise</h1>
<?php
if ($_SESSION['accesslevel']!='Supervisor')
{ 
	$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}
else {
	$deptid = $_SESSION['deptid'];
	require_once('connectvars.php'); 
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
 $myid = $_SESSION['userempid'];
 $query = "select * from employees inner join person on employees.person_id=person.id where supervisor_id = '$myid'";
 $data = mysqli_query($dbc, $query);
?>
<table width="100%" id="contenttable">
	<tr class="thead">
		<td>Name</td><td>Email</td><td>Phone Number</td><td>Gender</td><td>Address</td><td>Date of Birth</td>
	
	</tr>
	<?php
 while ($row = mysqli_fetch_array($data)) {
 	if ($row['person_id']!=$_SESSION['userempid'])
 	{
 	echo '<tr class="tbody" onclick="edit_employee(' . $row['person_id'] . ')"><td>' . $row['name'] . '</td><td>' . $row['email'] . '</td><td>' . $row['phone'] . '</td><td>' . $row['gender'] . '</td><td>' . $row['address'] . '</td><td>' . $row['date_of_birth'] . '</td></tr>';
 	}
 }
 ?>
</table>

	<?php
}
?>