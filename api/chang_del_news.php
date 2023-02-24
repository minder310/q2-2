<!-- 修改news新聞顯示刪除頁面。 -->
<?php
include_once "../base.php";
// dd($_POST);
$all = $News->all();
// dd($all);
if (isset($_POST['sh'])) {
    foreach($all as $key){
        // dd($key['id']);
        $News->save(["sh"=>0,"id"=>$key['id']]);
    }
    $sh = $_POST['sh'];
    foreach ($sh as $key => $val)
        $News->save(["id" => $val, "sh" => 1]);
}
if (isset($_POST['del'])) {
    $del = $_POST['del'];
    foreach($del as $key => $val){
    $News->del($val);
    }
}

to("./back.php?do=pop");
