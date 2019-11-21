<?php

  session_start();
  include_once 'dbconnect.php';

  $error = false;

  if( isset($_POST['log']) ) {
    
    $error = false;

    $usrid = trim($_POST['usrid']);
    $usrid = strip_tags($usrid);
    $usrid = htmlspecialchars($usrid);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);


    if(empty($pass)){
      $error = true;
      $errMSG1 = "Please enter your password.";
    }
    else{
      $pass = hash('sha256', $pass); 
    }
    
    if(empty($usrid)){
      $error = true;
      $errMSG1 = "Please enter your user id address.";
    } 
    
    if (!$error) {

      $res=mysqli_query($conn,"SELECT Username, password, is_staff, email FROM login WHERE username='$usrid'");
      $row=mysqli_fetch_array($res);
      $count = mysqli_num_rows($res); 

      if( $count == 1 && $row['password']==$pass && $row['is_staff']==1) {
        $_SESSION['echallanp'] = $usrid;
        header("Location: police_desktop.php");
      } else {
        $errMSG1 = "Incorrect Credentials, Try again...";
      }

    }
  }
?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="..\CSS\login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="..\CSS\header.css">
  <link rel="stylesheet" type="text/css" href="..\CSS\footer.css">
<script src="..\javascript\home.js"></script>
</head>
<body>
  <div id="d_1">
    <img src="..\IMAGEs\image_1.gif" style="float:left">
      <br><h1 align="left" style="font-size:40; font-family:Arial">E-CHALLAN
    <img align="right" src="..\IMAGES\image_2.gif"style="width:400; height:55">
  </div>
  <div id="nav_bar">
    <ul class="nav-list">
      <li class="nav-list-item time" id="time"></li>
      <li class="nav-list-item"><a href="about.php">About E-Challan</a></li>
      <li class="nav-list-item"><a href="Contact.php">Contact Us</a></li>
      <li class="nav-list-item"><a href="index.php">Home</a></li>

    </ul>
  </div>

  <div class="loginBox">
      <img src="..\images\user.png" class="user">
      <h2> PERSONNEL LOGIN </h2>
      <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        <p >USERNAME </p>
        <input type="text" name="usrid" placeholder="Enter Username">
        <p >PASSWORD </p>
        <input type="password" name="pass" placeholder="Enter Password">
        <input type="submit" name="log" value="Sign In">
        <a href="forgotp.php">Forgot Password ? </a><br><br>
	<?php if(isset($errMSG1)) {?>
          <span style="color:red;"><?php echo $errMSG1; ?></span><br><br>
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
