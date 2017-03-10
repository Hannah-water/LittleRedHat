<?php include 'conn.php'; ?>
<?php
    session_start();
    session_destroy();
		header("refresh:3;url=/makeup/index.php");
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<div>退出成功！3秒后跳转至首页</div>
</body>
</html>