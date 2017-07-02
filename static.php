<?php
// class A {
//     public static function who() {
//         echo __CLASS__;
//     }
//     public static function test() {
//         // self::who();
//        static::who(); //static 关键字代表调用者本身
//     }
// }
// A::test();
// class B extends A {
//     public static function who() {
//         echo __CLASS__;
//     }
// }
// echo B::test();

class user
{
    private static $count = 0; //记录所有用户的登录情况.

    public function __construct()
    {
        self::$count = self::$count + 1;
    }

    public function getCount()
    {
        return self::$count;
    }

    public function __destruct()
    {
        self::$count = self::$count - 1;
    }
}

$user1 = new user();
$user2 = new user();
$user3 = new user();
echo "now here have " . $user1->getCount() . " user";
echo "<br />";
unset($user3);
echo "now here have " . $user1->getCount() . " user";

class G
{
    public function create1()
    {
        $class = get_class($this);
        var_dump(new static()==new Y);
        return new $class;
    }

    public function create2()
    {
        return new static();  //statuc 是5.3新加的 有点像$this的意思 从堆内存例取出来放的是当前的实例化的那个类
    }
}
class Y extends G{
//    public function create1()
//    {
//        $class = get_class($this);
//        var_dump(new static()==new Y);
//        return new $class;
//    }
}
class K extends G{

}
$y=new Y();
var_dump(get_class($y->create1()));
//var_dump(get_class($y->create2()));
//$k=new K();
//var_dump($k->create1());
//var_dump($k->create2());