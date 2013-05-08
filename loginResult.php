<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/result.css" type="text/css" rel="stylesheet" />
	<title> 成功、失败页面 </title>
	</head>
	<body>
	<div id="overall">
	<?php 
	session_start();
	include_once 'control/control.php'; 
	if( isset($_REQUEST['username'])){
		$userName = $_REQUEST['username'];
		$passWord = $_REQUEST['password'];
		$return=login($userName,$passWord);
	}
	if($return) {
		$_SESSION['userID'] = $return->id;
	?>
	<div id = "success">
	<p>登录成功，<a href="index.php">返回主页</a></p>
	</div>
	<?php }else{ ?>
	<div id ="failed">
	<p>登录失败，请检查您的用户名和密码 ,<a href="login.php">重新登录</a></p>
	</div>
	<?php
		}
	?>
	</div>
	</body>
</html>