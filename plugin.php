<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "cbt";

$connect = mysqli_connect($host,$user,$password,$database);


$f="SELECT * FROM mst_logo";
$qr=mysqli_query($connect, $f);
$s=mysqli_fetch_array($qr);

?>