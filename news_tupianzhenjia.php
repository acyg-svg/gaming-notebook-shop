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
    <link href="index.css" type="text/css" rel="stylesheet"/>
  <!-- Core CSS  -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/glyphicons.min.css">

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="css/theme.css">
  <link rel="stylesheet" type="text/css" href="css/pages.css">
  <link rel="stylesheet" type="text/css" href="css/plugins.css">
  <link rel="stylesheet" type="text/css" href="css/responsive.css">


  <!-- Your Custom CSS -->
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  
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
      <a href="loginguangliyuan.php"  class="btn btn-default btn-gradient" type="button"><span class="glyphicons glyphicons-log_book"></span> 退出</a>
  </div>
</header>
<!-- End: Header -->

<!-- Start: Main -->
<div id="main"> 
    <!-- Start: Sidebar -->
  <aside id="sidebar" class="affix">
    <div id="sidebar-search">
    		
    </div>
  <?php include 'lib/menu.php' ?>
  </aside>
  <!-- End: Sidebar -->   

  <!-- Start: Content -->
  <section id="content">
    <div id="topbar" class="affix">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active" style="color:#ad6fdd;">货物图片</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-12">
			<div class="panel">
                <div class="panel-heading">
                  <div class="panel-title" style="color:rgba(173, 111, 221, 0.67);">增加货物图片</div>

                </div>

                <div class="panel-body">
                  <table class="table table-striped table-bordered table-hover dataTable">
                      <tr class="active">
                      </tr>
                      <?php
                      date_default_timezone_set("PRC");
                      if(isset($_POST["submit"])){
                      $mysqli=new mysqli("127.0.0.1","root","root","cart");
                      if($mysqli->connect_error){
                          exit("数据库服务器连接错误：".$mysqli->connect_error);
                      }
                      $mysqli->set_charset("utf8");
                          $conn=mysql_connect('127.0.0.1','root','root');//连接数据库
                          mysql_select_db('cart',$conn);//选择要查询的数据库
                          $sql="select count(*) from tupian";//SQL查询语句
                          if($result=mysql_query($sql,$conn))
                          {
                              $a=mysql_fetch_row($result);
                          }
                          $sql = "INSERT INTO tupian(id,jieshao,phonephoto)
VALUES ($a[0],'$_POST[jieshao]','$_POST[phonephoto]')";
                          //echo $sql;
                          //exit;
                          if($mysqli->query($sql)){
                              echo "<script>
                    alert('添加成功');
                    location.href='xiezitupian.php';
                </script> ";
                          }else{
                              echo "<script>
                    alert('添加失败');
                    location.href='new_index.php';
                </script> ";
                          }
                      }
                      ?>
                      <center>

                          <form action="news_tupianzhenjia.php" method="post" enctype="multipart/form-data">     <!--ENCTYPE="multipart/form-data"用于表单里有图片上传-->
                              <div class="form-group">
                                  <div class="input-group" > <span class="input-group-addon" style="width=200px;color:rgba(173, 111, 221, 0.65);" >商品描述</span>
                                      <input type="text" name="jieshao" value="" class="form-control">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="input-group"> <span class="input-group-addon" style="width=200px;color:#ad6fdd;">商品图片带格式</span>
                                      <input type="text" name="phonephoto" value="" class="form-control">
                                  </div>
                              </div>
                              <input type="hidden" name="max_file_size" value="100000000"/>
                              <table border="0">
                                  <tr>
                                      <th align="right" valign="top" style="color:#ad6fdd;">上传图片到前端：</th>
                                      <td>
                                          <input type="file" name="fl[]" ><br/>   <!--可以将多个变量作为一个变量取得，可以使用"名称[]",这样变量的值就会以数组的形式被赋值-->
                                          <input type="file" name="fl[]" ><br/>
                                          <input type="file" name="fl[]" ><br/>
                                          <input type="file" name="fl[]" ><br/>
                                          <input type="checkbox" name="forbid" value="true"/>不上传同名文件<br/>
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
                              <div class="col-md-7" >
                                  <div class="form-group">
                                      <input type="submit" value="提交" class="submit btn btn-blue">
                                  </div>
                              </div>
                          </form>

                          </center>

                  </table>
                </div>

              </div>
          </div>
        </div>
    </div>
  </section>
  <!-- End: Content --> 
</div>
<!-- End: Main --> 
</body>
</html>
<script>
    function checkAll(cbox_all){
        var cboxes=document.getElementsByName("item[]");
        for(var i=0;i<cboxes.length;i++)
            cboxes[i].checked=true;
    }

    function updateCheck(){
        var cboxes=document.getElementsByName("item[]");
        var counter=0;
        for(var i=0;i<cboxes.length;i++)
            if(cboxes[i].checked==true)
                counter++;
        var cbox_all=document.getElementById("cb_all");
        if(counter==<?php echo $pagesize ?>)
            cbox_all.checked=true;
        else
            cbox_all.checked=false;
    }
</script>