<?php
ob_start();
session_start();
if (!isset($_SESSION['userempid']) || !isset($_SESSION['usernaam'])) {
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}

require_once('connectvars.php'); 
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
 
 $c_name = $_POST['c_name'];
 $c_category = $_POST['c_cat'];
 $c_inventory = intval($_POST['c_inventory']);
 $c_shelf = intval($_POST['c_shelf']);
 $c_suppname = $_POST['c_suppname'];
 $c_ppu = floatval($_POST['c_ppu']);


 $query = "SELECT supplier.id, person.name from supplier inner join person on person.id=supplier.person_id WHERE person.email = '$c_suppname' LIMIT 1";
 $data2 = mysqli_query($dbc, $query);
 while ($row = mysqli_fetch_array($data2)) {
 	echo 'doing';
 	// echo $row['id'];
 	$c_suppid = intval($row['id']);
 	$c_suppnaam = $row['name'];

 echo $c_suppnaam . $c_suppid;
 $query2 = "INSERT INTO products (name, price_per_unit, quantity_on_shelf, quantity_in_inventory, product_category, supplier_name, supplier_id) VALUES ('$c_name', '$c_ppu', '$c_shelf', '$c_inventory', '$c_category', '$c_suppnaam', '$c_suppid')";
 mysqli_query($dbc, $query2);
 }
echo 'Product added: ' . $c_name;
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/home?msg=done'; 
header('Location: ' . $home_url); 
?>
