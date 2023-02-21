最新文章
<style>
    .none {
        display: none;
    }
    .news-title{
        cursor: pointer;
        background-color: #eee;
    }
</style>
<fieldset>
    <legend>目前位置:首頁 > 最新文章</legend>
    <?php
    $news = $News->all();
    // dd($news);
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
                    <div class="none"><?=$new['text']?></div>
                </td>
            </tr>
            </div>
        <?php
        }
        ?>
    </table>

</fieldset>

<script>
    $(".news-title").on("click",function(){
        // 這句要理解，下一個的children('.short,.none').做交換。
        $(this).next().children('.short,.none').toggle()
    })

</script>