<?php
	session_start();
	include 'config.php';
	$heading =  mysqli_real_escape_string($connection,$_POST['topicHead']);
	$desc =  mysqli_real_escape_string($connection,$_POST['topicDesc']);
	if (!empty($heading) && !empty($desc) && isset($heading) && isset($desc)) {
		$sql="INSERT INTO `categories` (`cat_name`, `about_cat`) values ('".$heading."', '".$desc."')";
		$result = mysqli_query($connection,$sql);
		header("Location:admin_page.php");
	}else{
		$_SESSION['msg'] = "Both fields are mandatory";
		header("Location:error.php");
		exit;
	}



/*
	session_start();
	include 'config.php';
	if ($_SESSION['admin_status'] == "starting") {
		$_SESSION['ques_number'] = 1;
		$heading =  mysqli_real_escape_string($connection,$_POST['topicHead']);
		$desc =  mysqli_real_escape_string($connection,$_POST['topicDesc']);
		if (!empty($heading) && !empty($desc) && isset($heading) && isset($desc)) {

			$sql="INSERT INTO `categorie_temp` (`cat_name`, `about_cat`) values ('".$heading."', '".$desc."')";
			$result = mysqli_query($connection,$sql);
		}else{
			$_SESSION['msg'] = "Both fields are mandatory";
			header("Location:error.php");
		}
	}		
	$_SESSION['admin_status'] = 'ques';
	header("Location:admin_page.php");
*/	
?>