<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="#" type="text/css" rel="stylesheet" />
	<title> 注册页面 </title>
	</head>
	<body>
	<div id="overall">
	<?php 
	include_once 'control/control.php'; 
	if( isset($_REQUEST['user_name'])){
		$userName = $_REQUEST['user_name'];
		$passWord = $_REQUEST['password'];
        $passWord2 = $_REQUEST['password2'];
        $email = $_REQUEST['email'];
        if($passWord == $passWord2) {
		    $return = addUser($userName,$passWord,$email);
        }
        else {
            $retrun = "error";
        }
	}
	if($return == "error 1" || $return == "error") {
	?>
	<div id ="failed">
	<p>注册失败，请检查您的输入是否符合正确的格式或者该用户名已被注册 ,<a href="register.php">重新注册</a></p>
	</div>
	<?php }else{ ?>
	<div id = "success">
	<p>注册成功，<a href="login.php">登陆joyme班级聚会网</a></p>
	</div>
	<?php
		}
	?>
	</div>
	</body>
	</html>