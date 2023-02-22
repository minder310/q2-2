人氣講座
<style>
    .full {
        display: none;
        z-index: 99;
        background-color: rgb(100, 100, 100);
        height: 95%;
        width: 500px;
        padding: 1rem;
        overflow: auto;
    }
</style>
<fieldset>
    <legend>目前位置:首頁>人氣文章</legend>
    <?php
    $all = $News->all(['sh' => 1]);
    $div = 5;
    $last_key = array_key_last($all) + 1;
    $pages = ceil($last_key / $div);
    $now = $_GET['p'] ?? 1;
    // if(isset)的縮寫。
    $start = ($now - 1) * $div;

    $news = $News->all(['sh' => 1], " limit $start,$div")

    ?>
    <table>
        <tr>
            <td style="width: 30%;">標題</td>
            <td style="width: 60%;">內容</td>
            <td style="width: 10%;">人氣</td>
        </tr>
        <?php
        foreach ($news as $new) {
        ?>
            <tr>
                <td class="new-title">
                    <?= $new['title'] ?>
                    <div class="full">
                        <h3 style="color: skyblue;"><?= $new['title'] ?></h3>
                        <span><?= $new['text'] ?></span>
                    </div>
                </td>
                <td><?= mb_substr($new['text'], 0, 20) ?>...
                </td>
                <td>
                    <div>
                        <!-- 取出讚的數量 -->
                        <?= $new['good'] ?>個人說讚
                        <a href="" class="goods" data-id="<?= $new['id'] ?>" data-user=<?= $_SESSION['login'] ?>>
                            <img src="./icon/02B03.jpg" alt="" style="width: 20px;hight:20px">
                        </a>
                    </div>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <?php
    if ($now - 1 > 0) {
        $pagedow = $now - 1
    ?>
        <a href="index.php?do=pop&p=<?= $pagedow ?>">
            < </a>
            <?php }
        for ($i = 1; $i <= $pages; $i++) {
            $size = ($i == $now) ? "26px" : "16px";
            ?>
                <a href="index.php?do=pop&p=<?= $i ?>" style="font-size: <?= $size ?>;"><?= $i ?></a>
            <?php }
        if ($now + 1 <= $pages) {
            $pageup = $now + 1;
            ?>
                <a href="index.php?do=pop&p=<?= $pageup ?>"> > </a>
            <?php }
            ?>
</fieldset>

<script>
    $(".new-title").hover(
        function() {
            $(this).children(".full").show();
        },
        function() {
            $(this).children(".full").hide();
        }
    )
</script>