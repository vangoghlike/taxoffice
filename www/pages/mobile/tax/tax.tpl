{ #header }

	<!-- Wrap -->
	<div class="wrap">

{ #subtop }

		<!-- subContainer -->
		<div class="subContainer">

			<div class="taxTop">
				<div class="tit">간편 세무 상담 서비스</div>
				<div class="tit2">간단한 예약 절차를 거쳐 전문 세무사와 <br />상담을 진행하며 상담 내용은 보호 됩니다. </div>
			</div>

			<div class="taxMainList">
				<ul>
				{ @GOODS }
					<li class="no{ .idno }">
						<a href="./tax{ .idno }">
							<span class="tit">{ .goods_name }</span>
							<span class="tit2">{ .intro }</span>
						</a>
					</li>
				{ / }
				</ul>
			</div>

		</div>
		<!-- //subContainer -->

{ #footer }

	</div>
	<!-- //Wrap -->

</body>
</html>
