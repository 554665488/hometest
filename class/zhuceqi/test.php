<?php
include './zhuceqi.class.php';
class A{
  public $name='test';
  
 
  function get(){
   function fun($v){
  
    echo $v;
   }
  
   $arr=array('q','w','r');
   array_filter($arr,'fun');

  }
  
}
$a=new A();

Registy::set('aa',$a);
Registy::set('aaa',$a);

function f1(){

$obj=Registy::get('aa');
var_dump($obj->get());
}
f1();