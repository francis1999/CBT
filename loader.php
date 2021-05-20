<?php
include_once 'connect.php';
$login = base64_decode($_GET['u5cf9e69df6using']);
$tid=$_GET['testid'];
$subid=$_GET['subid'];

$links=$_SERVER['QUERY_STRING'];

$hgh2="SELECT * FROM mst_timer WHERE question_id='$tid' AND student_id='$login'";
	$azu2=mysqli_query($connect, $hgh2);
	$fcs=mysqli_num_rows($azu2);
	if (!$fcs > 0) {
$kk="SELECT * FROM mst_exam_time";
$jkj=mysqli_query($connect, $kk);
$css=mysqli_fetch_array($jkj);
$c12=$css['time_start'];

		$ins="INSERT INTO mst_timer(remain_time,question_id,student_id)VALUES('$c12','$tid','$login')";
		$ms=mysqli_query($connect, $ins);
		if ($ms) {
			header("Location:quiz.php?".$links."&testid".$tid."&subid".$subid."");
		}
	}else{
		header("Location:quiz.php?".$links."&testid".$tid."&subid".$subid."");
	}
	
?>