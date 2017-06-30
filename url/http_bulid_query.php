<?php
/**
 * Created by PhpStorm.
 * User: 554665488
 * Date: 2016/8/27
 * Time: 20:58
 */
//http_build_query
/**
 * http_build_query — 生成 URL-encode 之后的请求字符串
 * 使用给出的关联（或下标）数组生成一个经过 URL-encode 的请求字符串。
 */
$arr=array(
    'name'=>'yfl',
    'sex'=>'男',
    'age'=>'25'
);
echo http_build_query($arr);//name=yfl&sex=%E7%94%B7&age=25
echo "</br>";
$data=array('a','b','c','g'=>'G');
echo http_build_query($data,'key_');//key_0=a&key_1=b&key_2=c&g=G第二个参数只会 对数字键起作用