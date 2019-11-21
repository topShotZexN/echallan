<?php
include_once 'dbconnect.php';
$error = false;
if ( isset($_POST['sign']) ) {
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $empid = trim($_POST['empid']);
  $empid = strip_tags($empid);
  $empid = htmlspecialchars($empid);

  $desig = trim($_POST['desig']);
  $desig = strip_tags($desig);
  $desig = htmlspecialchars($desig);

  $dob = strtotime($_POST["dob"]);
  $dob = date('Y-m-d', $dob);

  $gender = trim($_POST['gender']);
  $gender = strip_tags($gender);
  $gender = htmlspecialchars($gender);

  $phone = trim($_POST['phone']);
  $phone = strip_tags($phone);
  $phone = htmlspecialchars($phone);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  $usr = trim($_POST['usr']);
  $usr = strip_tags($usr);
  $usr = htmlspecialchars($usr);


  if(empty($pass)){
      $error = true;
      $errMSG = "Please enter a password.";
    }
   if(empty($usr)){
      $error = true;
      $errMSG = "Please enter a username.";
    } 

  if((strlen($pass) < 6) &&($error == false)){
    $error = true;
    $errMSG = "Password must have atleast 6 characters.";
  }
  

  $password = hash('sha256', $pass);

    $query = "SELECT empid FROM traffic_per WHERE empid='$empid'";
    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);
    if($count!=0){
      $error = true;
      $errMSG = "Employee details is already in database.";
    }

 
  $query = "SELECT username FROM admin WHERE username='$usr'";
    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);
    if($count!=0){
      $error = true;
      $errMSG = "Provided username is already in use.";
    }

  
$is_staff= 1;
if(!$error){
    $query = "INSERT INTO traffic_per(empid,email, name, dob, sex, phone, desgn) VALUES('$empid','$email','$name','$dob','$gender','$phone','$desig')";
    $query2 = "INSERT INTO login(username, email, password, is_staff) VALUES('$usr', '$email', '$password','$is_staff')";
    $res = mysqli_query($conn,$query);
    $res1 = mysqli_query($conn,$query2);
    if( ($res)&&($res1)) {
          $success = "personnel account created successfully";
    } else {
      $errMSG = "Something went wrong, try again later...";
    }
}
  
}
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="..\CSS\create_personnel.css">
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
      <li class="nav-list-item"><a href="index.php">Home</a></li>

    </ul>
  </div>
  <div class="loginBox">
      <img src="..\images\user.png" class="user">
      <h2> PERSONNEL ACCOUNT CREATION </h2>
      <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        
        <p >FULL NAME </p>
        <input class="inp" type="text" name="name" placeholder="Enter Name">
        <p>EMAIL </p>
        <input class="inp" type="text" name="email" placeholder="Enter email">
        <p>EMPLOYEE-ID </p>
        <input class="inp" type="text" name="empid" placeholder="Enter employee id">
        <p>DESIGNATION </p>
        <input class="inp" type="text" name="desig" placeholder="Enter DESIGNATION OF THE EMPLOYEE">

        <div style="width: 100%; display: inline-block;">
          <div style="width:32%;display: inline-block;">
            <p> DATE OF BIRTH </p><br>
            <input class="inp date" type="date" name="dob">
          </div>
          <div style="width:30%;display: inline-block;margin-left: 20px">
              <p> GENDER </p><br>
              <select id = "selectGender" name="gender">
                <option id = "optionGender">Choose</option>
                <option id = "optionGender" value="M">Male</option>
                <option id = "optionGender" value="F">Female</option>
                <option id = "optionGender" value="O">Others</option>
              </select>
          </div>
          <div style="width:30%;display: inline-block;">
            <p> PHONE </p><br>
            <input class="inp age" type="tel" name="phone" pattern="[0-9]{10}" placeholder="phone number">
          </div>
        </div>
        <p >USERNAME </p>
        <input class="inp" type="text" name="usr" placeholder="Enter Username">
        <p >PASSWORD </p>
        <input class="inp" type="password" name="pass" placeholder="Enter Password">
        <input class="inp" type="submit" name="sign" value="CREATE PERSONNEL ACCOUNT">

        <?php if(isset($errMSG)) {?>
          <span style="color:red;"><?php echo $errMSG; ?></span><br><br>
        <?php } ?>
        <?php if(isset($success)) {?>
          <span style="color:green;"><?php echo $success; ?></span><br><br>
        <?php } ?>

      </form>
  </div>
      <footer>
        <div class = "footer">
          <div class = "footer-head" style="width:100%;">
            <div style = "display: inline-block;width:25%;">
                <h4 style = "padding-left: 40px;">Links</h4>
                <ul style="list-style-type:none; margin-top: -20px">
              <li><a href="index.html" class = "footer-links">Home</a></li>
              <li><a href="contact.html" class = "footer-links">Contact Us</a></li>
              <li><a href="about.html" class = "footer-links">About E-Challan</a></li>
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

      </footer>
      </div>
</body>
</html>
