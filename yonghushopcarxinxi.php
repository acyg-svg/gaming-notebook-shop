<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>游戏本专卖店后台</title>
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

    <link href="index.css" type="text/css" rel="stylesheet"/>
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
        <a href="loginguangliyuan.php" class="btn btn-default btn-gradient" type="button"><span class="glyphicon glyphicons-log_book"></span> 退出</a>
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
                <li class="active" style="color:rgba(173, 111, 221, 0.69);">货物图片</li>
            </ol>
        </div>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title" style="color:rgba(173, 111, 221, 0.73);">货物图片</div>

                        </div>
                        <form action="news_del.php" method="post">
                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover dataTable">
                                    <tr class="active">


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
                                    include_once "conn.php";
                                    $res=mysqli_query($conn,"select * from shop");
                                    ?>
                                    <center>
                                        <div class="wudashan">
                                            <nav class="nav">
                                                <?php while($row=mysqli_fetch_array($res)){ ?>
                                                    <ul>
                                                        <li>
                                                            <div>
                                                                <a href="#dt"><img src="image/<?=$row[1]?>"><br/>
                                                                    名称：<?php echo "$row[0]" ?><br/>
                                                                    单价：￥<?php echo $row[2] ?><br/>
                                                                    数量：<?php echo $row[3] ?><br/>
                                                                    总价：￥<?php echo $row[4] ?><br/>
                                                                    <a href="yonghuhoutaitingdangl.php?phone_name=<?php echo $row[0]?>&phone_price=<?php echo $row[2]?>" style="text-decoration: none;width: 40px"><input type='button' name='button' value='+' style="font-size: 15px;border: 2.5px solid #ccc; border-radius: 25px;"/></a>&nbsp;&nbsp;
                                                                    <a href="yonghuhoutaitingdangl.php?name=<?php echo $row[0]?>&price=<?php echo $row[2]?>" style="text-decoration: none;width: 40px"><input type='button' name='button' value='-' style="font-size: 15px;border: 2.5px solid #ccc; border-radius: 25px;"/></a>
                                                                    <a href="yonghuhoutaitingdangl.php?phonename=<?php echo $row[0] ?>" style="text-decoration: none;"><input type='button' name='button' value='删除' style="font-size: 15px;border: 2.5px solid #ccc; border-radius: 25px;"/></a><br/><br/><br/>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                <?php } ?>
                                            </nav>
                                            <br/>
                                        </div>
                                    </center>

                                </table>


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