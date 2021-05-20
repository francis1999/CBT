<link rel="shortcut icon" href="../img/logo.png">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<body style="background: url(img/bg/1.gif);">
<?php
session_start();
require("../database.php");
include("header.php");
error_reporting(1);
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php

extract($_POST);

echo "<BR>";
if (!isset($_SESSION['alogin']))
{
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}


echo "<table width=100%>";
echo "<tr><td align=center></table>";
if($submit=='submit' || strlen($subname)>0 )
{
$rs=mysql_query("select * from mst_subject where sub_name='$subname'");
if (mysql_num_rows($rs)>0)
{
	echo "<br><br><br><div class=head1>Subject is Already Exists</div>";
	exit;
}
mysql_query("insert into mst_subject(sub_name) values ('$subname')",$cn) or die(mysql_error());
echo "<p align=center>Department  <b> \"$subname \"</b> Added Successfully.</p>";
$submit="";
}
?>

<script language="JavaScript">
	function check() {
	mt=document.form1.subname.value;
	if (mt.length<1) {
	alert("Please Enter Department Name");
	document.form1.subname.focus();
	return false;
	}
	return true;
	}
</script>

<div style="margin:auto;width:60%; height:400px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left; border-radius: 10px;">

		<div class="head" style="background-color: #00aad0; height: 50px; border-radius: 5px 5px 2px 1px; margin-bottom: 30px;">
		     <a href="login.php" style="float: left; color: #ffffff; font-size: 20px; margin-left: 10px; margin-top: 10px;">Back</a>
		    <p style="text-align: center;font-weight: bold; color: #ffffff; font-size: 30px; margin-top: 10px;">
		       DEPARTMENT
		    </p>    
  		</div>

		<center>
			<form name="form1" method="post" onSubmit="return check();">
			     
			        <p><input name="subname" type="text" id="subname" style="width: 300px;" placeholder="Enter Department Here"></p>
			      <p><input type="submit" name="submit" value="Add" class="btn btn-success" style="width: 300px; font-size: 18px;"></p>
			    
			</form>
			 	<div class="container" style="margin-top: 200px;">
  <div class="row">
    <div class="col-sm-4">
      <a href="departedit.php" style="color:#ffffff; font-size: 20px; font-family: Calibri; text-decoration: none">
        <div class="" style="width: 150px; background-color: #f0ad4e; border-radius: 5px; height: 35px">
           Edit 
        </div>
      </a>
    </div>

    <div class="col-sm-4">
      <a href="login.php" style="color:#ffffff; font-size: 20px; font-family: Calibri; text-decoration: none;" >
        <div class="" style="width: 150px; background-color: #d9534f; border-radius: 5px; height: 35px;">
           Back
        </div>
      </a>
    </div>
</div>
</div>
		</center>

</div>
</body>