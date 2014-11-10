<?php
ob_start();
session_start();
if (!isset($_SESSION['userempid']) || !isset($_SESSION['usernaam'])) {
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?err=notfound'; 
header('Location: ' . $home_url); 
}
// echo '<h3>Welcome, ' . $_SESSION['usernaam'] . '</h3>';
?>


<html>
<head><title>HyperCity :: Database Administration</title>

	<link rel="stylesheet" href="jqueryui.css" />
	<style>
@font-face {
	src: url('./font.ttf');
	font-family: myfont;
}
body {
	font-family: myfont;
		background-color: rgba(47,101,158,1);


}
#header {
	position: fixed;
	top:0px;
	left:0px;
	width:100%;
	max-width: 100%;
	height:100px;
	max-height: 100px;
	z-index:1002;

	/*opacity:0.8;*/
	/*background-color: white;*/
	/*padding-top:50px;*/
}
#navbtn {
	background-color: rgba(255,255,255,0.8);
	padding-top:15px;
	font-size: 1.5em;
	float: left;
	width:20%;
	box-shadow: 0px 0px 10px black;
	text-align: center;
	padding-bottom: 15px;
	/*color:white;*/
		border-right:5px solid white;

	border-bottom:5px solid white;

	vertical-align: middle;
	display:table-cell;
	  cursor: pointer;
  -webkit-transition: all 0.8s;
  -moz-transition: all 0.8s;
  -ms-transition: all 0.8s;
  -o-transition: all 0.8s;
  transition: all 0.8s;
}
#userbtn {
		background-color: rgba(255,255,255,0.8);
	padding-top:9px;
	width:20%;
	/*text-align: center;*/
	font-size: 1em;
	float: right;
	padding-bottom: 9px;
		border-bottom:5px solid white;
	border-left:5px solid white;

	/*color:white;*/
	vertical-align: middle;
	box-shadow: 0px 0px 10px black;
	display:table-cell;
	cursor: pointer;
	overflow: hidden;
}
#flowdetails {
		background-color: rgba(255,255,255,0.8);
	/*padding-top:9px;*/
	padding:10px;
	width:15%;
	/*text-align: center;*/
	font-size: 1em;
	position: fixed;
	top:230px;
	right:0px;
	/*padding-bottom: 9px;*/
	border:5px solid white;
	border-right: 0px;
	display: none;
	/*color:white;*/
	vertical-align: middle;
	/*opacity: 0;*/
	/*display: none;*/
	box-shadow: 0px 0px 5px black;
	/*display:table-cell;*/
	overflow: hidden;
	cursor: pointer;
}
#titleofpage {
position: fixed;
top:0px;
left:0px;
vertical-align: middle;
display:table-cell;
text-align: center;
width:100%;
color:white;
text-shadow: 0px 0px 3px black;
max-width: 100%;
padding-top:15px;
background-color: rgba(47,101,158,0.2);
	font-size: 1.5em;
	padding-bottom: 15px;
	z-index: 1001;
	border-bottom: 1px dashed white;
}
#userbtn img {
	max-width:42px;
	width:42px;
	height:42px;
	margin-left: 30px;
	float: left;
	max-height: 42px;
	margin-right: 10px;

}
#content {
	width:58%;
	border-radius: 10px;
	/*border: 1px dashed blue;*/
	position: absolute;
	top:100px;
	-moz-box-sizing: border-box; 
    -webkit-box-sizing: border-box; 
     box-sizing: border-box; 
     padding: 20px;
     	border:5px solid rgba(47,101,158,0.3);

	right:21%;
	box-shadow: 0px 0px 5px black;
	left: 21%;
	background-color: white;
	/*padding:10px;*/
	font-size: 1.5em;
	color:black;
}
h1 {
	padding:0px;
	margin:0px;
	color:rgba(47,101,158,0.9);
	font-size: 1.7em;
	margin-bottom: 20px;
}
#navbtn ul {
	 -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  display: none;
  opacity: 0;
  margin-top: 14px;
  /*color: white;*/
  visibility: hidden;
  -webkit-transiton: opacity 0.8s ease-in;
  -moz-transition: opacity 0.8s ease-in;
  -ms-transition: opacity 0.8s ease-in;
  -o-transition: opacity 0.8s ease-in;
  transition: opacity 0.8s ease-in;
}
#navbtn:hover ul {
  display: block;
  font-size: 0.9em;
  opacity: 1;
  visibility: visible;

}
#navbtn ul a{
	/*color:white;*/
	color:black;
	text-decoration: none;
}
#navbtn ul a li {
	display: block;
	padding-top:10px;
	padding-bottom: 10px;
	text-align: center;
}
#navbtn ul a li:hover {
	background-color: rgba(47,101,158,1);
	color:white;
}



