<?php
	require_once 'controllers/LoginController.php';
	$uname=$_GET["uname"];
	$res = checkUsernameValidity($uname);
	echo $res;

?>