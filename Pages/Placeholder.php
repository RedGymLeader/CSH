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
<title>PDF Upload</title>
  <link rel="icon" href="../Images/chimney-sweep.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../CSS/sidebar.css"> 
    <link rel="stylesheet" type="text/css" href="../CSS/bannerimage.css"> 
    <link rel="stylesheet" type="text/css" href="../CSS/table.css">
     <link rel="stylesheet" type="text/css" href="../CSS/upload.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
   </script>
   <style>
       html, body {
   height: 100%;
   margin: 0em;
}

#outerDivWrapper, #outerDiv {
   height: 100%;
   margin: 0em;
}

#scrollableContent {
   height: 100%;
   margin: 0em;
   overflow-y: auto;
}
   </style>
</head>
<body>
 <div class="sidenav">
  <img src="../Images/chimney-sweep.png" alt="Avatar" class="avatar" width="160" height="160">
  <a href="home.php">Inventory Manager</a>
  <a href="inspection.php">Inspection</a>
  <a href="order.php">Part Order</a>
  <a href="estimate.php">Estimate</a>
  <a href="pdfUpload.php">PDF Upload</a>
</div>
<div class="main">
<div class="jumbotron text-center">
  <h1><b>Upload / Download PDF's</b></h1>
  <p></p>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-6">
    <form method="post" enctype="multipart/form-data">
    <label>Text Description</label>
    <input type="text" name="title" required placeholder="ex. Smith Estimate"></br>
    <label>File Upload</label>
    <input type="File" name="file" required></br>
    <input type="submit" name="submit">
</form>
    </div>
    <div class="col-sm-6">
      <div><?php include('pdfTable.php') ?></div>
      <button onClick="window.location.reload();">Refresh Table</button></br></br>
      <div id="outerDivWrapper">
   <div id="outerDiv">
    <div id="scrollableContent"><?php include('downloadPDF.php') ?></div>
   </div>
</div>
    </div>
  </div>
</div>
</div>
</body>
</html>

<?php 
$localhost = "localhost"; #localhost
$dbusername = "id14927610_hunkeledigitalinventory"; #username of phpmyadmin
$dbpassword = "YAnkees51!!1234";  #password of phpmyadmin
$dbname = "id14927610_inventory";  #database name
 
#connection string
$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
 
if (isset($_POST["submit"]))
 {
     #retrieve file title
        $title = $_POST["title"];
     
    #file name with a random number so that similar dont get replaced
     $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
 
    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];
   
     #upload directory path
$uploads_dir = 'PDF Documents';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
 
    #sql query to insert into database
    $sql = "INSERT into fileup(title,image) VALUES('$title','$pname')";
 
    if(mysqli_query($conn,$sql)){
 
    echo '<script>alert("Upload Successful")</script>';
    }
    else{
        echo '<script>alert("Error")</script>';
    }
}
 
 
?>