#userbtn ul {
	 -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  display: none;
  opacity: 0;
  margin-top: 14px;
  font-size: 0.9em;
  /*color: white;*/
  visibility: hidden;
  -webkit-transiton: opacity 5s ease-in-out;
  -moz-transition: opacity 5s ease-in-out;
  -ms-transition: opacity 5s ease-in-out;
  -o-transition: opacity 5s ease-in-out;
  transition: opacity 5s ease-in-out;
}
#userbtn:hover ul {
  display: block;
  opacity: 1;
  visibility: visible;

}
#userbtn ul a{
	color:black;
	text-decoration: none;
}
#userbtn ul a li {
	display: block;
	font-size: 1.5em;
	padding-top:10px;
	padding-bottom: 10px;
	text-align: center;
}
#userbtn ul a li:hover {
	background-color: rgba(47,101,158,1);
	color:white;
}
.thead {
	background-color: rgba(47,101,158, 1);
	color:white;
}
.thead td {
	text-align: center;
	padding: 5px;
	font-size: 0.9em;
}
.tbody {
	background-color: rgba(47,101,158, 0.2);
}
.tbody td {
	padding: 5px;
	font-size: 0.9em;
}
.tbody:hover {
	/*background-color: rgba()*/
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
box-shadow: 0px 0px 10px black;
background-color: rgba(255,255,255,0.8);
	font-size: 1em;
	padding-bottom: 5px;
	z-index: 1001;
	border-top: 5px solid white;
	/*text-shadow: 0px 0px 20px black;*/

}
form tr td input {
	width:100%;
	max-width: 100%;

}
input {
	font-family: myfont;
	outline-width: 0px;
	padding:5px;
}
*::-webkit-input-placeholder {
    color: black;
}
*:-moz-placeholder {
    /* FF 4-18 */
    color: black;
}
*::-moz-placeholder {
    /* FF 19+ */
    color: black;
}
*:-ms-input-placeholder {
    /* IE 10+ */
    color: black;
}
#more {
	display:none;
	text-align: center;
	margin-top: 20px;
}
#more button {
	margin-top: 20px;
}
#more select {
	padding: 10px;
}
form button, input[type=submit] {
	padding-left:10px;
	padding-right: 10px;
	border-radius: 5px;
	border:0px;
	outline-width: 0px;
	color:white;
	font-size: 1em;
	box-shadow: 0px 0px 1px black;
	background-color: rgba(47,101,158, 1);
}
 button {
	font-size: 0.7em;
}
input[type=text] {
	font-size: 1em;
}
	</style>
</head>
<body>
<div id="header">
<span id="navbtn">Navigation<br /><ul>
<?php
if ($_SESSION['accesslevel'] == 'Supervisor') {
	echo '<a href="#"><li onclick="load_c(6)">View all transactions</li></a>';
	echo '<a href="#"><li onclick="load_c(8)">Manage Employees</li></a>';
	echo '<a href="#"><li onclick="load_c(9)">Employees supervised</li></a>';

}
if ($_SESSION['accesslevel'] == 'Supervisor' && $_SESSION['deptid']==1) {
	echo '<a href="#"><li onclick="load_c(10)">Add Supervisors</li></a>';
}
?>
<a href="#"><li onclick="load_c(3)">Manage Customers</li></a>
<a href="#"><li onclick="load_c(4)">My Department</li></a>
<a href="#"><li onclick="load_c(5)">My Transactions</li></a>
<a href="#"><li onclick="load_c(7)">New Transaction</li></a>
<a href="#"><li onclick="load_c(2)">See all products</li></a>
<a href="#"><li onclick="load_c(1)" style="margin-bottom:0px;">View suppliers</li></a>
</ul></span>
<span id="userbtn"><img src="abc.jpg"><?php echo $_SESSION['usernaam'] . '<br />' . $_SESSION['accesslevel'] . ', ' . $_SESSION['deptname']; ?><br /><ul>
<a href="#"><li onclick="editthis(4, <?php echo $_SESSION['userempid']; ?>)">Edit profile</li></a>
<a href="logout.php"><li>Logout</li></a>
</ul></span>
</div>

