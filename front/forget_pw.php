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
        $post("/api/forget_pw.php",{email:$("#email").val()}),(a)=>{
            console.log(a)
            $("#yaya").html(a)
        }
    }
</script>