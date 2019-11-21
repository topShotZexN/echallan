<?php
include_once 'dbconnect.php';
$error = false;
if ( isset($_POST['sign']) ) {
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $model = trim($_POST['model']);
  $model = strip_tags($model);
  $model = htmlspecialchars($model);

  $color = trim($_POST['color']);
  $color = strip_tags($color);
  $color = htmlspecialchars($color);

  $type = trim($_POST['type']);
  $type = strip_tags($type);
  $type = htmlspecialchars($type);

  $purchase = strtotime($_POST["purchase"]);
  $purchase = date('Y', $purchase);

  $lic = trim($_POST['lic']);
  $lic = strip_tags($lic);
  $lic = htmlspecialchars($lic);

  


  if(empty($name)){
      $error = true;
      $errMSG = "Please enter the Licence plate details.";
    }
   if(empty($lic)){
      $error = true;
      $errMSG = "Please enter the license number of the owner.";
    } 

 


    $query = "SELECT Licplate FROM vehicle WHERE Licplate='$name'";
    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);
    if($count!=0){
      $error = true;
      $errMSG = "the vehicle is already registered.";
    }

 
 
if(!$error){
    $query = "INSERT INTO vehicle(Licplate, year, mname, color, type, lic) VALUES('$name','$purchase','$model','$color','$type','$lic')";
    $res = mysqli_query($conn,$query);
    if($res) {
          $success = "personnel account created successfully";
    } else {
      $errMSG = "Something went wrong, try again later...";
    }
}
  
}
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="..\CSS\insert_vehicle.css">
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
      <h2> VEHICLE DETAILS INSERTION </h2>
      <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        
        <p >LICENSE PLATE </p>
        <input class="inp" type="text" name="name" placeholder="Enter Name">
        <p>MODEL NAME </p>
        <input class="inp" type="text" name="model" placeholder="Enter model name">
        <p>DATE OF PURCHASE</p>
        <input class="inp" type="date" name="purchase" placeholder="Date of purchase">
        <p>COLOR</p>
        <input class="inp" type="text" name="color" placeholder="Enter the color of the vehicle">

    
        <p >TYPE </p>
        <input class="inp" type="text" name="type" placeholder="SUV/HACHBACK/COMMERCIAL">
        <p >LICENSE NUMBER OF OWNER</p>
        <input class="inp" type="text" name="lic" placeholder="Enter license number">
        <input class="inp" type="submit" name="sign" value="UPDATE VEHICLE DETAILS">

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
