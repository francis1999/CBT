<?php
include("connect.php");
$db_handle = new DBController();
$result = $db_handle->executeUpdate("UPDATE mst_subject set " . $_POST["sub_id"] . " = '".$_POST["sub_name"]."' WHERE  id=".$_POST["sub_id"]);;
?>