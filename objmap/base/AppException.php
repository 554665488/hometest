<?php
namespace objmap\base;
/**
 * Created by PhpStorm.
 * User: yfl
 * QQ 554665488
 * Date: 2017/7/2
 * Time: 20:37
 */
class AppException extends \Exception
{
    static private $error;

    public function __construct($error)
    {
        self::$error = $error;
        self::outError();
    }

    public static function outError()
    {
       var_dump(self::$error);
    }

}