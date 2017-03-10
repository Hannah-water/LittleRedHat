<?php include 'conn.php'; ?>
<?php
@session_start();
if(isset($_SESSION['username'])) {
	$uid = $_SESSION['username'];
}
else {
	$uid = null;
}

$pid = $_SERVER['QUERY_STRING'];

//显示帖子文章内容
$sql = "SELECT * FROM POST P,USER U WHERE P.PID='$pid' AND P.UID=U.UID";
$result = mysql_query($sql,$conn) or die(mysql_error());
while ($row = mysql_fetch_array($result)) {
	$title = $row['TITLE'];
	$nickname = $row['NICKNAME'];
	$ptime = $row['PTIME'];
	$content = $row['CONTENT'];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>小红帽-推荐贴</title>
	<link rel="stylesheet" type="text/css" href="css/article.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="js/login.js"></script>	
</head>
<body>

	<div class="back-area">
		<div class="header-nav">
		<?php 
		?>
			<ul class="nav_ul">
				<li><a href="index.php">首页</a></li>
				<li><a href="post.php">推荐</a></li>
				<li><a href="user.php">个人中心</a></li>
			</ul>
		</div>
		<div class="area">
			<div class="inner">
				<div class="p_title"><span><?=$title?></span></div>
				<div class="p_auth">
				<p>作者：<?=$nickname?></p>
				<p>发表时间：<?=$ptime?></p>
				<p><a class="collect" value="<?=$uid?>" rel="<?=$pid?>" href="javascript:" target="_self">[收藏此推荐]</a></p>
				</div>
				<div class="p_con"><?=$content?></div>
			</div>
		</div>
	</div>
</body>
</html>