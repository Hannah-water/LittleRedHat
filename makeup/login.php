
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>小红帽-登录</title>
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
			<div class="heading">登录</div>
			<div class="login-left">
				<form name="loginForm" id="loginForm" method="post" action="" onsubmit="return checkLogin()">
					<div class="con">
						<div class="account">
							<input placeholder="用户名" type="text" name="uid" id="uid" class="t_input" maxlength="20" tabindex="1"></input>
						</div>
						<div class="password">
							<input placeholder="密码" type="password" name="upwd" id="upwd" class="t_input" maxlength="20" tabindex="2"></input>
						</div>
						<!-- 
						<div class="login-code">
							<input placeholder="验证码" type="text" name="loginCode" id="loginCode" class="t_input" maxlength="4" tabindex="3"></input>
							<a href="javascript:" id="changeCode" title="点击换一张">
								<img src="">
							</a>
						</div> -->
					</div>
					<div class="error-wrap" id="error"><span id="errorMsg"></span></div>
					<div class="option">
						<input name="remember" type="checkbox" checked="checked" value="1">记住用户名密码</input>
						<input type="hidden" id="remember_val" value="1">
						<a class="getpwd" href="">忘记密码</a>
					</input>
				</div>
				<div class="div_button">
					<input type="submit" name="commit" class="goLogin" value="立即登录"></input>
				</div>
			</form>
		</div>
		<div class="login-right">
			<p>还没有注册？</p>
			<a href="register.php">立即注册>></a>
		</div>
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

	
	$_SESSION['username']=NULL;

	$uid = htmlspecialchars($_POST['uid']);
	$upwd = md5($_POST['upwd']);
	//$remember = $_POST['remember'];

	/*
	if($remember == 1) {
		setcookie('uid',$uid,time()+3600);
		setcookie('upwd',$uid,time()+3600);
	}*/

	//检查数据库中是否有该用户名
	$sql_user = "SELECT * FROM USER WHERE UID='$uid'";
	$result_user = mysql_query($sql_user,$conn) or die(mysql_error()); 
	if(!mysql_fetch_array($result_user)){
		echo '<script>';
		echo '$("#errorMsg").text("用户名不存在");';
		echo '$(".error-wrap").show();';
		echo '</script>';
	}
	else{
		//若存在用户名，检查用户名和密码是否匹配
		$sql_pwd = "SELECT * FROM USER WHERE UID='$uid' AND UPWD='$upwd'";
		$result_pwd = mysql_query($sql_pwd,$conn) or die(mysql_error());
		if(!mysql_fetch_array($result_pwd)){
			echo '<script>';
			echo '$("#errorMsg").text("密码错误");';
			echo '$(".error-wrap").show();';
			echo '</script>';
		}
		else{
			$_SESSION['username']=$uid;
			header("Location:/makeup/user.php");
		}
	}
}
?>