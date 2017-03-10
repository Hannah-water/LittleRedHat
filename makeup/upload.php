<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>小红帽-个人中心</title>
	<link rel="stylesheet" type="text/css" href="css/user.css">
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

					<input type="file" id="file1" name="file1" value="选择图片"></input>
					<input type="hidden" id="x" name="x" value="0"></input>
					<input type="hidden" id="y" name="y" value="0"></input>
					<input type="hidden" id="w" name="w" value="0"></input>
					<input type="hidden" id="h" name="h" value="0"></input>
					<input type="hidden" id="imgsrc" name="imgsrc"></input>
					<input type="button" value="上传头像" id="btnSubmit"></input>
					<canvas id="myavatar" width="200" height="200"></canvas>
<?php
$str = '<div class="rightConL"><img src="/makeup/image/1n.png"><img src="/makeup/image/ic2n.png"></div>';
preg_match_all('/<img.*?src="(.*?)".*?>/is', $str, $result);
if($result[1]==null) {
	echo "/makeup/image/icon.png";
}
else {
	echo $result[1][0];
}
?>
<!-- 
<script type="text/javascript">
var canvas = document.getElementById('myavatar');
var context = canvas.getContext('2d');
var imageObj = new Image();

imageObj.onload = function() {
  // draw cropped image
  var sourceX = 60;
  var sourceY =  0;
  var sourceWidth = 180;
  var sourceHeight = 180;
  var destWidth = sourceWidth;
  var destHeight = sourceHeight;
  var destX = canvas.width / 2 - destWidth / 2;
  var destY = canvas.height / 2 - destHeight / 2;
  context.drawImage(imageObj, sourceX, sourceY, sourceWidth, sourceHeight, destX, destY, destWidth, destHeight);
};
imageObj.src = 'image/index.jpg';
</script> -->
			</div>
		</div>
	</div>
	</div>
</body>
</html>