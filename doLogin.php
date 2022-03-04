<?php
header("content-type:text/html;charset=utf-8");
include_once "conn.php";
$username=$_POST['username'];
$password=$_POST['password'];
$res=mysqli_query($conn,"SELECT 用户名,密码 FROM yonghuzhuce WHERE 用户名='$username' AND 密码='$password'");
$row=mysqli_fetch_array($res);

//var_dump($_POST);
error_reporting(0);
session_start();

$act=$_GET["act"];
switch($act){
    case 'login':
        if($_POST['checkcode']!=$_SESSION['checkcode']){
            exit('<script>
            alert("验证码错误");
            location.href="login.php";
            </script>');
    }
            if ($username == $row['用户名'] && $password == $row['密码']) {
                $_SESSION['username'] = $username;
                $_SESSION['islogin'] = 1;
                exit('<script>
            alert("登录成功！欢迎您！");
            location.href="index2.php";
            </script>');
            } else {
                exit('<script>
            alert("登录失败");
            location.href="login.php";
            </script>');
            }

    break;
    case 'logout':
        $_SESSION=[];//清空成空数组
        //销毁cookie的数据
        if(ini_get('session.use_cookies')){
            $params=session_get_cookie_params();
            setcookie(session_name(),'',time()-1,$params['path'],$params['domain']);
        }
        header("location:login.php");
        session_destroy();

        break;
}