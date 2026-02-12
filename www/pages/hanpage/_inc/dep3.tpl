{ ? sizeof(MENU[CONTENTS['breadcrumbs'][1]['idno']]) > 1 }

					<div class="tabType01">
						<ul>
							{ @ MENU[CONTENTS['breadcrumbs'][1]['idno']] }
								<li class="menu{ .idno }" style="width:{ =(100 / sizeof(MENU[CONTENTS['breadcrumbs'][1]['idno']])) }%"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
							{ / }
						</ul>
					</div>

					<div class="h3Wrap line">
						<h3>{ CONTENTS['menu_title'] }</h3>
					</div>

{ / }
