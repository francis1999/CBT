
<?php
session_start();
error_reporting(1);
?>
<!DOCTYPE HTML">
<html>
<head>
<title>Adminstrative Area Online Exam </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../quiz.css" rel="stylesheet" type="text/css">
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
  <p style="font-size:25px; margin-left:5px; margin-top:10px; text-align: center; font-weight: bold;">COMPUTER BASED TEST (CBT) <a href="signout.php"><button style="font-size:16px; margin-right:5px; float:right; border-radius:40px; background: skyblue; color: #fff;">Logout</button></a></p>
 
</header>
<?php
include("header.php");
extract($_POST);
if(isset($submit))
{
	include("../database.php");
	$rs=mysqli_query($cn,"SELECT * FROM mst_admin WHERE loginid='$loginid' and pass='$pass'") or die(mysql_error());
	if(mysqli_num_rows($rs)<1)
	{
		echo "<BR><BR><BR><BR><div class=head1> Invalid User Name or Password<div>";
		exit;
		
	}
	$_SESSION['alogin']="true";
	
}
else if(!isset($_SESSION[alogin]))
{
	echo "<BR><BR><BR><BR><div class=head1> Your are not logged in<br> Please <a href=index.php>Login</a><div>";
		exit;
}
?>
<br><br><br><br>
<p class="head1">Welcome to Admistrative Area </p>
<div style="margin-left:25%;padding-top:5%">

<a href="subadd.php"><button style="background:green; color: #fff; font-size: 20px; width:auto; height: 100px; margin-left: 10px; border-radius: 20px 10px 40px 0px; cursor: pointer;">Add Department</button></a>
<a href="testadd.php"><button style="background:skyblue; color: #fff; font-size: 20px; width:auto; height: 100px; margin-left: 10px; border-radius: 20px 10px 40px 0px; cursor: pointer;">Add Subjects</button></a>
<a href="questionadd.php"><button style="background:indigo; color: #fff; font-size: 20px; width:auto; height: 100px; margin-left: 10px; border-radius: 20px 10px 40px 0px; cursor: pointer;">Add Questions</button></a>
<a href="settings.php"><button style="background:red; color: #fff; font-size: 20px; width:auto; height: 100px; margin-left: 10px; border-radius: 20px 10px 40px 0px; cursor: pointer;">Settings</button></a>
</div>



</body>
</html>
