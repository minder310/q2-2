投票結果
<fieldset>
    <?php
    $text=$Que->find($_GET['p']);
    $text2=$Que->all(" where `parent` = '$text[id]'");
    $sum=$Que->sum("count"," where `parent` = '$text[id]'");
    dd($sum);
    ?>
    <legend>目前位置:首頁 >問卷調查><span><?=$text['text']?></span></legend>

    <table>
        <h2><?=$text['text'];?></h2>
        <?php foreach($text2 as $key){?>
            <tr>
                <td><?=$key['text']?></td>
                <td><?=$key['count']?></td>
            </tr>
        <?php } ?>
    </table>
</fieldset>