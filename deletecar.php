<?php
include_once "conn.php";
$phone_name =$_GET["phone_name"];
$sql="delete from shop where 商品名称='$phone_name'";
$iphone=mysqli_query($conn,$sql);
header("location:shopcart.php");
?>
