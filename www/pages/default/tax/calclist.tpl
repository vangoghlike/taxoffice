{ #header }

	<!-- Wrap -->
	<div class="wrap">

{ #subtop }
		<!-- 세목구분 (class) -->
		<!-- 	mt01 : 증여세
				mt02 : 양도세
				mt03 : 상속세
				mt04 : 종소세
				mt05 : 부가가치세(일반)
				mt06 : 부가가치세(간이) -->

		<!-- subContainer -->
		<div class="subContainer mtList" id="se_calc">
			
			<ul>
				<li>
					<a href="{BASE_URL}/mytax?mt02" target="_self">
						<div>
							<img src="{ TYPE_URL }/images/mytax_mt2.png" alt="양도소득세" />
						</div>
						<p>양도소득세</p>
					</a>
				</li>
				<li>
					<a href="{BASE_URL}/mytax?mt01" target="_self">
						<div>
							<img src="{ TYPE_URL }/images/mytax_mt1.png" alt="증여세" />
						</div>
						<p>증여세</p>
					</a>
				</li>
				<li class="enter">
					<a href="{BASE_URL}/mytax?mt03" target="_self">
						<div>
							<img src="{ TYPE_URL }/images/mytax_mt3.png" alt="상속세" />
						</div>
						<p>상속세</p>
					</a>
				</li>
				<li>
					<a href="{BASE_URL}/mytax?mt05" target="_self">
						<div>
							<img src="{ TYPE_URL }/images/mytax_mt5.png" alt="부가가치세(일반)" />
						</div>
						<p>부가세(일반)</p>
					</a>
				</li>
				<!--<li>
					<a href="javascript:alert('준비중입니다.');">
						<div>
							<img src="{ TYPE_URL }/images/mytax_mt6.png" alt="부가가치세(간이)" />
						</div>
						<p>부가세(간이)</p>
					</a>
				</li>-->
				<li>
					<a href="{BASE_URL}/mytax?mt04" target="_self">
						<div>
							<img src="{ TYPE_URL }/images/mytax_mt4.png" alt="종합소득세" />
						</div>
						<p>종소세</p>
					</a>
				</li>
			</ul>
			
{ ? USER['user_id'] }
	{ ? USER['user_id'] == 'admin' }
			<ul class="custom">
				<li>
					<a href="{BASE_URL}/calculate?gift_tax" target="_self">
						<div>
							<img src="{ TYPE_URL }/images/mytax_mt1.png" alt="증여세" />
						</div>
						<p>증여세</p>
					</a>
				</li>	
				<li>
					<a href="{BASE_URL}/calculate?income_tax" target="_self">
						<div>
							<img src="{ TYPE_URL }/images/mytax_mt4.png" alt="종합소득세" />
						</div>
						<p>종소세</p>
					</a>
				</li>
			</ul>     
	{ / }
{ / }
		</div>
		<!-- //subContainer -->

{ #footer }

	</div>
	<!-- //Wrap -->

</body>
</html>
