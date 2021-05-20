<link rel="shortcut icon" href="../img/logo.jpg">
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
if (!isset($_SESSION[alogin]))
{
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}

if($_POST[submit]=='Save' || strlen($_POST['testid'])>0 )
{
extract($_POST);

$addque=addslashes($addque);
$ans1=addslashes($ans1);
$ans2=addslashes($ans2);
$ans3=addslashes($ans3);
$ans4=addslashes($ans4);

$addque=htmlspecialchars($addque);
$ans1=htmlspecialchars($ans1);
$ans2=htmlspecialchars($ans2);
$ans3=htmlspecialchars($ans3);
$ans4=htmlspecialchars($ans4);

mysql_query("insert into mst_question(test_id,que_desc,ans1,ans2,ans3,ans4,true_ans) values ('$testid','$addque','$ans1','$ans2','$ans3','$ans4','$anstrue')",$cn) or die(mysql_error());
echo "<p align=center>Question Added Successfully.</p>";
unset($_POST);
}
?>
<script language="JavaScript">
function check() {
mt=document.form1.addque.value;
if (mt.length<1) {
alert("Please Enter Question");
document.form1.addque.focus();
return false;
}
a1=document.form1.ans1.value;
if(a1.length<1) {
alert("Please Enter Answer1");
document.form1.ans1.focus();
return false;
}
a2=document.form1.ans2.value;
if(a1.length<1) {
alert("Please Enter Answer2");
document.form1.ans2.focus();
return false;
}
a3=document.form1.ans3.value;
if(a3.length<1) {
alert("Please Enter Answer3");
document.form1.ans3.focus();
return false;
}
a4=document.form1.ans4.value;
if(a4.length<1) {
alert("Please Enter Answer4");
document.form1.ans4.focus();
return false;
}
at=document.form1.anstrue.value;
if(at.length<1) {
alert("Please Enter Correct Answer");
document.form1.anstrue.focus();
return false;
}
return true;
}
</script>

<div style="margin:auto;width:90%;height:650px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left; border-radius: 10px;">

<div class="head" style="background-color: #00aad0; height: 50px; border-radius: 5px 5px 2px 1px; margin-bottom: 30px;">
         <a href="login.php" style="float: left; color: #ffffff; font-size: 20px; margin-left: 10px; margin-top: 10px;">Back</a>
        <p style="text-align: center;font-weight: bold; color: #ffffff; font-size: 30px; margin-top: 10px;">
           QUESTIONS
        </p>    
      </div>

<form name="form1" method="post" onSubmit="return check();" style="margin: 40px;">
  
  <select name="testid" id="testid" style="margin-bottom: 20px; width: 630px;">
<?php
$rs=mysql_query("Select * from mst_test order by test_name",$cn);
	  while($row=mysql_fetch_array($rs))
{
if($row[0]==$testid)
{
echo "<option value='$row[0]' selected>$row[2]</option>";
}
else
{
echo "<option value='$row[0]'>$row[2]</option>";
}
}
?>
      </select> <br>
       <textarea name="addque" cols="87" rows="10" id="addque" placeholder="Enter question " style="margin-bottom: 20px;"></textarea><br>
    
      <input name="ans1" type="text" id="ans1" size="85" maxlength="85" placeholder="Enter Answer 1" style="margin-bottom: 20px;"><br>
    
      <input name="ans2" type="text" id="ans2" size="85" maxlength="85" placeholder="Enter Answer 2" style="margin-bottom: 20px;"><br>
    
      <input name="ans3" type="text" id="ans3" size="85" maxlength="85" placeholder="Enter Answer 3" style="margin-bottom: 20px;"> <br>
    
      
      <input name="ans4" type="text" id="ans4" size="85" maxlength="85" placeholder="Enter Answer 4" style="margin-bottom: 20px;"> <br>
    
    
      
      <input name="anstrue" type="text" id="anstrue" size="85" maxlength="85" placeholder="Enter Correct answer No e.g 1" style="margin-bottom: 20px;"> <br>
    
    
      <input type="submit" name="submit" value="Add" class="btn btn-success" style="width: 100px; font-size: 18px;">

      <div class="container" style="margin-top:-35px;">
        <div class="row" style="float: left; margin-left: 100px;">
          <a href="questionedit.php">
          <div class="col-sm-4" style="background-color: #f0ad4e; width: 100px; height: 35px; border-radius: 5px; margin-right: 10px; box-shadow: 1px 0px 1px 1px;">
            <h1 style="font-size: 18px; color: #ffffff; text-align: center; margin-top: 9px">
              Edit
            </h1>
          </div>
        </a>
        <a href="login.php">
          <div class="col-sm-4" style="background-color: #d9534f; width: 100px; height: 35px; border-radius: 5px; box-shadow: 1px 0px 1px 1px;">
            <h1 style="font-size: 18px; color: #ffffff; text-align: center; margin-top: 9px;">
             Back
            </h1>
          </div>
        </a>
        </div>
      </div>
        
      
      
      
    
</form>

</div>

</body>