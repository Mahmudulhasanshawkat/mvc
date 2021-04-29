<?php 
	  require_once 'controllers/LoginController.php';
?>


<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styles/mystyle.css">
	</head>
	<body  >
                 <div class="header my-font"  class="my-font" >Header</div>
		<div class="login-div">
		<table align="center">
		        <tr>
					<td colspan="2" align="center"><span class="err_msg"><?php echo $err_message;?></span></td>
				</tr>
				<tr>
				<td><h1 align="center" style="font-family:verdana;" class="login"> Customer Login</h1></td>
				</tr>


			<table align="left">
				
				<tr>
					<td ><img src="ad.png" width="100px" height="100px" ></td>
					
				</tr>
			</table>
			<form action="" onsubmit="return validate()" method="post">
				<table align="center">
					<tr>
					
						<td><span class="my-font">Username:</span> </td>
						<td><input class="my-font my-text-field" type="text" id="uname" value="<?php echo $uname;?>" placeholder="username" name="uname">
						<br><span class="err-msg" id="err_uname" ><?php echo $err_uname;?></span>
						</td>
					</tr>
					<tr>
						<td><span class="my-font">Password: </span></td>
						<td><input class="my-font my-text-field" type="password" id="pass"  placeholder="password"  name="pass">
						<br><span class="err-msg" id="err_pass" ><?php echo $err_pass;?></span></td>
					</tr>
					<tr>
						<td colspan="2" align="right"><input class="btn-mine my-font" type="submit"  value="Login" name="btn_login">
					</tr>
					
					<tr>
					<td>
					     <a href="signup.php">Not Register Yet?</a></td>
					</tr>
					
				</table>
			</form>
		</div>


		<div class="footer my-font">Footer</div>
	</body>
	<script>
	function get(id){
			return document.getElementById(id);
		}
	function validate(){
			cleanUp();
			var hasError=false;
			
			if(get("uname").value == ""){
				get("err_uname").innerHTML="Username Required";
				get("err_uname").style.color="red";
				hasError=true;
				//err_msg += "*Username Required<br>";
			}
			if(get("pass").value == ""){
				get("err_pass").innerHTML="Password Required";
				hasError=true;
				//err_msg += "*Password Required<br>";
			}
			if(!hasError){
				return true;
			}
			return false;
			
		}
		function cleanUp(){
			
			get("err_uname").innerHTML="";
			get("err_pass").innerHTML="";
		}
	</script>
	
</html> 