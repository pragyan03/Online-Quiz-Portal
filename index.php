<?php
	session_start();
	if(isset($_SESSION["user_id"]))
	{
        header("Location:user_page.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
	<!-- meta tags for mobile view -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<div class="topNavBar">
	<div class="logo_and_form">
		<img src="images/logo.jpeg">
		<div class="topNavBarForm">
			<form action="verifyUser.php" method="post">
				<input type="text" name="email" placeholder="Username" class="input">
				<input type="password" name="password" placeholder="Password" class="input">
				<input type="submit" value="Login" >
			</form>
		</div>
	</div>
	<div class="register_and_forgot_button">
		<a href="login_signup.php">Register Free</a>
		<a href="#">Forgot Details?</a>
	</div>
</div>
<div class="NavBar">
	<ul class="topnav">
	  <li><a class="active" href="index.html">Home</a></li>
	
	  <li class="right"><a href="#about">Contact Us</a></li>
	</ul>		
</div>
<div class="imageAndRegisterButton">
	<div class="featuredContent">
		<h2>The Best Online Testing for Business & Education</h2>
		<p>
			We secure, professional web-based Testing service is an easy-to-use, customizable online Test maker for business, training & educational assessment with Tests & Quizzes graded instantly saving you hours of paperwork!
		</p>
		<a href="login_signup.php">Register Free</a>
	</div>
</div>
<div class="ourFeatures">
	<div class="see_it_in_action_img">
		<img src="images/features.png">
	</div>
	<div class="featuresContent">
		<h1>Our Features</h1>
		<ul>
			<li>Secure & private</li>
			<li>Easy to define Test settings</li>
			<li>No software installations required</li>
			<li>Custom Certificates & Exam branding</li>
			<li>Give Exams with public & private options</li>
			<li>Create Assistants to help manage your account</li>
			<li>Results automatically graded & viewable in real time</li>
			<li>PCs, Macs, iPad, iPhone, Android, Chromebook & more</li>
		</ul>
	</div>
</div>
<footer>
	<p>Created By : <a href="#"><b>NIKUNJ GOENKA</b></a></p>
	<p>DBMS PROJECT</p>
	<P>SECTION : CSE-4B</P>
	<P>REGISTRATION NUMBER : 159101086 </P>
	<P>CONTACT NUMBER : +91 7073573383 </P>
</footer>
</body>
</html>