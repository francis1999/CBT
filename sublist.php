<link rel="shortcut icon" href="../img/logo.jpg">
<?php
session_start();
$meid = base64_decode($_GET['u5cf9e69df6using']);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Exam</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>
<style type="text/css">
.hello{
    background:skyblue;
    color: #fff;
    height:50px;
    width: 100%;
    position: fixed;
    z-index: 5;
    top: 0;
  }

  .btndep{
    width: 80%;
    height: 50px;
    cursor: pointer;
    background: skyblue;
    border-radius: 10px;
    color: #fff;
  }
</style>
<body>
<header class="hello">
	<a href='welcome.php?u5cf9e69df6using=<?php echo base64_encode($meid); ?>'><b><button style="font-size:16px; margin-left:10px; margin-top: 10px; float:left; border-radius:5px; background: skyblue; color: #fff;">Home</button></b></a>
  <b><p style="font-size:25px; margin-left:5px; margin-top:10px; text-align: center;">ASSESSMENT BASED TEST (ABT)</p></b>
 
</header>

<div style="margin-top: 100px;">
<?php
include("database.php");
echo "<br><h2 class=head1>SELECT DEPERTMENT</h2>";
?>

<center>
<div class="come" style="background-color: #d8d8d3; width:400px; border-radius: 10px; height: 280px; box-shadow: 1px 0px 1px 1px;">
<?php
echo "<br>";
$rs=mysqli_query($cn, "select * from mst_subject");
while($row=mysqli_fetch_row($rs))
{


  echo"<a href=showtest.php?subid=$row[0]&u5cf9e69df6using=".base64_encode($meid)."><p><button class='btndep'>$row[2]</button></p></a>";

}
?>
</div>
</center>
</div>
</body>
</html>
