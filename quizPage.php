<?php
    session_start();
    if(!isset($_SESSION["user_id"]))
    {
        header("Location:login_signup.php");
        exit;
    } 
    else{
    include 'config.php';
    $id = mysqli_real_escape_string($connection,$_GET['a']);
    
    $sql = "SELECT * FROM `questions` WHERE cat_id = '".$id."' ";
    $result = mysqli_query($connection , $sql);
    if($result){
        $allQues = array();
        $index=0;
        while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
            $allQues[$index] = $row;
            $index++;
        }
    }
    $sql = "SELECT `ques_id` FROM `questions` WHERE `cat_id` = '".$id."' ";
    $result = mysqli_query($connection,$sql);
    if($result){
        $index = 0;
        $ques_id = array();
        while ($row = mysqli_fetch_assoc($result) ) {
            $ques_id[$index] = $row;
            $index++; 
        }
    }}
?>
<!DOCTYPE html>
<html onloadstart="myfunc()">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Page</title>
    <link rel="stylesheet" type="text/css" href="css/quizPage.css">
    <!--
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <script src="js/jquery-3.1.1 (1)"></script>
    -->
    <script type="text/javascript"  href="js/quizPage.js"></script> 
    <script src="js/jquery-3.1.1 (1)"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#ButtonStart").delay(2000).animate({opacity:1});
            $("#text-load").delay(500).animate({opacity:1},700);
        });
    </script>
</head>
<body>    
    <div class="topNavBar">
        <div class="logo_and_form">
            <div id="imgContainer">
                <img src="images/logo.jpeg">
            </div>
            <div class="quizCategory">
                <?php
                    $x = mysqli_fetch_array(mysqli_query($connection , "SELECT * FROM `subcat` WHERE `subcat_id` = '".$id."' "));
                    echo strtoupper($x['subcat_name']);
                ?>       
                <button onclick="timestart()">hello</button>                 
            </div>
            <div class="topNavBarForm">
                    <p>Welcome : <?php echo strtoupper($_SESSION['name']);  ?> </p>
                    
            </div>
        </div>
    </div>
    <div class="AllBestDiv" id="divBestContainer">
        <div class="bestText" id="text-load">All The Best!!</div>
        <div class="startButton" id="ButtonStart">
        <input type="submit" name="" value="Start Quiz" id="startQuizButton" onclick="myfunc2()">
        </div>
    </div>
    <div class="mainBody" id="mbody">
    <form action="user_ans.php" method="post">
        <div class="leftSide" id="leftId">
            <div class="timeDiv" id="tim">
            </div>
            <div id="allQuesDiv">
                <?php
                    $count=0;
                    foreach ($allQues as $ques){
                    $count++;
                ?>
                    <a href="#<?php echo $ques['ques_id'];?>" ><div class="quesNo" id="b<?php echo $ques['ques_id'];?>">Q<?php echo $count;?></div></a>
                <?php
                    }
                ?>
            </div>
            <input type="submit" name="" value="END QUIZ" id="endQuizButt">
        </div>
        <div class="rightSide" id="rightId" >
            <?php
            $count=0;
            foreach ($allQues as $ques){
                $count++;
            ?>
        <div class="aboutQues" id="col<?php echo $ques['ques_id'];?>" style="text-align: left;">
            <div class="quesName">
                <div class="NoQues">Q.<?php echo $count ?>)</div>
                <div class="nameQues" ><?php echo $ques['question'];  ?></div>
            </div>
            <div class="ansMenu">
                    <input type="radio" name="cat" style="display: none;" value="<?php echo $id; ?>" checked>
                    <input type="radio" name="abcd<?php echo $count;?>" style="display: none;" value="<?php echo $ques['ques_id']; ?>" checked>
                    <div class="ansLeft">
                        <div class="ans1A">
                            <input type="radio" name="Ans<?php echo $count; ?>" value="1" style="margin-left: 20px;"><?php echo $ques['option1']; ?>
                        </div>
                        <div class="ans1B">
                            <input type="radio" name="Ans<?php echo $count; ?>" value="3" style="margin-left: 20px;"><?php echo $ques['option3']; ?>
                        </div>
                    </div>
                    <div class="ansRight">
                        <div class="ans1C">
                            <input type="radio" name="Ans<?php echo $count; ?>" value="2" style="margin-left: 20px;"><?php echo $ques['option2']; ?>
                        </div>
                        <div class="ans1D">
                            <input type="radio" name="Ans<?php echo $count; ?>" value="4" style="margin-left: 20px;"><?php echo $ques['option4']; ?>
                        </div>
                    </div>
                    <!--<input type="Submit" name="submit" value="abcd" >-->
                    <div class="quesEnd" style="text-align: center;">
                        <div class="reviewButton" id="<?php echo $ques['ques_id'];?>" onclick="review(this.id)"><a href="#">Mark For Review</a></div>
                    </div>
                </form>
            </div>            
        </div>
        <?php 
            }
        ?>
        </div>
    </div>
    <script>
        
        function review(x) {
            var z = "b".concat(x);
            document.getElementById(z).style.cssText = ' background-color: #ff9800; ';
        }
        function timestart(){
            var countDownDate = new Date().getTime();
countDownDate += 600000;
// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("tim").innerHTML =  hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("mbody").style.cssText = 'display:none ; ';
    }
}, 1000);
        }

        function myfunc()
{
    document.getElementById('divBestContainer').style.cssText='display:block;';
    document.getElementById('mbody').style.cssText='display:none';
}
function myfunc2()
{
    document.getElementById('divBestContainer').style.cssText='opacity:0;display:none';   
    document.getElementById('mbody').style.cssText='opacity:1;display:block';   
}
    </script>
</body>
</html>