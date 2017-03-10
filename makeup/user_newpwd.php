<?php include 'conn.php'; ?>
<?php
@session_start();

$uid = $_SESSION['username'];

?>
<?php
if(isset($_POST['commit'])){
	
	$oldpwd = md5($_POST['oldpwd']);
	$newpwd = md5($_POST['newpwd']);


}
?>
<?php 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>小红帽-个人中心</title>
	<link rel="stylesheet" type="text/css" href="css/user_newpwd.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="js/login.js"></script>

</head>
<body>
<div class="back-area">
<div class="header-nav">
			<ul class="nav_ul">
					<li><a href="index.php">首页</a></li>
					<li><a href="post.php">推荐</a></li>
					<li><a href="user.php" class="nav_on">个人中心</a></li>
			</ul>
		</div>
	<div class="area">
		<div class="area-head"><span>个人中心</span></div>
		<div class="area-left">
			<div class="allMenu">
				<ul>
					<li>
						<a href="user.php">> 我的资料</a>
					</li>
					<li>
						<a href="user_edit.php">> 修改资料</a>
					</li>
					<li>
						<a href="">> 修改密码</a>
					</li>
					<li>
						<a href="user_publication.php">> 我发布的推荐</a>
					</li>
					<li>
						<a href="user_collection.php">> 我收藏的推荐</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="area-right">
			<div class="rightHead">
				<span>修改密码</span><hr/>
			</div>
			<div class="rightCon">
				<form name="changePwd" method="post" action="" onsubmit="return checkChange()">
					<div class="rightConR">
						<table>
							<tr>
								<td class="info">旧密码：</td>
								<td><input type="password" class="info_con t_input" name="oldpwd" id="oldpwd"></input></td>
							</tr>
							<tr>
								<td class="info">新密码：</td>
								<td><input type="password" class="info_con t_input" name="newpwd" id="newpwd"></input></td>
							</tr>
							<tr>
								<td class="info">确认新密码：</td>
								<td><input type="password" class="info_con t_input" name="re_newpwd" id="re_newpwd"></input></td>
							</tr>
							<tr></tr>
						</table>
						<div class="error-wrap" id="error"><span id="errorMsg"></span></div>
						<div class="div_button">
						<input type="submit" name="commit" class="modify" value="修改"></input>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
</body>
</html>


