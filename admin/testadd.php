<link rel="shortcut icon" href="../img/logo.jpg">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<body style="background: url(img/bg/1.gif);">
<?php
session_start();
error_reporting(1);
if (!isset($_SESSION['alogin']))
{
	echo "<br><h2>You are not Logged On Please Login to Access this Page</h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php
require("../database.php");

include("header.php");



if($_POST[submit]=='Save' || strlen($_POST['subid'])>0 )
{
extract($_POST);
mysql_query("insert into mst_test(sub_id,test_name,total_que) values ('$subid','$testname','$totque')",$cn) or die(mysql_error());
echo "<p align=center>Course <b>\"$testname\"</b> Added Successfully.</p>";
unset($_POST);
}
?>
<script language="JavaScript">
function check() {
mt=document.form1.testname.value;
if (mt.length<1) {
alert("Please Enter Course Name");
document.form1.testname.focus();
return false;
}
tt=document.form1.totque.value;
if(tt.length<1) {
alert("Please Enter Total Question");
document.form1.totque.value;
return false;
}
return true;
}
</script>

<center>
<div class="start" style="box-shadow: 2px 1px 1px 2px; width: 700px; height: 500px; border-radius: 5px 5px 2px 1px; margin-top: 100px;">
  <div class="head" style="background-color: #00aad0; height: 50px; border-radius: 5px 5px 2px 1px;">
     <a href="login.php" style="float: left; color: #ffffff; font-size: 20px; margin-left: 10px; margin-top: 10px;">Back</a>
    <p style="text-align: center;font-weight: bold; color: #ffffff; font-size: 30px; margin-top: 10px;">
       COURSE
    </p>    
  </div>
 
<form name="form1" method="post" onSubmit="return check();">
  <table width="80%"  border="0" align="center" style="margin-top: 90px;">
    <tr>
      <td width="49%" height="32"><div align="left"><strong style="font-size: 20px; font-family: cursive;">Enter Department</strong></div></td>
      <td width="3%" height="5">  
      <td width="48%" height="32">

<select name="subid" style="margin-bottom: 20px; width: 200px;">
<?php
$rs=mysql_query("Select * from mst_subject order by  sub_name",$cn);
	  while($row=mysql_fetch_array($rs))
{
if($row[0]==$subid)
{
echo "<option value='$row[0]' selected>$row[2]</option>";
}
else
{
echo "<option value='$row[0]'>$row[2]</option>";
}
}
?>
      </select>
        
    <tr>
        <td height="26"><div align="left"><strong style="font-size: 20px; font-family: cursive;"> Enter Subject Name </strong></div></td>
        <td>&nbsp;</td>
	  <td><input name="testname" type="text" id="testname" style="margin-bottom: 20px;"></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong style="font-size: 20px; font-family: cursive;">Enter Total Question </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="totque" type="text" id="totque" style="margin-bottom: 20px;"></td>
    </tr>
    <tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" value="Add" class="btn btn-success" style="width: 200px; font-size: 18px;" ></td>
    </tr>
  </table>
</form>

<div class="container" style="margin-top: 150px;">
  <div class="row">
    <div class="col-sm-4">
      <a href="courseedit.php" style="color:#ffffff; font-size: 20px; font-family: Calibri; text-decoration: none">
        <div class="" style="width: 150px; background-color: #f0ad4e; border-radius: 5px; height: 35px;">
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

</div>

</center>



<p>&nbsp; </p>

</body>