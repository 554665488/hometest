<?php
namespace objmap\domian;
    /**
     * Created by PhpStorm.
     * User: yfl
     * QQ 554665488
     * Date: 2017/7/2
     * Time: 19:02
     */
    /**
     * PHP面向对象之标识映射
     * 标识映射在数据映射器的基础上增加了标识映射类，主要功能是保存已经创建好的对象，在需要的时候可以直接获取而不是重复创建造成系统性能的下降。
     */
//在数据映射器基础上还增加了部分调用标识映射类的方法，示例代码如下： Watcher 观看的人，观察的人;
//标识映射类
class ObjectWatcher
{
    private $all = array();//存放对象的小仓库
    private static $instance; //单例

    private function __construct()
    {
    }

    static function instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    //获取一个唯一的标识这里采用领域类雷鸣+ID的方式创建一个唯一的标识避免多个数据表调用这里类出现重复ID的问题
    public function globaKey(DomainObject $domainObject)
    {
        $key = get_class($domainObject) . "." . $domainObject->getId();
        return $key;
    }

    //添加对象
    static public function add(DomainObject $obj)
    {
        $ins = self::instance();//获得单例实例
        $ins->all[$ins->globaKey($obj)] = $obj;
    }

    //获取对象
    static public function exists($classname, $id)
    {
        $ins = self::instance();
        $key = "$classname.$id";
        if (isset($ins->all[$key])) {
            return $ins->all[$key];
        }
        return null;
    }
}