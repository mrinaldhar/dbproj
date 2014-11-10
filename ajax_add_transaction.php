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
 
$staffid = intval($_SESSION['userempid']);
$staffname = $_SESSION['usernaam'];
$totalcost = floatval($_POST['totalcost']);
$paymode = $_POST['paymode'];
$listofitems = $_POST['listofitems'];
$type = $_POST['type'];
$otheremail = $_POST['custemail'];

if ($type == 'supp' && $_SESSION['accesslevel']!='Supervisor')
{
	$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/home.php?msg=unauthorized'; 
header('Location: ' . $home_url); 
}


date_default_timezone_set('utc');
$dt = new DateTime();
$datetime = $dt->format('Y-m-d H:i:s');

$query = "SELECT * FROM person where email = '$otheremail' LIMIT 1";
$data = mysqli_query($dbc, $query);
echo 'ok';
while ($row = mysqli_fetch_array($data)) {
	$custid = intval($row['id']);
	$custname = $row['name'];
	echo 'got it';
}
 $query = "INSERT INTO transactions (staff_id, staff_name, other_id, other_name, type, time) VALUES('$staffid', '$staffname', '$custid', '$custname', '$type', '$datetime')";
 mysqli_query($dbc, $query);
 $query = "SELECT * FROM transactions WHERE time = '$datetime' LIMIT 1";
 $data2 = mysqli_query($dbc, $query);
 while ($row = mysqli_fetch_array($data2)) {
 	echo 'doing';
 	$pid = intval($row['id']);
 	$query = "INSERT INTO receipts (time, total_cost, payment_mode, list_of_items, transaction_id) VALUES('$datetime', '$totalcost', '$paymode', '$listofitems', '$pid')";
 	mysqli_query($dbc, $query);
 }
echo $staffid.$staffname.$totalcost.$otheremail.$datetime.$type.$paymode;

}
?>
