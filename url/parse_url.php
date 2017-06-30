<?php
/**
 * Created by PhpStorm.
 * User: 554665488
 * Date: 2016/8/27
 * Time: 18:02
 */
$arr=parse_url('http://www.test.com/url/parse_url.php?name="殷凡良"&age=25');
//array(4) {
// ["scheme"]=> string(4) "http"
// ["host"]=> string(12) "www.test.com"
// ["path"]=> string(18) "/url/parse_url.php"
// ["query"]=> string(16) "name="殷凡良"" }
var_dump($arr);
if(isset($arr['query'])){//qarse_str//将URL？后边的部分的查询字符串转化为变量
    //parse_str($arr['query'],$arr);
    parse_str($arr['query']);//$arr['query']=   name="殷凡良"&age=25
    echo $age;
    echo $name;
    //echo $name;
    //var_dump($arr);
    //list($scheme,$host,$path,$query)=array('1','2','3','4');//list语言结构必须是索引数组
    //echo $scheme;
}