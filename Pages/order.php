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
<title>Order Form</title>
  <link rel="icon" href="../Images/chimney-sweep.png">
  	<link rel='stylesheet' type='text/css' href='../CSS/orderform.css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../CSS/sidebar.css">
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
}</style>
</head>
<body>
 <div class="sidenav">
  <img src="../Images/chimney-sweep.png" alt="Avatar" class="avatar" width="160" height="160">
  <a href="home.php">Inventory Manager</a>
  <a href="inspection.php">Inspection</a>
  <a href="order.php">Part Order</a>
  <a href="estimate.php">Estimate</a>
  <a href="pdfUpload.php">PDF Upload</a>
   <form  method='post' action="">
            <input type="submit" value="Log Out" name="but_logout" id="but_logout" class="but_logout" >
        </form>
</div>
<div class="main">
<form id="contactForm" onsubmit="return validateContactForm()" action="processFeedbacktester.php" method="post" style="background-color:#E6E6FA" class="form-style-9">
<ul>
<li>
    <input type="text" name="Name" class="field-style field-split align-left" placeholder="Name" />
    <input type="email" name="Email" class="field-style field-split align-right" placeholder="Email" />

</li>
<li>
    <input type="text" name="Phone" class="field-style field-split align-left" placeholder="Phone" />
    <input type="url" name="field4" class="field-style field-split align-right" placeholder="Website" />
</li>
<li>
<input type="text" name="Subject" class="field-style field-full align-none" placeholder="Subject" />
</li>
<li>
<textarea name="message" class="field-style" placeholder="Message"></textarea>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="../Images/chimneysweep.png" height="250px" width="250px" id="formlogo">
</li>
<li>
<input type="submit" value="Send Message" />
</li>
</ul>
</form>
</div>
</body>
</html>