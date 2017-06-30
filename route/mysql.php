<?php
/**
 * @dsecription 数据库操作类
 * @time 2016-08-21
 * @authod pack
 */
class sixtar_db{
	public $con;
	public $datebasse;
	public $error;
	public function __construct($host){
	  if(!empty($host)){
	    $this->con=mysqli_connect($host['mysql']['DB_HOST'],$host['mysql']['DB_USERNAME'],$host['mysql']['DB_PASSWORD'],$host['mysql']['DB_NMAE']);
	  	if($this->con){
	  		
	  	  die('链接成功');
	  	}else{
	  		var_dump($this->con);
	  	  echo "链接失败";
	  	}
	  }
	}
/**
 * 
 */
public function DoQuery(){


}
public function getRow(){


}
public function getList(){

}
}