<?php
	session_start();
	include 'config.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$email = mysqli_real_escape_string($connection,$_POST['email']);
		if (isset($email) && !empty($email) ) {

			$sql = "SELECT * FROM user WHERE email_id='".$email."' ";
			$result = mysqli_query($connection,$sql);
	  		$row  = mysqli_fetch_array($result);
	  		if(is_array($row)){
	  			$password=mysqli_real_escape_string($connection,$_POST['new_pass']);
	  			$password = password_hash($password, PASSWORD_DEFAULT);
	  			$sql = "UPDATE `user` SET password='".$password."' WHERE email_id='".$email."' ";
	  			$result = mysqli_query($connection,$sql);
	  			if ($result) {
	  				echo "hogaya kam";
	  			}
	  		}
	  		else{
	  			$_SESSION['msg'] = "Email ID do not Exist";
	        	header("Location:error.php");
	  		}
		}
	}
?> 
	