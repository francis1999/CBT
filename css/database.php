<?php
error_reporting(1);
$cn=mysql_connect("localhost","root","") or die("Could not Connect My Sql");
mysql_select_db("cbt",$cn)  or die("Could connect to Database");
?>
