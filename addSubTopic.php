<?php
	session_start();
	include 'config.php';
	if ($_SESSION['admin_status'] == "starting") {
		$_SESSION['ques_number'] = 1;
		$heading =  mysqli_real_escape_string($connection,$_POST['topicHead']);
		$id = mysqli_real_escape_string($connection , $_POST['cat_id']);
		if (!empty($heading)  && isset($heading)) {

			$sql="INSERT INTO `categorie_temp` (`subcat_name`, `cat_id` , `admin_id`) values ('".$heading."', '".$id."','".$_SESSION["user_id"]."')";
			$result = mysqli_query($connection,$sql);
		}else{
			$_SESSION['msg'] = "This field is mandatory";
			header("Location:error.php");
		}
	}		
	$_SESSION['admin_status'] = 'ques';
	header("Location:subtopic.php?id=".$id );
?>