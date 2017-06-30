<?php
namespace a\b\c;
const NAME='111111';
include "./b.php";

use b;
class F{
  public $f='f';
  function get(){
  	
    echo $this->f;
    
  }
}
$obj=new b\user();
$obj->getinfo();
echo "</br>";
echo NAME;//现在当前空间查找元素，如果找不到才会到公共空间去找
echo "</br>";
echo b\ME;
