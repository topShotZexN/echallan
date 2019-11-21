<?php
  session_start();
  include_once 'dbconnect.php';

  if(!isset($_SESSION['echallanp']) ){
    header("location: personnel_login.php");
    exit;
  }
  else{
    $usrid = $_SESSION['echallanp'];

    $lic = trim($_POST['lic']);
    $lic = strip_tags($lic);
    $lic = htmlspecialchars($lic);

    $veh = trim($_POST['veh']);
    $veh = strip_tags($veh);
    $veh = htmlspecialchars($veh);

    $loc = trim($_POST['loc']);
    $loc = strip_tags($loc);
    $loc = htmlspecialchars($loc);

    $rule = trim($_POST['rule']);
    $rule = strip_tags($rule);
    $rule = htmlspecialchars($rule);
      $res = mysqli_query($conn, "SELECT Cno FROM challan ORDER BY Cno DESC LIMIT 1");
      $row = mysqli_fetch_assoc($res);

      
      preg_match_all('!\d+!', $row['Cno'], $matches);
      $num = $matches[0][0];
      $num += 1;
      $chno = (string)$num;
      $chno = "ch".$chno;

      $res = mysqli_query($conn,"INSERT INTO challan(Cno, lic, place, rule, veh, isby) VALUES('$chno', '$lic', '$loc', '$rule', '$veh', '$usrid')");
      if($res){
        echo json_encode("Successfully Issued");
      }
      else{
	  	echo json_encode(mysqli_error($conn));
        //echo json_encode("Something went wrong. Try again later...");
      }
    }