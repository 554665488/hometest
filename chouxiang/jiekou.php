<?php

/**
 * Created by PhpStorm.
 * User: yfl
 * QQ 554665488
 * Date: 2017/7/2
 * Time: 14:29
 */
//接口是一种更加抽象的类   抽象类是一种特殊的类
//接口和抽象类的作用是一样的
/**
 * 1-在PHP中类是单继承  如果使用抽象类 子类实现了抽象类 就不能去实现其他的抽象类
 * 2- 如果想定义一些规范 又想继承其他的类 就要使用接口
 */

/**
 * 接口和抽象类的对比
 * 1-作用相同  都不能被实例化 都需要子类去继承
 * 2- 接口和抽象类声明时不一样
 * 3-接口和抽象类 不实现的方式不一样
 * 4-接口中的方法必须全部为抽象的方法（没有方法体）不能被abstract 修饰
 * 5-接口中的成员属相 只可以定义常量 不能定义变量
 * 6-接口中的抽象方法必须为public  抽象类中的方法最低为protected
 */
interface jiekou
{
    public function A();

    public function B();

}

interface jiekou2 extends jiekou
{  //如果子类是重写父接口中抽象方法，则使用implements(实现),类--接口，抽象类--接口 使用implements，接口--接口 使用extends(继承)

}

abstract class chouxiang implements jiekou
{   //抽象类实现接口可以只实现接口部分方法   如果一个类可以被实例化 必须实现接口或抽象类的所有方法

}

//多态的表现与应用
interface dongzuo2
{
    public function fun1();

    public function fun2();
}

class class1 implements dongzuo2
{
    public function fun1()
    {
        // TODO: Implement fun1() method.
        echo "class1--fun1";
    }

    public function fun2()
    {
        echo "class1 --fun2";
        // TODO: Implement fun2() method.
    }
}

class class2 implements dongzuo2
{
    public function fun1()
    {
        // TODO: Implement fun1() method.
        echo "class2--fun1";
    }

    public function fun2()
    {
        echo "class2 --fun2";
        // TODO: Implement fun2() method.
    }
}

function donging(dongzuo2 $obj)
{
    if ($obj instanceof dongzuo2) {
        $obj->fun1();
    }
}

$class1 = new class1();
$class2 = new class2();
donging($class1);
echo "<br/>";
donging($class2);

//多态的应用实例 模拟一个USB应用  接口实现了多态 高内聚 低耦合 的思想
interface USB
{
    const TYPE = 'usb';

    //装载
    public function mount();

    //工作
    public function work();

    //卸载
    public function unmount();
}

//U盘类
class Up implements USB
{
    const TYPES = 'usb';   //接口定义的常量不能被覆盖

    //装载
    public function mount()
    {
        echo "装载U盘";
    }

    //工作
    public function work()
    {
        echo "U盘工作";
    }

    //卸载
    public function unmount()
    {
        echo "卸载U盘";
    }
}

//定义鼠标类
class shubiao implements USB
{
    //装载
    public function mount()
    {
        echo "装载鼠标";
    }

    //工作
    public function work()
    {
        echo "鼠标工作";
    }

    //卸载
    public function unmount()
    {
        echo "鼠标U盘";
    }
}

//class shebei{
//    public function doning(USB $workobj){
//          if($workobj instanceof USB){
//              $workobj->mount();
//              $workobj->work();
//              $workobj->unmount();
//          }
//    }
//}
//$shebei=new shebei();
// 定义电脑类
class Computer
{
    public function UseUsb(USB $obj)
    {  //$obj 表示那种设备使用USB 来执行一样的动作不一样的动作内容
        if ($obj instanceof USB) {
            $obj->mount();//装载 优盘 鼠标 键盘 等等使用到USB这个接口
            $obj->work();//优盘 鼠标 键盘使用USB接口装载完成后 工作
            $obj->unmount();//优盘 鼠标 键盘使用USB接口装载完成后 工作完成后卸载
        }
    }
}

//定义一个用户来使用电脑类
class PcUser
{
    //定义一个安装方法
    public function install($obj)
    {  //这里的$obj 表示用电脑的人  要用电脑干什么 比如 插入U盘  鼠标 键盘等等
        //首先拿来一台电脑
        $Computer = new Computer();
        //在拿一个准备要使用的设备 键盘 U盘
//        $nalaiyigeUpan=new Up();
        $Computer->UseUsb($obj); //  插入U盘   把拿来的U盘给电脑 让电脑去执行 安装 工作  卸载
    }
}

//实例化一个电脑用户
$peosonObj = new PcUser();
//电脑用户拿来一个U盘
$upanObj = new Up();
//把U盘给电脑
$peosonObj->install($upanObj);

echo "<br/>";
//电脑用户在拿来一个 鼠标 去使用电脑  电脑调用USB接口
$shubiaoOBj = new shubiao();
$peosonObj->install($shubiaoOBj);
//abstract  class  lifa implements USB {   //一个抽象类可以去实现一个接口
//   abstract public function canshu($a,$b);
//}
abstract class  lifa
{   //一个抽象类可以去实现一个接口  一定要先继承再去实现接口
    abstract public function canshu($a, $b);
}

class chanshuclass extends lifa
{
    public function canshu($a, $b)//继承一个抽象类的时候，子类必须定义父类中的所有抽象方法；另外，这些方法的访问控制必须和父类中一样（或者更为宽松）。此外方法的调用方式必须匹配，即类型和所需参数数量必须一致。
    {
        // TODO: Implement canshu() method.
    }
}

class objArray implements ArrayAccess
{
    private $db;//一个包含数据库访问的对象

    public function offsetExists($name)
    {
        return $this->db->userExists($name);
    }

    public function offsetGet($Uid)
    {
        return $this->db->getUserId($Uid);
    }

    public function offsetSet($name, $id)
    {
        $this->db->setUserId($name, $id);
    }

    public function offsetUnset($name)
    {
        $this->db->removeUser($name);
    }
}

$userMap = new objArray();

//echo $userMap['John'];//实际上，当 $userMap['John'] 查找被执行时，PHP 调用了 offsetGet() 方法，由这个方法再来调用数据库相关的 getUserId() 方法。

class A
{
    private $a = 'aaaaaaaaa';

    public function __construct()
    {
        echo "A";
    }

    protected function test()
    {
        echo "test";
    }
}

class B extends A
{
    public function __construct()
    {
//        $this->a;
        static::test();    //子类重写了该方法
        parent::__construct();
        echo "B";
//        echo new B instanceof A;
    }

    public function test()
    {
        echo "<br>";
        echo "B类的test方法";
    }//如果一个子类(派生类)的方法与父类的方法完全一样时(public，protected)，我们称为方法覆盖或方法重写（override

}

$bObj = new B;
$bObj->test();

//overload 方法的重载  当一个对象调用一个相同的方法，可以根据方法的参数个数的不同 或者参数类型的不同 来区分调用不同的动作
class overload
{
    public function fun1($a)
    {
    }

    public function fun2($a)
    {
        echo '方法重载<br>';
       var_dump($a);

    }

    function __call($name, $arguments)
    {
//        var_dump($arguments);
        if ($name == 'fun') {
            if (count($arguments) == 1) {
                $this->fun1($arguments);
            } else if(count($arguments)==2){
                $this->fun2($arguments);
            }
        }

        // TODO: Implement __call() method.
    }
}
$o=new overload();
$o->fun(1,2);