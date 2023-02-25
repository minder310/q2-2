最新文章管理

<form action="./api/chang_del_news.php" method="POST">
    <table>

        <tr>
            <td>編號</td>
            <td>標題</td>
            <td>顯示</td>
            <td>刪除</td>
        </tr>
        <?php
        $news = $News->all();
        // dd($news); 
        // 顯示每篇的篇數。
        $div=3;
        // 取篇數總和。
        $last_key=array_key_last($news)+1;
        // 有幾頁。
        $pages=ceil($last_key/$div);
        // get[p]為現在第幾頁，要是沒有==1，從頭開始的意思。
        $newpage=($_GET['p'])??1;
        $what_number_page=($newpage-1)*$div;
        echo $what_number_page;
        //                             這邊是限制，輸出哪一篇到哪一篇。
        $whatpage=$News->all(["sh"=>1]," limit $what_number_page , $div ");
        foreach ($whatpage as $key) { 
            ?>
            <tr>
                <td><?= $key['id'] ?></td>
                <td><?= $key['title'] ?></td>
                <td><input type="checkbox" name="sh[]" id="sh" value="<?= $key['id'] ?> " <?php if($key['sh']==1){echo 'checked';} ?>></td>
                <td><input type="checkbox" name="del[]" id="del" value="<?= $key['id'] ?>"></td>
            </tr>
        <?php } ?>
    </table>
    <button>確定修改</button>
    <br>
    <?php
    // 顯示向左一頁選向。
    if($newpage>1){ ?>
        <a href="back.php?do=pop&p=<?=$newpage-1?>"> < </a>
    <?php } ?>
    <?php for($i=1;$i<=$pages;$i++){
         $size=($i==$newpage)?"26px":"16px";?>
         <a href="back.php?do=pop&p=<?=$i?>" style="font-size: <?= $size ?>;"><?=$i?></a> 
    <?php } ?>
     <!-- 顯示向右一頁選向 -->
    <?php if($newpage<$pages){ ?>
        <a href="back.php?do=pop&p=<?=$newpage+1?>"> ></a>
    <?php } ?>
</form>