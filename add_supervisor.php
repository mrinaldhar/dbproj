<?php
ob_start();
session_start();
if (!isset($_SESSION['userempid']) || !isset($_SESSION['usernaam'])) {
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}
?>
<h1>Promote employee to supervisor</h1>
<?php
require_once('connectvars.php'); 
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
$query = "SELECT * FROM employees inner join person on employees.person_id=person.id";
$data = mysqli_query($dbc, $query);
echo '<form action="super.php" method="POST">';
echo '<select id="who" name="who">';
while ($row = mysqli_fetch_array($data)) {
	echo '<option>'.$row['department_id'] . ':' . $row['person_id'].':'.$row['name'].'</option>';
}
echo '</select><br /><input type="submit" value="OK" />';
echo '</form>';
