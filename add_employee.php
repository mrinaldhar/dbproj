<?php
ob_start();
session_start();
if (!isset($_SESSION['userempid']) || !isset($_SESSION['usernaam'])) {
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}

require_once('connectvars.php'); 
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
 if ($_SESSION['accesslevel']=='Supervisor')
 {
 $c_name = $_POST['c_name'];
 $c_gender = $_POST['c_gender'];
 $c_address = $_POST['c_address'];
 $c_phone = $_POST['c_phone'];
 $c_email = $_POST['c_email'];
 $c_dob = $_POST['c_dob'];
 $query = "SELECT * FROM person WHERE email = '$c_email'";
 $data = mysqli_query($dbc, $query);
 if (mysqli_num_rows($data)==0)
 {
 $query = "INSERT INTO person (name, phone, gender, email, address) VALUES('$c_name', '$c_phone', '$c_gender', '$c_email', '$c_address')";
 mysqli_query($dbc, $query);
 $query = "SELECT * FROM person WHERE email = '$c_email' LIMIT 1";
 $data2 = mysqli_query($dbc, $query);
 while ($row = mysqli_fetch_array($data2)) {
 	echo 'doing';
 	$pid = $row['id'];
 	echo $c_ws . $c_rating . $c_products . $pid;
 	$c_rating = floatval($c_rating);
 	$pid = intval($pid);
 	$supervisor_id = $_SESSION['userempid'];
 	$department_id = $_SESSION['deptid'];
 	$password = 'helloworld';
 	$queryz = "INSERT INTO employees (date_of_birth, department_id, person_id, supervisor_id, password) VALUES('$c_dob', '$department_id', '$pid', '$supervisor_id', MD5('$password'))";
 	mysqli_query($dbc, $queryz);
 }
echo 'Employee added: ' . $c_name;
}
else {
	echo 'An account with this email already exists.';
}
}
echo '<a href="home.php">Back to Home</a>';
?>
