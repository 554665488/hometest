<?php
$arr=array('a'=>'A','b'=>'B','c'=>'C');
array_map('tolower',$arr);
function tolower($v){
    echo $v;
}