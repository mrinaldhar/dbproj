<?php
ob_start();
session_start();
if (!isset($_SESSION['userempid']) || !isset($_SESSION['usernaam'])) {
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}
require_once('connectvars.php'); 
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
$customer = $_GET['q'];
$query = "SELECT * from person inner join customer on person.id=customer.person_id WHERE email LIKE '%$customer%'";
$data = mysqli_query($dbc, $query);
while ($row = mysqli_fetch_array($data)) {
	echo $row['email'] . ',';
}
?>

