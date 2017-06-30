<?php
class person{
	
	public function say(){
		echo "hellow";
	}
	public function info($add){
		echo 'xiaoming'.$add;
	}
    public function test($year=2012,$month=2,$day=21){
		 echo $year.'--------'.$month.'-----------'.$day."\r\n";
	}
	public function _before_index(){
			echo __FUNCTION__."\r\n";
	}
	public function _after_index(){
			echo __FUNCTION__."\r\n";
	}
	
}
$per=new person;
//$fanse=new ReflectionMethod($per,'say');
//$fanse->invoke($per);
//$fanse2=new ReflectionMethod($per,'info');
//$fanse2->invokeArgs($per,array('haerbin'));
//执行这一个方法
$me=new ReflectionMethod('person','say');
/*$me2=new ReflectionMethod('person','info');//
$me2->invokeArgs($per,array('haerbin'));//调用方法
echo $me2->getNumberOfParameters();//获得方法的参数个数
var_dump($me2->getParameters());//获得参数信息*/
if($me->isPublic()){
  //var_dump($me->isPublic());
  $class=new ReflectionClass('person');
  if($class->hasMethod('_before_index')){
     $beforemethod=$class->getMethod('_before_index');
//     var_dump($beforemethod);//object(ReflectionMethod)#4 (2) { ["name"]=> string(13) "_before_index" ["class"]=> string(6) "person" }
     if($beforemethod->isPublic()){
       //$beforemethod->invoke($per);
     }
  }
  if($class->hasMethod('_after_index')){
    $aftermethod=$class->getMethod('_after_index');
    if($aftermethod->isPublic()){
      //$aftermethod->invoke($per);
    }
  }
}
//执行带参数的方法
$method=new ReflectionMethod('person','test');
$params=$method->getParameters();
foreach ($params as $param){
  $paramName=$param->getName();
 var_dump($_REQUEST);
}
/*$me->invoke($per);
$me2=new ReflectionMethod($per,'info');
$me2->invokeArgs($per,array('shandong'));*/
