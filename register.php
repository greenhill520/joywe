<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" />
	<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
	<link href="css/bootstrap-responsive.css" type="text/css" rel="stylesheet" />
	<link href="css/bootstrap-responsive.min.css" type="text/css" rel="stylesheet" />
	<link href="css/login.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="js/register.js">
	</script>
	<title> 注册页面 </title>
	</head>
	<body>
	<div id = "wrapper">
		<div id="header"></div>
		<div id="content">
			<!-- <h1>欢迎您的加入</h1> -->
				<div class="clearfix">
					<div class="article">
						<img class="header_img" src="images/header.png"/>
					<form class="register_form" action="registerResult.php" method="post" name="form1">
						<div class="item">
							<!-- <label>用户名</label> -->
							<input id="user_name" class="basic-input" type="text" placeholder="User name" value="" tabindex="3" maxlength="15" name="user_name">
							<span id="prompt2" class="validate-option" style="display: none;">中、英文均可，最长14个英文或7个汉字</span>
						</div>
						<div class="item">
							<!-- <label>密码</label> -->
							<input id="password" class="basic-input" type="password" placeholder="Password" maxlength="14" tabindex="2" name="password">
							<span id="prompt3" class="validate-option" style="display: none;">字母、数字或符号，最长15个字符，区分大小写</span>
						</div>

						<div class="item">
                            <input id="password" class="basic-input" type="password" placeholder="Password confirm" maxlength="14" tabindex="2" name="password2">
                            <span id="prompt3" class="validate-option" style="display: none;">字母、数字或符号，最长15个字符，区分大小写</span>
                        </div>
                        <div class="item">
                            <input id="email" class="basic-input" type="text" placeholder="Email address" value="" tabindex="3" maxlength="40" name="email">
                            <span id="prompt2" class="validate-option" style="display: none;">邮箱地址</span>
                        </div>

						<div class="item-submit-reg">
							<!-- <label>&nbsp;</label> -->
							<input id="button" class="btn btn-primary" type="submit" title="注册" tabindex="6" value="Register">
                            <!-- <a href="index.php"><span>首页</span></a> -->
						</div>
					</form>
				</div>
				<div class="aside">
					<!-- <p class = "p1">
					已经拥有账号？ -->
					<a href = "login.php">&lt&ltBack to log in</a>
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
