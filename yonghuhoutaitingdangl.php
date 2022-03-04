<?php
include_once "conn.php";
$phone_name =$_GET["phone_name"];
$phone_price =$_GET["phone_price"];
$result=mysqli_query($conn,"select * from shop where 商品名称='$phone_name'");
$row=mysqli_fetch_array($result);

if(!empty($row)){
    $count=$row[3]+1;
    $price=$count*$phone_price;
    $sql="update shop set 数量='$count' where 商品名称='$phone_name'";
    $sql_1="update shop set 金额='$price' where 商品名称='$phone_name'";
    $res=mysqli_query($conn,$sql);
    $res=mysqli_query($conn,$sql_1);
}
#$res=mysqli_query($conn,$sql);
header("location:yonghushopcarxinxi.php");
?>

<?php
include_once "conn.php";
$phonename =$_GET["phonename"];
$sql="delete from shop where 商品名称='$phonename'";
$iphone=mysqli_query($conn,$sql);
header("location:yonghushopcarxinxi.php");
?>

<?php
include_once "conn.php";
$name =$_GET["name"];
$price =$_GET["price"];
$result=mysqli_query($conn,"select * from shop where 商品名称='$name'");
$row=mysqli_fetch_array($result);

if($row[3]==1){
    $sql="delete from shop where 商品名称='$name'";
    $iphone=mysqli_query($conn,$sql);
}else{
    $count=$row[3]-1;
    $totalprice=$count*$price;
    $sql="update shop set 数量='$count' where 商品名称='$name'";
    $sql_1="update shop set 金额='$totalprice' where 商品名称='$name'";
    $res=mysqli_query($conn,$sql);
    $res=mysqli_query($conn,$sql_1);
}
header("location:yonghushopcarxinxi.php");
?>

