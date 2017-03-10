<?php include 'conn.php'; ?>
<?php
@session_start();
if(isset($_SESSION['username'])) {

	$uid = $_SESSION['username'];
	$sql = "SELECT * FROM USER WHERE UID='$uid'";
	$result = mysql_query($sql,$conn) or die(mysql_error());
	while ($row = mysql_fetch_array($result)) {
		$nickname = $row['NICKNAME'];
		$gender = $row['GENDER'];
		if($row['SID']==NULL) {
			$skin = "";
		}
		else {
			$sql_skin = "SELECT SNAME FROM SKIN WHERE SID=".$row['SID'];
			$result_skin = mysql_query($sql_skin,$conn) or die(mysql_error());
			while ($row_skin = mysql_fetch_array($result_skin)) {
				$skin = $row_skin['SNAME'];
			}
		}
		
	}
}
else {
	header("Location:/makeup/login.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>小红帽-个人中心</title>
	<link rel="stylesheet" type="text/css" href="css/user.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
</head>
<body>
<div class="back-area">
<div class="header-nav">
			<ul class="nav_ul">
					<li><a href="index.php">首页</a></li>
					<li><a href="post.php">推荐</a></li>
					<li><a href="user.php" class="nav_on">个人中心</a></li>
					<li><a href="post_edit.php">发布推荐</a></li>
			</ul>
		</div>
	<div class="area">
	
	<div class="area-head"><span>个人中心</span></div>
		<div class="area-left">
			<div class="allMenu">
				<ul>
					<li>
						<a href="">> 我的资料</a>
					</li>
					<li>
						<a href="user_edit.php">> 修改资料</a>
					</li>
					<li>
						<a href="user_newpwd.php">> 修改密码</a>
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
				<span>我的资料</span><hr/>
			</div>
			<div class="rightCon">
					<div class="rightConL"><img src="/makeup/image/icon.png"></div>

					<div class="rightConR">
					<span style="float: left;">欢迎你，<?=$nickname?>！</span>
					<a href="exit.php" style="float: right;">退出</a>
					<table>
						<tr>
							<td class="info_title">基础资料</td>
						</tr>
						<tr>
							<td class="info">用户名：</td>
							<td class="info_con"><?=$uid ?></td>
						</tr>
						<tr>
							<td class="info">昵称：</td>
							<td class="info_con"><?=$nickname ?></td>
						</tr>
						<tr>
							<td class="info">性别：</td>
							<td class="info_con"><?=$gender ?></td>
						</tr>
						<!-- 
						<tr>
							<td class="info">生日：</td>
						</tr>
						 -->
						<tr>
							<td class="info">肤质：</td>
							<td class="info_con"><?=$skin ?></td>
						</tr>
					</table>
					</div>
			</div>
		</div>
	</div>
	</div>
</body>
</html>