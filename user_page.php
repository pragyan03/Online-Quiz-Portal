<?php
	session_start();
	if(!isset($_SESSION["user_id"]))
	{
        header("Location:login_signup.php");
        exit;
    }
    else
    {	/*this code is for all categories div*/
    	include 'config.php';
    	$sql = "SELECT * FROM categories ";
    	$result = mysqli_query($connection,$sql);
    	$allcat = array();
    	$mycat = array();
		$index = 0;

		while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
    		$allcat[$index] = $row;
     		$index++;
		}
		$result = mysqli_query($connection , "SELECT * FROM `categories` JOIN `user_categories` on categories.cat_id = user_categories.cat_id WHERE  user_id = '".$_SESSION["user_id"]."' ");
		$index = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$mycat[$index] = $row;
			$index++;
		}
		$user_marks = array();
		$sql = "SELECT * FROM `user_marks` WHERE `user_id` = '".$_SESSION['user_id']."' ";
		$k = mysqli_query($connection , $sql);

		while ($m = mysqli_fetch_assoc($k)) {
			$user_marks[$index] = $m;
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
				<form action="logout.php" method="post">
					<input type="submit" value="Logout" class="logoutButton">
				</form>
		</div>
	</div>
</div>
<!-- navbar for basic profile navigation -->
<div class="mainNavbar">
	<h1 id="mainHeading"> My Results</h1>
	<ul class="topnav">
	  <button id="myResultTab" onclick="myResult()" >My Result</button>
	  <button id="followedTopicTab" onclick="followedTopic()">Followed Topics</button>
	  <button id="allTopicTab" onclick="allTopic()">All Topics</button>
	</ul>
</div>
<!-- body div containing 2 major blocks leftBlock and rightBlock-->
<div class="mainBody">
	<div class="leftBlock">
		<!-- div containing name and ph. number-->
		<div class="nameDiv">
			<div class="nameContainer">
				<h3><?php echo strtoupper($_SESSION["name"]);?></h3>
			</div>
			<p><b>Ph. number </b>: <?php echo $_SESSION["number"] ?></p>
		</div>
		<!-- div containing personal information-->
		<div class="myDetailsContainer">
			<div class="myDetailsButton">
				<h3>MY DETAILS</h3>
			</div>
			<div id="detailsContainer">
				<p><b>NAME </b>: <?php echo $_SESSION["name"] ?> </p>
				<p><b>EMAIL </b>: <?php echo $_SESSION["email_id"] ?></p>
				<p><b>PH. NUMBER </b>: <?php echo $_SESSION["number"] ?></p>
			</div>
		</div>
	</div>
	<div class="rightBlock">
		<!-- rightBlock contains 3 major divs that are navigated by the mainNavbar tabs-->

		<!-- Our first major block is myResultContainer-->
		<div id="myResultContainer" ">
			<div class="testResultHeading">
				<h1> TEST RESULTS</h1>
			</div>
			<div id="textResultBox">
				<?php
					foreach ($user_marks as $key) {
						$sql = "SELECT * FROM `categories` WHERE `cat_id` = '".$key['cat_id']."' ";
						$kt = mysqli_query($connection , $sql);
						if($kt){
							$row = mysqli_fetch_array($kt);
							?>
							<div class="topic">
								<div class="topicHeader"><?php echo strtoupper($row['cat_name']); ?></div>
								<br><br>
								<div class="quesNo"><b>SCORE :- </b> <?php echo $key['marks']; ?></div><br>
								<div class="quesNo"><b>PERCENTAGE :-</b> <?php 
									$per = $key['marks'] *100/5;
									echo $per;
								 	?>%
								 </div>
								<button class="quizButton"><a href="">View Result</button>
							</div>
							<?php
						}#if close
					}# foreach close
				?>
			</div>			
		</div>
		<div id="followedTopicContainer" >
			<div class="followHeader">
				<h1> FOLLOWED TOPICS </h1>
			</div>
			<div class="followSubHeader">Topics Followed By You -</div>
			<div class="followList">
				<?php
					if (mysqli_num_rows($result) > 0) {
					foreach ($mycat as $post){
						?>
						<div class="topicHeader" style="padding-bottom: 15px"><?php echo strtoupper($post['cat_name']);?>
						<?php $link = "removeTopic.php?id=".$post['cat_id']; ?>
							<?php echo '<a href='.$link.'><button class="quizButton">Remove Topic</button></a>'?>
						</div>
						<?php
						$r = mysqli_query($connection , "SELECT * FROM `subcat` WHERE cat_id = '".$post['cat_id']."' ");
						$p = array();
						$i = 0;
						while ($x = mysqli_fetch_assoc($r)) {
							$p[$i] = $x;
							$i++;
						}
						foreach ($p as $po) {
							# code...
				?>
				<div class="topic">
					<div class="topicHeader"><?php echo strtoupper($po['subcat_name']);?>
						<div class="topicDes"></div>
					</div>
					<?php 
					$a = $po['subcat_id'];
					$quiz ="quizPage.php?a=".$a; ?>
					<?php echo '<a href='.$quiz.'><button class="quizButton">Take Quiz</button></a>' ?>
					
					<div class="quesNo">Total Number of Questions : 5</div>
				</div>
				<?php
					}}}
					else{
				?>
				<div id="noTopic"> <h2>No Topic followed Yet</h2></div>
				<?php }?>
			</div>
		</div>
		<div id="allTopicContainer" >
			<div class="followHeader">
				<h1> ALL TOPICS </h1>
			</div>
			<div class="followList">
				<?php
					foreach ($allcat as $post){
				?>
				<div class="topic">
					<div class="topicHeader"><?php echo strtoupper($post['cat_name']);?>
						<div class="topicDes"><?php echo $post['about_cat'];  $link = "followTopic.php?id=".$post['cat_id']; ?></div>
					</div>
					<?php echo '<a href='.$link.'><button class="quizButton">Follow Topic</button></a>'?>
					
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
</div>
<script type="text/javascript" src="js/userPage.js"></script>
</body>
</html>