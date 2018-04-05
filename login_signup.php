<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
	<title>
          LOGIN-SIGNUP PAGE
	</title>

     <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<script src="js/jquery-3.1.1 (1).js"></script>
	<script type="text/javascript" src="js/log.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="laptop_container">
	<div class="login">
		<h1 id="l">LOGIN FORM</h1>
		<div class="log-form">
			<form action="verifyUser.php" method="post" id="loginForm1">
                <input type="Email" class="input" placeholder="Email" name="email" style="font-size:140%;"><br>
                <input type="Password" class="input" placeholder="Password" name="password" style="font-size:140%;"><br>
                <input type="Submit" class="creat_account" value="LOGIN"><br>
            </form>
            <button class="ForgotPass" onclick="forget1()" id="forgotButt1">Forgot your password?</button><br>   
            <form id="forgetForm1" action="forgotPassword.php" method="post">
                <input type="Email" class="input" placeholder="Email" name="email"><br>
                <input type="password" placeholder="New Password" name="new_pass" class="input">
                <br>
                <input type="Submit" value="Change Password" class="forgetSubmit">
            </form>                 
            
		</div>
        
	</div>
	<div class="signup">
		<h1 id="s">SIGNUP FORM</h1>
		<div class="sign-form">
			<form action="adduser.php" method="post">
                <input type="text" placeholder="First and Last Name" style="font-size:140%" name="username" class="input"><br>
                <input  class="input" type="Email" placeholder="Email" style="font-size:140%" name="email"><br>
                <input type="Number"  class="input" placeholder="Contact Number" style="font-size:140%" name="number"><br>
                <input type="Password" placeholder="Password"  class="input" style="font-size:140%" name="password"><br>
                <input type="Password" name="admin_id" class="input" placeholder="Admin Verification Code" id="AdminInput" style="display: none;">
                <input type="Submit" class="creat_account" value="REGISTER">
            </form>
            <P>
                <type="text" style="color:#ffffff">By signing up you agree to our </type><b>Terms of Service</b>
                <br>
                <button id="AdminReg" class="creat_account" onclick="adminReg()"> NEW ADMIN </button>
            </P>
		</div>
	</div>

</div>
<!-- =================================for phone ==============================-->
<div class="signUpPage">
     <img src="images/logo1.jpeg"><br>
     <div class="SignUpContainer">
          <div class="SignUpBlock">
               <button id="LogInButton" onclick="Login()" style="font-size:90%">Login</button>
               <button id="SignUpButton" onclick="SignUp()" style="font-size:90%">Sign Up</button>
               <button id="goBack" onclick="Login()" style="font-size:90%">Back</button>
               <div id="signUpForm">
                    <form action="adduser.php" method="post">
                         <input type="text" placeholder="First and Last Name" style="font-size:140%" name="username" class="input"><br>
                         <input  class="input" type="Email" placeholder="Email" style="font-size:140%" name="email"><br>
                         <input type="Number"  class="input" placeholder="Contact Number" style="font-size:140%" name="number"><br>
                         <input type="Password" placeholder="Password"  class="input" style="font-size:140%" name="password"><br>
                         <input type="text" name="admin_id" class="input" placeholder="Admin Verification Code" id="AdminInput" style="display: none;">
                         <input type="Submit" class="creat_account" style="background-color: #63dc15;" value="REGISTER">
                    </form>
                    <P>
                         <type="text" style="color:#424242">By signing up you agree to our </type><b>Terms of Service</b>
                         <br>
                    </P>
               </div>
               <div id="logInForm">
                    <form action="verifyUser.php" method="post">
                         <input type="Email" class="input" placeholder="Email" name="email" style="font-size:140%;"><br>
                         <input type="Password" class="input" placeholder="Password" name="password" style="font-size:140%;"><br>
                         <input type="Submit" class="LogInButton2" value="LOGIN">
                    </form>                    
                    <button class="ForgotPass" onclick="forget()" >Forgot your password?</button><br>
               </div>
               <div id="forgetForm" >
               		<form>
               			<input type="text" placeholder="Email" class="input">
               			<button class="forgetSubmit">Submit</button>
               		</form>
               </div>
          </div>
          <br>
          <p style="color: green">Are you a company or an organization looking to <a href="#" style="text-decoration: none;"><b>invest in our idea ?</b></a></p>
     </div>
</div>
<script type="text/javascript" src="js/login-Signup.js"></script>
</body>
</html>