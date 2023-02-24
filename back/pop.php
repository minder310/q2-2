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
        foreach ($news as $key) { ?>
            <tr>
                <td><?= $key['id'] ?></td>
                <td><?= $key['title'] ?></td>
                <td><input type="checkbox" name="sh[]" id="sh" value="<?= $key['id'] ?> " <?php if($key['sh']==1){echo 'checked';} ?>></td>
                <td><input type="checkbox" name="del[]" id="del" value="<?= $key['id'] ?>"></td>
            </tr>
        <?php } ?>
    </table>
    <button>確定修改</button>
</form>