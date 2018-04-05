<?php
	session_start();
	include 'config.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$sql = "SELECT * FROM user_marks WHERE `user_id` = '".$_SESSION['user_id']."' AND cat_id = '".$_POST['cat']."' ";
		$result = mysqli_query($connection , $sql);
		if((mysqli_num_rows($result)>0)){
			$attemp =0;
			$cat_id = mysqli_real_escape_string($connection , $_POST['cat']);
			$sql = "SELECT `ques_id` FROM `questions` WHERE cat_id = '".$cat_id."' ";
		    $result = mysqli_query($connection,$sql);
		    if($result){
		        $index = 0;
		        $ques_id = array();
		        while ($row = mysqli_fetch_assoc($result) ) {
		            $ques_id[$index] = $row;
		            $index++; 
		        }
		    }
		    $score = 0;
		    $count = 0;	
			foreach ($ques_id as $key) {
				$count++;
				$ans="Ans".$count;
				$ques_id="abcd".$count;
				if (isset($_POST[$ans]) && !empty($_POST[$ans])) {
					$attemp++;
					$ans = mysqli_real_escape_string($connection , $_POST[$ans]);
					$ques_id = mysqli_real_escape_string($connection , $_POST[$ques_id]);
					$sql = "SELECT `answer` FROM `questions` WHERE `ques_id` = '".$ques_id."' ";
					$result = mysqli_query($connection , $sql);
					if($result){
						$row  = mysqli_fetch_array($result);
						if (is_array($row)) {
							$corrAns = $row['answer'];
							if ($ans == $row['answer']) {
								$score++;
							}
						}
					}

				}
			}
			$sql = "UPDATE `user_marks` SET `marks` = '".$score."' , `Attempted` = '".$attemp."' WHERE `user_id` = '".$_SESSION["user_id"]."' AND `cat_id` = '".$cat_id."' ";
			$result = mysqli_query($connection , $sql);
		
		}
		else{
echo "jjj";
			$attemp =0;
			$cat_id = mysqli_real_escape_string($connection , $_POST['cat']);
			$sql = "SELECT `ques_id` FROM `questions` WHERE cat_id = '".$cat_id."' ";
		    $result = mysqli_query($connection,$sql);

		    if($result){
		        $index = 0;
		        $ques_id = array();
		        while ($row = mysqli_fetch_assoc($result) ) {
		            
		            $ques_id[$index] = $row;
		            $index++; 
		        }
		    }
		    $score = 0;
		    $count = 0;	
			foreach ($ques_id as $key) {

				$count++;
				$ans="Ans".$count;
				$ques_id="abcd".$count;
				if (isset($_POST[$ans]) && !empty($_POST[$ans])) {
					$attemp++;
					$ans = mysqli_real_escape_string($connection , $_POST[$ans]);
					$ques_id = mysqli_real_escape_string($connection , $_POST[$ques_id]);
					$sql = "SELECT `answer` FROM `questions` WHERE `ques_id` = '".$ques_id."' ";
					$result = mysqli_query($connection , $sql);
					if($result){
						$row  = mysqli_fetch_array($result);
						if (is_array($row)) {
							$corrAns = $row['answer'];
							if ($ans == $row['answer']) {
								$score++;
							}
						}
					}

				}
			}
			$sql = "INSERT INTO `user_marks` ( `user_id` , `cat_id` , `marks` , `Attempted`) VALUES ('".$_SESSION["user_id"]."' , '".$cat_id."' , '".$score."' , '".$attemp."') ";
			$result = mysqli_query($connection , $sql);
		}

		$_SESSION['cat_id'] = $cat_id;
		header("Location:resultPage_1.php");

	}
	

?>