<span id="titleofpage">HyperCity :: Database Administration</span>
<span id="footer">&copy; 2014 Mrinal Dhar &amp; Chirag Singhal. All Rights Reserved.</span>

<div id="content">
<h1>Content title</h1>
Actual Content
</div>
<span id="flowdetails">
hi
</span>
</body>
<script src="jquery.js"></script>
<script src="jqueryui.js"></script>
<script>
function load_c(what) {
	switch(what) {
		case 1:
		$.ajax({
  type: "GET",
  url: "view_suppliers.php",
})
  .done(function( msg ) {
    $('#content').html(msg);
  });
  break;
  case 2:
  $.ajax({
  type: "GET",
  url: "all_products.php",
})
  .done(function( msg ) {
    $('#content').html(msg);
  });
  break;
  case 3:
  $.ajax({
  type: "GET",
  url: "edit_customers.php",
})
  .done(function( msg ) {
    $('#content').html(msg);
  });
  break;
  case 4:
    $.ajax({
  type: "GET",
  url: "view_department.php?deptviewid=<?php echo $_SESSION['deptid']; ?>",
})
  .done(function( msg ) {
    $('#content').html(msg);
  });
  break;
  case 5:
    $.ajax({
  type: "POST",
  url: "view_transactions.php?staff_id=<?php echo $_SESSION['userempid']; ?>",
})
  .done(function( msg ) {
    $('#content').html(msg);
  });
  break;
    case 6:
    $.ajax({
  type: "POST",
  url: "view_transactions.php",
})
  .done(function( msg ) {
    $('#content').html(msg);
  });
  break;
      case 7:
    $.ajax({
  type: "GET",
  url: "new_transaction.php",
})
  .done(function( msg ) {
  	
    $('#content').html(msg);
    $('#flowdetails').html("Proceed to Payment<br />Total Bill Amount: <big>Rs. <span id='flow'>0</span></big>");
    $('#flowdetails').show();
    $('#flowdetails').click(do_transaction1);
    $('#flowdetails').fadeIn(1000);
  });
   break;
   case 8:
  $.ajax({
  type: "GET",
  url: "manage_employees.php",
})
  .done(function( msg ) {
    $('#content').html(msg);
  });
   break;
      case 9:
  $.ajax({
  type: "GET",
  url: "employees_supervised.php",
})
  .done(function( msg ) {
    $('#content').html(msg);
  });
   break;
	}
}

function new_user() {
	var trow = '<tr class="tbody"><form action="add_customer.php" method="POST">\
	<td><input type="text" id="c_name" name="c_name" style="background-color:transparent; width:100%; max-width:100%;" placeholder="Customer Name" /></td>\
<td><input type="text" id="c_email" name="c_email" style="background-color:transparent; width:100%; max-width:100%;" placeholder="Email Address" /></td>\
<td><input type="text" id="c_phone" name="c_phone" style="background-color:transparent; width:100%; max-width:100%;" placeholder="Phone Number" /></td>\
<td><select id="c_gender" name="c_gender" style="background-color:transparent; width:100%; max-width:100%;"><option>Gender</option><option>Male</option><option>Female</option></select></td>\
<td><input type="text" id="c_address" name="c_address" style="background-color:transparent; width:100%; max-width:100%;" placeholder="Address" /></td>\
<td>1</td>\
<td><input type="text" id="c_dob" name="c_dob" style="background-color:transparent; width:100%; max-width:100%;" placeholder="Date of Birth" /><input type="submit" /></td>\
\
</form></tr>';
$('#contenttable').append(trow);
}
function new_supplier() {
	var trow = '<tr class="tbody"><form action="add_supplier.php" method="POST">\
	<td><input type="text" id="c_name" name="c_name" style="background-color:transparent; width:100%; max-width:100%;" placeholder="Supplier Name" /></td>\
	<td><select id="c_rating" name="c_rating"><option>Rating</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></td>\
<td><input type="text" id="c_email" name="c_email" style="background-color:transparent; width:100%; max-width:100%;" placeholder="Email Address" /></td>\
<td><input type="text" id="c_phone" name="c_phone" style="background-color:transparent; width:100%; max-width:100%;" placeholder="Phone Number" /></td>\
<td><select id="c_gender" name="c_gender" style="background-color:transparent; width:100%; max-width:100%;"><option>Gender</option><option>Male</option><option>Female</option></select></td>\
<td><input type="text" id="c_address" name="c_address" style="background-color:transparent; width:100%; max-width:100%;" placeholder="Address" /></td>\
<td><input type="text" id="c_products" name="c_products" style="background-color:transparent; width:100%; max-width:100%;" /></td>\
<td><input type="date" id="c_ws" name="c_ws" style="background-color:transparent; width:100%; max-width:100%;" placeholder="Working since" /><input type="submit" /></td></form></tr>';
$('#contenttable').append(trow);
}
function products_ajax() {
	var availableTags;
	
	var q = document.getElementById('q').value;
	$.ajax({
  type: "GET",
  url: "ajax_products.php?q="+q,
})
  .done(function( msg ) {
  	 availableTags = msg.trim().split(',');
  	  $( "#q" ).autocomplete({
      source: availableTags
    });
  	  console.log(availableTags);
    // $('#content').html(msg);
  });

  $('#q').keypress(function(e) {
  if(e.which == 13) {
    $.ajax({
  type: "GET",
  url: "ajax_products_price.php?q="+q,
})
  .done(function( msg ) {
  	msg = msg.split(',');
  	$('#price_current_unit').html(msg[0]);
  	// console.log(msg);
  	$('#itemid').val(msg[1]);
  	$('#quantity').focus();
    // $('#content').html(msg);
  });
  }
});
}
  
