<?php
/**
 * Created by PhpStorm.
 * User: 554665488
 * Date: 2016/8/30
 * Time: 21:24
 */class api{
     /**
      * @param null $msg 返回正确的提示信息
      * @param flag success CURD 操作成功
      * @param array $data 具体的返回信息
      * Function descript 返回带参数   标志信息 提示信息的json 数组
      */
     function returnApiSuccess($msg=null,$data=array()){
             $result=array(
                 'flag'=>'Success',
                 'msg'=>$msg,
                 'data'=>$data
             );
         exit(json_encode($result));
     }
     /**
      * @param null $msg 返回具体的错误提示信息
      * @param flag Success CURD 操作失败
      * Function descript :返回标志信息 “Error”，提示信息的json数组
      */
     function returnApiError($msg=null){
         $result=array(
             'flag'=>'Error',
             'msg'=>$msg,
         );
         exit(json_encode($result));
     }
     /**
      * @param 返回具体错误的提示信息
      * @param flag success CURD 操作失败
      * Function descript 返回标志信息 'Error' 和提示信息 当前系统繁忙请稍后再试
      */
    function returnApiErrorExample(){
        $result=array(
            'flog'=>'Error',
            'msg'=>'当前系统繁忙，请稍后再试',
        );
        exit(json_encode($result));
    }
    /**
     * @param null $data
     * @return  array|mixed|null
     *Function descript :过滤post提交的参数
     */
    function filterDataPost($data=null)
    {
        if (!empty($data)) {
            foreach ($data as $key => $val) {
                if (!isset($_POST[$key]) || (empry($_POST[$key]))) {
                    if ($_POST[$key] !== 0 && $_POST[$key] !== 0) {
                        returnApiError($key, '字段为空');
                    }
                }
            }
            unset($data);
            $data = I('post.');
            unset($data['__URL__'], $data['token']);
            return $data;
        }
    }
/**
 * @param null $data
 * @return array |mixed |null
 * Function descript :过滤get提交的参数
 */
function filterDataGet($data=null){
   if(!empty($data)){
       foreach ($data as $key=>$val){
           if(!isset($_GET[$key])||(empty($_GET[$key]))){
               if($_GET[$key]!=='0'&&$_GET[$key]!==0){
                   returnApiError($key,'值为空');
               }
           }
       }
       unset($data);
       $data=I('get.');
       unset($data['__URL__'],$data['token']);
       return $data;
   }
}







}