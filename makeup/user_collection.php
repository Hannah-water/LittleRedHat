<?php include 'conn.php'; ?>
<?php
@session_start();

$uid = $_SESSION['username'];

?>
<?php
$sql_num = "SELECT COUNT(*) FROM COLLECTION WHERE UID='$uid'";
$result_num = mysql_query($sql_num,$conn) or die(mysql_error());
while ($row_num = mysql_fetch_array($result_num)) {
	$postnum = $row_num['COUNT(*)'];
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
	<link rel="stylesheet" type="text/css" href="css/user_post.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="js/delete.js"></script>

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
							<a href="user_newpwd.php">> 修改密码</a>
						</li>
						<li>
							<a href="user_publication.php">> 我发布的推荐</a>
						</li>
						<li>
							<a href="">> 我收藏的推荐</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="area-right">
				<div class="rightHead">
					<span>我收藏的推荐</span><hr/>
				</div>
				<div class="rightCon">
					<div class="rightConR">
						<h4 style="float: left;">我共收藏 <?=$postnum?> 条推荐</h4>
						<a href="post.php" style="float: right;">>>去看看推荐>></a>						
					</div>
					<div class="rightConD">
					<?php
					//$sql_pub = "SELECT * FROM POST P WHERE PID=ANY(SELECT PID FROM COLLECTION WHERE UID='$uid')";
					$sql_pub = "SELECT P.UID,C.CTIME,P.PID,P.TITLE,P.CONTENT FROM POST P,COLLECTION C WHERE P.PID=C.PID AND C.UID='$uid' ORDER BY CTIME DESC";
					$result_pub = mysql_query($sql_pub,$conn) or die(mysql_error());
					while ($row_pub = mysql_fetch_array($result_pub)) {
						echo '<div class="postCon"><div class="posttit">';
						echo '作者ID：'.$row_pub['UID'];
						echo '&nbsp&nbsp&nbsp&nbsp收藏时间：'.$row_pub['CTIME'].'</div>';
						echo '<a style="float:right;" href="delete.php?id='.$row_pub['PID'].'">删除</a>';
						echo '<a target="_blank" style="float:right; margin-right:20px;" href="article.php?'.$row_pub['PID'].'">查看</a>';
						echo '<div class="postc"><h4>标题：'.$row_pub['TITLE'].'</h4>';
						echo '<p>内容：'.mb_substr(strip_tags($row_pub['CONTENT']),0,28,'utf-8').'..</p>';
						echo "</div></div>";
					}
					?>
					
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>


