<?php
/**
 * Created by PhpStorm.
 * User: 554665488
 * Date: 2016/8/27
 * Time: 12:01
 */
namespace Tools;
use Think\Model;
class Page{
    private $total;//数据标的总记录数
    private $listRows;//每页显示的行数
    private $limit;
    private $url;
    private $pageNum;//页数
    private $config=array('header'=>'个记录','first'=>'首页','prev'=>'上一页','next'=>'下一页','last'=>'尾页');
    private $listNum=8;//限制页码列表数目
    public $page;
    private $table;
    private $fields;
	public function __construct($table='',$fields='*',$listRow=10,$param=''){
        $this->table=$table;
        $this->fields=$fields;
        $this->total=$this->countNum();
        $this->listRows=$listRow;
        $this->url=$this->getUrl($param);
        $this->page=!empty($_GET['page']) ? $_GET['page'] : 1;
        $this->pageNum=ceil($this->total/$this->listRows);
        $this->limit=$this->setLimit();


	}

    /**
     * 获得数据表的总数
     */
	private function  countNum(){
           $model=new Model();
           $sql="select count(*)  from".' ' .$this->table.' '.'limit 1';
           $num=$model->query( $sql);
          //dump($num[0]['count(*)']);
        return $num[0]['count(*)'];
     }

    public function getUrl($param){

        $url=$_SERVER['REQUEST_URI'].(strpos($_SERVER['REQUEST_URI'],'?')? '': '?').$param;
        $parse=parse_url($url);//将url链接解析为数组键值：http协议，域名、访问地址//，传递的变量
        if(isset($parse['query'])){
            parse_str($parse['query'],$parses);//将字符串解析到数组name='yfl'&age='25'===array('name'=>'yfl','age'=>'25')
            unset($parses['page']);
            $url=$parse['path'].'?'.http_build_query($parses);//http_build_query将数组生成为urlencode之后取得请求字符串

        }

        return $url;
    }
	private function setLimit(){   //拼接sql语句的limit偏移量，长度


         $sql="select ".$this->fields." from ".$this->table." limit ".($this->page-1) * $this->listRows.",{$this->listRows}";
         return $sql;
        //return 'select '."limit".' '.($this->page-1) * $this->listRows.",{$this->listRows}";
    }


	public function __get($args){
    if($args=='limit'){
        return $this->limit;
    }else{
        return null;
    }
}
	//当前页从第几条开始的
     private function start(){

	  if($this->total==0){
          return 0;
      }else{
          return ($this->page-1)* $this->listRows;
      }
	}
	//当前页从第几条结束
	private function end(){
    return min($this->page*$this->listRows,$this->total);
}
	//第一页
	private function first(){
    $html="";
    if($this->page==1){
        $html.='';
    }else{
        $html.="&nbsp;<a href='{$this->url}&page=1'>{$this->config['first']}</a>";
    }
    return $html;
}
	//上一页
	private function prev(){
    $html="";
    if($this->page==1){
        $html.='';
    }else{
        $html.="&nbsp;<a href='{$this->url}&page=".($this->page-1)."'>{$this->config['prev']}</a>&nbsp;";
    }
    return $html;
}
	//具体数值列表页码
	private function pageList(){
    $linkPage='';
    $inum=floor($this->listNum/2);
    for($i=$inum;$i>=1;$i--){

        $page=$this->page-$i;
        if($page<1) continue;
        $linkPage.="&nbsp;<a href='{$this->url}&page={$page}'>{$page}</a>&nbsp;";

    }


    for($i=0;$i<=$inum;$i++){
        $page=$this->page+$i;
        if($page<=$this->pageNum){
            $linkPage.="&nbsp;<a href='{$this->url}&page={$page}'>{$page}</a>&nbsp;";
        }else{
            break;
        }
    }
    return $linkPage;
}
   //下一页
   private function next(){
    $html="";
    if($this->page==$this->pageNum){
        $html='';

    }else{
        $html.="&nbsp;<a href='{$this->url}&page=".($this->page+1)."'>{$this->config['next']}</a>";
    }
    return $html;
}
private function last(){
    $html="";
    if($this->page==$this->pageNum){
        $html='';
    }else{
        $html.="&nbsp;<a href='{$this->url}&page=".$this->pageNum."'>{$this->config['last']}</a>";

    }
    return $html;
}
   //go
   private function goPage(){
    return '
	<input type="text" onkeydown="javascript:if(event.keyCode==13){var page=(this.value >'.$this->pageNum.') ? '.$this->pageNum .': this.value;window.location.href=\''.$this->url.'&page=\'+page+\'\'}" value="'.$this->page.'" style="width:25px" id="prev"/>
	';

   }
   function fpage($display=array(0,1,2,3,4,5,6,7,8)){
     $html=array();
	 $html[0]="&nbsp;共有<b>{$this->total}</b>{$this->configp['header']}&nbsp";
	$html[1]="&nbsp;每页显示<b>".($this->end()-$this->start())."</b>条，本页<b>{$this->start()}-{$this->end()}</b>条&nbsp;";
	 $html[2]="&nbsp;<b>{$this->page}/{$this->pageNum}</b>页&nbsp";
	 $html[3]=$this->first();
	 $html[4]=$this->prev();
     $html[5]=$this->pageList();
	 $html[6]=$this->next();
	 $html[7]=$this->last();
     $html[8]=$this->goPage();

	 $fpage='';
	 foreach($display as $index){
         $fpage.=$html[$index];
     }
      return $fpage;
   }
}





