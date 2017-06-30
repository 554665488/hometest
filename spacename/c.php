<?php
/**
 * Created by PhpStorm.
 * User: 554665488
 * Date: 2016/8/27
 * Time: 11:36
 */
//当前的文件没有空间
function f1(){
    echo '我是当前空间的方法发f1';
    echo __NAMESPACE__;
};
include 'd.php';//引入的空间对当前的空间没有影响
const NAME='殷凡良';
echo NAME;
echo "</br>";
echo \shandong\yanggu\NAME;
echo "</br>";
f1();//引入的空间对当前的空间没有影响 默认实在当前的公共空间查找元素  找不到在公共空间，就会报错
