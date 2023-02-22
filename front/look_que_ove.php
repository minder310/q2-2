投票結果
<fieldset>
    <?php
    $text=$Que->find($_GET['p']);
    
    ?>
    <legend>目前位置:首頁 >問卷調查><span><?=$text['text']?></span></legend>
</fieldset>