<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>编辑</title>
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


    <link href="index.css" type="text/css" rel="stylesheet"/>
  <!-- Core Javascript - via CDN --> 
  <script type="text/javascript" src="js/jquery.min.js"></script> 

</head>

<body>
<!-- Start: Header -->
<header class="navbar navbar-fixed-top" style="background-image: none; background-color: rgb(240, 240, 240);">
  <div class="pull-left"> <a class="navbar-brand" href="#">
    <div class="navbar-logo"><img src="images/logo.png" alt="logo"></div>
    </a> </div>
  <div class="pull-right header-btns">
    <a class="user"><span class="glyphicons glyphicon-user"></span> admin</a>
    <a href="loginguangliyuan.php" class="btn btn-default btn-gradient" type="button" id="login"><span></span> 退出</a>
  </div>
</header>
<!-- End: Header -->

<!-- Start: Main -->
<div id="main"> 
    <!-- Start: Sidebar -->
  <aside id="sidebar" class="affix">
    <div id="sidebar-search">
        
    </div>

  </aside>
  <!-- End: Sidebar -->    
  <!-- Start: Content -->
  <section id="content">
    <div id="topbar" class="affix">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">更改货物信息</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-10 col-lg-11 center-column">
            <?php
            include "conn.php";
            if(isset($_POST["phonephoto"])){
                $phonephoto=$_POST["phonephoto"];
                $jieshao=$_POST["jieshao"];
                $id=$_POST["id"];
                $sql="UPDATE tupian SET phonephoto='{$phonephoto}',jieshao='{$jieshao}' WHERE id={$id}";
                if($mysqli->query($sql)){
                    exit("<script>
                    alert('更新成功！');
                    location.href='xinxi.php';
                     </script>");
                }else{
                    exit("<script>
                    alert('更新失败！');
                    location.href='xinxi.php';
                    </script>");
                }
            }else{
                $id=$_GET["id"];
                $sql="SELECT * FROM tupian WHERE id={$id}";
                $res=$mysqli->query($sql);
                $row=$res->fetch_assoc();
            }
            ?>
        <form action="xinxiedit.php?action=update" method="post" class="cmxform" enctype="multipart/form-data">
        	<div class="panel">
            <div class="panel-heading">
              <div class="panel-title">更改货物信息</div>
              <div class="panel-btns pull-right margin-left">
              <a href="xinxi.php" class="btn btn-default btn-gradient dropdown-toggle" id="login"><span class="glyphicon glyphicon-chevron-left">返回</span></a>
            	  </div>
            </div>
            <div class="panel-body">
            	  <div class="col-md-7">
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">商品描述</span>
                    <input type="text" name="jieshao" value="<?php echo $row['jieshao'] ?>" class="form-control">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                  </div>
                </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">商品图片带格式</span>
                              <input type="text" name="phonephoto" value="<?php echo $row['phonephoto'] ?>" class="form-control">
                              <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                          </div>
                      </div>
                </div>

                <div class="col-md-7">
	                <div class="form-group">
	                  <input type="submit" value="提交" class="submit btn btn-blue" id="login">
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