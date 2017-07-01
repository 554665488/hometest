<?php

/**
 * Created by PhpStorm.
 * User: yfl
 * QQ 554665488
 * Date: 2017/7/2
 * Time: 3:07
 */
class Account
{
    public $balance; //余额

    public function __construct($balance)
    {
        $this->balance = $balance;
    }

}

class Person
{
    private $name;
    private $age;
    private $id;
    public $account;

    public function __construct($name, $age, Account $account)
    {
        $this->name = $name;
        $this->age = $age;
        $this->account = $account;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    function __clone()
    {
        // TODO: Implement __clone() method.
        $this->id = 1;
        $this->account = clone $this->account;    #不加这一句,account在clone是会只被复制引用,其中一个account的balance被修改另一个也同样会被修改
    }
}

$accountObj = new Account('100');
$userObj = new Person('Tom', '25', $accountObj);  //把账户类的对象作为参数
$userObj->setId(2);
//给Tom 的账户加100块钱
$userObj2=clone $userObj; //克隆一个uid==2的对象  __clone 执行 然后把当前对象的ID修改为1
$userObj->account->balance += 100;

//查看userObj2的账户金额
echo $userObj2->account->balance;  //userObj2 和userObj是同一个对象 他们的account属性是同一个(共享)对象