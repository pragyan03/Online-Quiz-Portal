<?php
	session_start();
	include 'config.php';
	unset($_SESSION["name"]);
	unset($_SESSION["user_id"]);
	unset($_SESSION["email_id"]);
	unset($_SESSION["number"]);
	unset($_SESSION["status"]);
	unset($_SESSION['admin_status']);
	unset($_SESSION['msg']);
	session_destroy();
	header("Location:index.php");
?>
