<?php
/**
 * Created by PhpStorm.
 * User: yfl
 * QQ 554665488
 * Date: 2017/7/2
 * Time: 1:48
 */
header('Content-Type:text/html; charset=utf-8;');
//创建一个抽象类，只要在 class 前面加上 abstract 就是抽象类了
//  //抽象类不能够被实例化，就是创建对象
//  //只在类里面有一个抽象方法，那么这个类必须是抽象类，类前面必须加上 abstract
abstract class Per    //  abstract  提取，分离  抽象的，理论上的; 难解的; 抽象派的;
{
    public $name = '联想';
    protected $baohu = '我是受保护的属相';
    static $jingtai = '我是静态的属性';
    const SHE = '我是抽象类的常量';

    abstract protected function run();

    public function run2()
    {
        echo '我是抽象类的普通方法';
    }
}

class child extends Per
{
    //抽象类的抽象方法，子类必须重写，不然会报错。
    //抽象类里的普通方法不需要重写，子类会直接继承下来
    public function run()
    {
        echo "我是抽象父类必须实现的方法";
    }

    public function getPshuxing()
    {
        echo $this->baohu;
    }
}

$c = new child();
$c->getPshuxing();
echo child::SHE;
/*   * 到底应该用抽象类还是接口呢   * 如果你要继承多个接口的方法规范，那么就用接口好了。   * 如果你要共享一个方法体内容，那么就用抽象类。   * */

//创建一个接口  //接口也不能被实例化  //接口是为了规范实现它的子类，以达到统一的目的。也可以共享数据
interface lianjie
{  //interface  连接; [计算机]使联系;  界面; <计>接口; 交界面; 相互作用
// public $a='adsas';   //接口内不可以定义普通类的属性
    const SHR = '我是接口的常量';   //成员字段必须是常量
    //接口里的所有方法都是抽象方法，不能够写方法体
    //并且接口的抽象方法不需要写 abstract
    //接口定义的方法必须为 public权限
    public function run();

    public function Wtype();
}

interface lianjie2
{
    public function run();
}

////子类继承接口的说法，叫做实现，接口可以多实现
class NoteComputer implements lianjie, lianjie2
{  // implements  实现( implement的第三人称单数 ); 执行; 贯彻; 使生效;
    public function run()
    {
        echo "我是实现接口的方法run";
    }

    public function Wtype()
    {
        echo "我是实现接口的方法Wtype";
    }
}

$n = new NoteComputer();
$n->run();
$n->Wtype();
//什么叫做多态，字面意思，多种形态
//  //一个动作由不同的人去执行，而产生不同的效果或者效果，即为多态。
//  //一个人通过不同的状态去执行同一种动作，形成不同的效果，也可以称作为多态。
//  //园丁    剪    修理花草
//  //理发师  剪    理发
//  //总裁    剪    裁员
//  //人   笔记本   运行 win7开机了
//  //人   台式机   运行 xp开机了
//  //创建一个接口，来规范运行的方法
interface  dongzuo
{
    public function who();

    public function jian();
}

//创建一个理发师类实现接口的行为
class lifashi implements dongzuo
{
    public function who()
    {
        echo '理发师-李';
    }

    public function jian()
    {
        echo "理发师-李 剪头发";
    }
}

//创建一个总裁类实现接口的方法
class zhongcai implements dongzuo
{
    public function who()
    {
        echo "总裁--张";
    }

    public function jian()
    {
        echo "总裁 -张 裁剪人";
    }
}

class person
{
    public function zhixing($typeObj)
    {
        echo $typeObj->who() . $typeObj->jian();
    }
}

$lifashiObj = new lifashi();
$zongcaiObj = new zhongcai();
$per = new person();
echo '<br>';
$per->zhixing($lifashiObj);
echo '<br>';
$per->zhixing($zongcaiObj);