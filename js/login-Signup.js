	function Login(){
		document.getElementById('logInForm').style.cssText = ' display: block;';
		document.getElementById('signUpForm').style.cssText = ' display: none;';
		document.getElementById('forgetForm').style.cssText = ' display: none;';
		document.getElementById('goBack').style.cssText = ' display: none;';
		document.getElementById('LogInButton').style.cssText = ' background-color: #0087ce; border-color: #0087ce; border-bottom-color: #f9f398;';
		document.getElementById('SignUpButton').style.cssText = ' background-color: white; border-color: #ffffff; border-bottom-color: #ffffff';
	}
	function SignUp(){
		document.getElementById('signUpForm').style.cssText = ' display: block;';
		document.getElementById('logInForm').style.cssText = ' display: none;';
		document.getElementById('LogInButton').style.cssText = ' background-color: white; border-color: #ffffff; border-bottom-color: #ffffff';
		document.getElementById('SignUpButton').style.cssText = ' background-color: #0087ce; border-color: #0087ce; border-bottom-color: #f9f398;';
	}
	function forget(){
		document.getElementById('signUpForm').style.cssText = ' display: none;';
		document.getElementById('logInForm').style.cssText = ' display: none;';
		document.getElementById('LogInButton').style.cssText = ' display: none;';
		document.getElementById('SignUpButton').style.cssText = ' display: none;';
		document.getElementById('forgetForm').style.cssText = ' display: block;';
		document.getElementById('goBack').style.cssText = ' display: block;';
	}
	function adminReg(){
		document.getElementById('AdminInput').style.cssText = ' display: inline-block;';
	}
