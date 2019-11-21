<?php

  session_start();
  include_once 'dbconnect.php';

  if(!isset($_SESSION['echallanp']) ){
    header("location: personnel_login.php");
    exit;
  }
  else{
  	if(isset($_POST['veh'])){
    $lic=$_POST['veh'];
    //$cno = "ch12345";

    $res=mysqli_query($conn,"SELECT * FROM vehicle WHERE Licplate='$lic'");
  	$row=mysqli_fetch_assoc($res);
  	if(count($row)>0){
    echo json_encode($row);
  	}
  	else{
  		echo json_encode("Entered vehicle number is not correct");
  	} 
  	}
  }