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
            $sql="DELETE FROM `user_categories` WHERE cat_id = '".$id."' ";
            $result =mysqli_query($connection , $sql);
            if ($result) {
                header("Location:user_page.php");
            }
            else{
                $_SESSION['msg'] = "Query not commited";
                header("Location:error.php");
            }
        }
        else{
            $_SESSION['msg'] = "Something went terribly wrong .Sorry for the inconvenience caused";
            echo  $_SESSION['msg'] ;
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