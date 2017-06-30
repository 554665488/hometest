<?php
namespace shandong\liaocheng\yanggu;
class M{
    public function f1(){
        echo __METHOD__;
    }
}
namespace heilongjiang\haerbin\nangang;
class M{
    public function f1(){
       echo __METHOD__;
    }
}
use shandong\liaocheng\yanggu\M as mm;
$now=new M();//默认访问时当前空间的元素
$now->f1();
echo "</br>";
$use=new mm();//如果引入的空间类元素与当前的空间的类元素冲突 使用as别名访问引入的类元素
$use->f1();