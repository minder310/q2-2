<?php 
    include_once "../base.php";
    // dd($_POST);
    $acc=$_POST['acc'];
    unset($_POST['pw2']);
    // 確認帳號是否有重複。
    $user=$User->count(["acc"=>$acc]);
    if($user>0){
        echo 1;
    }else{
        $newUser=$User->save($_POST);
        echo 2;
    }
    // 確認帳號密碼是否正確。