function products_calculate_1() {
	$('#price_current_unit').focus()
	var quantity = $('#quantity').val();
	quantity = parseInt(quantity);
	// alert(quantity);
	var price_unit = $('#price_current_unit').html();
	price_unit = parseInt(price_unit);
	// alert(price_unit*quantity);
	$('#price_current_total').html(price_unit * quantity);
}
function add_item_to_cart() {
	// alert('doing');
	var proname = $('#q').val();
	var proquan = $('#quantity').val();
	var proppu = $('#price_current_unit').html();
	var proptotal = $('#price_current_total').html();
	var itemid = $('#itemid').val();
	// alert(itemid);
	var trow = "<tr class='tbody' id="+itemid+"><td class='proname'>"+proname+"</td><td>"+proquan+"</td><td>"+proppu+"</td><td>"+proptotal+"</td><td style='cursor:pointer; text-align:center; border:1px solid black;' onclick='removethisfromtable("+itemid+")'>Remove from cart</td></tr>";
	$('#contenttable').append(trow);
	$('#q').val('');
	$('#quantity').val('');
	$('#price_current_unit').html('N/A');
	$('#price_current_total').html('N/A');
	var flow = document.getElementById('flow');
	console.log(flow.innerHTML);
	flow.innerHTML = parseInt(flow.innerHTML) + parseInt(proptotal);
	$('#q').focus();

}
function removethisfromtable(itemid) {
	var item = document.getElementById(itemid);
	item.parentNode.removeChild(item);
}
function do_transaction1() {
	$(this).hide();
	
	var page2 = "<input type='text' id='custemail' name='custemail' style='background-color: rgba(47,101,158,0.2); width:50%; max-width:50%; padding: 5px; font-size: 1.1em;' placeholder='Customer email' /><br /><select id='paytype'><option>Payment Method</option><option>Credit Card</option><option>Debit Card</option><option>Cash</option></select><br /><button onclick='completetransaction(1)' style='width:25%; padding:10px; background-color: rgba(47,101,158,1); border: 0px; cursor: pointer; box-shadow: 0px 0px 1px black; outline-width:0px; color:white'>Complete transaction</button>";
	$('#more').html(page2);
	// $('#contenttable').slideUp(500);
	$('#more').slideDown(500);
	var q = $('#custemail').val();
	$.ajax({
  type: "GET",
  url: "ajax_customer.php?q="+q,
})
  .done(function( msg ) {
  	 availablenames = msg.trim().split(',');
  	  $( "#custemail" ).autocomplete({
      source: availablenames
    });
  	  console.log(availablenames);
    // $('#content').html(msg);
  });
}
function completetransaction(typeoftrans) {
	alert('got it');
	var namematches = [];
	var idmatches = [];
	elements = document.getElementsByClassName('proname');
	for (var i=0; i<elements.length; i++)
	{
		namematches.push(elements[i].innerHTML);
	}
	elements = document.getElementsByClassName('tbody');
	for (var i=0; i<elements.length; i++)
	{
		if (elements[i].id!='')
		{
		idmatches.push(elements[i].id);
		}
	}
	console.log(namematches);
	console.log(idmatches);
	transtypes = ['supp', 'cust'];
	var product_ids = idmatches.join(',');
	console.log(product_ids);
	$.ajax({
  type: "POST",
  url: "ajax_add_transaction.php",
  data: {
totalcost: $('#flow').html(),
paymode: $('#paytype').val(),
listofitems: product_ids,								//Works now! YAY!
type: transtypes[typeoftrans],
custemail: $('#custemail').val()
  }
})
  .done(function( msg ) {
  	 console.log(msg);
  	 });
}	

