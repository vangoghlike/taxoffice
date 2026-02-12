				<!-- subTopInfo -->
				<div class="subTopInfo">

					<!-- h2Wrap -->
					<div class="h2Wrap">
						<h2>{ ? sizeof(MENU[CONTENTS['breadcrumbs'][1]['idno']]) > 1 }{ CONTENTS['breadcrumbs'][1]['menu_title'] }{ : }{ CONTENTS['menu_title'] }{ / }{ ? TABS.size_ > 1 } - { TABS[CONTENTS_NO] }{ / }</h2>
					</div>
					<!-- //h2Wrap -->

					<!-- lnb -->
					<div class="lnb">
						<span><img src="{TYPE_URL}/images/common/home.png" alt="home"></span>
						{ ? is_numeric(CONTENTS['breadcrumbs'][0]['idno']) }{ @ CONTENTS['breadcrumbs'] }{ ? .index_ < .size_ -1 }<span>{ .menu_title }</span>{ : }<span class="last">{ .menu_title }</span>{ / }{ / }{ : }<span class="last">{ CONTENTS['menu_title'] }</span>{ / }
					</div>
					<!-- //lnb -->

				</div>
				<!-- //subTopInfo -->
