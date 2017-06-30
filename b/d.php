<?php
include "./b.php";
//use b;//在公共空间不可以使用use关键字
function getinfo(){

  echo "ok";
}
const NAME='ssdssss';

\getinfo();//访问公共空间的元素
echo "</br>";
echo NAME;
echo "</br>";

echo \b\NAME;