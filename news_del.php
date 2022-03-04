<?php
header("content-type:text/html;charset=utf8");
include "conn.php";
if(isset($_GET["id"])){
    $id=$_GET["id"];
    $sql="DELETE FROM shoppingcart WHERE id={$id}";
    if($mysqli->query($sql)){
        echo "<script>
         //alert('删除成功');
         location.href='new_index.php';
    </script> ";
    }else{
        //echo $mysqli->error;
        echo "<script>
         //alert('删除失败');
         location.href='new_index.php';
    </script> ";
    }
}
if(isset($_POST["item"])){
    //var_dump($_POST);
    //var_dump(implode(',',$_POST["item"]));
    $id=implode(',',$_POST["item"]);
    $sql="DELETE FROM shoppingcart WHERE id in ($id)";
    if($mysqli->query($sql)){
        echo "<script>
          alert('删除成功');
         location.href='new_index.php';
    </script> ";
    }else{
        echo "<script>
        alert('删除失败');
         location.href='new_index.php';
    </script> ";
    }
}