<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST['username'])) {
		$_SESSION['msg'] ="Name is required";
        header("Location:error.php");
  	}
  	else {
    	$name = test_input($_POST["username"]);	
    	// check if name only contains letters and whitespace
    	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      	$_SESSION['msg'] ="Only letters and whitespace allowed";
        header("Location:error.php");
    	}
    	else{
    		if (empty($_POST["email"])) {
    			$_SESSION['msg'] ="Email is required";
                header("Location:error.php");
  			}
  			else {
    			$email = test_input($_POST["email"]);
    			// check if e-mail address is well-formed
    			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['msg'] ="Invalid email format";
                header("Location:error.php"); 
    			}
    			else{
    				// checking if email wala box is not empty then proceed else error msg will come
    				if(!empty($_POST['email']) && isset($_POST['email'])){
						$email=mysqli_real_escape_string($connection,$_POST['email']);
						$password=mysqli_real_escape_string($connection,$_POST['password']);
						$username=mysqli_real_escape_string($connection,$_POST['username']);
						$number = mysqli_real_escape_string($connection,$_POST['number']);
                        $admin_code = mysqli_real_escape_string($connection , $_POST['admin_id']);
						//to secure our password
						$password = password_hash($password, PASSWORD_DEFAULT);

						//checking wheather email is already register or not
						$count= "SELECT * FROM user WHERE email_id='".$email."' " ;

						$count = mysqli_query($connection, $count);
						if ((mysqli_num_rows($count)>0)) {
                            $_SESSION['msg'] ="This email is already registered";
                            header("Location:error.php");
						}
						else {
                            if($_POST['admin_id'] == '' ){
                            $sql="INSERT INTO `user` (`name`, `email_id`,`contact_number`,`password`) values ('".$username."', '".$email."', '".$number."', '".$password."')";
                            if (mysqli_query($connection, $sql)){
                                header("Location:index.php");
                                }
					        }
                            else{
                                if ($_POST['admin_id'] == 'nikunj1234') {
                                    $sql="INSERT INTO `user` (`name`, `email_id`,`contact_number`,`password` , `admin`) values ('".$username."', '".$email."', '".$number."', '".$password."' , 1 )";
                                    if (mysqli_query($connection, $sql)){
                                        header("Location:index.php");
                                    }
                                }
                                else{
                                    $_SESSION['msg'] = "wrong admin Id";
                                    header("Location:error.php");
                                }
                                
                            }
						}
					}
					else {
						$_SESSION['msg'] = "email not set";
                        header("Location:error.php");
					}				
    			}
  			}
    	}
  	}
}//checking post method
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
