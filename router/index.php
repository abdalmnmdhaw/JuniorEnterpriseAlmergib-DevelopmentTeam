<?php
require_once __DIR__."/vendor/autoload.php";
use src\App;
$land = new App;
$land->setDisten("post","/",function(){
    echo "welcome";
});
$land->setDisten("get","/",function(){
    echo "hallow world";
});
$land->setDisten("get","/home",function(){
    echo "hallow world";
});
$land->run();
?>