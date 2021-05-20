<link rel="shortcut icon" href="../img/logo.jpg">
<?php
$login = base64_decode($_GET['u5cf9e69df6using']);
?>
<?php
session_start();
error_reporting(1);
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);
/*$rs=mysql_query("select * from mst_question where test_id=$tid",$cn) or die(mysql_error());
if($_SESSION[qn]>mysql_num_rows($rs))
{
unset($_SESSION[qn]);
exit;
}*/
if(isset($subid) && isset($testid))
{
$_SESSION[sid]=$subid;
$_SESSION[tid]=$testid;
header("location: quiz.php?u5cf9e69df6using=".base64_encode($login));
}
if(!isset($_SESSION[sid]) || !isset($_SESSION[tid]))
{
	header("location: index.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz</title>
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
</style>
<body>
<header class="hello">
  <b><p style="font-size:25px; margin-left:5px; margin-top:10px; text-align: center;">ASSESSMENT TEST (AT)</p></b>
 <b><button onclick="window.history.go(-1);" style="font-size:16px; margin-right:5px; float:right; border-radius:10px; background: skyblue; color: #fff;">Back</button></b>
</header>
<br>
<br>

<div style=" background: grey; color: #fff; text-align: left; border: 2px solid #c0c0c0; border-radius: 25px; width: 7%; margin-top: 2%; margin-left:2%;">
<h3 id="timer" style=""><center>00:00:00</center></h3>
</div>



<?php
include("header.php");


$query="select * from mst_question";

$rs=mysqli_query($cn, "select * from mst_question where test_id=$tid") or die(mysql_error());
if(!isset($_SESSION[qn]))
{
	$_SESSION[qn]=0;
	mysqli_query($cn,"delete from mst_useranswer where sess_id='" . session_id() ."'") or die(mysql_error());
	$_SESSION[trueans]=0;

}
else
{
		if($submit=='Next Question' && isset($ans))
		{


				mysql_data_seek($rs,$_SESSION[qn]);
				$row= mysql_fetch_row($rs);
				$row[1]=addslashes($row[1]);
$row[2]=addslashes($row[2]);
$row[3]=addslashes($row[3]);
$row[4]=addslashes($row[4]);
$row[5]=addslashes($row[5]);
$row[6]=addslashes($row[6]);
$row[7]=addslashes($row[7]);

$row[1]=htmlspecialchars($row[1]);
$row[2]=htmlspecialchars($row[2]);
$row[3]=htmlspecialchars($row[3]);
$row[4]=htmlspecialchars($row[4]);
$row[5]=htmlspecialchars($row[5]);
$row[6]=htmlspecialchars($row[6]);
$row[7]=htmlspecialchars($row[7]);

				mysqli_query($cn, "insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				$_SESSION[qn]=$_SESSION[qn]+1;
		}
		else if($submit=='Submit' && isset($ans))
		{

				mysqli_data_seek($rs,$_SESSION[qn]);
				$row= mysqli_fetch_row($rs);
$row[1]=addslashes($row[1]);
$row[2]=addslashes($row[2]);
$row[3]=addslashes($row[3]);
$row[4]=addslashes($row[4]);
$row[5]=addslashes($row[5]);
$row[6]=addslashes($row[6]);
$row[7]=addslashes($row[7]);
$row[1]=htmlspecialchars($row[1]);
$row[2]=htmlspecialchars($row[2]);
$row[3]=htmlspecialchars($row[3]);
$row[4]=htmlspecialchars($row[4]);
$row[5]=htmlspecialchars($row[5]);
$row[6]=htmlspecialchars($row[6]);
$row[7]=htmlspecialchars($row[7]);
				mysqli_query($cn,"insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				$_SESSION[qn]=$_SESSION[qn]+1;
				$w=$_SESSION[qn]-$_SESSION[trueans];
				echo "</table>";



				mysqli_query($cn,"insert into mst_result(login,test_id,test_date,score) values('$login',$tid,'".date("d/m/Y")."',$_SESSION[trueans])") or die(mysql_error());

				echo "<h1 align=center><a href=review.php?u5cf9e69df6using=".base64_encode($login)."> Review Question</a> </h1>";
				unset($_SESSION[qn]);
				unset($_SESSION[sid]);
				unset($_SESSION[tid]);
				unset($_SESSION[trueans]);
				exit;

$ins2="INSERT INTO mst_timer(remain_time,question_id,student_id)VALUES(0,'$tid','$login')";
		$ms2=mysqli_query($connect, $ins2);
		}
}
$rs=mysqli_query($cn,"select * from mst_question where test_id=$tid") or die(mysql_error());
if($_SESSION[qn]>mysqli_num_rows($rs)-1)
{
unset($_SESSION[qn]);
echo "<h1 class=head1>No Question yet</h1>";
session_destroy();

exit;
}
mysqli_data_seek($rs,$_SESSION[qn]);
$row= mysqli_fetch_row($rs);
echo "<form name=myfm method=post action=quiz.php?u5cf9e69df6using=".base64_encode($login).">";
$n=$_SESSION[qn]+1;
echo"<div style='margin-left:15%; margin-top:3%; border:2px solid #000; width:50%; padding:0px 40px 0px 20px;
border-radius:10px;'>";
echo "<p style='color:#fff; border:1px solid #000; width:100%; padding:50px 0px 50px 20px; background:green; border-radius:10px;'>Que ".  $n .": $row[2]</p>";
echo"<div style='border:1px solid #000; width:100%; padding:0px 0px 0px 20px; border-radius:10px;'>";
echo"<p><i><b>Select your correct answer ...</p></i></b>";
echo "<p>(a)<input type=radio name=ans value=1>$row[3]</p>";
echo "<p>(b)<input type=radio name=ans value=2>$row[4]</p>";
echo "<p>(c)<input type=radio name=ans value=3>$row[5]</p>";
echo "<p>(d)<input type=radio name=ans value=4>$row[6]</p>";
echo"</div>";
if($_SESSION[qn]<mysqli_num_rows($rs)-1)
echo "<p><input type=submit name=submit value='Next Question'></p></form>";
else
echo "<p><input type=submit name=submit value='Submit' id='submitbtn'></p></form>";
echo "</div>";
?>

<?php // TODO
include_once 'connect.php';
$hgh="SELECT * FROM mst_timer WHERE question_id='$tid' AND student_id='$login'";
	$azu=mysqli_query($connect, $hgh);
	$rm=mysqli_fetch_array($azu);
?>
<input type="hidden" style="display: none;" id="timing" value="<?php echo $rm['remain_time']; ?>">
<input type="hidden" style="display: none;" id="login" value="<?php echo $login; ?>">
<input type="hidden" style="display: none;" id="question" value="<?php echo $tid; ?>">
</body>
</html>

<script src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript">

function back(){
	window.history.back();
}

$(window).load(function(){
	var min = $('#timing').val();
	document.getElementById('timer').innerHTML = min + ":" + 00 ;

		startTimer();
		function startTimer() {
		  var presentTime = document.getElementById('timer').innerHTML;
		  var timeArray = presentTime.split(/[:]+/);
		  var m = timeArray[0];
		  var s = checkSecond((timeArray[1] - 1));
		  if(s==59){m=m-1}
		  document.getElementById('timer').innerHTML = m + ":" + s;

		if(m < 0){
			$("#submitbtn").click();
			alert('Exam Finish');
			window.history.back();
		  	document.getElementById('timer').innerHTML = "Exam Finish";
		  	stopTimer();
		  }
		  var std= $("#login").val();
		  var qid= $("#question").val();

		  $.ajax({
		  	type: "POST",
		  	url: "ajax/timesend.php",
		  	data: {m:m,std:std,qid:qid},
		  	cache: false,
		  	success: function(data){
		  		$("#timing").val(data);
		  	}
		  });
		  setTimeout(startTimer, 1000);
		}


		function checkSecond(sec) {
		  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
		  if (sec < 0) {sec = "59"};
		  return sec;
		}

		});


</script>
