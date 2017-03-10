<?php include 'conn.php'; ?>
<?php
@session_start();

$uid = $_SESSION['username'];
$sql = "SELECT * FROM USER WHERE UID='$uid'";
$result = mysql_query($sql,$conn) or die(mysql_error());
$sums = mysql_num_fields($result);
while ($row = mysql_fetch_array($result)) {
	$nickname = $row['NICKNAME'];
	$skin = $row['SID'];
	$gender = $row['GENDER'];
}

?>
<?php
if(isset($_POST['commit'])){
	//修改用户资料
	$nickname = htmlspecialchars($_POST['nickname']);
	$gender = $_POST['gender'];
	$skin = $_POST['skin'];
	$sql_user = "UPDATE USER SET NICKNAME='$nickname',GENDER='$gender',SID='$skin' WHERE UID='$uid'";
	$result_user = mysql_query($sql_user,$conn) or die(mysql_error()); 
	
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
	<script type="text/javascript" src="js/year_month_day.js"></script>

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
						<a href="">> 修改资料</a>
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
				<span>修改资料</span><hr/>
			</div>
			<div class="rightCon">
				<form method="post">
					<div class="rightConL"><img src="/makeup/image/icon.png"></div>
					<div class="rightConR">
						<table>
							<tr>
								<td class="info_title">基础资料</td>
							</tr>
							<tr>
								<td class="info">用户名：</td>
								<td class="info_con"><?php echo $_SESSION['username']; ?></td>
							</tr>
							<tr>
								<td class="info">昵称：</td>
								<td><input type="text" class="info_con t_input" name="nickname" id="nickname" value="<?=$nickname?>"></input></td>
							</tr>
							<tr>
								<td class="info">性别：</td>
								<td>
									<select name="gender" id="gender">
										<option value="女" <?php if($gender=='女') echo "selected"; ?>>女</option>
										<option value="男" <?php if($gender=='男') echo "selected"; ?>>男</option>
										<option value="保密" <?php if($gender=='保密') echo "selected"; ?>>保密</option>	
									</select>
								</td>
							</tr>
							<!-- 
							<tr>
								<td class="info">生日：</td>
								<td>
									<select name="year" id="selYear"></select> -
									<select name="month" id="selMonth"></select> -
									<select name="day" id="selDay"></select>
								</td>
							</tr>
							 -->
							<tr>
								<td class="info">肤质：</td>
								<td>
									<select name="skin" id="skin">
										<option value="0" <?php if($skin=='0') echo "selected"; ?>>油性</option>
										<option value="1" <?php if($skin=='1') echo "selected"; ?>>干性</option>
										<option value="2" <?php if($skin=='2') echo "selected"; ?>>混合</option>
										<option value="3" <?php if($skin=='3') echo "selected"; ?>>敏感</option>	
									</select>
								</td>
							</tr>
						</table>
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


