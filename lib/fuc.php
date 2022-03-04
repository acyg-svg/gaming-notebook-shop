<?php
/**
 * @param $host
 * @param $username
 * @param $password
 * @param $dbName
 * @return bool|mysqli
 */
//连接数据库服务器
function mysqlInit($host,$username,$password,$dbName){
    $con=mysqli_connect($host,$username,$password);
    if(!$con){
        return false;
    }
    mysqli_select_db($con,'db_database18');
    //设置字符集
    mysqli_set_charset($con,'utf8');
    return $con;
}


