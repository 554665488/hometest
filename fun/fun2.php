<?php
include './fun1.php';
class P{
  function __call($method,$args){
    echo $method;
    echo "</br>";
    var_dump($args);
  
  }
}
$p=new P();
$p->f('殷凡良');