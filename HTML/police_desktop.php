<!DOCTYPE html>

<?php

  session_start();
  include_once 'dbconnect.php';

  if(!isset($_SESSION['echallanp']) ){
    header("location: personnel_login.php");
    exit;
  }
  else{
    $usrid=$_SESSION['echallanp'];
	//echo $usrid;
  }

  $res = mysqli_query($conn, "SELECT Cno, dtime, place, status FROM challan WHERE isby='$usrid' ORDER BY dtime desc;");
  $rowc=mysqli_fetch_all($res, MYSQLI_ASSOC);
  $ch_count = count($rowc);

?>

<html>
  <head>
  	<link rel="stylesheet" type="text/css" href="../css/style.css">
	   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="..\CSS\header.css">
 	  <link rel="stylesheet" type="text/css" href="..\CSS\footer.css">
	  <script src="..\javascript\home.js"></script>
  	<title>Home</title>
  </head>

  <body>
  	<nav>
      <div id="d_1">
	  <img src="..\IMAGEs\image_1.gif" style="float:left;height: 130px">
          <img src="..\IMAGEs\image_2.gif" style="height: 55px; width: 400px; float:right;  margin-top:20px; margin-right: 35px">
      <br><h1 align="left" style="font-size:40; font-family:Arial">E-CHALLAN
  </div>
  <div id="nav_bar">
    <ul class="nav-list">
      <li class="nav-list-item time" id="time"></li>
      <li class="nav-list-item"><a href="logout.php">Logout</a></li>
      <li class="nav-list-item"><a href="about.php">About E-Challan</a></li>
      <li class="nav-list-item"><a href="Contact.php">Contact Us</a></li>
    </ul>
  </div>
  	</nav>
  	<br><br>
  	<div class="row">
  		<div class="col col-l tile-1 tilee1">
  			<h1 align="center" class="frnt1" style="font-family: arial;color:#eee;margin-top:55px;">Issue Challan</h1>
  			<button id="close1" class="d-none" type="button" style="float:left;background: transparent;font-size:25px;">X</button>
  			<div class="con1 d-none">
        <div class="loginBox">

    <h2> ISSUE CHALLAN </h2>
    <form>
      <p>LICENSE NUMBER </p>
      <input id="lic" class="inp" type="text" name="lic" placeholder="Enter License Number" required>
      <p id="ret" style="color:red;font-size:15px;"></p><br>
      <p>VEHICLE NUMBER</p>
      <select class="inp" name="veh" id="lis" style="background: transparent;color:#eee;" required>
      </select>
      <p>LOCATION</p>
      <input id="loc" class="inp" type="text" name="loc" placeholder="For example, 4 Square Road, MGR Nager, Vellore" required>
      <p>OFFENCE</p><br>
        <select id="rule" class="inp" name="rule" style="background: transparent;color:#eee;" required>
          <option id = "optionGender">--Choose--</option>
          <?php $quer = "SELECT * FROM rule";
                $ress = mysqli_query($conn, $quer);
                $roww = mysqli_fetch_all($ress, MYSQLI_ASSOC);
                for ($i = 0; $i < count($roww); $i++){ ?>
          <option id = "optionGender" value="<?php echo $roww[$i]['id']; ?>"><?php echo $roww[$i]['rname']; ?></option>
          <?php } ?>
        </select>
      <br><br><br>
      <button class="inp" type="button" id="issue" name="issue" value="ISSUE CHALLAN">ISSUE CHALLAN</button>
    </form>
    <p style="font-size: 20px;color:#eee;" id="output"></p>
  </div>
        </div>
  		</div>
  		<div class="col col-r tile-2 tilee2">
  			<h1 align="center" class="frnt2" style="font-family: arial;color:#eee;margin-top:55px;">License Details</h1>
  			<button id="close2" class="d-none" type="button" style="float:left;background: transparent;font-size:25px;">X</button>
  			<div class="con2 d-none">
          <div class="loginBox" style="width:40%;">
          <div id="recv1">
          <p style="font-size: 20px;" id="output1"></p>
          </div>
        <div id="prev1">
            <h2 style="padding-top:0;margin-top:0;">GET LICENSE DETAILS</h2>
            <br>
            <form>
              <p>LICENSE NUMBER</p><br>
              <input class="inp" id="lics" type="text" name="" placeholder="Enter license number"><br><br><br>
              <button class="inp" type="button" id="ldet" name="">GET DETAILS</button>
            </form>
          </div>
        </div>
  			</div>
  		</div>
  	</div>

  	<div class="row">
  		<div class="col col-l tile-3 tilee3">
  			<h1 align="center" class="frnt3" style="font-family: arial;color:#eee;margin-top:55px;">Vehicle Details</h1>
  			<button id="close3" class="d-none" type="button" style="float:left;background: transparent;font-size:25px;">X</button>
  			<div class="con3 d-none">
          <div class="loginBox" style="width:40%;">
          <div id="recv2">
          <p style="font-size: 20px;" id="output2"></p>
          </div>
        <div id="prev2">
            <h2 style="padding-top:0;margin-top:0;">GET VEHICLE DETAILS</h2>
            <br>
            <form>
              <p>VEHICLE NUMBER</p><br>
              <input id="vehs" class="inp" type="text" name="" placeholder="Enter vehicle number"><br><br><br>
              <button id="vdet" class="inp" type="button" name="" value="">GET DETAILS</button>
            </form>
          </div>
        </div>
        </div>
  		</div>
  		<div class="col col-r tile-4 tilee4">
  			<h1 align="center" class="frnt4" style="font-family: arial;color:#eee;margin-top:55px;">Issue History</h1>
  			<button id="close4" class="d-none" type="button" style="float:left;background: transparent;font-size:25px;">X</button>
  			<div class="con4 d-none w-80">
  				<div class="f-row">
          <div class="inl-h"><h3>Challan Number</h3></div>
          <div class="inl-h"><h3>Place</h3></div>
          <div class="inl-h"><h3>Date of Issue</h3></div>
          <div class="inl-h"><h3>Status</h3></div>
          </div>
          <?php for($i = 0; $i < $ch_count; $i++) {
            if ($rowc[$i]['status']==1){
              $status = "Paid";
            }
            else{
              $status = "Not Paid";
            } ?>
          <hr>
          <div class="f-row">
          <div class="inl-h"><span><?php echo $rowc[$i]['Cno']; ?></span></div>
          <div class="inl-h"><span><?php echo $rowc[$i]['place']; ?></span></div>
          <div class="inl-h"><span><?php echo $rowc[$i]['dtime']; ?></span></div>
          <div class="inl-h"><span><?php echo $status; ?></span></div>
          </div>
          <?php } ?>
        </div>
  			</div>
  		</div>
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

  	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  <script>
  	$("#close1").click(function(){
  		$(".tilee1").removeClass("animfLT").addClass("animbLT");
  		setTimeout( function(){
    		$("#close1").addClass("d-none");
    		$(".con1").addClass("d-none");
    		$(".frnt1").removeClass("d-none");
  		}  , 160 );
  		setTimeout( function(){
    		$(".tilee1").addClass("tile-1");
    		$(".tilee1").removeClass("zz");
  		}  , 800 );
	});
  </script>

  <script>
  	$(".tile-1").click(function(){
  		$(".tile-1").removeClass("animbLT");
  		$(".tile-1").addClass("animfLT");
  		$(".tile-1").removeClass("tile-1");
  		$(".tilee1").addClass("zz");
  		setTimeout( function(){
    		$("#close1").removeClass("d-none");
    		$(".tilee1").removeClass("d-none");
    		$(".frnt1").addClass("d-none");
  		}  , 159 );
  		setTimeout( function(){
  			$(".con1").removeClass("d-none");
  		}, 400);
	});
  </script>

  <script>
  	$("#close2").click(function(){
  		$(".tilee2").removeClass("animfRT").addClass("animbRT");
  		setTimeout( function(){
    		$("#close2").addClass("d-none");
    		$(".con2").addClass("d-none");
    		$(".frnt2").removeClass("d-none");
  		}  , 160 );
  		setTimeout( function(){
    		$(".tilee2").addClass("tile-2");
    		$(".tilee2").removeClass("zz");
  		}  , 800 );
	});
  </script>

  <script>
  	$(".tile-2").click(function(){
  		$(".tile-2").removeClass("animbRT");
  		$(".tile-2").addClass("animfRT");
  		$(".tile-2").removeClass("tile-2");
  		$(".tilee2").addClass("zz");
  		setTimeout( function(){
    		$("#close2").removeClass("d-none");
    		$(".tilee2").removeClass("d-none");
    		$(".frnt2").addClass("d-none");
  		}  , 150 );
  		setTimeout( function(){
  			$(".con2").removeClass("d-none");
  		}, 400);

	});
  </script>

  <script>
  	$("#close3").click(function(){
  		$(".tilee3").removeClass("animfLB").addClass("animbLB");
  		setTimeout( function(){
    		$("#close3").addClass("d-none");
    		$(".con3").addClass("d-none");
    		$(".frnt3").removeClass("d-none");
  		}  , 160 );
  		setTimeout( function(){
    		$(".tilee3").addClass("tile-3");
    		$(".tilee3").removeClass("zz");
  		}  , 800 );
	});
  </script>

  <script>
  	$(".tile-3").click(function(){
  		$(".tile-3").removeClass("animbLB");
  		$(".tile-3").addClass("animfLB");
  		$(".tile-3").removeClass("tile-3");
  		$(".tilee3").addClass("zz");
  		setTimeout( function(){
    		$("#close3").removeClass("d-none");
    		$(".tilee3").removeClass("d-none");
    		$(".frnt3").addClass("d-none");
    		$(".con3").removeClass("d-none");
  		}  , 150 );

	});
  </script>

  <script>
  	$("#close4").click(function(){
  		$(".tilee4").removeClass("animfRB").addClass("animbRB");
  		setTimeout( function(){
    		$("#close4").addClass("d-none");
    		$(".con4").addClass("d-none");
    		$(".frnt4").removeClass("d-none");
  		}  , 160 );
  		setTimeout( function(){
    		$(".tilee4").addClass("tile-4");
    		$(".tilee4").removeClass("zz");
  		}  , 800 );
	});
  </script>

  <script>
  	$(".tile-4").click(function(){
  		$(".tile-4").removeClass("animbRB");
  		$(".tile-4").addClass("animfRB");
  		$(".tile-4").removeClass("tile-4");
  		$(".tilee4").addClass("zz");
  		setTimeout( function(){
    		$("#close4").removeClass("d-none");
    		$(".tilee4").removeClass("d-none");
    		$(".con4").removeClass("d-none");
    		$(".frnt4").addClass("d-none");
  		}  , 150 );

	});
  </script>

  <script>
    $(document).ready(function(){
      $("#lic").on('change', function postinput(){
        var license = $(this).val();
        $.ajax({
            type: 'POST', 
            url: 'issue.php',
            data: "lic=" + license,
            dataType: 'json',

            success: function(data){
              if (typeof data[0] === 'string' || data[0] instanceof String){
              $('#ret').html(JSON.stringify(data));
              
              }
              else{
              var str = "";
              for (var i = 0; i < data.length; i++){
                var str1 = "<option style='color:#000' value='" + data[i]['Licplate'] + "'>" +  data[i]['Licplate'] + "</option><br>";
                str += str1;
              }
              $('#lis').html(str);
              }
            }
        });
      });

    });
  </script>

  <script>
    $(document).ready(function(){
      $("#issue").click(function(){
        var lic = $('#lic').val();
        var veh = $('#lis').val();
        var loc = $('#loc').val();
        var rule = $('#rule').val();
        //data = "lic=" + lic + "&veh=" + veh + "&loc=" + loc + "&rule=" + rule;
        //alert(data);

        $.ajax({
            type: 'POST', 
            url: 'iss_send.php',
            data: "lic=" + lic + "&veh=" + veh + "&loc=" + loc + "&rule=" + rule,
            dataType: 'json',

            success: function(data){
              $('#output').html(JSON.stringify(data));
            }
        });
      });    
    });
  </script>

  <script type="text/javascript">
            $(document).ready(function(){
            $('#ldet').click(function(){
            $.ajax({
            type: "POST",

            url: 'ldet.php',
            data: "lic=" + $('#lics').val(),
            dataType: 'json',
            success: function(data){
              $('#prev1').hide();
              $("#recv1").show();
              if (data['lic']){
              var lic = data['lic'];
              var email = data['email'];
              var name = data['name'];
              var dob = data['dob'];
              var sex = data['sex'];
              var age = data['age'];
              var phone = data['phone'];
              $('#recv1').css("padding","20px 20px 40px 20px");
              $('#output1').html("<b>License Number: </b>"+lic+"<br><br><b>Email: </b>"+email+"<br><br><b>Name: </b>"+name+"<br><br><b>D.O.B: </b>"+dob+"<br><br><b>Sex: </b>"+sex+"<br><br><b>Age: </b>"+age+"<br><br><b>Phone: "+phone);
              }
              else{
                $('#output1').html(JSON.stringify(data));
              }
              $("#close2").click(function(){
                $("#recv1").hide();
                $("#prev1").show();
              });

            }

            });
            });
        }); 
      </script>

      <script type="text/javascript">
            $(document).ready(function(){
            $('#vdet').click(function(){
              //alert($('vehs').val());
            $.ajax({
            type: "POST",

            url: 'vdet.php',
            data: "veh=" + $('#vehs').val(),
            dataType: 'json',
            success: function(data){
              $('#prev2').hide();
              $("#recv2").show();
              if (data['Licplate']){
              var licp = data['Licplate'];
              var year = data['year'];
              var mname = data['mname'];
              var color = data['color'];
              var type = data['type'];
              var lic = data['lic'];
              $('#recv2').css("padding","20px 20px 40px 20px");
              $('#output2').html("<b>License Plate: </b>"+licp+"<br><br><b>Year: </b>"+year+"<br><br><b>Model Name: </b>"+mname+"<br><br><b>Color: </b>"+color+"<br><br><b>Type: </b>"+type+"<br><br><b>Registered to: </b>"+lic);
              }
              else{
                $('#output2').html(JSON.stringify(data));
              }
              $("#close3").click(function(){
                $("#recv2").hide();
                $("#prev2").show();
              });

            }

            });
            });
        }); 
      </script>

  </body>
</html>
