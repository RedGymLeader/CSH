<?php
require('db.php');

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$firstName = $_REQUEST['firstName'];
$lastName  =$_REQUEST['lastName'];
$Address = $_REQUEST['Address'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$ins_query="insert into customers (`firstName`,`lastName`,`Address`,`phone`,`email`) values ('$firstName','$lastName','$Address','$phone','$email')";
mysqli_query($con,$ins_query) or die('Error: ' .mysqli_error($con));
$status = "New Record Inserted Successfully.</br>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Customer</title>
</head>
<body>
<div class="form">
<div>
<h2><b>Insert New Customer</b></h2>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="firstName" placeholder="Enter First Name" required /></p>
<p><input type="text" name="lastName" placeholder="Enter Last Name" required /></p>
<p><input type="text" name="Address" placeholder="Enter Address" required /></p>
<p><input type="text" name="phone" placeholder="Enter Phone Number" required /></p>
<p><input type="text" name="email" placeholder="Enter Email" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>