<?php
/**
 * Created by PhpStorm.
 * User: 554665488
 * Date: 2016/8/29
 * Time: 19:31
 */
$str="5554584.png445.jpg";
 var_dump(pathinfo($str)['extension']);
$arr=explode('.',$str);
echo end($arr);//end 返回数组最后一个元素
exit;
echo substr($str,strrpos($str,'.')+1);
exit;
echo $a=strrchr($str,'.');
echo substr($a,'1');
exit;

var_dump($arr);
echo array_pop($arr);//返回删除数组的最后一个部分