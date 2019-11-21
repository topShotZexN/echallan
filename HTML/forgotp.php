<!DOCTYPEhtml>
<?php

  session_start();
  include_once 'dbconnect.php';

  function generateNumericOTP($n) { 
      
    $generator = "1357902468"; 
  
    $result = ""; 
  
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
  
    return $result; 
}
$error = false;
  if( isset($_POST['forp']) ) {
  

    $usrid = trim($_POST['usrid']);
    $usrid = strip_tags($usrid);
    $usrid = htmlspecialchars($usrid);

    $tel = trim($_POST['tel']);
    $tel = strip_tags($tel);
    $tel = htmlspecialchars($tel);

    $res=mysqli_query($conn,"SELECT Username, email, is_staff FROM login WHERE username='$usrid'");
    $row=mysqli_fetch_array($res);
    $email = $row['email'];
    if ($usrid==$row['Username'] && $row['is_staff']==1){
      $res1=mysqli_query($conn,"SELECT phone FROM traffic_per WHERE email='$email'");
      $row1=mysqli_fetch_array($res1);
      if($row1['phone']==$tel){
        $otp= generateNumericOTP(6);
      //api
//post
$url="www.way2sms.com/api/v1/sendCampaign";
$message = urlencode($otp);// urlencode your message
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=V3WK5B5A5NZ3UXVW6IYPCCQKFKTMM0GW&secret=0H3E5L8LY08EJL8Y&usetype=stage&phone=$tel&senderid=oinksharma@gmail.com&message=$message");// post data
// query parameter values must be given without squarebrackets.
 // Optional Authentication:
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
$_SESSION['usr'] = $usrid;
$_SESSION['otp'] = $otp;
$error = true;
    }


    }
    else{
      $errMSG1 = "Phone number not correct";
    }
  }
if( isset($_POST['fotp']) ) {

    $ottp = trim($_POST['ottp']);
    $ottp = strip_tags($ottp);
    $ottp = htmlspecialchars($ottp);

    if ($ottp!=$_SESSION['otp']){
      $errMSG1 = "OTP not correct";
    }
    else{
      $_SESSION['echallanp'] = $_SESSION['usr'];
    unset($_SESSION['usr']);
      header("Location: police_desktop");
    }
  }
?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="..\css\login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="..\css\header.css">
  <link rel="stylesheet" type="text/css" href="..\css\footer.css">
<script src="..\javascript\home.js"></script>
</head>
<body style="margin:0;width:100%;">
  <div id="d_1">
  		<img src="..\IMAGEs\image_1.gif" style="float:left;height: 140px;">
      <br><h1 align="left" style="font-size:40; font-family:Arial">E-CHALLAN
    <img align="right" src="..\IMAGES\image_2.gif"style="width:400px; height:45px"></h1>
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
      <!--<img src="images\user.png" class="user">-->
      <h2> PERSONNEL LOGIN </h2>
      <?php if(!$error){ ?>
      <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        <p >USERNAME </p>
        <input type="text" name="usrid" placeholder="Enter Username">
        <p >PHONE</p>
        <input class="inp" type="tel" name="tel" placeholder="Enter Phone">
        <input type="submit" name="forp" value="Get OTP">
        <?php if(isset($errMSG1)) {?>
          <span style="color:red;"><?php echo $errMSG1; ?></span><br><br>
        <?php } }
        else{?>
        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        <p >OTP</p>
        <input type="number" name="ottp" placeholder="Enter Phone" pattern="[0-9]{6}">
        <input type="submit" name="fotp" value="Log In">
        <?php if(isset($errMSG1)) {?>
          <span style="color:red;"><?php echo $errMSG1; ?></span><br><br>
        <?php } } ?>

        <a href="personnel_login.php">Login</a>

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
