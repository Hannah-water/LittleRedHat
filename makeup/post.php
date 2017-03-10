<?php include 'conn.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>小红帽-推荐</title>
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/post.css">
	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
</head>
<body>
	<div class="back-area">
		<div class="header-nav">
			<ul class="nav_ul">
				<li><a href="index.php">首页</a></li>
				<li><a href="post.php" class="nav_on">推荐</a></li>
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
			<div class="area_search">
			<form method="post" name="searchPost" id="searchPost" action="">
					<div class="p_makeupmsg">
						<span>容量：</span>
						<select name="capacity" id="capacity">
							<option value="-1">不限</option>
							<option value="0-100">0-100</option>
							<option value="101-200">101-200</option>
							<option value="201-300">201-300</option>
							<option value="301-400">301-400</option>
							<option value="401-500">401-500</option>
							<option value="500">500以上</option>	
						</select>
						<span>ml/g</span></input>
					</div>
					<div class="p_makeupmsg">
						<span>价格：￥</span>
						<select name="prize" id="prize">
							<option value="-1">不限</option>
							<option value="0-100">0-100</option>
							<option value="101-200">101-200</option>
							<option value="201-300">201-300</option>
							<option value="301-400">301-400</option>
							<option value="401-500">401-500</option>
							<option value="500">500以上</option>	
						</select>
					</div>
					<div class="p_makeupmsg">
						<span>适合肤质：</span>
						<select name="skin" id="skin">
							<option value="-1">不限</option>
							<option value="0">油性</option>
							<option value="1">干性</option>
							<option value="2">混合</option>
							<option value="3">敏感</option>	
						</select>
					</div>
					<input type="text" name="searchKey" id="searchKey" class="searchbox" placeholder="请输入关键字(标题/内容)"></input>
					<input type="submit" name="search" value="搜索" class="searchbtn"></input>
				</form>

			</div>

		<?php
		if(isset($_POST['search'])) {
			//搜索功能
			$searchkey = $_POST['searchKey'];
			$capacity = $_POST['capacity'];
			$prize = $_POST['prize'];
			$sid = $_POST['skin'];

			$sql_search = "SELECT P.PID,P.UID,P.TITLE,P.CONTENT,P.TITLE_PAGE,U.NICKNAME FROM POST P,USER U,COSMETIC C WHERE P.UID=U.UID AND P.MID=C.MID";
			//如果关键词不为空
			if($searchkey!=null) {
				$sql_search = $sql_search." AND (TITLE LIKE '%$searchkey%' OR CONTENT LIKE '%$searchkey%')";
			}
			//如果适用肤质不为不限
			if($sid!=-1) {
				$sql_search = $sql_search." AND C.SID='$sid'";
			}
			//如果容量不为不限
			if($capacity!=-1) {
				$capacity_low = substr($capacity, 0, 3);
				$capacity_high = substr($capacity, 4);
				if($capacity==500) {
					$sql_search = $sql_search." AND CAPACITY>=500";
				}
				else if(substr($capacity, -3, 3)==100) {
					$sql_search = $sql_search." AND CAPACITY<=100";
				}
				else {
					$sql_search = $sql_search." AND (CAPACITY>=$capacity_low AND CAPACITY<=$capacity_high)";
				}
			}
			//如果价格不为不限
			if($prize!=-1) {
				$prize_low = substr($prize, 0, 3);
				$prize_high = substr($prize, 4);
				if($prize==500) {
					$sql_search = $sql_search." AND PRIZE>=500";
				}
				else if(substr($prize, -3, 3)==100) {
					$sql_search = $sql_search." AND PRIZE<=100";
				}
				else {
					$sql_search = $sql_search." AND (PRIZE>=$prize_low AND PRIZE<=$prize_high)";
				}
			}

			$sql_search = $sql_search." ORDER BY P.PTIME DESC";
			$result_search = mysql_query($sql_search,$conn) or die(mysql_error());
			$num = mysql_num_rows($result_search);
			echo '<div><span>共'.$num.'条结果</span></div>';
			while ($row_search = mysql_fetch_array($result_search)) {
				?>

				<div class="area_post">
					<a href="article.php?<?=$row_search['PID']?>" target="_blank">
						<div class="a_pic"><img src="<?=$row_search['TITLE_PAGE']?>"></div>
						<div class="a_con">
							<div class="a_text"><span class="a_title"><?=$row_search['TITLE']?></span>
								<div class="a_auth">作者：<?=$row_search['NICKNAME']?></div>
								<p><?=mb_substr(strip_tags($row_search['CONTENT']),0,28,'utf-8')?>..</p></div>
							</div>
						</a>
					</div>

					<?php
			}
		}
		else {
			//全部帖子展示
			$sql = "SELECT * FROM POST P,USER U WHERE P.UID=U.UID ORDER BY PTIME DESC";
			$result = mysql_query($sql,$conn) or die(mysql_error());
			$num = mysql_num_rows($result);
			echo '<div><span>共'.$num.'条结果</span></div>';
			while ($row = mysql_fetch_array($result)) {
				?>

				<div class="area_post">
					<a href="article.php?<?=$row['PID']?>" target="_blank">
						<div class="a_pic"><img src="<?=$row['TITLE_PAGE']?>"></div>
						<div class="a_con">
							<div class="a_text"><span class="a_title"><?=$row['TITLE']?></span>
								<div class="a_auth">作者：<?=$row['NICKNAME']?></div>
								<p><?=mb_substr(strip_tags($row['CONTENT']),0,28,'utf-8')?>..</p></div>
							</div>
						</a>
					</div>

					<?php

				}
			}
		?>
		</div>
	</div>
</body>
</html>
