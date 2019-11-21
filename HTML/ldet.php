<?php

  session_start();
  include_once 'dbconnect.php';

  if(!isset($_SESSION['echallanp']) ){
    header("location: personnel_login.php");
    exit;
  }
  else{
  	if(isset($_POST['lic'])){
    $lic=$_POST['lic'];
    //$cno = "ch12345";

    $res=mysqli_query($conn,"SELECT * FROM driver WHERE lic='$lic'");
  	$row=mysqli_fetch_assoc($res);
  	if(count($row)>0){
    echo json_encode($row);
  	}
  	else{
  		echo json_encode("Entered license number is not correct");
  	} 
  	}
  }