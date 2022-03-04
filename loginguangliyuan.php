<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>管理员登录</title>
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
	  <li></li></br></br>
		<form action="doLogingly.php?act=login" method="post">
			<div class="form-group">
				<label for="">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp管理员用户名</label>
				<input type="text" name="username" class="main_logo_input_1">
			</div>
			<div class="form-group">
				<label for="">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp密码</label>
				<input type="password" name="password" class="main_logo_input_1">
			</div>
			<div class="form-group">
				<label for="">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp验证码</label>
				<input type="text" name="checkcode" class="main_logo_input_1">
				<img src="code.php" id="code" onclick="change()"/>
				<span onclick="change()">&nbsp&nbsp&nbsp换一张！！！</span>
			</div>
			<input type="submit" value='登录' class="btn btn-danger" style="width:170px">
		</form>
		<div class="lione"></div>
		<li class="litwo">&nbsp&nbsp<a href="untitledguanliyuan.php"><button style="color: #0a192e">注册管理员账号</button></a></li>
		<li class="lithree"></li>
	</ul>
		<div class="litwo"></div>

	</div>


</body>
</html>
