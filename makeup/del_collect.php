<?php include 'conn.php'; ?>
<?php
$pid = $_POST['pid'];
$uid = $_POST['puid'];

if(!isset($pid) || empty($pid)) exit;
if(!isset($uid) || empty($uid)) exit;

$sql = "SELECT * FROM COLLECTION WHERE PID='$pid' AND UID='$uid'";
$result = mysql_query($sql,$conn) or die(mysql_error());
if(mysql_fetch_array($result)) {
	$sql_del = "DELETE FROM COLLECTION WHERE PID='$pid' AND UID='$uid'";
	$result_del = mysql_query($sql_del,$conn) or die(mysql_error());
}

?>