<?php
include_once "../base.php";
$topid=$_POST["topid"];
$id=$_POST['opt'];
$count=$Que->find($id);
$count=$count['count']+1;
$Que->save(["id"=>$id,"count"=>$count]);
to("../index.php?do=look_que_ove&p=$topid")
// $Que->save()
?>