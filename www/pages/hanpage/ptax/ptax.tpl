{ #header }

		<!-- Container -->
		<div class="container" id="container">

{ #subtop }
			<!-- 세목구분 (class) -->
			<!-- 	mt01 : 증여세
					mt02 : 양도세
					mt03 : 상속세
					mt04 : 종소세
					mt05 : 부가가치세(일반)
					mt06 : 부가가치세(간이) -->
					
			<!-- subContent -->
			<div class="subContent">
				
{ #breadcrumbs }
			<?php
				$now_dir = $_SERVER['REQUEST_URI'];
				$calc_form = explode("?", $now_dir);
				
				$menu_li = array(
					'MT01' => '',
					'MT02' => '',
					'MT03' => '',
					'MT04' => '',
					'MT05' => '',
					'MT06' => ''
				);
				switch($calc_form[1]){
					
					case 'mt01' : $menu_li['MT01'] = 'on'; break;
					case '' :
					case 'mt02' : $menu_li['MT02'] = 'on'; break;
					case 'mt03' : $menu_li['MT03'] = 'on'; break;
					case 'mt04' : $menu_li['MT04'] = 'on'; break;
					case 'mt05' : $menu_li['MT05'] = 'on'; break;
					case 'mt06' : $menu_li['MT06'] = 'on'; break;
					default: 	break;
				}	
			?>
			<div class="tabType01">
			<ul>
				<li class="<?php echo $menu_li['MT02']; ?>" style="width:16.6%"><a href="/ptax?mt02">양도세</a></li>
				<li class="<?php echo $menu_li['MT01']; ?>" style="width:16.6%"><a href="/ptax?mt01">증여세</a></li>
				<li class="<?php echo $menu_li['MT03']; ?>" style="width:16.6%"><a href="/ptax?mt03">상속세</a></li>
				<li class="<?php echo $menu_li['MT05']; ?>" style="width:16.6%"><a href="javascript:alert('준비중입니다.');">부가가치세</a></li>
				<li class="<?php echo $menu_li['MT06']; ?>" style="width:16.6%"><a href="javascript:alert('준비중입니다.');">부가가치세(간이)</a></li>
				<li class="<?php echo $menu_li['MT04']; ?>" style="width:16.6%"><a href="javascript:alert('준비중입니다.');">종소세</a></li>
			</ul>
			</div>
				<div class="listTyp01 ptax">
				<?php	
						switch($calc_form[1]){
							case '' :
							case 'mt01' : ?>{ #calc_form01 }<?php break;
							case 'mt02' : ?>{ #calc_form02 }<?php break;
							case 'mt03' : ?>{ #calc_form03 }<?php break;
							case 'mt04' : ?>{ #calc_form04 }<?php break;
							case 'mt05' : ?>{ #calc_form05 }<?php break;
							case 'mt06' : ?>{ #calc_form06 }<?php break;
							default: 	break;
						}
					?>

				</div>
				
				<!-- //contStart -->

			</div>
			<!-- //subContent -->

		</div>
		<!-- //Container -->

{ #footer }