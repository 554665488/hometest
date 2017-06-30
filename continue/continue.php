<?php
/**
 * Created by PhpStorm.
 * User: 554665488
 * Date: 2016/8/27
 * Time: 22:36
 */
$i = 0;
while ($i++ < 5) {
    echo "Outer<br />\n";
    while (1) {
        echo "Middle<br />\n";
        while (1) {
            echo "Inner<br />\n";
            continue 3;
        }
        //echo "This never gets output.<br />\n";
    }
    echo "Neither does this.<br />\n";
}