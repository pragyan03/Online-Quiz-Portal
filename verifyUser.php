<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$email = mysqli_real_escape_string($connection,$_POST['email']);
	$password = mysqli_real_escape_string($connection,$_POST['password']);

  	$result = "SELECT * FROM user WHERE email_id='".$email."' ";
  	$result = mysqli_query($connection,$result);
  	$row  = mysqli_fetch_array($result);
  	if(is_array($row)){
  		if(password_verify($password,$row['password'])){
			$_SESSION["user_id"] = $row['user_id'];
            $_SESSION["name"] = $row['name'];
            $_SESSION["email_id"] = $row['email_id'];
            $_SESSION["number"] = $row['contact_number'];
            $_SESSION['status'] = $row['status'];
            if($row['admin'] == 1){
                $_SESSION["admin_status"] = 'starting';
                header("Location:admin_page.php");
            }
            else{
	           header("Location:user_page.php");
            }
  		}
        else{
            $_SESSION['msg'] = "wrong password ";
            header("Location:error.php");
        }
  	}
    else{
        $_SESSION['msg'] = "Email ID do not Exist";
        header("Location:error.php");
    }
}
else{
	$_SESSION['msg'] = "Something went terribly wrong .Sorry for the inconvenience caused";
    header("Location:error.php");
}
?>