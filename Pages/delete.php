<?php
require('db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM CurrentInventory WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
echo '<script language="javascript">';
echo 'alert("Item Successfully Deleted")';
echo '</script>';
?>
<div id="center_button"><button onclick="location.href='home.php'">Back to Inventory</button></div>