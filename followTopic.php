<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if(!isset($_SESSION["user_id"]))
	{
        header("Location:login_signup.php");
        exit;
    }
    else
    {
        if (!empty($_GET['id']) ) {
            $id =  mysqli_real_escape_string($connection,$_GET['id']);
            $sql = "SELECT * FROM `user_categories` WHERE user_id = '".$_SESSION['user_id']."' AND cat_id ='".$id."'  "; 
            $result = mysqli_query($connection , $sql);
            if (mysqli_num_rows($result) > 0){
                $_SESSION['msg'] ="Topic already followed";
                header("Location:error.php");
            }
            else{
                $sql = "SELECT * FROM `categories` WHERE cat_id='".$id."'";
                $result =mysqli_query($connection , $sql);
                if($result){
                    $row = mysqli_fetch_array($result);
                    $cat_id = $row['cat_id'];
                    $sql="INSERT INTO `user_categories` (`user_id`, `cat_id`) values ('".$_SESSION['user_id']."', '".$cat_id."' )";
                    $result =mysqli_query($connection , $sql);
                    if($result)
                        header("Location:user_page.php");
                    else{
                        $_SESSION['msg'] = "Query not commited";
                        header("Location:error.php");
                    }
                }
            }
        }
        else{
            $_SESSION['msg'] = "Something went terribly wrong .Sorry for the inconvenience caused";
            header("Location:error.php");
        }
    }
}
else
{
    $_SESSION['msg'] = "Something went terribly wrong .Sorry for the inconvenience caused";
    header("Location:error.php");	
}
?>