<link rel="shortcut icon" href="../img/logo.jpg">
<?php
session_start();
$meid = base64_decode($_GET['u5cf9e69df6using']);
?>
<?php
include 'connect.php';
 $fri = mysqli_query($connect,"SELECT * FROM mst_user WHERE user_id='$meid'");
 $me = mysqli_fetch_array($fri);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php echo ucwords($me['first_name']).' '.ucwords($me['last_name']) ?> - Result </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../img/logo.jpg">


</head>
<style type="text/css">
.hello{
    background:skyblue;
    color: #fff;
    height:50px;
    width: 100%;
    position: fixed;
    z-index: 5;
    top: 0;
  }
</style>
<body style="background: #f1f1f1;">

<header class="hello">
  <b><p style="font-size:25px; margin-left:5px; margin-top:10px; text-align: center;">ASSESSMENT TEST (AT)</p></b>
 <a href='welcome.php?u5cf9e69df6using=<?php echo base64_encode($meid); ?>'><b><button style="margin-top: -50px; font-size:16px; margin-right:5px; float:right; border-radius:5px; background: skyblue; color: #fff;">Home</button></b></a>
</header>

<style type="text/css">
  .result-box{width: 60%; height: auto; background:#fff; border: 1px solid #c0c0c0; margin-top: 70px; padding-bottom: 50px;}
  .holder{font-family: arial; font-weight: bold; line-height: 10px;}
  .holder2{font-family: arial; font-weight: normal; line-height: 10px;}
  .all-div{margin-bottom: 10px; padding-left: 10px; text-align: left; padding-top: 20px; background: #f1f1f1; padding-right: 10px; padding-bottom: 10px;}
  .tile-te{font-size: 25px; font-family: arial; font-weight: bold; color: indigo;}
  .result-area{width: 100%; height: auto; text-align: left;}
  .subj{font-family: arial; font-size: 20px; padding-left: 10px;}
  .subj2{font-family: arial; font-size: 20px; padding-right: 10px; float: right;}
  .subj3{font-family: arial; font-size: 25px; padding-right: 10px; float: right; margin-top: 10px;}
  .sub-subject{width: 100%; padding-top: 5px; padding-bottom: 5px; background: #f1f1f1; margin-top: 10px;}
  .text-subj{padding-left: 10px; font-family: arial;}
  .text-rst{padding-right: 10px; font-family: arial; float: right; color: green; font-size: 20px;}

  @media print {
    #myDivToPrint {
        background-color: white;
        height: auto;
        width: auto;
        margin-left: 10px;

    }
    .result-box{width: 60%; height: auto; background:#fff; border: 1px solid #c0c0c0; margin-top: 70px; padding-bottom: 50px;}
  .holder{font-family: arial; font-weight: bold; line-height: 10px;}
  .holder2{font-family: arial; font-weight: normal; line-height: 10px;}
  .all-div{margin-bottom: 10px; padding-left: 10px; text-align: left; padding-top: 20px; background: #f1f1f1; padding-right: 10px; padding-bottom: 10px;}
  .tile-te{font-size: 25px; font-family: arial; font-weight: bold; color: indigo;}
  .result-area{width: 100%; height: auto; text-align: left;}
  .subj{font-family: arial; font-size: 20px; padding-left: 10px;}
  .subj2{font-family: arial; font-size: 20px; padding-right: 10px; float: right;}
  .subj3{font-family: arial; font-size: 25px; padding-right: 10px; float: right; margin-top: 10px;}
  .sub-subject{width: 100%; padding-top: 5px; padding-bottom: 5px; background: #f1f1f1; margin-top: 10px;}
  .text-subj{padding-left: 10px; font-family: arial;}
  .text-rst{padding-right: 10px; font-family: arial; float: right; color: green; font-size: 20px;}
}
</style>

<center>
<div class="result-box" id="myDivToPrint">
  
  <div class="all-div">
    <img src="img/print.png" style="width: 25px; height: 25px; float: right; margin-top: 20px; cursor: pointer;" title="Print" id="print" onclick="printContent('myDivToPrint');">
    <p><label class="holder">Name:&nbsp;</label><label class="holder2"><?php echo ucwords($me['first_name']).' '.ucwords($me['last_name']) ?></label></p>
    <p><label class="holder">Department:&nbsp;</label><label class="holder2"><?php echo ucwords($me['depertment']); ?></label></p>
    <p><label class="holder">Level:&nbsp;</label><label class="holder2"><?php echo $me['level']; ?></label></p>

    
  </div>
  <label class="tile-te">Result</label>
  
  <div class="result-area">
    <label class="subj">Subjects</label>
    <label class="subj2">Scores</label>
<?php
$doC="SELECT * FROM  mst_result,mst_test WHERE login='$meid' AND id=test_id";
$goto=mysqli_query($connect, $doC);
$count=mysqli_num_rows($goto);
if ($count > 0) {
  $total=array();
  while ($g=mysqli_fetch_array($goto)) {
    $total[]=$g['score'];

    ?>

    <div class="sub-subject">
      <label class="text-subj"><?php echo $g['test_name']; ?></label>
      <label class="text-rst"><?php echo $g['score'] ?></label>
    </div>
    <?php
  }
}else{
  ?>
    <div class="sub-subject">
      <label class="text-subj">No Result Yet.</label>
    </div>
<?php } ?>
<?php
$doC2="SELECT * FROM  mst_result,mst_test WHERE login='$meid' AND id=test_id";
$goto2=mysqli_query($connect, $doC2);
$count2=mysqli_num_rows($goto2);
if (!$count2 > 0) {
$gh2="r";
}
?>

<style>.r{display: none;}</style>
<label class="subj3">Total:&nbsp;<label class="<?php echo $gh2; ?>" style="color:green; font-weight: bolder;">

  <?php echo array_sum($total); ?></label></label>

  </div>
</div>
</center>

<script src="js/jquery-1.11.0.min.js"></script>

<script>
function printContent(el){
//var restorepage = $('body').html();
//var restorepage = $('header').html();
var printcontent = $('#' + el).clone();
//$('body').empty().html(printcontent);
$('header').hide();
$('#print').hide();
window.print();
//$('body').html(restorepage);
$('header').show();
$('#print').show();
}
</script>

</body>
</html>
