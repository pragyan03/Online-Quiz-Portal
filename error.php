<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
	<title>
        ERROR
	</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/error.css">
</head>
<body>
	<img src="images/error.png" class="error_icon">	
<div class="error_msg_container">
	<h1> ERROR</h1>
	<p><?php echo ($_SESSION['msg']); ?></p>
	<?php  unset($_SESSION['msg']);?>
	<button><a href="index.php">HOME PAGE</a></button>
</div>
</body>
</html>