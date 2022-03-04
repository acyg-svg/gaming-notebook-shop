
<?php
header("content-type:text/html;charset=utf-8");
include_once "conn.php";
$res=mysqli_query($conn,"select * from shoppingcart");

?>


<?php
include_once "conn.php";
$mysql="select * from shop";
$rest=mysqli_query($conn,$mysql);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>游戏本专卖店</title>
    <link href="index.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<center>
    <p class="w1" style="color: #dedede">购物车</p>
<div class="allwid">
<div class="wudashan">
    <nav class="nav">
<?php
while($row=mysqli_fetch_array($rest)) {
    ?>
    <ul>
    <li>
        <a href="#dt"><img src="image/<?=$row[1]?>"><br/>
        商品名称：<?php echo "$row[0]" ?><br/>
        销售价格：￥<?php echo $row[2] ?><br/>
        购买数量：<?php echo $row[3] ?><br/>
        应付价钱：￥<?php echo $row[4] ?><br/>
        <a href="add.php?phone_name=<?php echo $row[0]?>&phone_price=<?php echo $row[2]?>" style="text-decoration: none;width: 40px;color: #00FFFF;font-family: 幼圆">增加数量：<input type='button' name='button' value='+' style="font-size: 20px;border: 6px solid #0aceff; border-radius: 30px;"/></a><br/>
        <a href="minus.php?phone_name=<?php echo $row[0]?>&phone_price=<?php echo $row[2]?>" style="text-decoration: none;width: 40px;color: #00FFFF;font-family: 幼圆">减少数量：<input type='button' name='button' value='-' style="font-size: 20px;border: 8px solid #0aceff; border-radius: 30px;"/></a><br/>
        <a href="deletecar.php?phone_name=<?php echo $row[0] ?>" style="text-decoration: none;"><input type='button' name='button' value='删除' style="font-size: 20px;border: 2.5px solid #23c2fa; border-radius: 30px; color: #00FFFF"/></a>
        </a>
    </li>
    </ul>
    <?php
}
?>
    </nav>
</div>
</div>

<hr id="footerhr">

<?php
$conn=mysql_connect('127.0.0.1','root','root');//连接数据库
mysql_select_db('cart',$conn);//选择要查询的数据库
$sql="select sum(金额) from shop";//SQL查询语句
if($result=mysql_query($sql,$conn))
{
    $aaa=mysql_fetch_row($result);
     //输出表里面总记录数
}
echo "<p style='font-size: 30px; color: red'>总金额:￥$aaa[0]</p>";
?>

<div class="footline">
    <a href=clearcar.php><input type='button' name='button' value='清空所有' style="font-size: 25px;border: 2.5px solid #23c2fa; border-radius: 30px; color: #00FFFF"></a>
    <a href=tinggouwancheng.php><input type='button' name='button' value='确定购买' style="font-size: 25px;border: 2.5px solid #23c2fa; border-radius: 30px; color: #00FFFF" ></a>
    <a href='index1.php'><input type='button' name='button' value='返回首页' style="font-size: 25px;border: 2.5px solid #23c2fa; border-radius: 30px; color: #00FFFF"/></a>
</div>
</center>
<body>
</html>




