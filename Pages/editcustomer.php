<?php
require('db.php');
$id=$_REQUEST['id'];
$query = "SELECT * from customers where id='".$id."'"; 
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
<h1>Update Customer Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$firstName =$_REQUEST['firstName'];
$lastName =$_REQUEST['lastName'];
$Address =$_REQUEST['Address'];
$phone =$_REQUEST['phone'];
$email =$_REQUEST['email'];
$update="update customers set firstName='".$firstName."', lastName='".$lastName."', Address='".$Address."', phone='".$phone."', email='".$email."' where id='".$id."'";
mysqli_query($con, $update) or die('Error: ' .mysqli_error($con));
$status = "Record Updated Successfully. </br></br><a href='customerdatabase.php'>View Updated Customer Database</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><label for="firstName">First Name</label>
    <input type="text" name="firstName" placeholder="Enter First Name" required value="<?php echo $row['firstName'];?>" /></p>
<p><label for="lastName">Last Name</label>
    <input type="text" name="lastName" placeholder="Enter Last Name" required value="<?php echo $row['lastName'];?>" /></p>
<p><label for="Address">Address</label>
    <input type="text" name="Address" placeholder="Enter Address" required value="<?php echo $row['Address'];?>" /></p>
<p><label for="phone">Phone</label>
    <input type="text" name="phone" placeholder="Enter Phone Number" required value="<?php echo $row['phone'];?>" /></p>
<p><label for="email">E-mail</label>
    <input type="text" name="email" placeholder="Enter Email Address" required value="<?php echo $row['email'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>