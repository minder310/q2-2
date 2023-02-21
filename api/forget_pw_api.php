<?php
include_once "../base.php";
$user_email = $_POST['email'];
$inuser = $User->find(["email" => $user_email ]);
if (!empty($inuser)) {
    echo "您的密碼:".$inuser['pw'];
}else{
    echo "查無此資料。";
}
