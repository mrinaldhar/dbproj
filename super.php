<?php
ob_start();
session_start();
if (!isset($_SESSION['userempid']) || !isset($_SESSION['usernaam'])) {
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}
$deptid = explode(':', $_POST['who'])[0];
$pid = explode(':', $_POST['who'])[1];
require_once('connectvars.php'); 
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
$query = "INSERT INTO supervisor (person_id, department_id) VALUES ('$pid', '$deptid')";
mysqli_query($dbc, $query);
$query = "UPDATE employees set supervisor_id = '$pid' WHERE person_id = '$pid' LIMIT 1";
mysqli_query($dbc, $query);
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/home.php'; 
header('Location: ' . $home_url); 
?>