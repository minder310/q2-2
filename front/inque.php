投票頁面
<fieldset>
    <?php
    $all = $Que->all(" where `parent` = '$_GET[p]'");
    $title = $Que->find($_GET['p']);
    ?>
    <legend>目前位置:首頁>問卷調查><span><?= $title['text'] ?></span></legend>
    <h2><?=$title['text'];?></h2>
    <form action="./api/in_que.php" method="POST">
        <input type="hidden" name="topid" value="<?=$_GET['p']?>">
        <table>
            <?php foreach($all as $key){?>
            <label>
                <input type="radio" name="opt" id="" value="<?=$key['id']?>">
                <?= $key['text'];?>
            </label>
            <br>
            <?php } ?>
            <button>送出</button>
        </table>

    </form>
</fieldset>