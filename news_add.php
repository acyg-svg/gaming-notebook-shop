<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>CMS内容管理系统</title>
  <meta name="keywords" content="Admin">
  <meta name="description" content="Admin">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Core CSS  -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/glyphicons.min.css">

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="css/theme.css">
  <link rel="stylesheet" type="text/css" href="css/pages.css">
  <link rel="stylesheet" type="text/css" href="css/plugins.css">
  <link rel="stylesheet" type="text/css" href="css/responsive.css">

  <!-- Boxed-Layout CSS -->
  <link rel="stylesheet" type="text/css" href="css/boxed.css">

    <link href="index.css" type="text/css" rel="stylesheet"/>
  <!-- Core Javascript - via CDN --> 
  <script type="text/javascript" src="js/jquery.min.js"></script> 

</head>

<body>
<!-- Start: Header -->
<header class="navbar navbar-fixed-top" style="background-image: none; background-color: rgb(240, 240, 240);">
  <div class="pull-left"> <a class="navbar-brand" href="#">
    <div class="navbar-logo"><img src="images/未标题-5.jpg" alt="logo"></div>
    </a> </div>
  <div class="pull-right header-btns">
    <a class="user"><span class="glyphicons glyphicon-user"></span> admin</a>
    <a href="login.html" class="btn btn-default btn-gradient" type="button"><span class="glyphicon glyphicons-log_book"></span> 退出</a>
  </div>
</header>
<!-- End: Header -->

<!-- Start: Main -->
<div id="main">
  <section id="content">

    <div class="container">

	 <div class="row">
        <div class="col-md-10 col-lg-11 center-column">
           <?php
           date_default_timezone_set("PRC");
           if(isset($_POST["submit"])){
               $mysqli=new mysqli("127.0.0.1","root","root","cart");
               if($mysqli->connect_error){
                   exit("数据库服务器连接错误：".$mysqli->connect_error);
               }
               $mysqli->set_charset("utf8");


               //if(empty($row)){
                  // $sql="insert into shoppingcart(id) VALUES (1)";
                  // $res=mysqli_query($conn,$sql);
              // }elseif(!empty($row)){
                 //  $num=$row[0]+1;
                 //  $sql="update shopping set id='$num' where phone_name='$phonename'";
                 //  $res=mysqli_query($conn,$sql);
              // }

               $postTime=date("Y-m-d");
              $conn=mysql_connect('127.0.0.1','root','root');//连接数据库
              mysql_select_db('cart',$conn);//选择要查询的数据库
              $sql="select count(*) from shoppingcart";//SQL查询语句
              if($result=mysql_query($sql,$conn))
              {
                 $aaa=mysql_fetch_row($result);
               }
               $sql = "INSERT INTO shoppingcart(id,phonephoto,phonename,phoneprice,postTime)
VALUES ($aaa[0],'$_POST[phonephoto]','$_POST[phonename]','$_POST[phoneprice]','$postTime')";
               //echo $sql;
               //exit;
               if($mysqli->query($sql)){
                   echo "<script>
                    alert('添加成功');
                    location.href='new_index.php';
                </script> ";
               }else{
                   echo "<script>
                    alert('添加失败');
                    location.href='new_index.php';
                </script> ";
              }
           }
            ?>
        <form action="news_add.php" method="post" class="cmxform" enctype="multipart/form-data">
        	<div class="panel">
            <div class="panel-heading">
              <div class="panel-title">添加货物</div>
              <div class="panel-btns pull-right margin-left">
              <a href="new_index.php" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left">返回</span></a>
            	  </div>
            </div>
            <div class="panel-body">
            	  <div class="col-md-7">
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">商品图片</span>
                    <input type="text" name="phonephoto" class="form-control">
                  </div>
                </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon" style="width=200px;">商品名字</span>
                              <input type="text" name="phonename" value="" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">商品价格</span>
                              <input type="text" name="phoneprice" value="" class="form-control">
                          </div>
                      </div>
                </div>
                <?php echo "\n" ?>
                     <!--ENCTYPE="multipart/form-data"用于表单里有图片上传-->
                    <input type="hidden" name="max_file_size" value="100000000"/>
                    <table border="0">
                        <tr>
                            <th align="right" valign="top">上传图片(命名成商品名字)：</th><?php echo "\n"?>
                            <td>
                                <input type="file" name="fl[]" ><br/>
                            </td>
                        </tr>
                    </table>

                <meta charset="utf-8">
                <table border='1' width="350" style="border-collapse: collapse;">

                    <?php
                    error_reporting(E_ALL ^ E_NOTICE);
                    $path='./image/';//上传的地址
                    $num=0;
                    //求出文件个数，一个一个处理
                    for ($i=0; $i < sizeof($_FILES['fl']['name']); $i++) {
                        $name = mb_convert_encoding($_FILES['fl']['name'][$i],'GB2312','UTF-8');  //将文件的文字码进行转换
                        //$name=$_FILES['fl']['name'][$i];
                        if($_FILES['fl']['name'][$i] == ''){
                            continue;
                        }//文件为空时，跳到下一个文件
                        if(file_exists($path.$name) == TRUE&&$_POST['forbid'] == 'true'){
                            $num++;
                        }elseif (!is_uploaded_file($_FILES['fl']['tmp_name'][$i])) {
                            $num++;
                        }else{
                            ?>
                            <tr>
                                <td align="right"><?php print($_FILES['fl']['name'][$i]);?></td>
                                <td align="right"><?php print($_FILES['fl']['size'][$i]);?>byte</td>
                                <td align="right"><?php print($_FILES['fl']['type'][$i]);?></td>
                            </tr>
                            <?php
                            move_uploaded_file($_FILES['fl']['tmp_name'][$i],$path.$name);
                        }
                    }
                    if($num>0){
                        print('<div style="color:red">'.$num.'因同名文件上传失败</div>');
                    }
                    ?>
                </table>
                <div class="col-md-7">
	                <div class="form-group">
	                  <input type="submit" name="submit" value="提交" class="submit btn btn-blue" >
	                </div>
                </div>
            </div>
          </div>
          </form>
        </div>
    </div>


  </section>
  <!-- End: Content --> 
</div>

</body>

</html>