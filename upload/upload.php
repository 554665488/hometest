<?php
/**
 * 图片上传类
 */
class upload{
  /**
   * ,默认上传配置
   */
 private $config=array(
 
    'mimes'=>array(),//允许上传的文件类型
    'maxsize'=>0,//0不做限制
    'autosub'=>true,//自动子目录保存文件
    'subName'=>array('data','Y-m-d'),//子目录的创建 方式
    'tootPath'=>'./upload/',//文件保存路径
    'saveName'=>array('unipid',''),  //上传文件的命名规则
    'saveExt'=>'',//上传文件后缀 空表示使用原文件后缀
    'replace'=>false,//是否覆盖同名文件
    'hash'=>true,//是否生成哈希编码
    'callback'=>false,//检测文件是否存在回调，如果存在则返回文件的信息数组
    'driver'=>'',//文件上传驱动
    'driverConfig'=>array()//上传文件驱动配资
 
 );
  /**
   * 
   * 上传文件错误信息
   *
   */
   private $error='';
   /**
    * 上传驱动实例
    */
   private $uoloader;
   /**
    * 
    * 构造方法用于构造上传实例
    * $config 上传配置
    * 要使用的上传驱动LOCAL ——本地上传，ftp-ftp上传驱动
    */
    public function __construct($config=array(),$driver='',$driverConfig=null){
      //获取配置
      $this->config=array_merge($this->config,$config);
      //设置上传驱动
    
    }
    //魔术方法设置变量
    public function __set($name,$value){
      if(isset($this->config($name))){
       $this->config[$name]=$value;
       if($name=='driverConfig'){
         $this->setDriver();
        }
      }
    }
   
   public function __isset($name){
     return isset($this->config[$name]);	
   
   }
   //获得上传错误信息
   public function getError(){
     return $this->error;
   }
   //上传单个文件
   public function uploadOne($files=''){
     
      if($files===''){
        $files=$_FILES;
      }
      if(empty($files)){
      	$this->error='没有上传文件';
      	return false;
      }
   }
   
   //设置上传驱动
   private function setDriver($driver='',$config=null){
   
     $driver=$driver?'':$driver($this->driver ? '':'Local');
      $config = $config ? '' : ($this->driverConfig ? '' : '');
   
   }
   /**
    * 检测文件上传
    * @param unknown_type $files
    */
   private function check($files){
   /*文件上传失败捕获错误信息*/
     if($files['error']){
        $this->error=$files['error'];
        return false;
     }
     /*无效长传*/
     if(empty($files['error'])){
       $this->error='无效上传';
       return false;
     }
     /*检查文件是否合法*/
     if(!is_uploaded_file($files['tmp_name'])){
       $this->error='文件不合法';
     }
      /* 检查文件Mime类型 */
        //TODO:FLASH上传的文件获取到的mime类型都为application/octet-stream
     if(!$this->checkSize($files['size'])){
       $this->error='文件大小超过限制';
     }
     if(!$this->checkMime($files['type'])){
       $this->error='上传文件不允许';
     }
     
        /* 检查文件后缀 */
        if (!$this->checkExt($file['ext'])) {
            $this->error = '上传文件后缀不允许';
            return false;
        }

        /* 通过检测 */
        return true;
   }
   
   
   
   
   
   
   
   
   
   
}