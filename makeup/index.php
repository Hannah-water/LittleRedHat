<?php include 'conn.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>小红帽-首页</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
</head>
<body>
	<div class="back-area">
		<div class="header-nav">
			<ul class="nav_ul">
				<li><a href="index.php" class="nav_on">首页</a></li>
				<li><a href="post.php">推荐</a></li>
				<li><a href="user.php">个人中心</a></li>
				<?php
				@session_start();
				if(!isset($_SESSION['username'])) {
					echo '<li><a href="login.php">登录</a></li>';
				} 
				else {
					echo '<li><a href="post_edit.php">发布推荐</a></li>';
				}
				?>
			</ul>
		</div>
		<div class="area">
				<img src="/makeup/image/index.png">
		</div>
	</div>
</body>
</html>
