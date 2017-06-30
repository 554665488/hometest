<?php

class D{

  public $a;
  static private $b;
  private $c;
  protected $d;
  protected $username;
  function __construct($a) {
  	$this->a=$a;
  	$this->c=$a;
  }
  public function __set($key,$val){//伪造对象的属性
  
   $this->$key=$val;
  }
  public function __get($key){
    
    return $this->$key;
  }
  public function __call($method,$agrs){
    //echo $method.'不存在';
  }
  public function __toString(){
  
  return $this->a ."(".$this->c.")\n";
  }
  
}
echo $d=new D('a');

$d->d='d';
echo $d->d;

$d->name='xiaoming';
echo $d->name;
//echo D::$b;
$d->p();
