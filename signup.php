<?php
include_once'plugin.php';
include 'connect.php';
if (isset($_POST['submit'])){

$query = "INSERT INTO mst_user(login,pass,first_name,last_name,depertment,level,sex) VALUES ('".$_POST['username']."','".$_POST['matric']."','".$_POST['first']."','".$_POST['last']."','".$_POST['dept']."','".$_POST['level']."','".$_POST['sex']."')";

$result = mysqli_query($connect, $query);
if(! $result){
echo "<script>Registration not Successful</script>";
}
else {
echo "<script type=\"text/javascript\">
                alert(\"Registration Successful.\");
                window.location = \"index.php\"
            </script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo $s['logo']; ?>">
<title>New Student</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
</head>
  <body class="login-img3-body">
    <div class="container">
      <form class="login-form" action="" method="POST">
        <div class="login-wrap">
            <p class="login-img"><img src="<?php echo $s['logo']; ?>" style="width: 50%; height: 50%;"></i></p>
            <div class="input-group">
              <span class="input-group-addon"></i></span>
              <input name="matric" type="text" class="form-control" placeholder="Enter Reg No" autofocus required>
            </div>
            <div class="input-group">
              <span class="input-group-addon"></i></span>
              <input name="username" type="text" class="form-control" placeholder="Create Username" autofocus required>
            </div>
            <div class="input-group">
              <span class="input-group-addon"></i></span>
              <input name="first" type="text" class="form-control" placeholder="Enter First Name" autofocus required>
            </div>
            <div class="input-group">
              <span class="input-group-addon"></i></span>
              <input name="last" type="text" class="form-control" placeholder="Enter Last Name" autofocus required>
            </div>
            <div class="input-group">
              <span class="input-group-addon"></i></span>
              <input name="dept" type="text" class="form-control" placeholder="Enter Department. e.g. science" autofocus required>
            </div>
            <div class="input-group">
              <span class="input-group-addon"></i></span>
              <input name="level" type="text" class="form-control" placeholder="Enter Class/Desired class" autofocus required>
            </div>
            <div class="input-group">
              <span class="input-group-addon"></i></span>
              <input name="sex" type="text" class="form-control" placeholder="Gender" autofocus required>
            </div>
            <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit">Register</button>
        </div>
      </form>
       <center>
   <a href="index.php" class="">Login Now</a>
   </center>
    <div class="text-right">
            <div class="credits">
            <a href="#">Created</a> by <a href="#">Infinity</a><br>
            </div>
        </div>
    </div>
  </body>
</html>
