<?php
$login = base64_decode($_GET['u5cf9e69df6using']);

$links=$_SERVER['QUERY_STRING'];
$host=$_SERVER['HTTP_HOST'];
$alllink= ''.$host.''.$links.'';
?>
<link rel="shortcut icon" href="../img/logo.jpg">
<?php
session_start();
extract($_POST);
extract($_SESSION);
include("database.php");
if($submit=='Finish')
{
	mysqli_query($cn,"delete from mst_useranswer where sess_id='" . session_id() ."'") or die(mysql_error());
	unset($_SESSION[qn]);
	header("Location: welcome.php?".$links."");
	exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Review Question </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("admin/header.php");
echo "<h1 class=head1> Review Question</h1>";

if(!isset($_SESSION[qn]))
{
		$_SESSION[qn]=0;
}
else if($submit=='Next Question' )
{
	$_SESSION[qn]=$_SESSION[qn]+1;
	
}

$rs=mysqli_query($cn,"select * from mst_useranswer where sess_id='" . session_id() ."'") or die(mysql_error());
mysqli_data_seek($rs,$_SESSION[qn]);
$row= mysqli_fetch_row($rs);
echo "<form name=myfm method=post action=review.php?".$links.">";
$n=$_SESSION[qn]+1;
echo "<p>Que ".  $n .": $row[2]</p>";
echo "<p class=".($row[7]==1?'tans':'style8').">(a) $row[3]</p>";
echo "<p class=".($row[7]==2?'tans':'style8').">(b) $row[4]</p>";
echo "<p class=".($row[7]==3?'tans':'style8').">(c) $row[5]</p>";
echo "<p class=".($row[7]==4?'tans':'style8').">(d) $row[6]</p>";
if($_SESSION[qn]<mysqli_num_rows($rs)-1)
echo "<tr><td><input type=submit name=submit value='Next Question'></form>";
else
echo "<tr><td><input type=submit name=submit value='Finish'></form>";

echo "</table></table>";
?>
