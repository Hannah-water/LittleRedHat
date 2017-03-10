<?php include 'conn.php'; ?>
<?php
$pid = $_POST['pid'];
$uid = $_POST['puid'];

if(!isset($pid) || empty($pid)) exit;
if(!isset($uid) || empty($uid)) exit;

$sql = "SELECT * FROM COLLECTION WHERE PID='$pid' AND UID='$uid'";
$result = mysql_query($sql,$conn) or die(mysql_error());
if(!mysql_fetch_array($result)) {
	date_default_timezone_set("Asia/Shanghai");
	$ctime = date("Y-m-d H:i:s",time());
	$sql_in = "INSERT INTO COLLECTION(PID,UID,CTIME) VALUES('$pid','$uid','$ctime')";
	$result_in = mysql_query($sql_in,$conn) or die(mysql_error());
}
else {
	echo "收藏过了";
}

?>