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
<!DOCTYPE html>
<html>
<head>
<title>Add Item To Inventory</title>
  <link rel="icon" href="../Images/chimney-sweep.png">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../../CSS/sidebar.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
 <div class="sidenav">
  <img src="../Images/chimney-sweep.png" alt="Avatar" class="avatar" width="160" height="160">
  <a href="home.php">Inventory</a>
  <a href="additem.php">Add Item</a>
  <a href="inspection.php">Inspection</a>
  <a href="order.php">Part Order</a>
  <a href="estimate.php">Estimate</a>
  <a href="pdfUpload.php">PDF Upload</a>
</div>
<div class="main">
<div class="jumbotron text-center">
  <h1>Add Item To Database</h1>
  <p></p>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <h3>Add Cap</h3>
      <p>Lorem ipsum dolor..</p>
    </div>
    <div class="col-sm-3">
      <h3>Add Backwall</h3>
      <p>Lorem ipsum dolor..</p>
    </div>
    <div class="col-sm-3">
      <h3>Add Gas Logs</h3>
      <p>Lorem ipsum dolor..</p>
    </div>
    <div class="col-sm-3">
      <h3>Add Miscellaneous</h3>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
</div>
</div>
</body>
</html>