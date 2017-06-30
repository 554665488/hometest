<?php

// Get instance of DBConnection获得一个类的接口
$db =DBConnection::getInstance();
// Set user property on object设置一user属性值给这个特殊对象
$db->user = 'sa------';
// Set second variable (which points to the same instance)设置一个变量让他指向同一个接口
$second =DBConnection::getInstance();
// Should print 'sa'
echo $second->user;
Class DBConnection {
    public $user;
    //定义一个单间用来返回当前类的本身对象
    static function &getInstance(){//当你想用函数的引用绑定到某一个变量上时。当引用返回时。这里使用&表示函数是引用返回而不是通常的拷贝对象实例.这样可以节省内存等资源的开销
    	//引用赋值时只可以是变量不可以是常量或者表达式（$a=5）;
    	//普通的调用方法是本质上是把函数返回值拷贝到某一个变量上
      static $obj;//静态方法只可以操作静态变量
      if(is_object($obj)){
        return $obj;
      }
      $obj=new DBConnection();//new 关键词本事就是变量的引用
      return $obj;
    }
   /* static function &getInstance() {
        static $me;
        if (is_object($me) == true) {
            return $me;
        }
        $me = new DBConnection;
        return $me;                //函数的引用被绑定到某一个变量上时。就需要在函数的调用和定义的时候都要加&
    }*/
    function connect() {
        echo __FUNCTION__;
    }
    function query() {
       echo "sss";
    }
}
//假如想在一个方法内使用一个类
function getobj(){
   $db=DBConnection::getInstance();//这里使用&表示吧$db是作为引用的绑定，而不是通常的赋值
   var_dump($db->connect());
}
getobj();