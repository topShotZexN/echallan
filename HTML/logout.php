<?php

	session_start();
	include_once 'dbconnect.php';
		unset($_SESSION['echallan']);
		unset($_SESSION['echallanp']);
		unset($_SESSION['admin']);
		session_unset();
		session_destroy();
		header("Location: index.php");
		exit;
?>