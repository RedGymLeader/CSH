<?php
include "../config.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: index.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.php');
}
?>
<?php
require('db.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>CSH Customer Database</title>
  <link rel="icon" href="../Images/chimney-sweep.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../CSS/sidebar.css">
  <link rel="stylesheet" type="text/css" href="../CSS/bannerimage.css">
  <link rel="stylesheet" type="text/css" href="../CSS/table.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Current Inventory</title>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
   </script>
      <style>
   .but_logout {     
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    color: #fff;
    position: absolute;
    top: 0;
    left: 0;
}
body {
  border-radius: 5px;
  background-color: #f2f2f2;
  
}
</style>
</head>
<body>
<div class="sidenav">
  <img src="../Images/chimney-sweep.png" alt="Avatar" class="avatar" width="160" height="160">
  <a href="home.php">Inventory Manager</a>
  <a href="customerdatabase.php">Customers</a>
  <a href="inspection.php">Inspection</a>
  <a href="estimate.php">Estimate</a>
  <a href="pdfUpload.php">PDF Upload</a>
    <form  method='post' action="">
            <input type="submit" value="Log Out" name="but_logout" id="but_logout" class="but_logout" >
        </form>
</div>
<div class="main">
<div class="jumbotron text-center">
  <h1 style="color:#EAF6F6;"><b>Customer Database</b></h1>
</div>
<div class="form">
<div><?php include('updateCustomer.php') ?></div>
<h2><b>Current Inventory</b></h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th class="text-center"><strong>S.No</strong></th><th class="text-center"><strong>First Name</strong></th><th class="text-center"><strong>Last Name</strong></th><th class="text-center"><strong>Address</strong></th><th class="text-center"><strong>Phone Number</strong></th><th class="text-center"><strong>Email Address</strong></th><th class="text-center"><strong>Edit</strong></th><th class="text-center"><strong>Delete</strong></th></tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from customers ORDER BY lastName;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td><td align="center"><?php echo $row["firstName"]; ?></td><td align="center"><?php echo $row["lastName"]; ?></td><td align="center"><?php echo $row["Address"]; ?></td><td align="center"><?php echo $row["phone"]; ?></td><td align="center"><?php echo $row["email"]; ?></td><td align="center"><a href="editcustomer.php?id=<?php echo $row["id"]; ?>">Edit</a></td><td align="center"><a href="deleteCustomer.php?id=<?php echo $row["id"]; ?> "onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td></tr>
<?php $count++; } ?>
</tbody>
</table>
</br></br></br></br>
</div>
</div>
</body>
</html>  