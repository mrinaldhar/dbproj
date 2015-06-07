<?php
ob_start();
session_start();
if (!isset($_SESSION['userempid']) || !isset($_SESSION['usernaam'])) {
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}

if ($_POST['type']=='supp' && $_SESSION['accesslevel']!='Supervisor') {
	$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}
else {

require_once('connectvars.php'); 
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
 
 $type = $_POST['type'];
 $other_id = $_POST['other_id'];
 $other_name = $_POST['other_name'];
 $staff_id = $_SESSION['userid'];
 $staff_name = $_SESSION['usernaam'];
 $query = "INSERT INTO person (name, phone, gender, email, address, age) VALUES('$c_name', '$c_phone', '$c_gender', '$c_email', '$c_address', '$c_age')";
 mysqli_query($dbc, $query);
 $query = "SELECT * FROM person WHERE email = '$c_email' LIMIT 1";
 $data2 = mysqli_query($dbc, $query);
 while ($row = mysqli_fetch_array($data2)) {
 	// echo 'doing';
 	$pid = $row['id'];
 	$query = "INSERT INTO customer (date_of_birth, number_of_visits, person_id) VALUES('$c_dob', 1, '$pid')";
 	mysqli_query($dbc, $query);
 }
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/home.php'; 
header('Location: ' . $home_url); 
}
?>
