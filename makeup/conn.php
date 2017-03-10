<?php 
$hostname = "localhost"; //主机名,可以用IP代替
$database = "makeup"; //数据库名
$username = "root"; //数据库用户名
$password = "121261"; //数据库密码
$conn = mysql_connect($hostname, $username, $password) or trigger_error(mysql_error() , E_USER_ERROR); 
mysql_select_db($database, $conn); 
$db = @mysql_select_db($database, $conn) or die(mysql_error());
?> 
