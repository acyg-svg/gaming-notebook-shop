<?php
header("content-type:text/html;charset=utf-8");
session_start();
exit('<script>
    alert("订单提交完成!返回购物车!");
    location.href="shopcart.php";
    </script>');
?>