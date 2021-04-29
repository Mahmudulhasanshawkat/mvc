<?php 
	  require_once 'controllers/LoginController.php';
?>

<html>
	<head></head>
	<body>
		<center>
		<form action="" onsubmit="return validate()" method="post">
		
		<legend align="center"><h1>Customer Registration </h1></legend>
			<table>
			
				
				<tr>
					<td><span >Name</span></td>
					<td>:</td>
					<td><input type="text" name="u_name" id="name"  value="<?php echo $name;?>"></td>
					<td><span id="err_name"></span><span><?php echo $err_name;?></span></td>
				</tr>
				
				<tr>
					<td><span >Username</span></td>
					<td>:</td>
					<td><input type="text" name="uname" id="uname" onfocusout="checkUsername(this)" value="<?php echo $uname;?>"></td>
					<td><span id="err_uname"><?php echo $err_uname;?></span></td></br>
					<td><span id="err"></span></td>
				</tr>
				<tr>
					<td><span>Password</span></td>
					<td>:</td>
					<td><input type="password" name="u_pass" id="pass" value="<?php echo $pass;?>"></td>
					<td><span id="err_pass"><?php echo $err_pass;?></span></td>
				</tr>
				<tr>
					<td><span>Confirm Password</span></td>
					<td>:</td>
					<td><input type="password" name="u_conpass" id="conpass" value="<?php echo $conpass;?>"></td>
					<td><span id="err_conpass"><?php echo $err_conpass;?></span></td>
				</tr>
				<tr>
					<td><span>Email</span></td>
					<td>:</td>
					<td><input type="text" name="u_mail" id="mail" value="<?php echo $mail;?>"></td>
					<td><span id="err_mail"><?php echo $err_mail;?></span></td>
				</tr>
				<td>
				
				<tr>
				<td><span>Gender</span></td>
				<td>:</td>
				<td><input type="radio" name="u_gender" id="gender" value="Male"><span>Male</span>
				<input type="radio" name="u_gender" id="geender" value="Female"><span>Female</span></td>
				<td><span id="err_gender"><?php echo $err_gender;?></span></td></br>
				</tr>
				
				<tr>
				<td><br></td>
				</tr>
				<tr>
				<td colspan="3" align="right">
				<input type="Submit" name="sign_up" value="Register">
				</td>
				</tr>
			</table>
	
		</form>
		</center>
	</body>
	<script>
	function get(id){
			return document.getElementById(id);
		}
	function validate(){
			cleanUp();
			var hasError=false;
			if(get("name").value == ""){
				
				get("err_name").innerHTML="Name Required";
				get("err_name").style.color="red";
				hasError=true;
				
			}
			if(get("uname").value == ""){
				get("err_uname").innerHTML="Username Required";
				hasError=true;
				
			}
			if(get("pass").value == ""){
				get("err_pass").innerHTML="Password Required";
				hasError=true;
				
			}
			if(get("conpass").value == ""){
				get("err_conpass").innerHTML="Password Required";
				hasError=true;
				
			}
			if(get("mail").value == ""){
				get("err_mail").innerHTML="Email Required";
				hasError=true;
				
			}
			if(get("gender").checked == false && get("geender").checked==false){
				get("err_gender").innerHTML="gender Required";
                hasError=true;
				
			}
			
			
			if(!hasError){
				return true;
			}
			return false;
			
		}
		function cleanUp(){
			get("err_name").innerHTML = "";
			get("err_uname").innerHTML="";
			get("err_pass").innerHTML="";
			get("err_conpass").innerHTML = "";
			get("err_mail").innerHTML="";
			get("err_gender").innerHTML="";
		}
		
		function checkUsername(control){
		var uname = control.value;
		//ajax
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange=function(){
			if(this.readyState == 4 && this.status == 200){
				//when server respond
				var rsp = this.responseText;
				if(rsp == "true"){
					if( uname===''){}

					else{
						

						document.getElementById("err").innerHTML = "<br>Valid";}
				}else{
					document.getElementById("err").innerHTML = "<br>Not Valid";
				}
			}
		};
		xhttp.open("GET","checkusername.php?uname="+uname,true);
		xhttp.send();
	}
	
	</script>
</html>