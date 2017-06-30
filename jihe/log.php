<?php
//使用单件模式让该类的对象在所有场合只有一个对象实例
final class log{
	
 public $_error;//信息的处理
 public $fp;
 static private  $instance=null;
//构造函数先打开文件为以后使用
  private function __construct(){
  
    if(!$this->fp=fopen('./log.tex','ab+')){
      $this->_error='打开失败';
      $this->errorHandel();//错误处理方法
    }
  }
  function __destruct(){}//析构方法释放资源
  //静态函数 配合静态变量的使用实现单间模式
  static function getstance(){
      if(is_object(self::$instance)){
       return self::$instance;
      }
      self::$instance=new log();
      return self::$instance;
  }
  private function errorHandel(){
      var_dump($this->_error);
  }
  //写入日志
  public function inLog($temp){
    if(fwrite($this->fp,time().'|||'.$temp."\r\n")==false){
       $this->_error='写入失败';
        $this->errorHandel();
    }
    exit();
  }
  //输出日志将日志内容输出,参数默认为1,即默认用类内部方法打印日志,否则可自定义显示方式.两种情况下都返回数组
  
  public function  outlog($define='1'){
  	$outArray=array();
  	while(!@feof($this->fp)){//检查文件的得指针是否到文件的底部
  	  $line=fgets($this->fp);//从打开的文件返回一行字符串
  	  if(strlen($line)!=0){//判断字符串的长度 
  	  	$tmp=explode("|||",$line,2);
  	  	$outArray[]=$tmp;
  	  }
  	}
  	if($define==1){
  	  $this->printLog($outArray);
  	}
  	return $outArray;
      
  }
    //打印log
  public function printLog($outArray){
     foreach($outArray as $temp){
       echo '时间'.date('Y-m-d H:m:s',$temp[0]).'原因'.$temp[1];
     }
  
  }
 
}

log::getstance()->outlog('1');
try{

 if(!@mysqli_connect('localhost','root','roosst')){
 	
     throw new Exception('数据库打开失败'); 
     
 }
}catch (Exception $e){
	 
 log::getstance()->inLog($e->getMessage());
  
}


