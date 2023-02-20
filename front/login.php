會員登入

<!-- 這個要背 -->
<fieldset>
    <!-- 這個要背 -->
    <legend>會員登錄</legend>
    <table>
        <tr>
            <td>帳號</td>
            <td><input type="text" name="add" id="add"></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>
                <button onclick="login()">登入</button>
                <button onclick="rester()">清除</button>
            </td>
            <td>
                <a href="?do=forget_pw">忘記密碼|</a>
                <a href="?do=log">註冊</a>
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function rester() {
        $("#add,#pw").val("");
    }

    function login() {
        // 宣告一個user陣列並且，將值塞入。
        let user = {
            acc: $("#add").val(),
            pw: $("#pw").val()
        }
        $.post("./api/chk_acc.php", user, (a) => {
            console.log("a", a);
            if (parseInt(a) === 1) {
                $.post("./api/chk_pw.php", user, (b) => {
                    console.log("b", b);
                    if (parseInt(b) === 1) {
                        if (user.acc === "admin") {
                            location.href = "back.php"
                        }else{
                            location.href = "index.php"
                        }
                    } else {
                        alert("密碼錯誤")
                    }
                })
            } else {
                alert("查無此帳號")
                $("#add,#pw").val("")
            }

        })
    }
</script>