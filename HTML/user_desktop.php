<!DOCTYPE html>

<?php

  session_start();
  include_once 'dbconnect.php';

  if(!isset($_SESSION['echallan']) ){
    header("location: user_login.php");
    exit;
  }
  else{
    $email=$_SESSION['echallan'];
  }

  /*$res1=mysqli_query($conn,"SELECT accpic FROM profile WHERE usrid='$usrid'");
  $row1=mysqli_fetch_array($res1);
  $filenamee=$row1['accpic'];*/

  $res1=mysqli_query($conn,"SELECT lic FROM driver WHERE email='$email'");
  $row1=mysqli_fetch_array($res1);
  $lic=$row1['lic'];

  $res2=mysqli_query($conn,"SELECT Cno, rule, dtime, place, veh, status FROM challan WHERE lic='$lic' ORDER BY dtime desc;");
  $row2=mysqli_fetch_all($res2, MYSQLI_ASSOC);
  $ch_count = mysqli_num_rows($res2);

  $resv=mysqli_query($conn,"SELECT Licplate, mname, year, color, type FROM vehicle WHERE lic='$lic'");
  $rowv=mysqli_fetch_all($resv, MYSQLI_ASSOC);
  $v_count = mysqli_num_rows($resv);

?>

<html>
  <head>
  	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="..\CSS\header.css">
    <link rel="stylesheet" type="text/css" href="..\CSS\footer.css">
	<script src="..\javascript\home.js"></script>
  	<title>user_desktop</title>
  	<style>
  		.in-a{
  			color:#eee;
  			margin-top:30px;
  		}
  		.in-a:hover,.in-a:focus{
  			color:#333;
  		}
  	</style>
  </head>

  <body>
  	<nav>
  <div id="d_1">
  	<img src="..\IMAGEs\image_1.gif" style="float:left;height: 130px;">
    <img src="..\IMAGEs\image_2.gif" style="height: 55px; width: 400px; float:right;  margin-top:20px; margin-right: 35px"> 
    <br><h1 align="left" style="font-size:40; font-family:Arial">E-CHALLAN</h1>
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
  			<h1 align="center" class="frnt1" style="font-family: arial;color:#eee;margin-top:55px;">View Challan</h1>
  			<button id="close1" class="d-none" type="button" style="float:left;background: transparent;font-size:25px;">X</button>
  			<div class="con1 d-none forbg">
          <div id="recv">
          <p style="font-size: 20px;" id="output"></p>
          <!--<span id="pbtn"></span>-->
          </div>
        <div id="prev">
      <div>
        <button style="float:left;width:50%;border-right:1px solid #eee;border-top-left-radius:5px;" class="bma" onclick="openFormm('cha')">By Challan Number</button>
        <button style="float:left;width:50%;border-left:1px solid #eee;border-top-right-radius:5px;"class="bma" onclick="openFormm('veh')">By vehicle ID</button>
      </div>
      <br><br><br>
      <h2 align="center" style="font-weight:normal;color:#333;margin-bottom:0px;">View Challan Details</h2>
      <hr style="width:80%;">
      <br><br>
      <div class="forby" id="veh" style="width:65%;margin:auto;display:none;">
        <form>
          <input class="inp "type="text" name="vehnum" id="vehnum" placeholder="Enter Vehicle Number">
          <br>
          <br>
          <br>
          <button class="btn-med-dark" style="width: 50%; height: 40px;font-size: 1.2em;float:right;" type="button" id="vsub">Get details</button>
          <br><br>
        </form>
      </div>
      <div class="forby" id="cha" style="width:65%;margin:auto;">
        <form>
          <input class="inp "type="text" name="chnum" id="chnum" placeholder="Enter Challan Number">
          <br>
          <br>
          <br>
          <button class="btn-med-dark" style="width: 50%; height: 40px;font-size: 1.2em;float:right;" type="button" id="csub">Get details</button>
          <br><br>
        </form>
      </div>
      <br><br>
    </div>
      </div>
  		</div>
  		<div class="col col-r tile-2 tilee2">
  			<h1 align="center" class="frnt2" style="font-family: arial;color:#eee;margin-top:55px;">Pay Challan</h1>
  			<button id="close2" class="d-none" type="button" style="float:left;background: transparent;font-size:25px;">X</button>
  			<div class="con2 d-none w-70">
  			  <div class="f-row">
  				<div class="inl-h"><h3>Challan Number</h3></div>
  				<div class="inl-h"><h3>Amount</h3></div>
  				<div class="inl-h" style="visibility:hidden;"></div>
  			  </div>
          <?php if($ch_count>0){
            $count=0;
          for ($i = 0; $i < $ch_count; $i++){
            if ($row2[$i]['status'] == 0){
              $rule=$row2[$i]['rule']; 
              $res3=mysqli_query($conn,"SELECT pen FROM rule WHERE id='$rule'");
              $row3=mysqli_fetch_array($res3);
              $amt=$row3['pen']; 
              $count+=1;
          ?>
  			  <hr>
  			  <div class="f-row">
  				<div class="inl-h"><span><?php echo $row2[$i]['Cno'] ?></span></div>
  				<div class="inl-h"><span>&#8377;<?php echo $amt ?></span></div>
  				<div class="inl-h"><span><button class="btn-med-dark" style="box-shadow:none;">Pay</button></span></div>
          </div>
        <?php } }
        if ($count == 0){
          echo '<br><br><br><h3 align="center" style="color:#eee;">No challans issued.</h3>';
        }
        }else{
          echo '<br><br><br><h3 align="center" style="color:#eee;">No challans issued.</h3>';
        }?>
  			</div>
  		</div>
  	</div>

  	<div class="row">
  		<div class="col col-l tile-3 tilee3">
  			<h1 align="center" class="frnt3" style="font-family: arial;color:#eee;margin-top:55px;">Challan History</h1>
  			<button id="close3" class="d-none" type="button" style="float:left;background: transparent;font-size:25px;">X</button>
  			<div class="con3 d-none w-80">
  				<div class="f-row">
  				<div class="inl-h"><h3>Challan Number</h3></div>
  				<div class="inl-h"><h3>Amount</h3></div>
  				<div class="inl-h"><h3>Date of Issue</h3></div>
          <div class="inl-h"><h3>Place</h3></div>
          <div class="inl-h"><h3>Vehicle</h3></div>
  				<div class="inl-h"><h3>Status</h3></div>
  			  </div>
          <?php if($ch_count>0){
          for ($i = 0; $i < $ch_count; $i++){
          $rule=$row2[$i]['rule']; 
          $res3=mysqli_query($conn,"SELECT pen FROM rule WHERE id='$rule'");
          $row3=mysqli_fetch_array($res3);
          $amt=$row3['pen']; 
          if ($row2[$i]['status'] == 0){
            $status="Due";
          }else{
            $status="Paid";
          }?>
  			  <hr>
  			  <div class="f-row">
  				<div class="inl-h"><span><?php echo $row2[$i]['Cno'] ?></span></div>
  				<div class="inl-h"><span>&#8377;<span><?php echo $amt ?></span></div>
  				<div class="inl-h"><span><?php echo $row2[$i]['dtime'] ?></span></div>
          <div class="inl-h"><span><?php echo $row2[$i]['place'] ?></span></div>
          <div class="inl-h"><span><?php echo $row2[$i]['veh'] ?></span></div>
  				<div class="inl-h"><span><?php echo $status?></span></div>
  			  </div>
          <?php } }
          else{
            echo '<br><br><br><h3 align="center" style="color:#eee;">No challans issued.</h3>';
          }?>
  			</div>
  		</div>
  		<div class="col col-r tile-4 tilee4">
  			<h1 align="center" class="frnt4" style="font-family: arial;color:#eee;margin-top:55px;"> Registered Vehicles</h1>
  			<button id="close4" class="d-none" type="button" style="float:left;background: transparent;font-size:25px;">X</button>
  			<div class="con4 d-none w-80" style="height:300px;">
  				<div class="f-row">
          <div class="inl-h"><h3>Vehicle Number</h3></div>
          <div class="inl-h"><h3>Model</h3></div>
          <div class="inl-h"><h3>Year</h3></div>
          <div class="inl-h"><h3>Color</h3></div>
          <div class="inl-h"><h3>Type</h3></div>
          </div>
          <?php if($v_count>0){
          for ($i = 0; $i < $v_count; $i++){?>
          <hr>
          <div class="f-row">
          <div class="inl-h"><span><?php echo $rowv[$i]['Licplate'] ?></span></div>
          <div class="inl-h"><span><?php echo $rowv[$i]['mname'] ?></span></div>
          <div class="inl-h"><span><?php echo $rowv[$i]['year'] ?></span></div>
          <div class="inl-h"><span><?php echo $rowv[$i]['color'] ?></span></div>
          <div class="inl-h"><span><?php echo $rowv[$i]['type']?></span></div>
          </div>
          <?php } }
          else{
            echo '<br><br><br><h3 align="center" style="color:#eee;">No registered vehicles.</h3>';
          }?>
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
  		}  , 180 );
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
  		}  , 129 );
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
      function openFormm(formmName) {
        var i;
        var x = document.getElementsByClassName("forby");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
        }
        document.getElementById(formmName).style.display = "block";
      }
  </script>

  <script type="text/javascript">
            $(document).ready(function(){
            $('#csub').click(function(){
            $.ajax({
            type: "POST",

            url: 'send.php',
            data: "Cno=" + $('#chnum').val(),
            dataType: 'json',
            success: function(data){
              $('#prev').hide();
              $("#recv").show();
              var err = data[0];
              if (typeof err === 'undefined'){
              var Cno = data['Cno'];
              var veh = data['veh'];
              var rule = data['rname'];
              var dtime = data['dtime'];
              var place = data['place'];
              var pen = data['pen'];
              var st = data['status'];
              if (st==1){
                var status = "<b>Status: </b>Paid";
              }
              else{
                var status = '<button class="btn-med-dark" style="width: 30%; height: 30px;font-size: 1.2em;float:right;" type="button" id="csub">Pay</button>';
              }
              //alert(JSON.stringify(data));
              $('#recv').css("padding","20px 20px 40px 20px");
              $('#output').html("<b>Challan Number: </b>"+Cno+"<br><br><b>Vehicle number: </b>"+veh+"<br><br><b>Rule violated: </b>"+rule+"<br><br><b>Date and Time: </b>"+dtime+"<br><br><b>Place: </b>"+place+"<br><br><b>Penalty: &#8377;</b>"+pen+"<br><br>"+status);
              //$('#pbtn').html(status);
              }
              else{
                $('#output').html(JSON.stringify(data));
              }
              $("#close1").click(function(){
                $("#recv").hide();
                $("#prev").show();
              });

            }

            });
            });

            $('#vsub').click(function(){
            $.ajax({
            type: "POST",

            url: 'send.php',
            data: "veh=" + $('#vehnum').val(),
            dataType: 'json',
            success: function(data){
              $('#prev').hide();
              $("#recv").show();
              var err = data[0];
              if (typeof err === 'object'){
              var Cno = data[0]['Cno'];
              var veh = data[0]['veh'];
              var rule = data[0]['rname'];
              var dtime = data[0]['dtime'];
              var place = data[0]['place'];
              var pen = data[0]['pen'];
              var st = data[0]['status'];
              if (st==1){
                var status = "<b>Status: </b>Paid";
                $('#recv').css("padding","20px 20px 20px 20px");
              }
              else{
                var status = '<button class="btn-med-dark" style="width: 30%; height: 30px;font-size: 1.2em;float:right;" type="button" id="csub">Pay</button>';
                $('#recv').css("padding","20px 20px 40px 20px");
              }
              //alert(JSON.stringify(data));
              //$('#recv').css("padding","20px 20px 40px 20px");
              $('#output').html("<b>Challan Number: </b>"+Cno+"<br><br><b>Vehicle number: </b>"+veh+"<br><br><b>Rule violated: </b>"+rule+"<br><br><b>Date and Time: </b>"+dtime+"<br><br><b>Place: </b>"+place+"<br><br><b>Penalty: &#8377;</b>"+pen+"<br><br>"+status);
              //$('#pbtn').html(status);
              }
              else{
                $('#output').html(JSON.stringify(data));
              }
              $("#close1").click(function(){
                $("#recv").hide();
                $("#prev").show();
              });

            }

            });
            });

            });
  </script>

  </script>

  </body>
</html>
