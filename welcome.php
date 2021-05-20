<?php
include_once 'plugin.php';
$meid = base64_decode($_GET['u5cf9e69df6using']);
?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>Home</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/w3.css">
<link rel="stylesheet" href="./css/css">
<link rel="stylesheet" href="./css/font-awesome.min.css">
<link rel="shortcut icon" href="<?php echo $s['logo']; ?>">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<style>@font-face{font-family:uc-nexus-iconfont;src:url(chrome-extension://pogijhnlcfmcppgimcaccdkmbedjkmhi/res/font_9qmmi8b8jsxxbt9.woff) format('woff'),url(chrome-extension://pogijhnlcfmcppgimcaccdkmbedjkmhi/res/font_9qmmi8b8jsxxbt9.ttf) format('truetype')}</style>
<style type="text/css">
  .hello{
margin-top: -20px;
    background:skyblue;
    color: #fff;
    height:50px;
    width: 100%;
    position: fixed;
    z-index: 5;
  }
</style>
</head><body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">
<header class="hello">
  <p style="font-size:25px; margin-top:10px; text-align: center; font-weight: bold;">ASSESSMENT  TEST (AT) <a href="signout.php"><button style="font-size:16px; margin-right:5px; float:right; border-radius:10px; background: skyblue; color: #fff;">Logout</button></a></p>
 
</header>
  <!-- The Grid -->
  <div class="w3-row-padding" >
  
    <!-- Left Column -->
    <div class="w3-third" style="margin-top:3%;">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
     <center><img src="<?php echo $s['logo']; ?>" style="width:200px; height: 200px; margin-top: 5px;" alt="Avatar"></center>
          <div class="w3-display-bottomleft w3-container w3-text-black">
          </div>
        </div>
        <div class="w3-container">
        <center><p style="font-size:30px;">Welcome!!! Hope You are Ready for your Test</p></center>
<?php
include("connect.php");
$hq=("SELECT * FROM mst_user WHERE user_id='$meid'");
$result40=mysqli_query($connect,$hq);
while($me=mysqli_fetch_array($result40))
{
//$id=$me['user_id'];
?>

          <b><p>Name:</b><i class="w3-margin-right w3-large w3-text-teal"></i><?php echo ucwords($me['first_name']).' '.ucwords($me['last_name']) ?></p>
          <!--b><p>Matric Number:</b><i class="w3-margin-right w3-large w3-text-teal"></i><?php echo $me['login']; ?></p-->
          <b><p>Depertment:</b><i class="w3-margin-right w3-large w3-text-teal"></i><?php echo ucwords($me['depertment']); ?></p>
          <b><p>Level:</b><i class="w3-margin-right w3-large w3-text-teal"></i><?php echo $me['level']; ?></p>
          <b><p>Gender:</b><i class="w3-margin-right w3-large w3-text-teal"></i><?php echo ucwords($me['sex']); ?></p>
       
 <center>

  <a href='select.php?u5cf9e69df6using=<?php echo base64_encode($meid); ?>'><b><button style="font-size:16px; margin-right:5px; border-radius:10px; background: skyblue; color: #fff; margin-bottom: 20px;">Enter Exam</button></b></a>

   <a href='result.php?u5cf9e69df6using=<?php echo base64_encode($meid); ?>'><b><button style="font-size:16px; margin-right:5px; border-radius:10px; background: skyblue; color: #fff; margin-bottom: 20px;">Result</button></b></a>


  </center>
 <?php }?>
        </div>
      </div>
      <br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird" style="margin-top:3%;">
    
      <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
    <div class="w3-container">
          <h5 class="w3-opacity"><b>Description on How to use This CBT Platform </b></h5>
          <h6 class="w3-text-teal"></h6>

        <p>
          <ol>
            <li> After Registration, you will Login with your username and matric number</li>
            <li>Enter Exam</li>
          </ol>
        </p>
          <hr>
        </div>

        <div class="w3-container">
          <h5 class="w3-opacity"><b>READ THESE INSTRUCTIONS CAREFULLY</b></h5>
      <div style="width: 100%; height: auto; background: #d8d8d3; text-align: left; padding-left: 10px; padding-top: 1px; padding-bottom: 5px;">
      <?php
        $get="SELECT * FROM mst_settings";
        $KG=mysqli_query($connect, $get);
        while ($as=mysqli_fetch_array($KG)) {
      ?>
      <p><h6 style="color: #ffffff;">&#10148;&nbsp;<?php echo strtoupper($as['info']); ?></h6></p>
<?php
 }?>
      </div>
      <br>
        </div>
      </div>
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>
</body></html>