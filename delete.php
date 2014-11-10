<?php
ob_start();
session_start();
if (!isset($_SESSION['userempid']) || !isset($_SESSION['usernaam'])) {
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}
require_once('connectvars.php'); 
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

$what = $_GET['what'];
$id = $_GET['id'];
if ($_SESSION['accesslevel']=='Supervisor') {
if ($what == 'product') {
$query="DELETE from products where id = '$id' limit 1";
mysqli_query($dbc, $query);
echo 'Product was deleted successfully.';
}
else if ($what == 'supplier') {
$query="DELETE from person where id = '$id' limit 1";
mysqli_query($dbc, $query);
echo 'Supplier was deleted successfully.';
}
else if ($what == 'employee') {
$query="DELETE from person where id = '$id' limit 1";
mysqli_query($dbc, $query);
echo 'Employee was deleted successfully.';
}
else if ($what == 'customer') {
$query="DELETE from person where id = '$id' limit 1";
mysqli_query($dbc, $query);
echo 'Customer was deleted successfully.';
}
}
else {
	echo 'You do not have permission to do that. ';
}
?>