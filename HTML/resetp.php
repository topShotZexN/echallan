<?php

  session_start();
  include_once 'dbconnect.php';

  if(!isset($_SESSION['echallanp']) ){
    header("location: personnel_login.php");
    exit;
  }
  else{
    $usrid=$_SESSION['echallanp'];
  }


  if( isset($_POST['reset']) ) {
    
    $error = false;

    $passo = trim($_POST['passo']);
    $passo = strip_tags($passo);
    $passo = htmlspecialchars($passo);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    $pass1 = trim($_POST['pass1']);
    $pass1 = strip_tags($pass1);
    $pass1 = htmlspecialchars($pass1);


    if(strlen($pass) < 6) {
    $error = true;
    $errMSG = "Password must have atleast 6 characters.";
  }
  else if(strcmp($pass,$pass1)!=0){
    $error = true;
    $errMSG = "Passwords did not match!";
  }
    else{
      $pass = hash('sha256', $pass);
      $passo = hash('sha256', $passo); 
    }
    
    if (!$error) {

      $res=mysqli_query($conn,"SELECT Username, password, is_staff, email FROM login WHERE Username = '$usrid'");
      $row=mysqli_fetch_array($res);
      $count = mysqli_num_rows($res); 

      if( $count == 1 && $row['password']==$passo && $row['is_staff']==1) {
      	mysqli_query($conn, "UPDATE login SET password = '$pass' WHERE Username = '$usrid';");
      	$success = "Password reset successfully";
      } else {
        $errMSG1 = "Incorrect Credentials, Try again...";
      }

    }
  }

  ?>

  <html>
<head>
  <link rel="stylesheet" type="text/css" href="css\login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css\header.css">
  <link rel="stylesheet" type="text/css" href="css\footer.css">
<script src="javascript\home.js"></script>
</head>
<body style="margin:0;">
  <div id="d_1">
      <br><h1 align="left" style="font-size:40; font-family:Arial">E-CHALLAN
    <img align="right" src="IMAGES\image_2.gif"style="width:400px; height:55px"></h1>
  </div>
  <div id="nav_bar">
    <ul class="nav-list">
      <li class="nav-list-item time" id="time"></li>
      <li class="nav-list-item"><a href="logout.php">Logout</a></li>
      <li class="nav-list-item"><a href="about.php">About E-Challan</a></li>
      <li class="nav-list-item"><a href="Contact.php">Contact Us</a></li>

    </ul>
  </div>

  <div class="loginBox">
      <h2> CHANGE PASSWORD </h2>
      <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        <p >OLD PASSWORD</p>
        <input type="password" name="passo" placeholder="Enter Old Password" required>
        <p >NEW PASSWORD </p>
        <input type="password" name="pass" placeholder="Enter New Password" required>
        <p >CONFIRM NEW PASSWORD </p>
        <input type="password" name="pass1" placeholder="Confirm New Password" required>
        <input type="submit" name="reset" value="Change">
        <?php if(isset($errMSG1)) {?>
          <span style="color:red;"><?php echo $errMSG1; ?></span><br><br>
        <?php } 
        else if(isset($success)) {?>
        	<span style="color:green;"><?php echo $success; ?></span><br><br>
        <?php } ?>
      </form>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
      <footer>
        <div class = "footer">
          <div class = "footer-head" style="width:100%;">
            <div style = "display: inline-block;width:25%;">
                <h4 style = "padding-left: 40px;">Links</h4>
                <ul style="list-style-type:none; margin-top: -20px">
              <li><a href="index.php" class = "footer-links">Home</a></li>
              <li><a href="contact.php" class = "footer-links">Contact Us</a></li>
              <li><a href="about.php" class = "footer-links">About E-Challan</a></li>
            </ul>
            </div>
            <div style = "display: inline-block;width:50%;">
                <h4>Traffic Police- Commited to your service</h4>
                <p style="text-align: justify">Contents owned and updated by concerned Departments and coordinated by Information Technology Department Secretariat, Fort St. George, Chennai 600 009, Tamil Nadu, India</p>
            </div>
          </div>
          <p style = "margin-left: 35px; display: inline; padding-top: 5px;">©</p>
          <a href="#" class="fa fa-facebook" style = "float: right; margin-right:12px; margin-left: 4px; padding: 7px 15px 18px 8px;"></a>
          <a href="#" class="fa fa-twitter" style = "float: right; margin-right:4px; margin-left: 4px;"></a>
          <a href="#" class="fa fa-google" style = "float: right; margin-right:4px; margin-left: 2px;"></a>
          <a style = "float: right; margin-right:4px; margin-left: 2px;">Join us On-  &nbsp &nbsp   </a>
        </div>
      </footer>
</body>
</html>
