<?php
/*$a='a';
function f(){
 global $a;
echo $a;
}
f();*/
//第一个类
class B{
 static function getinstance(){
   static $me;
   $me=new self();
   return $me;
 
 }
} 
//第二个类
class A{
	static function getinstance(){//只有变量的引用应该通过引用返回   使用单间来解决函数传参的问题
	  static $obj;//使用单间无法再一个类中全局化多个对象。除非你在这个类中引入所有的单间（也就是把所有的对象实例引入到一个类中。这样做会的把所有的的堆栈引入到一个类）
	 
	 /*$obj2=new A();
	   $obj1=new B(); 
	   $arr=array($obj1,$obj2); */                   //单间只可以实例化一个类
	   $obj=new self;
	   $obj2=new self;
	   return $obj;
	}
    public function f(){
        
        return $s='ss';
        $obj1=new B(); 
        var_dump($obj1);
   }
}

function d($me){//类的对象实例不用传递到函数 本质上类就是全局的
$obj=A::getinstance();//使用单间的好吃就是不需要明确一个传递一个对象而是简单地使用getinstance 方法获得这个对象实例
$obj=B::getinstance();
 var_dump($obj);
}
function n(){

}



