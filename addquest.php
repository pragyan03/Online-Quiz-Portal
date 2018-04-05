<?php
	session_start();
	include 'config.php';
	$ques =  mysqli_real_escape_string($connection,$_POST['question']);
	$op1 =  mysqli_real_escape_string($connection,$_POST['op1']);
	$op2 =  mysqli_real_escape_string($connection,$_POST['op2']);
	$op3 =  mysqli_real_escape_string($connection,$_POST['op3']);
	$op4 =  mysqli_real_escape_string($connection,$_POST['op4']);
	$ans =  mysqli_real_escape_string($connection,$_POST['ans']);	
	if (!empty($ques) && !empty($op1) && !empty($op2)&& !empty($op3)&& !empty($op4)&& !empty($ans)&& isset($ques) && isset($op1)&& isset($op2)&& isset($op3)&& isset($op4)&& isset($ans) ) {
		$sql = "INSERT INTO `questions_temp` (`question`, `option1`,`option2`,`option3`,`option4`,`answer`,`admin_id`) values ('".$ques."', '".$op1."' , '".$op2."', '".$op3."', '".$op4."', '".$ans."','".$_SESSION['user_id']."') ";
		$result = mysqli_query($connection,$sql);
		if ($result) {
			$_SESSION['ques_number'] =$_SESSION['ques_number'] + 1 ;
			echo "string";
		}
	}else{
		$_SESSION['msg'] = "All fields are mandatory";header("Location:error.php");
		exit;
	}

	$sql = "SELECT * FROM `categorie_temp` WHERE `admin_id` = '".$_SESSION['user_id']."' ";
		$result = mysqli_query($connection , $sql);
		if ($result) {
			$row  = mysqli_fetch_array($result);
		}
	if ($_SESSION['ques_number'] > 5) {
		$sql = "SELECT * FROM `categorie_temp` WHERE `admin_id` = '".$_SESSION['user_id']."' ";
		$result = mysqli_query($connection , $sql);
		if ($result) {
			echo "string1";
			$row  = mysqli_fetch_array($result);
			$sql = "INSERT INTO `subcat` (`subcat_name`,`cat_id`) VALUES ('".$row['subcat_name']."' , '".$row['cat_id']."') ";
			$result = mysqli_query($connection , $sql);
			if ($result) {
				echo "string2";
				$sql = "SELECT subcat_id FROM `subcat` WHERE `subcat_name` = '".$row['subcat_name']."' ";
				$result = mysqli_query($connection,$sql);
				if($result){
					echo "string3";
					$row  = mysqli_fetch_array($result);
					$result = mysqli_query($connection,"SELECT * FROM `questions_temp` WHERE `admin_id` = '".$_SESSION['user_id']."' ");
					$allquest = array();
					$index= 0;
					while($row2 = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
    					$allquest[$index] = $row2;
     					$index++;
					}
					foreach ($allquest as $post){
						$sql = "INSERT INTO `questions` (`question`, `option1`,`option2`,`option3`,`option4`,`answer`,`cat_id`) values ('".$post['question']."', '".$post['option1']."' , '".$post['option2']."', '".$post['option3']."', '".$post['option4']."', '".$post['answer']."' , '".$row['subcat_id']."') ";
						$result = mysqli_query($connection,$sql);	
					}
					$_SESSION['admin_status'] = "starting";
					header("Location:admin_page.php" );
					exit;
				}
			}
		}else{
		$_SESSION['msg'] = "Query not commited";
		header("Location:error.php");
		}
		/*------------Add done page here-------------*/
		
	}
	header("Location:subtopic.php?id=".$row['cat_id'] );

	
?>