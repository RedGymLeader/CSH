<?php
require('db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM customers WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
echo '<script language="javascript">';
echo 'alert("Customer Successfully Deleted")';
echo '</script>';
?>
<div id="center_button"><button onclick="location.href='customerdatabase.php'">Back to Customer Database</button></div>