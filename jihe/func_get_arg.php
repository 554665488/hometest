<?php
function F(){
$num=func_num_args();
if($num>=2){
    var_dump(func_get_arg(0));
  }
  $arr=func_get_args();
  for($i=0;$i<$num;$i++){

    echo $arr[$i].'----';
  }
  return $arr;//使用函数的引用返回函数必须要使用返回return.
}
$a=  F(8);//

//$e=&$g='5';
//$e=&define('AAA','aaa');引用赋值只可以是变量
class W{
 static public $a='a';
 public $s='s';
 function get(){
   echo self::$a;
   echo $this->s;
 }
 
 static function post(){//静态的方法不能操作非静态变量

 }
}
$w=new W();
$w->get();
W::post();