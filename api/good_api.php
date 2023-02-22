<?php
    include_once "../base.php";
    
    $inputUserGood=["news"=>$_POST['news'],"user"=>$_POST['user']];
    $newGood=$News->find($inputUserGood['news']);
    // 要先取出，news的good的值，並且相加後再送回去。
    if($Log->count($inputUserGood)>0){
        $Log->del($inputUserGood);
        $News->save(['id'=>$_POST['news'],'good'=>$newGood['good']-1]);
    }else{
        $Log->save($inputUserGood);
        $News->save(['id'=>$_POST['news'],'good'=>$newGood['good']+1]);
    }
    