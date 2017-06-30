<?php

$a='aaaaaa';
function add(&$a){
  
  $a='A';
}
add($a);
echo $GLOBALS['a'];

var_dump($GLOBALS);