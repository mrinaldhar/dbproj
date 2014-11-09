<?php
ob_start();
session_start();
if (isset($_SESSION['userempid']) && isset($_SESSION['usernaam'])) {
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/home.php'; 
header('Location: ' . $home_url); 
}
?>
<html>
<head><title>HyperCity :: Database Administration</title>
<style>
@font-face {
	src: url('font.ttf');
	font-family: myfont;
}
body {
	font-family: myfont;
	background-color: rgba(47,101,158,1);
}
#titleofpage {
position: fixed;
top:0px;
left:0px;
vertical-align: middle;
display:table-cell;
text-align: center;
width:100%;
max-width: 100%;
padding-top:5px;
background-color: rgba(255,255,255,0.8);
	font-size: 2em;
	padding-bottom: 5px;
	z-index: 11;
	border-bottom: 5px solid white;
	box-shadow: 0px 0px 10px black;
}
#footer {
position: fixed;
bottom:0px;
left:0px;
vertical-align: middle;
display:table-cell;
text-align: center;
width:100%;
max-width: 100%;
padding-top:5px;
background-color: rgba(255,255,255,0.8);
	font-size: 1.3em;
	padding-bottom: 5px;
	z-index: 1001;
	border-top: 5px solid white;
	box-shadow: 0px 0px 10px black;
}
#content {
	text-align: center;
	width:38%;
	border-radius: 10px;
	border:5px solid white;
	position: absolute;
	top:170px;
	-moz-box-sizing: border-box; 
    -webkit-box-sizing: border-box; 
     box-sizing: border-box; 
     padding: 20px;
	right:31%;
	left: 31%;
	/*padding:10px;*/
	box-shadow: 0px 0px 10px black;
	font-size: 1.5em;
	color:black;
}
h1 {
	padding:0px;
	margin:0px;
	color:rgb(255,255,255);
	font-size: 1.7em;
	margin-bottom: 30px;
}
table {
	text-align: center;
}
input {
	width:100%;
	max-width: 100%;
	border-radius: 5px;
	border:0px;
	padding:5px;
	font-size: 1.1em;
	outline-width: 0px;
	font-family: myfont;
	background-color: white;
}
input[type=submit] {
	color:rgba(47,101,158,1);
	opacity: 0.8;
}
input[type=submit]:hover {
	cursor: pointer;
	background-color: rgba(255,255,255,0.5);
	opacity: 1;
}
hr {
	margin-bottom: 30px;
}
#witty {
	z-index: 20;
	color:black;
	position: fixed;
	top:-15px;
	left:10px;
	font-size: 1.1em;
	/*color:white;*/
}

</style>
</head>
<body>
<!-- 	<h3>Login</h3>

 -->

<span id="titleofpage">HyperCity :: Database Administration</span>
<span id="footer">Created by: <big>Mrinal Dhar</big> (201325118) &amp; <big>Chirag Singhal</big> (201301013)</span>

<div id="content">
<h1>Login to continue</h1>
<hr style="width:100%; border:1px solid white;" />
<form action="login.php" method="POST">
	<table width="80%" align="center">
		<tr><td>
	<input type="text" class="inputtext" placeholder="Email Address" id="email" name="email" /></td></tr><tr><td>
	<input type="password" placeholder="Password" class="inputtext" id="password" name="password" />
	</td></tr><tr><td>
	<input type="submit" name="submit" id="submit" value="Login" /></td></tr>
</table>
</form>
</div>
<p id="witty"><big>Designed from Scratch. Proudly.</big><br /><small>because Bootstrap is for babies and old people.</small></p>


</body>
</html>