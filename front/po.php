<style>

</style>
<div>
    目前位置:首頁>分類網誌><span id="type">慢性病預防</span>
</div>
<div style="display: flex;">
    <fieldset>
        <legend>分類網誌</legend>
        <?php
        foreach ($News->type as $key => $type) {
        ?>
            <a href="#" class="type" style="display: block;" data-type='<?= $key ?>'><?= $type; ?></a>
        <?php
        }
        ?>

    </fieldset>
    <fieldset>
        <legend>文章列表</legend>
        <div class="gogo">

        </div>
    </fieldset>


</div>
<script>
    $(".type").on("click", function() {
        $("#type").text($(this).text())
        getList($(this).data("type"))
    })

    function getList(type) {
        $.get("./api/get_list_api.php",{type}, (goback) => {
            $(".gogo").html(goback)
        })
    }
    function getNews(id){
        $.get("./api/get_news_api.php",{id},(news)=>{
            console.log(news)
            $(".gogo").html(news)
        })
        
    }
</script>