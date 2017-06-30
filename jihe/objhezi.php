<?php
class a{
 public $a;

}
class b{}
class c{}
//定义一个类来储存脚本中想要全局的对象
class registey{
	
   public $objarr=array();
   static private $instance=null; 
   //在注册盒子里边添加一个方法作为获得该对象实例的单件
  static function getInstance(){
  
  if(is_object(registey::$instance)){
        return registey::$instance;
     }
     registey::$instance=new registey();
     return registey::$instance;
  }
   //注册对象实例的方法
   public function set($key,$obj){
   	
     $this->objarr[$key]=$obj;
   }
   
   public function get($key){
   
   return $this->objarr[$key];
   }
}
//注册对象到注册容器

$a=new a();
$a->a='one';
$aa=new a();
$aa->a="two";
$b=new b();
$c=new c();
$reg=registey::getInstance();//这里使用单间获得一个对象实例
$reg->set('a',$a);
$reg->set('aa',$aa);
$reg->set('b',$b);
$reg->set('c',$c);


var_dump($reg->objarr);
//exit('ssss');
//获得中央储存器的对象

function f1(){
  $obj=registey::getInstance()->get('a');
  var_dump($obj);
  $obj=registey::getInstance()->get('aa');
  var_dump($obj);

}
//f1($reg);//这里只需要把容器的对象实例传入组件 就实现了多了对象和的全局化
f1();
function f2(){


}
function f3(){


}