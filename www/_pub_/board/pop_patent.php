<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRISPR 건강씨앗</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
	<link rel="stylesheet" type="text/css" href="/pub/css/common.css">
	<link rel="stylesheet" type="text/css" href="/pub/css/sub.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php
	$request_uri = "{$_SERVER['REQUEST_URI']}";
	if($request_uri == '/pub/main/main.php') echo '<link rel="stylesheet" type="text/css" href="/pub/css/main.css" />'; //메인만 호출
?>
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR:100,300,400,500,700&amp;display=swap" rel="stylesheet">
	<script type="text/javascript" src="/pub/js/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
	<script type="text/javascript" src="/pub/js/common.js"></script>
</head>
<body>
	
	<div style="padding:20px;text-align:center;">
		<button type="button" style="padding:10px;border:1px solid #ddd;" onclick="popup.show('popPatent');">popup open</button>
	</div>
	
	<!--popup -->
	<div class="popup" id="popPatent">
		<div class="pop_wrap">
			<h1 class="pop_title">특허증</h1>
			<button type="button" class="btn_pop_close" onclick="popup.hide(this);"><span class="blind">닫기</span></button>
			
			<div class="pop_content">
				<img src="../image/sample/img_tmp_patent01.jpg" alt="">
			</div>
		</div>
	</div>
	<!-- //popup -->
	
</body>
</html>