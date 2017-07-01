<?php
class demo{
public function __construct(){
}
 public $a='A';
 function __clone(){
   $this-> a='aaa';
 }
}
$obj= clone new demo();//在克隆对象实例的同时使用__clone方法改变其属性值
//echo $obj->a;

//记住&引用不是指针不是拷贝
$a='a';
$b='b';
$w=5;
$q=&$w;
$w=6;
echo $q;
function f(&$c){//将a变量绑定到变量c---等价于$c=&$a;注意：引用传递只是把$a和$b两个变量同时指向同一个空间 但是本身$a和$b没有联系
 echo $c;//这里如果把&引用符号去掉；理解为直接改变了$c指向的空间的内容；但是如果有引用符号；代表把$c变量绑定到$b空间
$c=&$GLOBALS['b'];//这把$c变量绑定到$b上这时$c指向$b的值：注意：并没有把$a绑定到$b上  因为$a和$c只是指向了额同一个空间并没有直接的关系：：：
//在函数调用范围内   无法将     外边的变量通过引用机制绑定到    第三个变量上
echo $c;
}
f($a);
//echo $a;
$q='q';
$w='w';
$f=&$q;
$f=&$w;//注意一个变量只可以绑定一个变量的空间内容
//echo $f;
class B{
public $b='b';
public function aa(){
} 
}   

$obj=new B();
//echo property_exists($obj,'b');//检查对象或类是否具有该属性

$k='k';

$l=&$k;
unset($l);//在销毁一个变量的引用的时候变量的本身没有发生变化
//echo $k;
echo "</br>";
$r='r';
function P(){
 global $r;//global实质上就是对函数外边变量的一个引用定位等于$k=&$GLOBALS['k']
// echo $r='sss';
}
P();
echo "</br>";
 function H(){
    return $a=1;
}
$obj= H();
//echo $obj;







