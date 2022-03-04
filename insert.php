<?php
include_once "conn.php";
$phone_name =$_GET["phone_name"];
$phone_price =$_GET["phone_price"];
$phone_photo =$_GET["phone_photo"];
$result=mysqli_query($conn,"select * from shop where 商品名称='$phone_name'");
$row=mysqli_fetch_array($result);

if(empty($row)){
    $sql="insert into shop(商品名称,商品图片,商品价格,数量,金额) VALUES ('$phone_name','$phone_photo','$phone_price',1,'$phone_price')";
    $res=mysqli_query($conn,$sql);
}else{
    $count=$row[3]+1;
    $price=$count*$phone_price;
    $sql="update shop set 数量='$count' where 商品名称='$phone_name'";
    $sql_1="update shop set 金额='$price' where 商品名称='$phone_name'";
    $res=mysqli_query($conn,$sql);
    $res=mysqli_query($conn,$sql_1);
}
#$res=mysqli_query($conn,$sql);
header("location:shopcart.php");
?>
