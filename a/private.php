<?php
class perple{
	public $a='a';
	protected $b='b';
	private $c='c';
	static $d='d';
	function __set($key,$val){
	   $this->$key=$val;
	}
	function __get($name){
	  echo $this->$name;
	}
}
echo perple::$d;
$obj=new perple();
echo $obj->a;
echo $obj->b='5555';
