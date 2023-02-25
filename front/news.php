最新文章
<style>
    .none {
        display: none;
    }

    .news-title {
        cursor: pointer;
        background-color: #eee;
    }
</style>
<fieldset>
    <legend>目前位置:首頁 > 最新文章</legend>
    <?php
    // 顯示所有要顯示的文章數量。
    $all = $News->all(['sh' => 1]);
    // 要除以每篇要險式的數量。
    $div = 5;
    // 取最後的key值，並且+1為總篇數。
    $last_key = array_key_last($all) + 1;
    // 總篇數除以每頁要顯示的數量，並且以整數顯示。
    $pages = ceil($last_key / $div);
    // 現在顯示的頁面。
    $now = $_GET['p'] ?? 1;
    // if(isset)的縮寫。
    // 為顯示篇數的起始點。
    $start = ($now - 1) * $div;
    
    $news = $News->all(['sh' => 1], " limit $start,$div")
    ?>
    <table>


        <tr>
            <td style="width: 30%;">標題</td>
            <td style="width: 50%;">內容</td>
            <td></td>
        </tr>
        </div>
        <?php
        foreach ($news as $new) {
        ?>
            <tr>
                <td class="news-title"><?= $new['title'] ?></td>
                <td>
                    <div class="short"><?= mb_substr($new['text'], 0, 10) ?>...</div>
                    <div class="none"><?= $new['text'] ?></div>
                </td>
                <td>
                    <?php
                    if (isset($_SESSION['login'])) {
                        if ($Log->count(["news"=>$new['id'],"user"=>$_SESSION['login']]) > 0) {
                    ?>
                        <a href="" class="goods" data-user="<?=$_SESSION['login']?>" data-id="<?=$new['id']?>">收回讚</a>
                        <?php
                        } else { ?>
                        <a href="" class="goods" data-user="<?=$_SESSION['login']?>" data-id="<?=$new['id']?>">讚</a>
                    <?php
                        }
                    }
                    ?>
                </td>
            </tr>
            </div>
        <?php
        }
        ?>
    </table>
    <div>
        <?php
        // 上一頁按鍵顯示。
        if (($now - 1) > 0) {
            $pagedown = $now - 1;
            echo "<a href='index.php?do=news&p=$pagedown'> < </a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $size = ($now == $i) ? "26px" : "16px"; ?>
            <a href="index.php?do=news&p=<?= $i ?>" style="font-size:<?= $size ?>;"><?= $i ?></a>
        <?php
        }
        // 下一頁按鍵顯示
        if (($now + 1) <= $pages) {
            $pageup = $now + 1;
            echo "<a href='index.php?do=news&p=$pageup'> > </a>";
        }
        ?>
    </div>
</fieldset>

<script>
    $(".news-title").on("click", function() {
        // 這句要理解，下一個的children('.short,.none').做交換。
        $(this).next().children('.short,.none').toggle()
    })
</script>