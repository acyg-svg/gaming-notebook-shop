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


  <!-- Your Custom CSS -->
  <link rel="stylesheet" type="text/css" href="css/custom.css">


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
    <a class="user"><span class="glyphicons glyphicon-user"></span>admin</a>
      <a href="loginguangliyuan2.php"   class="btn btn-default btn-gradient" type="button"><span class="glyphicons glyphicons-log_book"></span>  退出</a>
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
        <li class="active" style="color:rgba(166, 106, 211, 0.62)">货物信息</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-12">
			<div class="panel">
                <div class="panel-heading">
                  <div class="panel-title" style="color:rgba(173, 111, 221, 0.6);">货物列表</div>
                  <a href="news_add.php" class="btn btn-info btn-gradient pull-right"><span class="glyphicons glyphicon-plus"></span> 添加新品</a>
                </div>
                <form action="news_del.php" method="post">
                <div class="panel-body">
                  <table class="table table-striped table-bordered table-hover dataTable">
                      <tr class="active" style="color:rgba(168, 107, 215, 0.55);">
                        <th class="text-center">
                         <!-- <input type="checkbox" class="btn btn-gray btn-sm" id="cb_all" onclick="checkAll(this)" />-->
                            <span  class="btn btn-gray btn-sm" id="cb_all" onclick="checkAll(this)" style="color:rgba(168, 107, 215, 0.52);">全选</span>
                        </th>
                        <th>商品图片</th>
                        <th>商品名字</th>
                          <th>价格</th>
                        <th width="200">商品操作</th>
                      </tr>
                    <?php
                    /*
                    $mysqli=new mysqli("127.0.0.1","root","root","news");
                    if($mysqli->connect_error){
                      exit("连接错误：".$mysqli->connect_error);}
                    $mysqli->set_charset("utf8");
                    $sql="SELECT * FROM news_info";
                    $res=$mysqli->query($sql);//mysqli_result 对象
                    while($row=$res->fetch_assoc()){
                    */
                    include  'conn.php';
                    $sql="SELECT * FROM shoppingcart";
                    $res=$mysqli->query($sql);
                    $totalrecords=$res->num_rows; //总记录条数
                    $pagesize=5; //每页条数
                    $pagecount=ceil($totalrecords/$pagesize);//总页数
                    $page=isset($_GET["page"])?$_GET["page"]:1;//当前页码
                    $sql="SELECT * FROM shoppingcart ORDER BY id DESC LIMIT ".($page-1)*$pagesize.",".$pagesize;
                    $res=$mysqli->query($sql);
                    while($row=$res->fetch_assoc()){
                    ?>
                     <tr class="success">
                        <td class="text-center"><input type="checkbox" value="<?php echo $row['id']  ?>" name="item[]" onclick="updateCheck()" class="cbox"></td>
                        <td><?php echo $row["phonephoto"] ?></td>
                         <td><?php echo $row["phonename"] ?></td>
                         <td><?php echo $row["phoneprice"] ?></td>
                         <td>
		                      <div class="btn-group">
                                  <a href="news_edit.php?id=<?php echo $row['id']  ?>" class="btn btn-default btn-gradient" ><span class="glyphicons glyphicon-pencil"></span></a>
		                        <a onclick="return confirm('确定要删除吗？');" href="news_del.php?id=<?php echo $row['id']  ?>" class="btn btn-default btn-gradient dropdown-toggle" ><span class="glyphicons glyphicon-trash"></span></a>
		                      </div></td>
                     </tr>
                    <?php
                     }
                    $res->close();
                    $mysqli->close();
                    ?>
                  </table>
                  <div class="pull-left">
                    <button type="submit" class="btn btn-default btn-gradient pull-right delall" ><span class="glyphicons glyphicon-trash">批量删除</span></button>
                  </div>
                  
                  <div class="pull-right">
                    <ul class="pagination" id="paginator">
                    <?php
                     echo "<li><a href='new_index.php?page=1'>&lt;&lt;</a></li>";
                     echo  "<li><a href='new_index.php?page=" .($page==1?1:($page-1))."'>&lt;</a></li>";
                     echo "<li><a href='new_index.php?page=1'>1</a></li>";
                     if($pagecount>=2){
                       echo "<li><a href='new_index.php?page=2'>2</a></li>";
                     }
                      if($pagecount>=3){
                        echo "<li><a href='new_index.php?page=3'>3</a></li>";
                      }
                      echo "<li><a href='new_index.php?page=" .($page==$pagecount?$pagecount:($page+1))."'>&gt;</a></li>";
                      echo "<li><a href='new_index.php?page=" .$pagecount."'>&gt;&gt;</a></li>";
                    ?>
                    </ul>
                  </div>
                </div>
                </form>
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