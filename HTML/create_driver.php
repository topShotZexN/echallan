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

  $lic = trim($_POST['lic']);
  $lic = strip_tags($lic);
  $lic = htmlspecialchars($lic);

  $dob = strtotime($_POST["dob"]);
  $dob = date('Y-m-d', $dob);

  $issuedon = strtotime($_POST["issuedon"]);
  $issuedon = date('Y-m-d', $issuedon);
  
  $validity = strtotime($_POST["validity"]);
  $validity = date('Y-m-d', $validity);

  $gender = trim($_POST['gender']);
  $gender = strip_tags($gender);
  $gender = htmlspecialchars($gender);

  $phone = trim($_POST['phone']);
  $phone = strip_tags($phone);
  $phone = htmlspecialchars($phone);

  $age = trim($_POST['age']);
  $age = strip_tags($age);
  $age = htmlspecialchars($age);

  $rto = trim($_POST['rto']);
  $rto = strip_tags($rto);
  $rto = htmlspecialchars($rto);

  $ltype = trim($_POST['ltype']);
  $ltype = strip_tags($ltype);
  $ltype = htmlspecialchars($ltype);


  if(empty($name)){
      $error = true;
      $errMSG = "Please enter a name.";
    }
   if(empty($lic)){
      $error = true;
      $errMSG = "Please enter a lic.";
    } 



    $query = "SELECT * FROM license WHERE id='$lic'";
    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);
    if($count!=0){
      $error = true;
      $errMSG = "The licence number is already registered";
    }

 
  $query = "SELECT email FROM driver WHERE email='$email'";
    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);
    if($count!=0){
      $error = true;
      $errMSG = "The driver is already registeered";
    }

  

if(!$error){
    $query = "INSERT INTO license(id, rto, issued, vtype, vdate) VALUES('$lic', '$rto', '$issuedon','ltype', '$validity')";
    $query2 = "INSERT INTO driver(email, name, dob, phone, age, sex, lic) VALUES('$email', '$name','$dob', '$phone','$age', '$gender','$lic')";
    $res = mysqli_query($conn,$query2);

    if($res) {
          $res1 = mysqli_query($conn,$query);
          if($res1) {
          $success = "DRIVER DETAILS INSERTED SUCCESSFULLY";
          }
          else {
          $errMSG = "Something went wrong, try again later... lic";
        }
    } else {
      $errMSG = "Something went wrong, try again later...";
    }
}
  
}
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="..\CSS\insert_driver.css">
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
      <h2> DRIVER AND LICENCE DETAILS INSERTION </h2>
      <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        
        <p >FULL NAME </p>
        <input class="inp" type="text" name="name" placeholder="Enter Name">
        <p>EMAIL </p>
        <input class="inp" type="text" name="email" placeholder="Enter email">
        <p>PHONE </p>
        <input class="inp" type="text" name="phone" placeholder="Enter mobile number">

        <div style="width: 100%; display: inline-block;">
          <div style="width:32%;display: inline-block;">
            <p> DATE OF BIRTH </p><br>
            <input class="inp date" type="date" name="dob">
          </div>
          <div style="width:30%;display: inline-block;margin-left: 20px">
              <p> GENDER </p><br>
              <select id = "selectGender" name="gender">
                <option id = "optionGender">Choose</option>
                <option id = "optionGender" value="m">Male</option>
                <option id = "optionGender" value="f">Female</option>
                <option id = "optionGender" value="o">Others</option>
              </select>
          </div>
          <div style="width:30%;display: inline-block;">
            <p> AGE </p><br>
            <input class="inp age" type="number" name="age" placeholder="age">
          </div>
        </div>


        <p>LICENCE-NUMBER </p>
        <input class="inp" type="text" name="lic" placeholder="Enter licence number">
        <div style="width: 100%; display: inline-block;">
          <div style="width:32%;display: inline-block;">
            <p> ISSUED ON </p><br>
            <input class="inp date" type="date" name="issuedon">
          </div>
          <div style="width:30%;display: inline-block;margin-left: 87px">
              <p> VEHICLE TYPE </p><br>
              <select id = "selectGender" name="ltype">
                <option id = "optionGender">Choose</option>
                <option id = "optionGender" value="PERSONAL">COMMERCIAL</option>
                <option id = "optionGender" value="COMMERCIAL">PERSONAL</option>
              </select>
          </div>
          <div style="width:50%;display: inline-block;">
            <p> RTO </p>
            <input class="inp age" type="text" name="rto" placeholder="RTO">
          </div>
          <div style="width:32%;display: inline-block;margin-top: 15px">
          <p> VALID TILL </p><br>
            <input class="inp date" type="date" name="validity">
          </div>
        </div>


        <input class="inp" type="submit" name="sign" value="UPDATE DRIVER DETAILS">

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
