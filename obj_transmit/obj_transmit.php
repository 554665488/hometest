<?php
/**
 * Created by PhpStorm.
 * User: 554665488
 * Date: 2016/8/30
 * Time: 7:24
 * 对象的传递不是引用传递（误区） 而是对象的标识符传递
 */
class A{}
$a=new A();
$b=$a; //这里不是引用传递 只是把对象a的标识符拷贝了一份给了b  所以变量$b是通过标识符来访问class A
var_dump($a);//object(A)#1 (0) { }
var_dump($b);//object(A)#1 (0) { }
class C{}
$c=new C();
echo "<hr>";
$a=$c;//这里把$a的标识符改变为$c的变量附 所以  a  和  c 是通过两个一样的标识符指向  class C
var_dump($a);//object(C)#2 (0) { }
echo "<hr>";
echo  "使用对象的引用传递";
$aa=new A();
$bb=&$aa;//此时是变量的引用传递 bb 和 aa  两个变量是通过一个标识符指向 class A
$cc=new C();
$aa=$cc;//此时把aa的标识符改变成cc的标识符  同时bb的标识符也改变成了 cc的标识符  所以  aa  bb  cc  同时指向了  class  C
echo "<hr>";
var_dump($aa);//object(C)#4 (0) { }
echo "<hr>";
var_dump($bb);//object(C)#4 (0) { }
echo "<hr>";
var_dump($cc);//object(C)#4 (0) { }