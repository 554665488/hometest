<?php
/**
 * Created by PhpStorm.
 * User: 554665488
 * Date: 2016/8/27
 * Time: 16:06
 */
echo "<a href='./urldecode.php?name=".urlencode('殷凡良')."'>跳转</a>";
//echo dechex(10);
//echo dechex(60);//将十进制转化为16进制
//echo ord('S');//ord() 函数返回字符串的首个字符的 ASCII 值。83
//将汉字的每一个字节转化为10进制


function str_16($str){
    $len=strlen($str);
    $arr=array();
    for ($i=0;$i<$len;$i++){
        //echo ord($str[$i]).'--';
        if(ord($str[$i])>127){
            $arr[]=ord($str[$i]).' '.ord($str[++$i]).' '.ord($str[++$i]);//每一个汉字有三个字节将每一个字节转化为ASCII值
        }
    }

   // var_dump($arr);//array(3) { [0]=> string(11) "230 174 183" [1]=> string(11) "229 135 161" [2]=> string(11) "232 137 175" }
    $str_16='';
    foreach ($arr as $v){
        $fen=explode(' ',$v);
        $str_16.=dechex($fen[0]).dechex($fen[1]).dechex($fen[2]);//将10进制字节转化为16进制
    }
    echo $str_16;
}
//var_dump($arr2);//array(3) { [0]=> string(6) "e6aeb7" [1]=> string(6) "e587a1" [2]=> string(6) "e889af" }