<?php
	session_start();
	if(!isset($_SESSION["user_id"]))
	{
        header("Location:login_signup.php");
        exit;
    }
    else
    {
    	include 'config.php';
    	$id = $_GET['id'];
    	$sql = "SELECT * FROM `categories` WHERE `cat_id` = '".$id."' ";
    	$result = mysqli_query($connection , $sql);
    	if ($result) {
    		$row  = mysqli_fetch_array($result);
    	}
	}

    	if($_SESSION['admin_status'] == "starting"){
    		$_SESSION['ques_number'] = 1;
    		$sql = "DELETE FROM `questions_temp` WHERE `admin_id` = '".$_SESSION['user_id']."' ";
			$result = mysqli_query($connection,$sql);
			$sql = "DELETE FROM `categorie_temp` WHERE `admin_id` = '".$_SESSION['user_id']."' ";
			$result = mysqli_query($connection,$sql);
    	}
?>
<!DOCTYPE html>
<html>
<head>
	<!-- meta tags for mobile view -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/user_page.css">
	<link rel="stylesheet" type="text/css" href="css/admin_page.css">
</head>
<body>
<!-- top bar for -->
<div class="topNavBar">
	<div class="logo_and_form">
		<div id="imgContainer">
			<img src="images/logo.jpeg">
		</div>
		<div class="topNavBarForm">
			<p>Welcome : <?php echo $_SESSION["name"] ?></p>
			<p>Admin ID: <?php echo $_SESSION["user_id"] ;?></p>
			<form action="logout.php" method="post">
				<input type="submit" value="Logout" class="logoutButton">
			</form>
		</div>
	</div>
</div>
<!-- navbar for basic profile navigation -->
<div class="mainNavbar">
	<h1 id="mainHeading"> Add New Topic <?php  echo strtoupper($row['cat_name']); ?></h1>
	<ul class="topnav">
		<button id="myResultTab">Add New Topic</button>
	</ul>
</div>
<div class="adminBodyContainer">
	<div id="newTopic">
		<?php 
			if($_SESSION['admin_status'] == 'starting'){
		?>
			<h1 id="addTopicHeading">Add New Topic to <?php  echo strtoupper($row['cat_name']); ?><br></h1>
			<div id="addTopicContainer">
				<form method="post" action="addSubTopic.php">
					<input type="radio" style="display: none;" name="cat_id" value="<?php  echo $id;?>" checked >
					<input type="test" name="topicHead" placeholder="Enter Topic Name" class="input">
					<input type="submit" name="" value="Create Category" class="phpButton">
					<br>
				</form>
			</div>
		<?php
			}else{
		?>
			<h1 id="addTopicHeading">Question - <?php echo $_SESSION['ques_number']?></h1>
			<div id="addTopicContainer">
				<form class="form" method="post" action="addquest.php">
					<input type="text" name="question" placeholder="Enter Question" class="input" style="width: 67%"><br>
					<input type="text" name="op1" placeholder="Option 1" class="input">
					<input type="text" name="op2" placeholder="Option 2" class="input">
					<input type="text" name="op3" placeholder="Option 3" class="input">
					<input type="text" name="op4" placeholder="Option 4" class="input">
					<br>
					<input type="Number" name="ans" placeholder="Enter index of correct answer. (eg: 1 for -> option 1)" class="input">
					<?php 
						if ($_SESSION['ques_number'] < 5) {
					?>
					<a href='addquest.php'><button class="phpButton" style="margin: 0px ;">Next Question</button></a>
					<?php 
						}
						else{
					?>
					<a href='addquest.php'><button class="phpButton" style="margin: 0px ;">Create topic</button></a>			
					<?php 
						}
					?>
				</form>
			</div>
		<?php
			}
		?>



	<!--
		<?php 
			if($_SESSION['admin_status'] == 'starting'){
		?>
			<h1 id="addTopicHeading">Add New Topic to Database<br>
				<h2 style="margin: 0px 20px; color: red; ">You should have minimum 5 questions </h2>
			</h1>
			<div id="addTopicContainer">
			
				<form method="post" action="addTopic.php">
					<input type="test" name="topicHead" placeholder="Enter Topic" class="input">
					<input type="submit" name="" value="Create Topic" class="phpButton">
					<br>
					<textarea rows="10" name="topicDesc" placeholder="Enter About topic in not more than 200 word" class= "AboutIdea"></textarea><br>
				</form>
			</div>
		<?php
			}
			else{
		?>
			<h1 id="addTopicHeading">Question - <?php echo $_SESSION['ques_number']?></h1>
			<div id="addTopicContainer">
				<form class="form" method="post" action="addquest.php">
					<input type="text" name="question" placeholder="Enter Question" class="input" style="width: 67%"><br>
					<input type="text" name="op1" placeholder="Option 1" class="input">
					<input type="text" name="op2" placeholder="Option 2" class="input">
					<input type="text" name="op3" placeholder="Option 3" class="input">
					<input type="text" name="op4" placeholder="Option 4" class="input">
					<br>
					<input type="Number" name="ans" placeholder="Enter index of correct answer. (eg: 1 for -> option 1)" class="input">
					<?php 
						if ($_SESSION['ques_number'] < 5) {
					?>
					<a href='addquest.php'><button class="phpButton" style="margin: 0px ;">Next Question</button></a>
					<?php 
						}
						else{
					?>
					<a href='addquest.php'><button class="phpButton" style="margin: 0px ;">Create topic</button></a>			
					<?php 
						}
					?>
				</form>
			</div>
		<?php
			}
		?>
		-->
	</div>
</div>
</body>
</html>