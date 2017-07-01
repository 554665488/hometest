<?php

//注册器读写类
class Registy
{
    /*
     * registy实例
     * @var object
     *
     */
    static private $instance; // 静态变量用来储蓄当前类的对象
    public $error;
    public $objArr = array();

    /**
     * 取得Registry实例
     * @note 单件模式
     * return object
     */
    static public function getInstance()
    {

        if (is_object(Registy::$instance)) { //静态变量在调用的类的时候被初始化 并保存了当前类的对象

            return Registy::$instance;

        }
        return Registy::$instance = new Registy();
    }

    /**
     * 保存一项内容到注册表中
     *  $name 索引
     *  $value 数据
     *  return void
     */
    static public function set($name, $value)
    {


        if (!self::getInstance()->isRegistered($name)) {


            self::getInstance()->objArr[$name] = $value;


        } else {
            self::getInstance()->error = '已经存在';
            self::getInstance()->isHandel();
        }
    }

    /**
     * 获得注册表中的值
     * $name 键值
     */
    static public function get($name)
    {

        $instance = self::getInstance();
        if (self::getInstance()->isRegistered($name)) {
            return $instance->objArr[$name];
        } else {

            $instance->error = '不存在';
            $instance->isHandel();
        }
    }

    /**
     * 注册异常处理
     *
     */
    public function isHandel()
    {

        die($this->error);
    }

    /**
     * 检查索引是否存在
     * $name 键值
     */
    public function isRegistered($name)
    {

        $instance = self::getInstance();

        if (empty(self::getInstance()->objArr)) return false;
        return @$instance->objArr[$name] ? true : false;

    }

    /**
     * 删除注册表中的指定项
     * $name 键值
     */

    static public function delRegistered($name)
    {
        $instance = self::getInstance();

        if ($instance->isRegistered($name)) {
            $obj = $instance->objArr[$name];
            unset($obj);
        }
    }


}