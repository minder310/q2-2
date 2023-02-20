<?php
include_once "../base.php";

$a=$User->count(["acc"=>$_POST["acc"],"pw"=>$_POST["pw"]]);

if($a>0){
    echo 1;
    $_SESSION["acc"]=$_POST["acc"];
}else{
    echo 0;
}