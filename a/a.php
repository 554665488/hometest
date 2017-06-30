<?php
namespace a\b\c;
use b\user;
class F{
  public $f='f';
  function get(){
    echo $this->f;
  }
}
namespace s\d\f;
class F{
  private $f='g';
  function get(){
    echo $this->f;
  }
}
//在当前空间引入上一个空间
use a\b\c\F as BF;

//限定名称访问空间元素
$obj=new F();
 echo $obj->get();
$obj2=new BF();
echo $obj2->f;
/*class a extends \user\user{
	
}*/
/*$a=new \b\user();
$a->getinfo();*/