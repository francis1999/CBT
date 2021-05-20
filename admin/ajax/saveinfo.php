<?php
include_once '../../connect.php';

if (isset($_POST['info'])) {
	$info=$_POST['info'];
	$info=addslashes($info);
	$info = str_replace("<", "&lt;", $info);
	$info = str_replace(">", "&gt;", $info);
	$info = str_replace("&", "&amp;", $info);

	$in="INSERT INTO mst_settings(info)VALUES('$info')";
	$result=mysqli_query($connect, $in);
	if ($result) {
		echo "Instruction Added Successfully";
	}

}
?>