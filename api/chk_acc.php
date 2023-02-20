<?php 
include_once "../base.php";
$a=$User->count(["acc"=>$_POST['acc']]);
if($a>0){
    echo 1;
}else{
    echo 0;
}