<?php
ob_start(); session_start();
require_once('connectvars.php'); 
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
 
 $user_email = mysqli_real_escape_string($dbc, strip_tags($_POST['email'])); 
 $user_password = mysqli_real_escape_string($dbc, strip_tags($_POST['password'])); 
 $query = "SELECT employees.id, email, name, employees.department_id FROM employees INNER JOIN person ON employees.person_id=person.id WHERE email = '$user_email' AND password = MD5('$user_password') LIMIT 1";
$data = mysqli_query($dbc, $query);
if (mysqli_num_rows($data)!=0)
{
while ($row=mysqli_fetch_array($data))
{
	$_SESSION['userempid']=$row['id'];
	$_SESSION['useremail']=$row['email'];
	$_SESSION['usernaam']=$row['name'];
	$check = $row['id'];
	$_SESSION['deptid']=$row['department_id'];
	$deptid = $_SESSION['deptid'];

	$query2 = "SELECT employees.id from employees inner join supervisor on employees.person_id=supervisor.person_id WHERE employees.id = '$check' LIMIT 1";
	$data2 = mysqli_query($dbc, $query2);
	if (mysqli_num_rows($data2)==1)
	{
		$_SESSION['accesslevel'] = 'Supervisor';
	}
	else {
		$_SESSION['accesslevel'] = 'Employee';
	}

	$query2 = "SELECT person.id FROM employees INNER JOIN person on employees.person_id=person.id WHERE email = '$user_email' LIMIT 1";
	$data2 = mysqli_query($dbc, $query2);
	while($row2=mysqli_fetch_array($data2)) {
		$_SESSION['userempid'] = $row2['id'];
	}

	$query2 = "SELECT * FROM departments WHERE id='$deptid' LIMIT 1";
	$data2 = mysqli_query($dbc, $query2);
	while($row2=mysqli_fetch_array($data2)) {
		$_SESSION['deptname'] = $row2['name'];
		$_SESSION['deptphone'] = $row2['phone'];
	}
	// echo $_SESSION['directory'];
	$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/home.php'; 
          header('Location: ' . $home_url); 
}
}
else {
	$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
          header('Location: ' . $home_url); 
	// echo SHA1(MD5($user_password));
}
mysqli_close($dbc);
?>