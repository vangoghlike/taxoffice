{ ? USERINFO['user_id'] == 'admin' }
{*<pre>*}
{*{= var_dump( CONTENTS['breadcrumbs'][0]['idno'] ) }*}
{*</pre>*}

{ / }

{ ? sizeof(MENU[CONTENTS['breadcrumbs'][0]['idno']]) > 1 && sizeof(MENU[CONTENTS['breadcrumbs'][0]['idno']]) < 8 }

			{ ?  MENU_ORD_NO == '1' || MENU_ORD_NO == '8' }			<!-- subNav -->
			<div class="subNav subNavType2 sixTab">
				<ul>
					{ @ MENU[CONTENTS['breadcrumbs'][0]['idno']] }
					<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
					{ / }
				</ul>
			</div>
			{ :  MENU_ORD_NO == '3' }			<!-- subNav -->
			<div class="subNav subNavType2 threeTab">
				<ul>
					{ @ MENU[CONTENTS['breadcrumbs'][0]['idno']] }
					<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
					{ / }
				</ul>
			</div>
			{ :  MENU_ORD_NO == '4' }			<!-- subNav -->
			<div class="subNav subNavType2 fourTab">
				<ul>
					{ @ MENU[CONTENTS['breadcrumbs'][0]['idno']] }
					<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
					{ / }
				</ul>
			</div>
			<!-- //subNav -->
			{ : MENU_ORD_NO == '2' || MENU_ORD_NO == '7' }
			<!-- subNav -->
			<div class="subNav subNavType2 fiveTab">
				<ul>
					{ @ MENU[CONTENTS['breadcrumbs'][0]['idno']] }
					<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
					{ / }
				</ul>
			</div>
			<!-- //subNav -->

			{ : }
			<!-- subNav -->
			<div class="subNav tp{ =sizeof(MENU[CONTENTS['breadcrumbs'][0]['idno']]) }">
				<ul>
					{ @ MENU[CONTENTS['breadcrumbs'][0]['idno']] }
					<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
					{ / }
				</ul>
			</div>
			<!-- //subNav -->
			{ / }


{ : sizeof(MENU[CONTENTS['breadcrumbs'][0]['idno']]) >= 8}

			{ ? MENU_ORD_NO == '1' || MENU_ORD_NO == '5' }
			<!-- subNav -->
			<div class="subNav subNavType2 fiveTab">
				<ul>
					{ @ MENU[CONTENTS['breadcrumbs'][0]['idno']] }
					<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
					{ / }
				</ul>
			</div>
			<!-- //subNav -->
			{ : }
				<!-- subNav -->
				{ ? CONTENTS['breadcrumbs'][0]['idno'] == 4 }
				<div class="subNav tp{ =sizeof(MENU[CONTENTS['breadcrumbs'][0]['idno']]) }">
					<ul>
						{ @ MENU[CONTENTS['breadcrumbs'][0]['idno']] }
						<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
						{ / }
					</ul>
				</div>
				{ : CONTENTS['breadcrumbs'][0]['idno'] == 245 }
				<div class="subNav subNavType2">
					<ul>
						{ @ MENU[CONTENTS['breadcrumbs'][0]['idno']] }
						<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
						{ / }
					</ul>
				</div>
				{ : }
				<div class="subNav subNavType2">
					<ul>
						{ @ MENU[CONTENTS['breadcrumbs'][0]['idno']] }
						<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
						{ / }
					</ul>
				</div>
				{ / }
				<!-- //subNav -->
			{ / }


{ : }
	{ ? TABS.size_ > 1 }
			<div class="subNav subNavType2">
				<ul>
				{ @ TABS }
					<li{ ? .key_ == CONTENTS_NO } class="on"{ / } style="width:{ ? sizeof(TABS) % 5 == 0 }20{ : }25{ / }%"><a href="{ BASE_URL }/{ MENU_NO }/{ .key_ }">{ .value_ }</a></li>
				{ / }
				</ul>
			</div>
	{ / }
{ / }