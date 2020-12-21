<!DOCTYPE html>
<html>
<head>
     <title>Welcome to CSH!</title>
     <link rel="stylesheet" type="text/css" href="CSS/test.css"> 
     <link rel="icon" href="Images/chimney-sweep.png">
</head>
<body>
<div class="login-box">
   <div class="imgcontainer">
    <img src="Images/chimney-sweep.png" alt="Avatar" class="avatar">
  </div>
  <form action="action_page.php" method="post">
    <div class="user-box">
      <input type="text" class="textbox" id="txt_uname" name="txt_uname"  required/>
      <label>Username</label>
    </div>
    <div class="user-box">
      <input type="password" class="textbox" id="txt_uname" name="txt_pwd"  required/>
      <label>Password</label>
    </div>
     <a href="">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <input type="submit" value="Log In" name="but_submit" id="but_submit" class="but_submit" />
    </a>
  </form>
</div>
<!--  <div class="container" style="color:#f1f1f1">
    <span class="psw">Forgot <a href="recover-password.php" >Password?</a></span>-->
  </div>
</body>
</html>
