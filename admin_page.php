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
    	$sql = "SELECT * FROM `categories` ";
    	/*join `user_categories` on categories.cat_id = user_categories.cat_id ";*/ /*  add this after making user_cat table */
    	$result = mysqli_query($connection,$sql);

    	$posts = array();
		$index = 0;

		while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
    		$posts[$index] = $row;
     		$index++;
		}
		if($_SESSION['admin_status'] == "starting"){
    		$_SESSION['ques_number'] = 1;
    		$sql = "DELETE FROM `questions_temp` WHERE `admin_id` = '".$_SESSION['user_id']."' ";
			$result = mysqli_query($connection,$sql);
			$sql = "DELETE FROM `categorie_temp` WHERE `admin_id` = '".$_SESSION['user_id']."' ";
			$result = mysqli_query($connection,$sql);
    	}
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
	<h1 id="mainHeading"> Add New Topic</h1>
	<ul class="topnav">
		<button id="myResultTab" onclick="newtopic()">Add Category</button>
	  	<button id="allTopicTab" onclick="alltopics()">All Topics</button>
	  	<button id="followedTopicTab" onclick="allusers()">All Users</button>
	</ul>
</div>
<div class="adminBodyContainer">
	<!-- our admin body contains 3 main divs newTopic  allUser and allTopics -->
	<div id="newTopic">
		<h1 id="addTopicHeading">Add New Category to Database<br></h1>
		<div id="addTopicContainer">
			<form method="post" action="addTopic.php">
				<input type="test" name="topicHead" placeholder="Enter Topic" class="input">
				<input type="submit" name="" value="Create Category" class="phpButton">
				<br>
				<textarea rows="10" name="topicDesc" placeholder="Enter About topic in not more than 200 word" class= "AboutIdea"></textarea><br>
			</form>
		</div>
	</div>
	<div id="allUser">
		
	</div>
	<div id="allTopic" >
		<div class="followHeader">
			<h1> ALL TOPICS </h1>
		</div>
		<div class="followList">
			<?php
				foreach ($posts as $post){
			?>
			<div class="topic">
				<div class="topicHeader"><?php echo $post['cat_name']?>
					<div class="topicDes"><?php echo $post['about_cat']?></div>
				</div>
				<?php
					$link = "subtopic.php?id=".$post['cat_id'];
				?>
				<?php echo '<a href='.$link.'><button class="quizButton">Add Topic</button></a>'?>
				<div class="quesNo">Total Topics :<?php 
					$r = mysqli_query($connection , "SELECT COUNT(*) FROM `subcat` where `cat_id` = '".$post['cat_id']."' ");
					if ($r) {
						if ($r) {
							$row = mysqli_fetch_array($r);
							echo $row[0];
						}
					}
				?></div>
			</div>
			<?php
				}
			?>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/admin_page.js"></script>
</body>
</html>