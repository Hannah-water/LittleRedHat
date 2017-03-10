<?php include 'conn.php'; ?>
<?php
@session_start();

if(isset($_SESSION['username'])) {
	$uid = $_SESSION['username'];

	if(isset($_POST['commit'])){
		//查找该化妆产品在数据库中是否已有
		$mname = $_POST['mname'];
		$capacity = $_POST['capacity'];
		$prize = $_POST['prize'];
		$sid = $_POST['skin'];
		$sql_check = "SELECT MID,MNAME FROM COSMETIC WHERE MNAME='$mname' AND CAPACITY='$capacity' AND PRIZE='$prize'";
		$result_check = mysql_query($sql_check,$conn) or die(mysql_error());
		$count = mysql_num_rows($result_check);
		if($count==0) {
			//如果数据库中无该化妆产品，则向表COSMETIC插入该化妆品
			$sql_cons = "INSERT INTO COSMETIC(MNAME,CAPACITY,PRIZE,SID) VALUES('$mname','$capacity','$prize','$sid')";
			$result_cons = mysql_query($sql_cons,$conn) or die(mysql_error());
			$mid = mysql_insert_id();
		}
		else {
			//如果已有，获取该化妆品ID
			while ($row = mysql_fetch_array($result_check)) {
				$mid = $row['MID'];
			}
		}
		
		//向表POST中添加推荐贴
		$title = $_POST['title'];
		$content = $_POST['myEditor'];
		preg_match_all('/<img.*?src="(.*?)".*?>/is', $content, $img_src);	//获得content里img的src
		if($img_src[1]==null) {	//如果没有图片
			$title_page_src = "/makeup/image/icon.png";
		}
		else {
			$title_page_src = $img_src[1][0];	//取第一个img的src作为封面
		}
		date_default_timezone_set("Asia/Shanghai");
		$ptime = date("Y-m-d H:i:s",time());
		$sql = "INSERT INTO POST(TITLE,UID,MID,CONTENT,TITLE_PAGE,PTIME) VALUES('$title','$uid','$mid','$content','$title_page_src','$ptime')";
		$result = mysql_query($sql,$conn) or die(mysql_error());
		$pid = mysql_insert_id();
		header("Location:/makeup/article.php?$pid");
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
	<title>小红帽-发布推荐</title>
	<link rel="stylesheet" type="text/css" href="css/post_edit.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="ueditor/ueditor.all.js"></script>
	<script type="text/javascript" src="ueditor/ueditor.all.min.js"></script>
	<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="lang/zh-cn/zh-cn.js"></script>
	<script type="text/javascript" src="js/post_edit.js"></script>
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
				<form method="post" onsubmit="return checkSubmit();">
					<div class="p_title"><span>标题：</span><input type="text" name="title" id="title" maxlength="40"></input></div>
					<div class="p_title">
					<div class="p_mname">
						<span>产品名字：</span><input type="text" name="mname" id="mname" maxlength="20"></input>
					</div>
					<div class="p_makeupmsg">
						<span>容量：</span><input type="text" name="capacity" id="capacity" maxlength="5"><span>ml/g</span></input>
					</div>
					<div class="p_makeupmsg">
						<span>价格：￥</span><input type="text" name="prize" id="prize" maxlength="5"></input>
					</div>
						<div class="p_makeupmsg">
							<span>适合肤质：</span>
							<select name="skin" id="skin">
								<option>不限</option>
								<option value="0">油性</option>
								<option value="1">干性</option>
								<option value="2">混合</option>
								<option value="3">敏感</option>	
							</select>
						</div>
					</div>
					<div class="p_con">
					<span>内容：</span>		
					<script type="text/plain" name="myEditor" id="myEditor" style="height: 300px"></script>
					<script type="text/javascript">  UE.getEditor('myEditor');</script>
					<div class="div_button">
						<input type="submit" name="commit" class="goUp" value="提交"></input>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>