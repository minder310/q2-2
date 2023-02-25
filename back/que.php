問卷管理
<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/login_new_que.php" method="post">
        <table class="options">
            <tr>
                <td style="background-color: #eee;">問卷名稱</td>
                <td><input type="text" name="que_title" id="que_title"></td>
            </tr>
            <tr>
                <td style="background-color: #eee;">選項</td>
                <td><input type="text" name="que_list[]" id="que_list"></td>
                <td><button type="button" onclick="moreOpt()">更多</button></td>
            </tr>
        </table>
        <button>送出</button><button type="reset">清空</button>
    </form>
</fieldset>
<script>
    function moreOpt() {
        let a = `<tr>
                <td style="background-color: #eee;">選項</td>
                <td><input type="text" name="que_list[]" id="que_list"></td>
                <td><button type="button" onclick="moreOpt()">更多</button></td>
            </tr>`;
        $(".options").append(a);

    }
</script>