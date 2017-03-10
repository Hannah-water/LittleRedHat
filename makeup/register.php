<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>小红帽-注册</title>
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
</head>
<body>
	<div class="back-area">
		<div class="header-nav">
			<ul class="nav_ul">
				<li><a href="index.php">首页</a></li>
				<li><a href="post.php">推荐</a></li>
				<li><a href="user.php">个人中心</a></li>
			</ul>
		</div>
		<div class="login-main">
			<div class="heading">注册</div>
			<div class="login-left">
				<form name="registerForm" method="post" action="" onsubmit="return checkRegister()">
					<div class="con">
						<div class="account">
							<input placeholder="用户名(3~20个字符,包含字母/数字/下划线)" type="text" name="uid" id="uid" class="t_input" maxlength="20" tabindex="1"></input>
						</div>
						<div class="password">
							<input placeholder="密码(6~20位,区分大小写)" type="password" name="upwd" id="upwd" class="t_input" maxlength="20" tabindex="2"></input>
						</div>
						<div class="password">
							<input placeholder="确认密码" type="password" name="re_upwd" id="re_upwd" class="t_input" maxlength="20" tabindex="3"></input>
						</div>
						<div class="email">
							<input placeholder="邮箱" type="text" name="email" id="email" class="t_input" maxlength="20" tabindex="4"></input>
						</div>
						<!-- 
						<div class="login-code">
							<input placeholder="验证码" type="text" name="loginCode" id="loginCode" class="t_input" maxlength="4" tabindex="5"></input>
							<a href="javascript:" id="changeCode" title="点击换一张">
								<img src="">
							</a>
						</div>
						 -->
					</div>
					<div class="error-wrap" id="error"><span id="errorMsg"></span></div>
					<div class="div_button">
						<input type="submit" name="commit" class="goLogin" value="提交注册信息"></input>
					</div>
				</form>
			</div>
			<div class="login-right">
				<p>已有账号</p>
				<a href="login.php">立即登录>></a>
			</div>
		</div>
	</body>
	</html>
	<?php include 'conn.php'; ?>
	<?php
	@session_start();
	if(isset($_SESSION['username'])) {
		header("Location:/makeup/user.php");
	}
	if(isset($_POST['commit'])){

		$uid = htmlspecialchars($_POST['uid']);
		$upwd = md5($_POST['upwd']);

		$sql_user = "SELECT * FROM USER WHERE UID='$uid'";
		$result_user = mysql_query($sql_user,$conn) or die(mysql_error()); 
		if(mysql_fetch_array($result_user)){
			echo '<script>';
			echo '$("#errorMsg").text("用户名已存在");';
			echo '$(".error-wrap").show();';
			echo '</script>';
		}
		else{
			$sql_regi = "INSERT INTO USER(UID,UPWD,NICKNAME) VALUES('$uid','$upwd','$uid')";
			$result_regi = mysql_query($sql_regi,$conn) or die(mysql_error());
			header("refresh:3;url=/makeup/login.php");
			echo '<script>';
			echo '$("#errorMsg").text("注册成功！3秒后跳转登录界面");';
			echo '$(".error-wrap").show();';
			echo '</script>';
		}
	}
	?>