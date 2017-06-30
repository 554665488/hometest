<?php

function f($str) {
        echo $str."<br>";
}
 
register_shutdown_function("f","hello");

class ClassDemo {
        public function __construct() {
            register_shutdown_function(array($this, "f"),"world");
        }
 
        public function f($str) {
            echo "f():".$str;
        }
    }
    
    
 function error($info){
 	echo "</br>";
 	echo "tishi".'---'.$info;
 	echo "</br>";
 }
 register_shutdown_function("error",'faile');//注册的方法在脚本执行完成执行
   $demo = new ClassDemo();
   echo "before </br>";   
?>