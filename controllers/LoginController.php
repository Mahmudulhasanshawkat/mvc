<?php
       
      require_once 'models/db_config.php';
    
	$name="";
	$err_name="";
	$uname="";
	$err_uname="";
	$pass="";
	$err_pass="";
	$conpass="";
	$err_conpass="";
	$mail="";
	$err_mail="";
	$gender="";
	$err_gender="";
	$hasError = false;
	$err_message ="";
	

		if(isset($_POST["sign_up"]))
		{
			
			
			if (empty($_POST["u_name"]))
			{
				$err_name="**Name Required";
				$hasError = true;
			}
			else
			{
				$name=$_POST["u_name"]; //$uname = htmlspecialchars($_POST["uname"]);
			}
			
			if (strlen($_POST["uname"])<6)
			{
				$err_uname="Username length should be 6 or longer";
				$hasError = true;
			}
			elseif(strpos($_POST["uname"]," "))
			{
				$err_uname="Space are not allowed";
				$hasError = true;
			}
			else
			{
				$uname=$_POST["uname"];
			}
			if(strlen($_POST["u_pass"])>8)
			{
				$pass=$_POST["u_pass"];
			if ((!strpos($_POST["u_pass"],"#"))||(!strpos($_POST["u_pass"],"?")))
				{
				//$err_pass="Password should be minimum 1 character like '?'or'#'";
				//$hasError = true;
				}
				for ($i=0;$i<strlen($_POST["u_pass"]);$i++)
				{
					if (ctype_lower($_POST["u_pass"][$i]))
					{
						break;
					}
					else 
					{
						//$err_pass="Password should be minimum 1 lower case ";
						//$hasError = true;
					}
				}
				for ($j=0;$j<strlen($_POST["u_pass"]);$j++)
				{
					if (ctype_upper($_POST["u_pass"][$j]))
					{
						break;
					}
					else
					{
                        //$err_pass="Password should be minimum 1 upper case ";
						//$hasError = true;
					}
				}
				for($k=0;$k<strlen($_POST["u_pass"]);$k++)
				{
					if(is_numeric($_POST["u_pass"][$k]))
					{
						break;
					}
					else
					{
						//$err_pass="Password should be minimum 1 numeric character";
						//$hasError = true;
					}
				}
			}
			else
			{
				$err_pass="Password length must be 8 or longer";
				$hasError = true;
			}	
			
			
			if($_POST["u_conpass"]!=$_POST["u_pass"])
			{
				$err_conpass="Password didn't matched";
				$hasError = true;
			}
			else
			{
				$conpass=$_POST["u_conpass"];
			}
			
			if(strpos($_POST["u_mail"],"@"))
			{
				if(strpos($_POST["u_mail"],"."))
				 {$mail=$_POST["u_mail"];}
			}
			else
			{
			 	$err_mail="Email should be contain '@' and '.' sequentially";
				$hasError = true;
			}
			
		if(!isset($_POST["u_gender"]))
			{
				$err_gender="Please select a gender";
				$hasError = true;
			}
			else
			{
				$gender=$_POST["u_gender"];
			}
			
			
		if(!$hasError){
			insertUser($name,$uname,$pass,$conpass,$mail,$gender);
		}
		
		}
		
		if(isset($_POST["btn_login"])){
			
			if(empty($_POST["uname"])){
			$err_uname="Username Required";
			$hasError = true;
		}
		else{
			$uname = htmlspecialchars($_POST["uname"]);
		}
		if(empty($_POST["pass"])){
			$err_pass="Password Required";
			$hasError = true;
		}
		else{
			$pass=htmlspecialchars($_POST["pass"]);
		}
		
		
		$s=authenticateUser($_POST["uname"],$_POST["pass"]);	
		if(authenticateUser($_POST["uname"],$_POST["pass"])){
			
            session_start();
            $_SESSION["name"]=    $s["uname"];
            $_SESSION["customerId"]=$s["id"];
			
			header("Location: submitted.php");
		}
		else $err_message="Invalid username or password";
		
		
	}
		
		function insertUser($name,$uname,$pass,$conpass,$mail,$gender){
		$query = "INSERT INTO users VALUES (NULL,'$name','$uname','$pass','$conpass','$mail','$gender')";
		execute($query);		
	}

	function authenticateUser($uname,$pass){
		$query = "select * from users where uname='$uname' and pass='$pass'";
		$result = get($query);
		
		if(count($result) > 0){
			return $result[0];
		}
		return false;	
	}
	function checkUsernameValidity($uname){
		$query = "select * from users where uname='$uname'";
		$result=get($query);
		if(count($result) > 0){
			return "false";
		}
		return "true";
	}
	
?>
