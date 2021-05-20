<link rel="shortcut icon" href="../img/logo.jpg">
<?php
include("database.php");
$meid = base64_decode($_GET['u5cf9e69df6using']);
?>

<?php
include 'connect.php';
 $fri = mysqli_query($connect,"SELECT * FROM mst_user WHERE user_id='$meid'");
 $me = mysqli_fetch_array($fri);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Select Section</title>
</head>
<style type="text/css">
body{
	widows: 100%;
	margin:0px;
}

	button{
		background: #00a9d4;
		color: white;
		font-size: 25px;
		border: 1px solid #fff;
		border-radius: 5px;
		padding: 5px 5px 5px 5px;
		cursor: pointer;
		margin-bottom: 2%;
	}
	#contain{
		display: contents;
		align-items: center;
		background: skyblue;
		padding: 10px 10px 10px 10px;
		margin-top: 5%;
		margin-left: 40%;
		margin-right: 50%;
		border: 3px solid blue;
		border-radius: 25px;
		width: 20%;
	}
	.hello{
margin-top: -25px;
    background:skyblue;
    color: #fff;
    height:50px;
    width: 100%;
    position: fixed;
    z-index: 5;
  }
</style>


<body style="background: #f1f1f1;">

<header class="hello" style="top: 0; margin-top: 0;">
	<a href='welcome.php?u5cf9e69df6using=<?php echo base64_encode($meid); ?>'><b><button style="font-size:16px; margin-left:10px; margin-top: 10px; float:left; border-radius:10px; background: skyblue; color: #fff;">Home</button></b></a>
  <b><p style="font-size:25px; margin-left:5px; margin-top:10px; text-align: center;">COMPUTER BASED TEST (CBT)</p></b>
 
</header>

<div class="bab" style="width: 100%; height: 380px;">
	
<div class="life" style="margin-left: 1%; margin-right: 1%; margin-top: 70px; width: 400px; height: auto; padding-bottom: 20px; background-color: #ffffff; box-shadow: 1px 0px 2px 2px #fff; float: left; border-radius: 10px 10px 10px 10px">

	<div class="under" style="width: 400px; background-color: skyblue; border-radius: 10px 10px 0px 0px; height: 50px; text-align: center; color: #ffffff; font-size: 18px;"> <br>

		<h2 style="margin-top: -9px; font-family: arial">VERIFY YOUR PROFILE</h2>

	</div>

	<p style="color: #000000; margin-top:90px; margin-left: 30px; font-size: 18px; font-family: cursive;">FULL NAME: <?php echo ucwords($me['first_name']).' '.ucwords($me['last_name']) ?></p>

	 
	<p style="color: #000000; margin-top:5px; margin-left: 30px; font-size: 18px; font-family: cursive;">LEVEL: <?php echo $me['level']; ?></p>
	
	
	<p style="color: #000000; margin-top:5px; margin-left: 30px; font-size: 18px; font-family: cursive;">DEPARTMENT: <?php echo ucwords($me['depertment']); ?></p>
</div>


<div id="contain" style="float: right;">


<center>
	<div style="margin-top: 50px; float: right; margin-right: 100px;">
	<p style="margin-top: 90px;">
		<a href='sublist.php?u5cf9e69df6using=<?php echo base64_encode($meid); ?>'><button>Start Exam</button></a>
	</p>
	</div>
</center>
</div>

</div>


<div style="color: #ffffff; position: fixed; width: 100%;">
	<?php include("footer.php"); ?>
</div>
</body>
</html>

