﻿<!DOCTYPE html>

<html>
  <head>
  	<title>E-Challan</title>
    <link type="text/css" rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="..\CSS\header.css">
    <link rel="stylesheet" type="text/css" href="..\CSS\footer.css">
    <script src="..\javascript\home.js"></script>
  </head>

  <body>
  <nav>
    <div id="d_1">
      <img src="..\IMAGEs\image_1.gif" style="float:left">
        <img src="..\IMAGEs\image_2.gif" style="height: 90px; width: 450px; float:right;  margin-top:20px; margin-right: 35px">
        <br><h1 style="font-size: 40px ;display:inline-block;">E-CHALLAN

        </h1>
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

  </nav>

    <div class="forbg forbg1" id="forbgg" style="background-color: rgba(0,0,0,.5);">
      <div id="innerd" style="width:70%;margin:auto;padding-top: 10px;text-align: center;background-color:transparent;">
        <div id="opts">
          <button class="btn-med-dark" id="sub_que" style="width: 70%; height: 50px;font-size: 1.2em;margin:auto;margin-top:55px;margin-bottom: 25px;" type="button">Submit a Query</button>
          <br><br>
          <span><hr style="width:15%;display: inline-block;margin-right: 5px;"><h2 align="center" style="color:#333;display:inline-block;">OR</h2><hr style="width:15%;display: inline-block;margin-left: 5px;"></span>
          <br><br>
          <button class="btn-med-dark" id="mal" style="width: 70%; height: 50px;font-size: 1.2em;margin:auto;margin-top:25px;margin-bottom: 50px;" type="button">Contact us by Mail</button>
        </div>
        <div id="ldr" class="loader"></div>
        <div id="queryy">
        <span><hr style="width:15%;display: inline-block;margin-right: 5px;"><h2 align="center" style="color:#333;display:inline-block;">Any Queries?</h2><hr style="width:15%;display: inline-block;margin-left: 5px;"></span>
        <form method="Post">
          <div>
              <input class="inp" type="text" name="fname" placeholder="First Name" style="width:45%;float:left;display:inline;margin-left: 2px;" required>
              <input class="inp" type="text" name="lname" placeholder="Last Name" style="width:45%;float:right;display:inline;margin-right:2px;">
            </div>
            <br><br><br>
            <input class="inp" type="email" name="eml" placeholder="Enter your email" style="margin-top: 8px;" required>
            <br><br>
            <textarea class="inp" placeholder="Your query here..." style="width:96%;height:100%;margin-left: 2px;resize: none;" rows="3"></textarea>
            <br><br>
            <button class="btn-med-dark " style="width: 100%; height: 35px;font-size: 1.2em;" type="submit">Submit</button>
            <br><br>
        </form>
        </div>
        <div id="maill">
          <div style="width:100%;margin-top:30px;">
            <img src="../IMAGES/mail.jpg" style="height:75px;width:75px;border-radius:50%;">
            <h4>us@echallan.gov</h4>
          </div>
          <div class="ldiv" style="width:100%;">
            <img src="../IMAGES/phone.jpg" style="height:75px;width:75px;border-radius:50%;">
            <h3>90XXXXXXXX</h3>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script>
      $(document).ready(function(){
        $('#queryy').hide();
        $('#ldr').hide();
        $('#maill').hide();

        $('button#sub_que').on('click',function(){
          $('#ldr').delay(100).fadeIn();
          $('#opts').delay(100).hide(0);
          $('#ldr').delay(400).fadeOut();
          $('#queryy').delay(1200).fadeIn();
        });

        $('button#mal').on('click',function(){
          $('#ldr').delay(100).fadeIn();
          $('#opts').delay(100).hide(0);
          $('#ldr').delay(400).fadeOut();
          $('#maill').delay(1200).fadeIn();
        });
      });
    </script>

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
