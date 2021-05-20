<?php
include_once '../connect.php';
if (isset($_POST['m'])&& isset($_POST['std']) && isset($_POST['qid'])) {
	$m=$_POST['m'];
	$login=$_POST['std'];
	$tid=$_POST['qid'];
	echo $m;


$KP="SELECT * FROM mst_timer WHERE question_id='$tid' AND student_id='$login'";
$doResult=mysqli_query($connect, $KP);
$conta=mysqli_num_rows($doResult);
if (!$conta > 0) {
	
$ind="INSERT INTO mst_timer(remain_time,question_id,student_id)VALUES('$m','$tid','$login')";
	$dos=mysqli_query($connect, $ind);

}else{
	$upd="UPDATE mst_timer SET remain_time='$m' WHERE question_id='$tid' AND student_id='$login'";
	$goto=mysqli_query($connect, $upd);
}

}

?>