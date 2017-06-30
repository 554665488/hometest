<?php
/*class A{

  public $testA='1';
}
$a=new A();
$b=$a;
//echo $b->testA='2';
class B{

}
$c=new B();
$a=$c;//这里把B类的标识符传递给了变量a  所以变量a的标识符变成的B类的标识符，a变量就指向了b变量
var_dump($a);//object(B)#2 (0) { } 
echo "</br>";
var_dump($b);
echo "</br>";
var_dump($c);//在php中对象的传递不是引用传递，而是对象标识符的传递*/
class A{}
$a=new A();
$b=$a;//这里是class  A的标识符拷贝给了$b所以$b可以通过拷贝过来的表示符来代表class A

class B{}

$c=new B();
$a=$c;//这里把$c所代表class B的标识符给了$a，就是改变了原来$a的标识符，并没有改变$b的标识符。所以$b还是指向class A
var_dump($a);
var_dump($b);
echo "</br>";

//php中对象的传递不是引用传递若果是引用传递例：
class F{}
$f=new F();
$h=&$f;//这里使用的是引用传递；也就是说吧$h绑定到了$f所指向的class F的标识符

class K{}
$k=new K();
$f=$k;//这里把class k的标识符拷贝给了$f；；；；所以这样在改变 $k的同时也把$h的表示改变了。因为$f和$h是指向同一个标识符所在的空间
var_dump($f);
var_dump($h);














