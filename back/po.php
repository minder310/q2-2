帳號管理
<?php
$user = $User->all();
// dd($user);
?>
<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/del_user.php" method="POST">

        <table>
            <tr>
                <td>帳號</td>
                <td>密碼</td>
                <td>刪除</td>
            </tr>
            <?php foreach ($user as $key) { ?>
                <tr>
                    <td><?= $key['acc'] ?></td>
                    <td><input type="password" value="<?= $key['pw'] ?>" disabled="disabled"></td>
                    <td>刪除<input type="checkbox" name="del[]" value="<?= $key['id'] ?>"></td>
                </tr>
            <?php } ?>
        </table>
        <button id="deluser">確定刪除</button>
        <button type="reset">清空選取</button>
    </form>
    <h1>新增會員</h1>
    <!-- <form action="./api/in_new_user.php" method="POST"> -->
    <h4>*請設定您要註冊的帳號及密碼(最長12個字元)</h4>
    <table>
        <tr>
            <td style="background-color: #eee;">Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc" maxlength="12"></td>
        </tr>
        <tr>
            <td style="background-color: #eee;">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw" maxlength="12"></td>
        </tr>
        <tr>
            <td style="background-color: #eee;">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2" maxlength="12"></td>
        </tr>
        <tr>
            <td style="background-color: #eee;">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="email" name="email" id="email"></td>
        </tr>
    </table>
    <button onclick="newUser()">新增</button><button onclick="clean()">清除</button>
    <!-- </form> -->
</fieldset>
<script>
    function clean() {
        $("#acc").val("")
        $("#pw").val("")
        $("#pw2").val("")
        $("#email").val("")
    }

    function newUser() {
        console.log("1")
        let user = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val()
        }
        if (user.acc === "" || user.pw === "" || user.pw2 === "" || user.email === "") {
            alert("不可以有空白")
        } else {
            if(user.pw!=user.pw2){
                alert("密碼驗證錯誤")
            }else{
                // unset(user.pw2)
                $.post("./api/in_new_user.php",user,function(a){
                    if(parseInt(a)===1){
                        alert("帳號重複")
                    }else{
                        alert("註冊成功")
                    }
                })
            }
        }
    }
</script>