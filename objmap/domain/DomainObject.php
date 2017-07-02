<?php
namespace objmap\domian;
/**
 * Created by PhpStorm.
 * User: yfl
 * QQ 554665488
 * Date: 2017/7/2
 * Time: 20:03
 */
//一个要保存对象类
class DomainObject{
    public function getId(){
        return uniqid();
    }
}