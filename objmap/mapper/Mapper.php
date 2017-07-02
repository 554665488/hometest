<?php
namespace objmap\mapper;

use objmap\base\AppException;
use objmap\base\ApplicationRegistry;
use objmap\domian\DomainObject;
use objmap\domian\ObjectWatcher;

/**
 * Created by PhpStorm.
 * User: yfl
 * QQ 554665488
 * Date: 2017/7/2
 * Time: 20:26
 */
abstract class Mapper
{   //抽象基类
    static $PDO;  //操作数据库的pdo对象

    function __construct()
    {
        if (!isset(self::$PDO)) {
            $dns = ApplicationRegistry::getDSN();
            if (is_null($dns)) {
                throw new AppException('no dns');
            }
            self::$PDO = new \PDO($dns);
            self::$PDO->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
    }

    //数据映射器基础上新增的方法一下会简称新增 这里的作用是获取对象而不是查询数据库并创建重复的对象
    private function getForMap($id)
    {
        return ObjectWatcher::exists($this->targetClass(),$id);
    }
    //新增 这里的作用是讲创建的对象保存起来
    private function addToMap(DomainObject $domainObject){
        return ObjectWatcher::add($domainObject);
    }
    //这里不是直接创建对象
    //需要在子类中要实现的抽象方法
    abstract function targetClass();
}