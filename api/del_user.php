<?php
include_once "../base.php";
$del=$_POST['del'];
foreach($del as $key => $value){
     $User->del($value);
}
to("../back.php?do=po");
