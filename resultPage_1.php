<?php
    session_start();
    include 'config.php';
    $cat_id = $_SESSION['cat_id'];

    $sql = "SELECT * FROM `user_marks` WHERE cat_id = '".$cat_id."' AND user_id = '".$_SESSION['user_id']."' ";
    $result = mysqli_query($connection , $sql);
    if ($result) {
        $row  = mysqli_fetch_array($result);
        $corAns = $row['marks'];
        $incorAns = $row['Attempted'] - $corAns;
        $nta = 5 - $row['Attempted'];
        $per = $row['marks']*20 ;
    }
    

    $sql = "SELECT * FROM subcat WHERE subcat_id = '".$cat_id."'  ";
    $result=mysqli_query($connection , $sql);
    if($result){
        $cat = mysqli_fetch_array($result);
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Result Page</title>
	<link rel="stylesheet" type="text/css" href="css/results_1.css">

	   <link rel="stylesheet" type="text/css" href="css/results_1.css">

    <script type="text/javascript">
  window.onload = function () {
  var chart = new CanvasJS.Chart("chartContainer",
  {


    title:{
      text: "Result Statistics"
    },
    data: [
    {
      type: "pie",
      dataPoints: [
        { y: <?php echo $corAns;?>, indexLabel: "Correct Questions" },
        { y: <?php echo $incorAns;?>, indexLabel: "Incorrect Questions" },
        { y: <?php echo $nta;?>, indexLabel: "Not Attempted Questions" }
      ]
    }
    ]
  });
  chart.render();
}
</script>
<script type="text/javascript" src="js/canvasjs.min.js"></script>

</head>

<body>

	<div class="topNavBar">
		<div class="logo_and_form">
			<div id="imgContainer">
				<img src="images/logo.jpeg">
			</div>
			<div class="topNavBarForm" style="text-align: center;">
					<p>Welcome : <?php echo strtoupper($_SESSION["name"]); ?></p><br>
					<form action="logout.php" method="post" style="display: inline-block;">
						<input type="submit" value="Logout" class="logoutButton">
					</form>
                    <form action="user_page.php" style="display: inline-block;">
                        <input type="submit" name="" value="HOME" class="logoutButton">
                    </form>
                    
			</div>
		</div>
	</div>
  <div class="mainPage">    
    <div class="certificateContainer">      
      <div class="certInliner">        
        <div class="fillerContainer">
          <div class="topBar">            
            <div class="imageCont"><img src="images/logo_t.png" alt="LOGO"></div>
            <div class="headingLine">Certificate Of Appreciation</div>
            <div class="ribbonImg"><img src="images/ribbon.png" alt="ribbon"></div>
          </div>
          <div class="middleSection">
                <div class="subHeadingContainer">This is to certify that <div id="nameTag"><b><?php echo $_SESSION['name'] ?></b></div> has successfully completed course of <div id="courseName"><b><?php echo $cat['subcat_name'] ?></b></div> and has obtained <div id="percentTag"><b><?php echo $per;?>%</b></div>.
            </div>             
          </div>          
          <div class="lastSection">              
              <div class="stats">
                <div class="headingStats">Statistics : -</div><br>
                <div class="list">
                <div class="ques-list1">Marks Obtained : <?php echo $corAns;  ?></div>
                <div class="ques-list2">Total Question: 5 </div>
                <div class="ques-list3">Attempted Questions : <?php echo $row['Attempted'] ?></div>                
                </div>
              </div>
              <div class="pieDiv">
                <div id="chartContainer" style="width: 300px; height: 200px;"></div>
              </div>
          </div>
      </div>
    </div>
  </div>
</body>
</html>