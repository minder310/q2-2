問卷調查。
<fieldset>
    <legend>目前位置:首頁 > 問卷調查</legend>
    <table>
        <tr>
            <td>編號</td>
            <td>問卷題目</td>
            <td>投票總數</td>
            <td>結果</td>
            <td>狀態</td>
        </tr>
        <?php
    $que=$Que->all();
    // dd($que);
    foreach($que as $quekey){
        if($quekey['parent']==0){ ?>
        <tr>
            <td><?= $quekey['id']?></td>
            <td><?= $quekey['text']?>]</td>
            <td><?= $Que->sum("count"," where `parent` = '$quekey[id]'")?></td>
            <td>
                <a href="index.php?do=look_que_ove&p=<?=$quekey['id']?>">投票結果頁面</a>
            </td>
            <td>
                <?php
                echo (isset($_SESSION['login']))?"<a href='index.php?do=inque&p=$quekey[id]'>投票</a>":"<a href='index.php?do=login'>請先登錄</a>";
                ?>
            </td>
        </tr>
        <?php }
    }
    ?>
</table>
    
</fieldset>