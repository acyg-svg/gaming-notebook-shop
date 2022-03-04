<?php
$conn=mysqli_connect("127.0.0.1","root","root") or die("数据库连接失败".mysqli_error());
mysqli_select_db($conn,"cart") or die("数据库打开失败".mysqli_error());
mysqli_query($conn,"set names utf8");
?>


<?php
date_default_timezone_set("PRC");
$mysqli=new mysqli("127.0.0.1","root","root","cart");
if($mysqli->connect_error){
    exit("连接错误：".$mysqli->connect_error);}
$mysqli->set_charset("utf8");
?>