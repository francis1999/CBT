<?php
include_once '../../connect.php';

if (isset($_POST['inp']) && isset($_POST['idinfo'])) {
	
	$info = $_POST['inp'];
	$id = $_POST['idinfo'];

	$dp="UPDATE mst_settings SET info='$info' WHERE id_sett='$id'";
	$dosql=mysqli_query($connect, $dp);
	if ($dosql) {
		echo "Change Successfully";
	}

}

?>