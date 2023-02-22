<?php
include "./base.php";
include "./api/date_see.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>健康促進網</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/js.js"></script>
</head>

<body>
	<?php
	// 輸出最大值，最大max id;
	$tol = $Total->all(" where `id`=(select max(id) from total)");
	// 輸出最大值。
	$sumtol = $Total->sum("total");

	?>
	<div id="alerr" style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;">
		<pre id="ssaa"></pre>
	</div>
	<iframe name="back" style="display:none;"></iframe>
	<div id="all">
		<div id="title">
			<!-- l是英文的星期幾。 -->
			<?= date("Y-m-d l"); ?>| 今日瀏覽: <?= $tol[0]["total"] ?> | 累積瀏覽: <?= $sumtol ?>
			<a href="index.php" style="float: right;">回首頁</a>

		</div>


		<div id="title2">
			<a href="./index.php"><img src="./icon/02B01.jpg" alt=""></a>
		</div>
		<style>
			.a {
				float: left;
				background-image: "";
			}
		</style>
		<div id="mm">
			<div class="hal" id="lef">
				<a class="blo" href="?do=po">分類網誌</a>
				<a class="blo" href="?do=news">最新文章</a>
				<a class="blo" href="?do=pop">人氣文章</a>
				<a class="blo" href="?do=know">講座訊息</a>
				<a class="blo" href="?do=que">問卷調查</a>
			</div>
			<div class="hal" id="main">
				<marquee style="width: 78%;" behavior="" direction="">請民眾踴躍投稿電子報!!</marquee>
				<?php
				if(isset($_SESSION['login'])){ 
					if($_SESSION['login']=="admin"){
					?>
					<a href="./back.php">管理</a>|
					<a href="./api/log_out_api.php" class="logout">登出</a>
					<?php }else{ ?>
					<a href=""></a>
					<?php } ?>
			<?php }else{ ?>
				<a href="?do=login">會員登入</a>
				<?php
				}
				?>
				<div>

					<div class="">
						<?php
						$do=$_GET['do'];
						$file="./front/".$do.".php";
						if(file_exists($file)){
							include "./front/$do.php";
						}else{
							include "./front/home.php";
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<div id="bottom">
			本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2023健康促進網社群平台 All Right Reserved
			<br>
			服務信箱：health@test.labor.gov.tw<img src="./home_files/02B02.jpg" width="45">
		</div>
	</div>

</body>

</html>