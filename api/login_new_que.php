<?php 
 include_once "../base.php";
 dd($_POST);
 $title=$_POST['que_title'];
 $list=$_POST['que_list'];
 dd($list);
 $Que->save(["text"=>$title,"parent"=>0]);
 $a=$Que->find(["text"=>$title]);
 foreach($list as $key => $val){
    $Que->save(["parent"=>($a['id']),"text"=>$val]);
 }
 to("index.php?do=que");
 