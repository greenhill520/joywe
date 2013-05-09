<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/register.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="js/register.js">
	</script>
	<title> 注册页面 </title>
	</head>
	<body>
	<div id = "wrapper">
		<div id="header"></div>
		<div id="content">
			<h1>欢迎您的加入</h1>
				<div class="clearfix">
					<div class="article">
					<form action="registerResult.php" method="post" name="form1">
						<div class="item">
							<label>用户名</label>
							<input id="user_name" class="basic-input" type="text" value="" tabindex="3" maxlength="15" name="user_name">
							<span id="prompt2" class="validate-option" style="display: none;">中、英文均可，最长14个英文或7个汉字</span>
						</div>
						<div class="item">
							<label>密码</label>
							<input id="password" class="basic-input" type="password" maxlength="14" tabindex="2" name="password">
							<span id="prompt3" class="validate-option" style="display: none;">字母、数字或符号，最长15个字符，区分大小写</span>
						</div>
                        <div class="item">
                            <label>确认密码</label>
                            <input id="password" class="basic-input" type="password" maxlength="14" tabindex="2" name="password2">
                            <span id="prompt3" class="validate-option" style="display: none;">字母、数字或符号，最长15个字符，区分大小写</span>
                        </div>
                        <div class="item">
                            <label>邮箱</label>
                            <input id="email" class="basic-input" type="text" value="" tabindex="3" maxlength="40" name="email">
                            <span id="prompt2" class="validate-option" style="display: none;">邮箱地址</span>
                        </div>
						<div class="item-submit">
							<label>&nbsp;</label>
							<input id="button" class="btn-submit" type="submit" title="注册" tabindex="6" value="注册">
                            <a href="index.php"><span>首页</span></a>
						</div>
					</form>
				</div>
					<div class="aside">
					<p class = "p1">
					已经拥有账号？
					<a href = "login.php">直接登录</a>
					</p>
				</div>
				</div>
		</div>
	</div>
	</body>
</html>