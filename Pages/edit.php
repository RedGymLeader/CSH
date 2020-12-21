<?php
require('db.php');
$id=$_REQUEST['id'];
$query = "SELECT * from CurrentInventory where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Inventory</title>
<link rel="stylesheet" href="css/style.css" />
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>
<div class="form">
<h1>Update Inventory</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$Type =$_REQUEST['Type'];
$Description =$_REQUEST['Description'];
$Price =$_REQUEST['Price'];
$Quantity =$_REQUEST['Quantity'];
$ItemNumber =$_REQUEST['ItemNumber'];
$update="update CurrentInventory set Type='".$Type."', Description='".$Description."', Price='".$Price."', Quantity='".$Quantity."', ItemNumber='".$ItemNumber."' where id='".$id."'";
mysqli_query($con, $update) or die('Error: ' .mysqli_error($con));
$status = "Record Updated Successfully. </br></br><a href='home.php'>View Updated Inventory</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><label for="Type"><b>Type</b></label>
<input type="text" name="Type" placeholder="Enter Type" required value="<?php echo $row['Type'];?>" /></p>
<p><label for="Description"><b>Description</b></label>
<input type="text" name="Description" placeholder="Enter Description" required value="<?php echo $row['Description'];?>" /></p>
<p><label for="Price"><b>Price</b></label>
<input type="text" name="Price" placeholder="Enter Price" required value="<?php echo $row['Price'];?>" /></p>
<p><label for="Quantity"><b>Quantity</b></label>
<input type="text" name="Quantity" placeholder="Enter Quantity" required value="<?php echo $row['Quantity'];?>" /></p>
<p><label for="ItemNumber"><b>Item Number</b></label>
<input type="text" name="ItemNumber" placeholder="Enter ItemNumber" required value="<?php echo $row['ItemNumber'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>