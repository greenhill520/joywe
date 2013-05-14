<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" />
	<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
	<link href="css/bootstrap-responsive.css" type="text/css" rel="stylesheet" />
	<link href="css/bootstrap-responsive.min.css" type="text/css" rel="stylesheet" />
	<link href="css/login.css" type="text/css" rel="stylesheet" />
	<title> 登录页面 </title>
	</head>
	<body>
	<div id = "wrapper">
		<div id="header"></div>
		<div id="content">
			<img class="header_img" src="images/header.png"/>
				<div class="clearfix">
					<div class="article">
					<form action="loginResult.php" method="post" name="form1">

						<div class="login">

						<div class="item">
							<input id ="login_name" class="basic-input" type="text" placeholder="User name" tabindex="1" maxlength="15" name="username">
						</div>
						<a class="register" href = "register.php">Join us</a>
						<div class="item">
							<!-- <label>密码</label> -->
							<input id="password" class="basic-input" type="password" placeholder="Password" maxlength="20" tabindex="2" name="password">
						</div>
						</div>
							
						<div class="item-submit">
							<!-- <label>&nbsp;</label> -->
							<!-- <input id="button" class="btn btn-primary" type="submit" title="登录" tabindex="6"  value="登录"> -->
                            <input type="image" id="button" name="login" src="images/joywe.png" onClick="document.formName.submit()"> 
                           <!--  <a href="index.php"><span>首页</span></a> -->
						</div>
					</form>
				</div>
					<div class="aside">
					<!-- <p class = "p1">
					还没有账号？ -->
					<!-- <a href = "register.php">Join us?</a> -->
					<!-- </p> -->

				</div>
				</div>
		</div>
	</div>
				<footer>
      				&copy; 2012, Starbuzz Coffee
     				<br>
      				All trademarks and registered trademarks appearing on 
      				this site are the property of their respective owners.
    			</footer>
	</body>
</html>
