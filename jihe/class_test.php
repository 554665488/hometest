<?php

class person{
  public $height;
  public $width;
  static $sing;
  static $header;
  static function getInstance(){
  	static $obj;
 //当第一次获得单件类的对象的时候  通过一个静态变量来保存对象实例  当第二次获得对象实例的时候就把静态变量的实例返回；
// 使用静态变量返回确保只有一个对象实例
  	if(is_object($obj)){
 //使用单件和好处就是在函数内部全局对象的时候 不用明确传递一个参数只需要调用类中的静态方法即可获得对象实例
// （这个对象是一个特殊的对象在组件中使用会返回和上一个对象一样的实例拥有相同的属性）
  	  return $obj;
  	}
       $obj=new person();
       return $obj;
  }

}
$p1=new person();
$p1->height='180';

$p1=new person;
echo $p1->height;

$obj1=person::getInstance();//单间是一个特殊的对象  只能实例化一次单间只有一个对象实例对这个对象实例的操作都会保存到一个对象实例中
$obj1->height='190';

//var_dump($obj1);


$obj2=person::getInstance();
//var_dump($obj2);
$obj2->height;
$obj2->width='300';
var_dump($obj2);
$obj3=person::getInstance();
var_dump($obj3);















