<?php

include_once "../base.php";
// dd($_GET);
$a=$_GET['type'];
$b=$News->all(" where `type` = '$a' ");
// dd($b);

foreach($b as $key){
    ?>
    <a href="#" style="display: block;" onclick="getNews(<?=$key['id']?>)">
    <?= $key['title']?>
    </a>
    <?php
}
