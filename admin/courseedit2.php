<?php
require_once("../connect.php");
$db_handle = new DBController();
$result = $db_handle->executeUpdate("UPDATE mst_test set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  id=".$_POST["id"]);;
?>