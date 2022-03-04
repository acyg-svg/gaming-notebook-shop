<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>用户登录</title>
	<link rel="stylesheet" href="login/login/login1.css" type="text/css">
	<link rel="stylesheet" href="bootstrap.min.css">
	<script type="text/javascript">
		function change(){
			document.getElementById('code').src="code.php?"+Math.random();
		}
	</script>
</head>

<body background="login/login/loginbackground.gif">

	<div class="main_login">

	<ul>
	  <li></li></br></br>
		<form action="doLogin.php?act=login" method="post">
			<div class="form-group">
				<label for="">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp用户名</label>
				<input type="text" name="username" class="main_logo_input_1">
			</div>
			<div class="form-group">
				<label for="">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp密码</label>
				<input type="password" name="password" class="main_logo_input_1">
			</div>
			<div class="form-group">
				<label for="">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp验证码</label>
				<input type="text" name="checkcode" class="main_logo_input_1">
				<img src="code.php" id="code" onclick="change()"/>
				<span onclick="change()">&nbsp&nbsp&nbsp&nbsp&nbsp换一张！！！</span>
			</div>
			<input type="submit" value='登录' class="btn btn-danger" style="width:170px;" >
		</form>
		<form action="loginguangliyuan2.php" method="post">
		<input type="submit" value='管理员登录' class="btn btn-danger" style="width:170px;margin-top: 15px;">
		</form>
		<div class="lione"></div>
		<li class="litwo"><a href="untitled1.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>立即注册</button></a></li>
		<li class="lithree"></li>
	</ul>
		<div class="litwo"></div>

	</div>


</body>
</html>
