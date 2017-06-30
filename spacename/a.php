<?php
/**
 * Created by PhpStorm.
 * User: 554665488
 * Date: 2016/8/27
 * Time: 11:07
 */
//当前的文件有空间
namespace shandong\yanggu;
function f1(){
    echo __NAMESPACE__;
};
include 'b.php';//引入的空间对当前的空间没有影响
//const NAME='殷凡良';
f1();//
//\f1();访问公共空间的元素
echo NAME;//默认是访问当前空间的元素  找不到在到公共空间去找的空间去找
echo "</br>";
echo \NAME;
