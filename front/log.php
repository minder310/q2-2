<fieldset">
    <legend>會員註冊</legend>
    *請輸入您要註冊的帳號及密碼(最長12個字元)
    <div>
        <tr>
            <td>登入帳號</td>
            <td><input type="text" name="acc" id="acc" maxlength="12"></td>
        </tr>
    </div>
    <div>
        <tr>
            <td>登入密碼</td>
            <td><input type="text" name="pw" id="pw" maxlength="12"></td>
        </tr>
    </div>
    <div>
        <tr>
            <td>再次確認密碼</td>
            <td><input type="text" name="pw_2" id="pw_2" maxlength="12"></td>
        </tr>
    </div>
    <div>
        <tr>
            <td>信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
    </div>
    <div>
        <button id="log">註冊</button>
        <button id="rester">清除</button>
    </div>
    </fieldset>

    <script>
        $("#log").on("click", function() {
            let acc = $("#acc").val()
            let pw = $("#pw").val()
            let pw_2 = $("#pw_2").val()
            let email = $("#email").val()
            console.log("acc", acc)
            if (acc!=""&&pw!=""&&email!="") {
                if (pw == pw_2) {
                    $.post("./api/in_new_user.php", {
                        acc,
                        pw,
                        email
                    }, (a) => {

                        if (a == 1) {
                            alert("帳號重複")
                        } else if (a == 2) {
                            alert("註冊成功，歡迎加入。")
                        }
                    })
                } else {
                    alert("密碼不符合")
                }
            }else{
                alert("不可空白")
            }
        })
        $("#rester").on("click", function() {
            $("#acc").val("")
            $("#pw").val("")
            $("#pw_2").val("")
            $("#email").val("")
        })
    </script>