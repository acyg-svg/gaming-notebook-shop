<?php
include_once "conn.php";
$sql="delete from shop";
$iphone=mysqli_query($conn,$sql);
header("location:shopcart.php");
?>
