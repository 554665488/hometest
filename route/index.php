<?php
header("Content-Type:text/html;charset=utf8-8");
//设置错误级别
error_reporting(E_ALL^E_NOTICE);
include './config.php';
include './mysql.php';
$db=new sixtar_db($config);
//数据库对象
//安全操作类
//多线程网络协议设计
//认证
//路由
//2.加入聊天室（聊天室列表）