<?php
ob_start();
session_start();
if (!isset($_SESSION['userempid']) || !isset($_SESSION['usernaam'])) {
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}
require_once('connectvars.php'); 
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

$what = $_POST['type'];
$id = $_POST['id'];

if ($what == 'product') {
$c_name = $_POST['c_name'];
$c_ppu = $_POST['c_ppu'];
$c_qos = $_POST['c_qos'];
$c_qii = $_POST['c_qii'];
$c_cat = $_POST['c_cat'];

$query = "UPDATE products set name = '$c_name', price_per_unit = '$c_ppu', quantity_on_shelf = '$c_qos', quantity_in_inventory = '$c_qii', product_category = '$c_cat' WHERE id = '$id' LIMIT 1";
mysqli_query($dbc, $query);
}
else if ($what == 'employee') {
$c_name = $_POST['c_name'];
$c_phone = $_POST['c_phone'];
$c_gender = $_POST['c_gender'];
$c_email = $_POST['c_email'];
$c_address = $_POST['c_address'];
$c_dob = $_POST['c_dob'];
$c_password = $_POST['c_password'];

$query = "UPDATE person set name = '$c_name', phone = '$c_phone', gender = '$c_gender', email = '$c_email', address = '$c_address' WHERE id = '$id' LIMIT 1";
mysqli_query($dbc, $query);
if ($c_password == '') {

$query = "UPDATE employees set date_of_birth = '$c_dob' WHERE person_id = '$id' LIMIT 1";
mysqli_query($dbc, $query);
}
else {
	$query = "UPDATE employees set password = MD5('$c_password'), date_of_birth = '$c_dob' WHERE person_id = '$id' LIMIT 1";
mysqli_query($dbc, $query);
}
}
else if ($what == 'supplier') {
$c_name = $_POST['c_name'];
$c_phone = $_POST['c_phone'];
$c_gender = $_POST['c_gender'];
$c_email = $_POST['c_email'];
$c_address = $_POST['c_address'];
$c_dob = $_POST['c_dob'];
$c_rating = $_POST['c_rating'];

$query = "UPDATE supplier set working_since = '$c_dob', rating = '$c_rating' WHERE person_id = '$id' LIMIT 1";
mysqli_query($dbc, $query);

$query = "UPDATE person set name = '$c_name', phone = '$c_phone', gender = '$c_gender', email = '$c_email', address = '$c_address' WHERE id = '$id' LIMIT 1";
mysqli_query($dbc, $query);
}
else if ($what == 'customer') {
	$c_name = $_POST['c_name'];
$c_phone = $_POST['c_phone'];
$c_gender = $_POST['c_gender'];
$c_email = $_POST['c_email'];
$c_address = $_POST['c_address'];
$c_dob = $_POST['c_dob'];
$query = "UPDATE person set name = '$c_name', phone = '$c_phone', gender = '$c_gender', email = '$c_email', address = '$c_address' WHERE id = '$id' LIMIT 1";
mysqli_query($dbc, $query);
$query = "UPDATE customer set date_of_birth = '$c_dob' WHERE person_id = '$id' LIMIT 1";
mysqli_query($dbc, $query);
}
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/home.php?msg=success'; 
header('Location: ' . $home_url); 
?>