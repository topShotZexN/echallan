<!DOCTYPEhtml>

<?php 
session_start();
include 'dbconnect.php';
if(!isset($_SESSION['admin'])){
	header("Location: admin_login.php");
	exit;	
}
else{
	$usrid = $_SESSION['admin'];
}

?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="..\CSS\challan_info.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="..\CSS\header.css">
  <link rel="stylesheet" type="text/css" href="..\CSS\footer.css">
<script src="..\javascript\home.js"></script>
</head>
<body>
  <div id="d_1">
    <img src="..\IMAGEs\image_1.gif" style="float:left">
      <br><h1 align="left" style="font-size:40; font-family:Arial">E-CHALLAN
    <img align="right" src="..\IMAGES\image_2.gif"style="width:400px; height:55px"></h1>
  </div>
  <div id="nav_bar">
    <ul class="nav-list">
      <li class="nav-list-item time" id="time"></li>
	  <li class="nav-list-item"><a href="logout.php">Logout</a></li>
      <li class="nav-list-item"><a href="about.php">About E-Challan</a></li>
      <li class="nav-list-item"><a href="Contact.php">Contact Us</a></li>
      <li class="nav-list-item"><a href="index.php">Home</a></li>

    </ul>
  </div>
</div>

<div class="icons" style="width:100%; margin-top: 150px; margin-bottom: 185px;text-align: center;">
    <div style="display:inline-block;margin:0 3%;"><div class="icons_link" style="width:180px; height:180px; display:block;border-radius: 50%; background-color: red;margin-left: 20px;" >
	<a href="create_admin.php"><img src="..\images\create_admin.png" style="width:100px ; height:100px;padding-top:30px "></a></div>
    <br>
    <div style="display:block; font-family:Arial, font-size:4px" >CREATE ADMIN CREDENTIALS</div>
    <br>
    <div style="display:block; font-family:Arial" >Create login credetials for <br>administrative access</div></div>
    <div style="display:inline-block;;margin:0 3%;"><div class="icons_link" style="width:180px; height:180px; display:block;border-radius: 50%; background-color: blue;margin-left: 40px;" >
	<a href="create_driver.php"><img src="..\images\create_driver.png" style="width:100px ; height:100px;padding-top:40px;"></a></div>
    <br>
    <div style="display:block; font-family:Arial" >INSERT DRIVER DETAILS</div>
    <br>
    <div style="display:block; font-family:Arial" >Insert new Licence and driver details<br> in the database</div></div>
    <div style="display:inline-block;;margin:0 3%;"><div class="icons_link" style="width:180px; height:180px; display:block;border-radius: 50%; background-color: green;margin-left: 40px;" >
	<a href="create_personnel.php"><img src="..\images\create_personnel.png" style="width:100px ; height:100px;padding-top:30px "></a></div>
    <br>
    <div style="display:block; font-family:Arial" >CREATE PERSONNEL CREDENTIALS</div>
    <br>
    <div style="display:block; font-family:Arial" >Create login credetials for <br>staff and personnel</div></div>
    <div style="display:inline-block;;margin:0 3%;"><div class="icons_link" style="width:180px; height:180px; display:block;border-radius: 50%; background-color: yellow;margin-left: 40px;" >
	<a href="create_vehicle.php"><img src="..\images\create_vehicle.png" style="width:100px ; height:100px;padding-top:30px "></a></div>
    <br>
    <div style="display:block; font-family:Arial" >INSERT VEHICLE DETAILS</div>
    <br>
    <div style="display:block; font-family:Arial" >Insert newly registered vehicle details<br> in the database</div></div>

</div>
  
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
