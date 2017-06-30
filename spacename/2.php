<?php
namespace red;
const A='a';
function getinfo(){
   echo "red";
}
namespace blue;
const B='b';
function getinfo(){
  echo "blue";
}

//\red\getinfo();

echo \red\A;