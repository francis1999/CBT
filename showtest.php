<link rel="shortcut icon" href="../img/logo.jpg">
<?php
session_start();
$login = base64_decode($_GET['u5cf9e69df6using']);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz - Test List</title>
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
  }

    .btndep{
    width: 30%;
    height: 50px;
    cursor: pointer;
    background: skyblue;
    border-radius: 10px;
    color: #fff;
  }
</style>
<body>
<header class="hello">
  <b><p style="font-size:25px; margin-left:5px; margin-top:10px; text-align: center;">COMPUTER BASED TEST (CBT)</p></b>
 <a href='welcome.php?u5cf9e69df6using=<?php echo base64_encode($login); ?>'><b><button style="font-size:16px; margin-right:5px; float:right; border-radius:50%; background: skyblue; color: #fff;">Home</button></b></a>
</header>
<?php
include("database.php");
extract($_GET);
$rs1=mysql_query("select * from mst_subject where sub_id=$subid");
$row1=mysql_fetch_array($rs1);
echo "<br><br><h1 align=center><font color=blue> $row1[1]</font></h1>";
$rs=mysql_query("select * from mst_test where sub_id=$subid");
if(mysql_num_rows($rs)<1)
{
	echo "<br><br><h2 class=head1> No Examination Yet</h2>";
	exit;
}
echo "<h2 class=head1> SELECT SUBJECT </h2>";

while($row=mysql_fetch_row($rs))
{

  echo"<center>
  <a href=loader.php?u5cf9e69df6using=".base64_encode($login)."&testid=$row[0]&subid=$subid><p><button class='btndep'>$row[2]</button></p></a></center>";
}

?>


</body>
</html>
