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
</head>
<body>
<div class="form">
<h1>Email Customer</h1>
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
<p><input type="text" name="firstName" placeholder="Enter First Name" required value="<?php echo $row['firstName'];?>" /></p>
<p><input type="text" name="lastName" placeholder="Enter Last Name" required value="<?php echo $row['lastName'];?>" /></p>
<p><input type="text" name="Address" placeholder="Enter Address" required value="<?php echo $row['Address'];?>" /></p>
<p><input type="text" name="phone" placeholder="Enter Phone Number" required value="<?php echo $row['phone'];?>" /></p>
<p><input type="text" name="email" placeholder="Enter Email Address" required value="<?php echo $row['email'];?>" /></p>
<p><input name="submit" type="submit" value="Send Email" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>