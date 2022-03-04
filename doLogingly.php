<?php
header("content-type:text/html;charset=utf-8");
include_once "conn.php";
$guanliname=$_POST['username'];
$passwords=$_POST['password'];
$res=mysqli_query($conn,"select guanliname,password from guanlizhuce WHERE guanliname='$guanliname' AND password='$passwords'");
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
            location.href="loginguangliyuan.php";
            </script>');
    }
        if($guanliname==$row['guanliname']&&$passwords==$row['password']){
            $_SESSION['guanliname']=$guanliname;
            $_SESSION['islogin']=1;
            exit('<script>
            alert("登录成功！欢迎您！管理员 ");
            location.href="new_index.php";
            </script>');
        }else{
            exit('<script>
            alert("登录失败");
            location.href="loginguangliyuan2.php";
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
        header("location:loginguangliyuan.php");
        session_destroy();

        break;
}