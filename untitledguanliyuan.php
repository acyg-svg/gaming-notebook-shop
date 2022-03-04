<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>管理员注册</title>
	<link rel="stylesheet" href="login/login/login1.css" type="text/css">
	<link rel="stylesheet" href="bootstrap.min.css">
	<script type="text/javascript">
		function change(){
			document.getElementById('code').src="code.php?"+Math.random();
		}
	</script>
</head>

<body background="login/forget？/loginguangliyuan.gif">
	<div class="main_login">
		<ul>
			<?php
			date_default_timezone_set("PRC");
			if(isset($_POST["submit"])){
				$mysqli=new mysqli("127.0.0.1","root","root","cart");
				if($mysqli->connect_error){
					exit("数据库服务器连接错误：".$mysqli->connect_error);
				}
				$mysqli->set_charset("utf8");
				$sql="INSERT INTO guanlizhuce(guanliname,password)
VALUES ('$_POST[guanliname]','$_POST[password]')";
				//echo $sql;
				//exit;
				if($_POST['guanliname']==null&&$_POST['password']!=null&&$_POST['password1']!=null){
					exit('<script>
            alert("注册失败！请输入用户名！");
            location.href="untitledguanliyuan.php";
            </script>');
				}
				if($_POST['password']!=$_POST['password1']){
					exit('<script>
            alert("注册失败！输入密码与再次输入密码不相同！");
            location.href="untitledguanliyuan.php";
            </script>');
				}
				if($_POST['guanliname']!=null&&$_POST['password']==null){
					exit('<script>
            alert("注册失败！请输入密码！");
            location.href="untitledguanliyuan.php";
            </script>');
				}
				if($_POST['guanliname']==null&&$_POST['password']==null&&$_POST['password1']==null){
					exit('<script>
            alert("注册失败！请填写信息！");
            location.href="untitledguanliyuan.php";
            </script>');
				}
				if($mysqli->query($sql)){
					echo "<script>
                    alert('注册成功！');
                    location.href='loginguangliyuan.php';
                </script> ";
				}else{
					echo "<script>
                    alert('注册失败！');
                    location.href='untitledguanliyuan.php';
                </script> ";
				}
			}
			?>
			<form action="untitledguanliyuan.php" method="post">
			<li></li></br></br>
				<div class="form-group">
					<label for="">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp管理员用户名</label>
					<input type="text" name="guanliname" class="main_logo_input_1">
				</div>
				<div class="form-group">
					<label for="">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp密码</label>
					<input type="password" name="password" class="main_logo_input_1">
				</div>
				<div class="form-group">
					<label for="">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp确认密码</label>
					<input type="password" name="password1" class="main_logo_input_1">
				</div>
				<input type="submit" name="submit" value='注册' class="btn btn-danger" style="width:170px">
			</form>
			<form action="loginguangliyuan.php" method="post">
			<input type="submit" name="submit" value='返回登录' class="btn btn-danger" style="width:170px;margin-top: 15px;">
			</form>
		</ul>
		<div class="litwo"></div>
	</div>
</body>
</html>
