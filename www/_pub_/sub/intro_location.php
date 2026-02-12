<?php include "../include/_header.php" ?>
	
	<div class="sub_visual intro">
		<div class="inner">
			<h2 class="title">회사소개</h2>
		</div>
	</div>
	
	<div class="sub_content_wrap">
		<?php include "../include/_snb_intro.php" ?>
		
		<div class="sub_content">
			<div class="title_wrap">
				<h3 class="page_title">오시는길</h3>
			</div>
			
			<div class="content_wrap location">
				<div class="location_info">
					<div id="daumRoughmapContainer1632491886638" class="root_daum_roughmap root_daum_roughmap_landing"></div>
					<div class="info_box">
						<img src="../image/sub/img_location01.jpg" alt="" class="pc_img">
						<img src="../image/sub/img_location01.jpg" alt="" class="m_img">
						<p class="tit">서울 R&D 센터</p>
						<dl>
							<dt><i class="ico_address"></i>주소 :</dt>
							<dd>서울특별시 관악구 낙성대로 38 낙성대 R&D 센터 1층 (우 08790) </dd>
							<dt><i class="ico_phone"></i>전화 :</dt>
							<dd>02-872-2202</dd>
							<dt><i class="ico_email"></i>이메일 :</dt>
							<dd><a href="mailto:seungnam.ryu@gflas.com">seungnam.ryu@gflas.com</a></dd>
							<dt><i class="ico_fax"></i>팩스 :</dt>
							<dd>02-872-4712</dd>
						</dl>
					</div>
				</div>
				<div class="location_info">
					<div id="daumRoughmapContainer1632492491071" class="root_daum_roughmap root_daum_roughmap_landing"></div>
					<div class="info_box">
						<img src="../image/sub/img_location02.jpg" alt="" class="pc_img">
						<img src="../image/sub/img_location02.jpg" alt="" class="m_img">
						<p class="tit">오송캠퍼스</p>
						<dl>
							<dt><i class="ico_address"></i>주소 :</dt>
							<dd>충북 청주시 흥덕구 오송읍 의료단지길 123</dd>
							<dt><i class="ico_phone"></i>전화 :</dt>
							<dd>070-4186-9937</dd>
							<dt><i class="ico_email"></i>이메일 :</dt>
							<dd><a href="mailto:seungnam.ryu@gflas.com">seungnam.ryu@gflas.com</a></dd>
						</dl>
					</div>
				</div>
			</div>
			<!-- //content_wrap -->
			
		</div>
		<!-- //sub_content -->
	
	</div>
	
<script>
// submenu
$(function(){
	ui.subMenu(0,4);
})
</script>

<script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>
<script charset="UTF-8">
	new daum.roughmap.Lander({
		"timestamp" : "1632491886638",
		"key" : "27gcd",
	}).render();
	
	new daum.roughmap.Lander({
		"timestamp" : "1632492491071",
		"key" : "27gch",
	}).render();
</script>
<?php include "../include/_footer.php" ?>