<?php
require('db.php');

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$Type = $_REQUEST['Type'];
$Description =$_REQUEST['Description'];
$Price = $_REQUEST['Price'];
$Quantity = $_REQUEST['Quantity'];
$ItemNumber = $_REQUEST["ItemNumber"];
$ins_query="insert into CurrentInventory (`Type`,`Description`,`Price`,`Quantity`,`ItemNumber`) values ('$Type','$Description','$Price','$Quantity','$ItemNumber')";
mysqli_query($con,$ins_query) or die('Error: ' .mysqli_error($con));
$status = "New Record Inserted Successfully.</br>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
</head>
<body>
<div class="form">
<div>
<h2><b>Insert New Inventory Item</b></h2>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="Type" placeholder="Enter Type" required /></p>
<p><input type="text" name="Description" placeholder="Enter Description" required /></p>
<p><input type="text" name="Price" placeholder="Enter Price" required /></p>
<p><input type="text" name="Quantity" placeholder="Enter Quantity" required /></p>
<p><input type="text" name="ItemNumber" placeholder="Enter ItemNumber" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>

