<?php

  session_start();
  include_once 'dbconnect.php';

  if(!isset($_SESSION['echallan']) ){
    header("location: user_login.php");
    exit;
  }
  else{
  	if(isset($_POST['Cno'])){
    $cno=$_POST['Cno'];
    //$cno = "ch12345";

    $res=mysqli_query($conn,"SELECT Cno, lic, rule, dtime, place, veh, status FROM challan WHERE Cno='$cno'");
  	$row=mysqli_fetch_assoc($res);
  	if(count($row)>0){
    $lic=$row['lic'];
  	$rese=mysqli_query($conn,"SELECT email FROM driver WHERE lic='$lic'");
  	$rowe=mysqli_fetch_assoc($rese);
  	if($_SESSION['echallan']==$rowe['email']){
  	$rule=$row['rule'];
  	$res3=mysqli_query($conn,"SELECT pen, rname FROM rule WHERE id='$rule'");
    $row3=mysqli_fetch_array($res3);
    $row['pen']=$row3['pen'];
    $row['rname']=$row3['rname'];
    echo json_encode($row);
  	}else{
  		echo json_encode("Entered challan number is not issued to you");	
  	}
  	}
  	else{
  		echo json_encode("Entered challan number is not correct");
  	}
  	} 
  	elseif(isset($_POST['veh'])){
  	$veh=$_POST['veh'];
  	//$veh = "DL 45 C1 2351";

    $res=mysqli_query($conn,"SELECT Cno, lic, rule, dtime, place, veh, status FROM challan WHERE veh='$veh' ORDER BY dtime desc;");
  	$row=mysqli_fetch_all($res, MYSQLI_ASSOC);
  	if(count($row)>0){
  	$lic=$row[0]['lic'];
  	$rese=mysqli_query($conn,"SELECT email FROM driver WHERE lic='$lic'");
  	$rowe=mysqli_fetch_assoc($rese);
  	if($_SESSION['echallan']==$rowe['email']){
  	for ($i=0;$i<count($row);$i++){
  		$rule=$row[$i]['rule'];
  		$res3=mysqli_query($conn,"SELECT pen, rname FROM rule WHERE id='$rule'");
    	$row3=mysqli_fetch_array($res3);
    	$row[$i]['pen']=$row3['pen'];
    	$row[$i]['rname']=$row3['rname'];
  	}
  	echo json_encode($row);
  	}else{
  		echo json_encode("Entered vehicle number is not registered with you");
  	}
  	}
  	else{
  		echo json_encode("Entered vehicle number is not correct or no challan associated with the vehicle");
  	}
  	}
  }

?>