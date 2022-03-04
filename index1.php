<?php
header("content-type:text/html;charset=utf-8");
include_once "conn.php";
$res=mysqli_query($conn,"select * from shoppingcart");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>游戏本专卖店</title>
<link href="index.css" type="text/css" rel="stylesheet"/>
<script src="jquery-3.2.1.min.js"></script>
<script>
$(document).ready(function(){
    var len=$("#num>li").length;
    var MyTime=null;
    var index=0;
    //console.log(len);
    $("#num li").mouseover(function(){
        index = $("#num li").index(this);
		showimg(index);
    });
    
   function autoplay(){      
        MyTime=setInterval(function(){
                showimg(index);
                index++;
                if(index==len){index=0;}
        },2000); 
   }
   autoplay();
    
    $(".slide").hover(function(){
			if(MyTime){
			clearInterval(MyTime);
			}
		},function(){
			MyTime=setInterval(function(){
				showimg(index);
				index++;
				if(index==len){index=0;}
			},2000);				
	}); 	
	
    
    function showimg(i){
        //stop(stopAll,goToEnd),第一个参数是否停止被选元素的所有加入队列的动画，第二个参数是否允许完成当前的动画
        $("#slide").stop().animate({top: -400*i},800);
        $("#num li").eq(i).addClass("on").siblings().removeClass("on");//eq(index)获取第N个元素
       /*stopAll 为false时，不停止被选元素所有加入队列的动画,仅停止当前的动画。stopAll为true时，停止所有加入队列的动画（如goToend为true，直接跳到当前动画的最终效果）。
       goToend为false时，不允许直接跳到当前动画的最终效果(应该就是所谓的完成当前的动画吧)，goToend为true时，允许直接跳到完成当前动画的最终末尾效果
       */
		}
});
</script>
</head>
<body>
<center>
	<div>
  <header>
    <div class="bline">
      <ul>
          <li style="width: 1200px;height: 32px;font-size: 30px;font-family: '华文宋体';"></li>
        <li ><a href="login.php" target="_self">登录</a></li>
      </ul>
    </div>
    <hr>
	  <div class="w1">
        <li><a href="index1.php" style="font-size:large;color:#dedede;">首页</a></li>
        <li><a href="xiezitupian.php" style="font-size: large;color: #dedede">笔记本电脑内容</a></li>
          <li><a href="shopcart.php" style="font-size: large;color: #dedede">购物车</a></li>

      </div>
  </header>
  <div class="allwid">
    <div class="line2">

      <div class="slide">

          <ul id="slide">
            <li><a href=""><img src="main img/99.jpg"></a></li>
            <li><a href=""><img src="main img/2.jpg"></a></li>
            <li><a href=""><img src="main img/3.jpg"></a></li>
            <li><a href=""><img src="main img/4.jpg"></a></li>
            <li><a href=""><img src="main img/5.jpg"></a></li>
          </ul>

		  <ul id="num">
            <li class="on"></li>
            <li class="on"></li>
            <li class="on"></li>
	        <li class="on"></li>
	        <li class="on"></li>
          </ul>

      </div>
    </div>
    <div class="wudashan">
      <nav class="nav">
          <?php while($row=mysqli_fetch_array($res)){ ?>
        <ul>
          <li>
            <div>
                <a href="#dt"><img src="image/<?=$row[1]?>"><?php echo $row[2]?><br/>
                    ￥<?php echo $row[3]?><br/>
                    <a href='insert.php?phone_photo=<?php echo $row[1]?>&phone_name=<?php echo $row[2]?>&phone_price=<?php echo $row[3]?>'>
                        <input type='button' name='button' value='添加'  style="font-size: 18px;border: 2.5px solid #23c2fa; border-radius: 25px; color: #00FFFF"/>
                    </a>
                </a>
            </div>
          </li>
        </ul>
          <?php } ?>
      </nav>
      <br/>

	<div id="gototop" style="position:fixed; bottom:80px; right:80px;border-radius: 50px;"><a href="#top"><img src="main img/TOP.jp" width="50px" height="50px" alt="返回顶部"></a></div>
    </div>
    <hr id="footerhr">
      <br><br><br>
    <div class="footline">
        <p></p><br>
        <p></p>
        <br/>
    </div>
  </div>
	</div>
	<br><br><br>
</center>
</body>
</html>