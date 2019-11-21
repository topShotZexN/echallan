<?php

  session_start();
  include_once 'dbconnect.php';

  if(!isset($_SESSION['echallanp']) ){
    header("location: personnel_login.php");
    exit;
  }
  else{
  	if(isset($_POST['lic'])){
    $lic = $_POST['lic'];
    $res = mysqli_query($conn, "SELECT Licplate FROM vehicle WHERE lic='$lic'");
    $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
    if (count($row)>0){
    	echo json_encode($row);
    }
    else{
    	echo json_encode("Entered license number has no vehicles registered.");
    }
	}
  }

?>
