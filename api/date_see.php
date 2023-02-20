<?php
include "../base.php";
$ToDay=date("Y-m-d");
// dd($ToDay);
if($Total->count(" where `date`='$ToDay' ")>0){
    $total=$Total->all(" where `date`='$ToDay' ");
    $total[0]['total']=$total[0]['total']+1;
    $Total->save($total[0]);
}else{
    $Total->save(["date"=>$ToDay,"total"=>1]);
}