<?php
ob_start();
session_start();
if (!isset($_SESSION['userempid']) || !isset($_SESSION['usernaam'])) {
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}
echo '<h3>Welcome, ' . $_SESSION['usernaam'] . '</h3>';
?>


<html>
<head><title>HyperCity :: Database Administration</title>
</head>
<body>
	You are a <?php echo $_SESSION['accesslevel']; ?>, from department <?php echo $_SESSION['deptid']; ?> and user id <?php echo $_SESSION['userempid']; ?>.
<br /><a href="logout.php">Logout</a>
<hr />
<h3>Manage HyperCity Customers</h3>
<form action="add_customer.php" method="POST">
<input type="text" id="c_name" name="c_name" placeholder="Customer Name" /><br />
<input type="text" id="c_email" name="c_email" placeholder="Email Address" /><br />
<input type="text" id="c_phone" name="c_phone" placeholder="Phone Number" /><br />
<input type="text" id="c_gender" name="c_gender" placeholder="Gender" /><br />
<input type="text" id="c_address" name="c_address" placeholder="Address" /><br />
<input type="text" id="c_age" name="c_age" placeholder="Age" /><br />
<input type="text" id="c_dob" name="c_dob" placeholder="Date of Birth" /><br />
<input type="submit" />
</form>