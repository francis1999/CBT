
<?php include 'plugin.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?php echo $s['logo']; ?>">

    <title>Login Student</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">
<?php
include("database.php");
extract($_POST);

if(isset($submit)){
    $rs=mysqli_query($cn, "SELECT * FROM mst_user WHERE login='$loginid' and pass='$pass'");
    while ($row=mysqli_fetch_array($rs)) {
        $id=$row['user_id'];
    }
    if(mysqli_num_rows($rs)<1)
    {
        $found="N";

    }
    else
    {
        $_SESSION[login]=$loginid;

    }
}
if (isset($_SESSION[login]))
{
header("location:welcome.php?u5cf9e69df6using=".base64_encode($id));
        exit;
}
?>
    <div class="container">

      <form class="login-form" action="" method="post">        
        <div class="login-wrap">
            <p class="login-img"><img src="<?php echo $s['logo']; ?>" style="width: 50%; height: 50%;"></i></p>
            <div class="input-group">
              <span class="input-group-addon"></i></span>
              <input name="loginid" type="text" class="form-control" placeholder="Enter Username" autofocus required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"></i></span>
                <input name="pass" type="password" class="form-control" placeholder="Enter Matric" required>
            </div>
                   <?php
          if(isset($found))
          {
            echo "Invalid Username or Password";
          }
          ?>
            <button name="submit" id="submit" class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            
        </div>
        </form>
        <center>
   <a href="signup.php" class="">Register Now</a>
   </center>
   
    </div>


  </body>
</html>
