
<?php
header("content-type:text/html;charset=utf-8");
include_once "conn.php";
$res=mysqli_query($conn,"select * from shoppingcart");

?>


<?php
include_once "conn.php";
$mysql="select * from tupian";
$rest=mysqli_query($conn,$mysql);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>游戏本专卖店</title>
    <link href="index1.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<center>
    <div class="w1">
        <li><a href="index1.php" style="color: #dedede">首页</a></li>
        <li><a href="xiezitupian.php" style="color: #dedede">笔记本电脑信息</a></li>
        <li><a href="shopcart.php" style="color: #dedede">用户购物车</a></li>

    </div>
<div class="allwid">
<div class="wudashan">
    <nav class="nav">
<?php
while($row=mysqli_fetch_array($rest)) {
    ?>
    <ul>
    <li>
        <a href="#dt"><img src="image/<?=$row[1]?>"><br/><?php echo $row[2]?><br/><br/>
    </li>
    </ul>
    <?php
}
?>
    </nav>
</div>
</div>

<hr id="footerhr">
<div class="footline">
</div>
</center>
<body>
</html>




