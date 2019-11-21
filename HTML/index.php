<?php

  session_start();
  include_once 'dbconnect.php';

  if(isset($_SESSION['echallan']) ){
    header("location: user_desktop.php");
    exit;
  }
  if(isset($_SESSION['echallan_police']) ){
    header("location: police_desktop.php");
    exit;
  }

 ?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="..\CSS\home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="..\CSS\header.css">
    <link rel="stylesheet" type="text/css" href="..\CSS\footer.css">
  <script src="..\javascript\home.js"></script>
  <style>
  html{
    scroll-behavior: smooth;
  }
  .anim{animation:fading 5s infinite}@keyframes fading{0%{opacity:0.1}50%{opacity:1}100%{opacity:0.1}}
  .bl{position:absolute;top:68%;left:0.5%;transform:translate(0%,-50%);-ms-transform:translate(-0%,-50%);}
  .br{position:absolute;top:68%;right:0.5%;transform:translate(0%,-50%);-ms-transform:translate(0%,-50%);}
  .bt{background: transparent;font-size:100px;outline:none;border:none;color:#eee;cursor:pointer;opacity: 0.5;height:170px;}
  .bt:hover{
    color: #eee;
    opacity: 1;
  }
  </style>
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
      <li class="nav-list-item"><a href="about.php">About E-Challan</a></li>
      <li class="nav-list-item"><a href="Contact.php">Contact Us</a></li>
      <li class="nav-list-item"><a href="user_signup.php">Sign Up</a></li>
      <li class="nav-list-item"><a href="user_login.php">Login</a></li>
      <li class="nav-list-item"><a href="index.php">Home</a></li>

    </ul>
  </div>
    <br>
  <div  style="max-width:100%;width:100%;height:500px;border-radius:15px;overflow:hidden;">
  <img class="mySlides anim" src="../images/0.jpg" style="width:100%;height:500px;z-index:-1;">
  <img class="mySlides anim" src="../images/1.jpg" style="width:100%;height:500px;z-index:-1;">
  <img class="mySlides anim" src="../images/2.jpg" style="width:100%;height:500px;z-index:-1;">
  <img class="mySlides anim" src="../images/3.jpg" style="width:100%;height:500px;z-index:-1;">
  <button class="bl bt" onclick="plusDivs(-1)">&#10094;</button>
  <button class="br bt" onclick="plusDivs(1)">&#10095;</button>
  </div>
  <br>
  <br>
  <div id="welcome">
    <Center><p> Welcome Aboard !</p>
      <hr id="wel">

    <p>An interactive and single user-friendly interface to pay, issue , and see your previously issued challans.</p>
    <p>We Provide all types of features and facilities to process Challans.</p>
    <p>Our moto is- <i>"Alert today, Alive tommorrow"</i></p>
    </center>

  </div>

  <div class="icons" style="width:100%; margin-top: 150px; margin-bottom: 185px;text-align: center;">
    <div style="display:inline-block;margin:0 10%;"><div class="icons_link" style="width:180px; height:180px; display:block;	border-radius: 50%; background-color: red;" ><a href="user_login.php"><img src="..\images\payment.jpg" style="width:100px ; height:100px;padding-top:30px "></a></div>
    <br>
    <div style="display:block; font-family:Arial" >PAY CHALLAN </div>
    <br>
    <div style="display:block; font-family:Arial" >Pay all you dues with a <br>single click! </div></div>
    <div style="display:inline-block;margin:0 10%;"><div class="icons_link" style="width:180px; height:180px; display:block;	border-radius: 50%; background-color: yellow;margin-left: 30px" ><a href="user_login.php"><img src="..\images\history.jpg" style="width:100px ; height:100px;padding-top:40px;"></a></div>
    <br>
    <div style="display:block; font-family:Arial">CHALLAN HISTORY</div>
    <br>
    <div style="display:block; font-family:Arial" >See all your issued Challan with a <br> Single Click! </div></div>
    <div style="display:inline-block;margin:0 10%;"><div class="icons_link" style="width:180px; height:180px; display:block;	border-radius: 50%; background-color: green;" ><a href="personnel_login.php"><img src="..\images\police.jpg" style="width:100px ; height:100px;padding-top:30px "></a></div>
    <br>
    <div style="display:block; font-family:Arial" >PERSONNEL LOGIN</div>
    <br>
    <div style="display:block; font-family:Arial" >Issue a Challan with a <br>single click! </div></div>

</div>

<a href="#d_1" style="border-radius:50%;height:35px;width:40px;background:#222;color:#eee;float:right;padding-top:18px;padding-left:12px;margin-bottom:20px;margin-right:20px;font-family:arial;text-decoration:none;">Top</a>



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

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 4000); // Change image every 2 seconds
}
</script>

<script>
var slideIndex = 1;
setTimeout(showDivs(slideIndex), 3000);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block"
}
</script>

</body>
</html>
