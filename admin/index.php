<?php
session_start()
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Administrative Login - Online Exam</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../quiz.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="shortcut icon" href="../img/logo.jpg">
</head>

<style type="text/css">
.hello{
    background:skyblue;
    color: #fff;
    height:50px;
    width: 100%;
    position: fixed;
    z-index: 5;
  }
</style>
<body style="background: url(img/bg/1.gif);">
<header class="hello">
  <b><p style="font-size:25px; margin-left:5px; margin-top:10px; text-align: center;">COMPUTER BASED TEST (CBT)</p></b>
</header>
<br>
<br>
<?php
include("header.php");
?>

<p class="head1" style="margin-top: 5%;">Adminstrative Login </p>

<center>
<div style="border: 2px solid #000; width: 20%; margin-top: 5%; border-radius: 10px; background: skyblue;">
<form name="form1" method="post" action="login.php">
<p> 
	<div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input name="loginid" type="text" id="loginid" class="form-control" placeholder="Username" required="required" style="text-align:left">
     </div>
	
</p>

<p> 
	<div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input name="pass" type="password" id="pass" class="form-control" placeholder="Password" required="required" style="text-align:left">
     </div>
	
</p>

<p>
	<input style="width: 50%;" name="submit" type="submit" id="submit" value="Login" class="btn btn-success">
</p>
</div>
</form>
</center>


	<?php include("../footer.php"); ?>

</body>
</html>
