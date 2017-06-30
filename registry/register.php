<?php
class register{

 public $arr=array();
 
 public function set($k,$v){
 
  $this->arr[$k]=$v;
 }
 public function get($k){
   return  $this->arr[$k];
  
 }
}
$reg=new register();//这个对象实例是一个容器吧其他的对象注册到容器里边，在其他地方通过容器调用对象实例

class user{}
class db{
	public $f;
 function a(){}
}
$user=new user();
$db=new db();

$reg->set('db',$db);//把对象注册到容器中（中央容器）
$reg->set('user',$user);

$db=$reg->get('db');
var_dump($db);
//var_dump($reg->arr);