function new_employee() {
	var trow = '<tr class="tbody"><form action="add_employee.php" method="POST">\
	<td><input type="text" id="c_name" name="c_name" style="background-color:transparent; width:100%; max-width:100%;" placeholder="Employee Name" /></td>\
<td><input type="text" id="c_email" name="c_email" style="background-color:transparent; width:100%; max-width:100%;" placeholder="Email Address" /></td>\
<td><input type="text" id="c_phone" name="c_phone" style="background-color:transparent; width:100%; max-width:100%;" placeholder="Phone Number" /></td>\
<td><select id="c_gender" name="c_gender" style="background-color:transparent; width:100%; max-width:100%;"><option>Gender</option><option>Male</option><option>Female</option></select></td>\
<td><input type="text" id="c_address" name="c_address" style="background-color:transparent; width:100%; max-width:100%;" placeholder="Address" /></td>\
<td><input type="date" id="c_dob" name="c_dob" style="background-color:transparent; width:100%; max-width:100%;" placeholder="Date of Birth" /><input type="submit" /></td></form></tr>';
$('#contenttable').append(trow);
}

function new_product() {
	var trow = '<tr class="tbody"><form action="add_product.php" method="POST">\
	<td><input type="text" id="c_name" name="c_name" style="background-color:transparent; width:100%; max-width:100%;" placeholder="Product Name" /></td>\
<td><input type="text" id="c_ppu" name="c_ppu" style="background-color:transparent; width:100%; max-width:100%;" placeholder="Price per Unit" /></td>\
<td><input type="text" id="c_cat" name="c_cat" style="background-color:transparent; width:100%; max-width:100%;" placeholder="Category" /></td>\
<td><input type="text" id="c_shelf" name="c_shelf" style="background-color:transparent; width:100%; max-width:100%;" placeholder="On shelf" /></td>\
<td><input type="text" id="c_inventory" name="c_inventory" style="background-color:transparent; width:100%; max-width:100%;" placeholder="In Inventory" /></td>\
<td><input type="date" id="c_suppname" name="c_suppname" style="background-color:transparent; width:100%; max-width:100%;" placeholder="Supplier Name" /><input type="submit" /></td></form></tr>';
$('#contenttable').append(trow);
}

function editthis(what, id) {
	switch(what) {
		case 1:
			$.ajax({
  type: "GET",
  url: "edit_this_product.php?id="+id,
})
  .done(function( msg ) {
    $('#content').html(msg);
  });
		break;
		case 2:
			$.ajax({
  type: "GET",
  url: "edit_this_customer.php?id="+id,
})
  .done(function( msg ) {
    $('#content').html(msg);
  });
		break;
		case 3:
			$.ajax({
  type: "GET",
  url: "edit_this_supplier.php?id="+id,
})
  .done(function( msg ) {
    $('#content').html(msg);
  });
		break;
		case 4:
			$.ajax({
  type: "GET",
  url: "edit_this_employee.php?id="+id,
})
  .done(function( msg ) {
    $('#content').html(msg);
  });
		break;
	}
}

function deletethis(what, id) {
	var sure = prompt("Are you sure? This cannot be undone.");
	if (sure == true) {
		switch(what) {
			case 1:
			$.ajax({
  type: "GET",
  url: "del_this_supplier.php?id="+id,
})
  .done(function( msg ) {
    $('#content').html(msg);
  });
			break;
			case 2:
			$.ajax({
  type: "GET",
  url: "del_this_employee.php?id="+id,
})
  .done(function( msg ) {
    $('#content').html(msg);
  });
			break;
			case 3:
			$.ajax({
  type: "GET",
  url: "del_this_customer.php?id="+id,
})
  .done(function( msg ) {
    $('#content').html(msg);
  });
			break;
			case 4:
			$.ajax({
  type: "GET",
  url: "del_this_product.php?id="+id,
})
  .done(function( msg ) {
    $('#content').html(msg);
  });
			break;

		}
	}
}
</script>
</html>

<!-- If you get time, add ability to add new departments. -->