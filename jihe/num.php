<?php
echo "<pre>";
$z=1;
for($n=1;$n<=14;$n++){
    $m=$z+$n;
    do{
        echo $z;
        echo "&nbsp;&nbsp;";
    $z++;
        }while($z<$m&&$z<101);
echo "<br />";
}
echo "</pre>";
?>