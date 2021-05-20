<?php
include '../../connect.php';
if (isset($_FILES['file'])) {
	$filename = $_FILES['file']['name'];
	$filefolder = $_FILES['file']['tmp_name'];
	$location= '../img/server_data/'.$filename;

	if (move_uploaded_file($filefolder, $location)) {
		//fetching of what we have already in the list
$ss="SELECT * FROM mst_logo";
$hs=mysqli_query($connect, $ss);
$cons=mysqli_num_rows($hs);

// this code line delete what we have in the table before inserting another 
if ($cons > 0) {
	$ks="DELETE FROM mst_logo";
	$hs2=mysqli_query($connect, $ks);
}
	$location2 = "../cbt/admin/img/server_data/".$filename."";
	$in="INSERT INTO mst_logo(logo)VALUES('$location2')";
	$res=mysqli_query($connect, $in);
	if ($in) {
		echo "success";
	}

	}
}
?>