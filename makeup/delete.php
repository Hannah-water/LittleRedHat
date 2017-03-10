<?php include 'conn.php'; ?>
<?php
$pid = $_GET['id'];
$sql = "DELETE FROM POST WHERE PID='$pid'";
$result = mysql_query($sql,$conn) or die(mysql_error());
header("Location:/makeup/user_publication.php");
?>