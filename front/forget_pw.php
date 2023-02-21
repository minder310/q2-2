<div>
    <h2>請輸入信箱以查詢密碼</h2>
</div>
<div>
    <table>
        <input type="text" name="email" id="email">
    </table>
</div>
<div id="yaya"></div>
<div>
    <button onclick="forget_pw()">送出</button>
</div>
<script>
    function forget_pw(){
        let b=$("#email").val()
        console.log("回傳值",b)
        $.post("./api/forget_pw_api.php",{email:b},(a)=>{
            console.log("回傳值",a)
            $("#yaya").html(a)
        })
    }
</script>