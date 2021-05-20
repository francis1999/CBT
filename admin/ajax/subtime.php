<?php
include_once '../../connect.php';

if (isset($_POST['selbtn'])) {
	$TIME=$_POST['selbtn'];

	$se="SELECT * FROM mst_exam_time";
	$MS=mysqli_query($connect, $se);
	$co=mysqli_num_rows($MS);
	if ($co > 0) {
		$ik="UPDATE mst_exam_time SET time_start='$TIME'";
		$U=mysqli_query($connect, $ik);
		if ($U) {
			echo "Success";
		}
	}else{
		$in="INSERT INTO mst_exam_time(time_start)VALUES('$TIME')";
		$l=mysqli_query($connect, $in);
		if ($l) {
			echo "Success";
		}
	}
}
?>