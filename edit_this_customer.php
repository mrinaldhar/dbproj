<?php
ob_start();
session_start();
if (!isset($_SESSION['userempid']) || !isset($_SESSION['usernaam'])) {
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}
?>
<h1>Update this customer</h1>
<?php
require_once('connectvars.php'); 
$pid = $_GET['id'];
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
 $query = "select * from customer inner join person on customer.person_id=person.id WHERE person_id = '$pid' LIMIT 1";
 $data = mysqli_query($dbc, $query);
 while ($row = mysqli_fetch_array($data)) {

?>
<form method="POST" action="update.php">
<table width="100%" style="width:100%; max-width:100%;" id="contenttable">
	
	<tr class="tbody">
		<td>Customer name</td><td><input type="text" id="c_name" name="c_name" value="<?php echo $row['name']; ?>" /></td>
	</tr>
	<tr class="tbody">
		<td>Phone Number</td><td><input type="text" id="c_phone" name="c_phone" value="<?php echo $row['phone']; ?>" /></td>
	</tr>
	<tr class="tbody">
		<td>Gender</td><td><input type="text" id="c_gender" name="c_gender" value="<?php echo $row['gender']; ?>" /></td>
	</tr>
	<tr class="tbody">
		<td>Email</td><td><input type="text" id="c_email" name="c_email" value="<?php echo $row['email']; ?>" /></td>
	</tr>
	<tr class="tbody">
		<td>Address</td><td><input type="text" id="c_address" name="c_address" value="<?php echo $row['address']; ?>" /></td>
	</tr>
	<tr class="tbody">
		<td>Date of Birth</td><td><input type="text" id="c_dob" name="c_dob" value="<?php echo $row['date_of_birth']; ?>" /></td>
	</tr>
	<input type="hidden" id="id" name="id" value="<?php echo $pid; ?>" />
	<input type="hidden" id="type" name="type" value="customer" />
	<input type="submit" value="Update" />

</table>
</form>
 <?php
}
?>