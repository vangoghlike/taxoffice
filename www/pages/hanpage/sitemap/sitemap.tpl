{ #header }

		<!-- Container -->
		<div class="container" id="container">

{ #subtop }

			<!-- subContent -->
			<div class="subContent">
				
{ #breadcrumbs }

				<div class="listTyp01 sitemap">
					{ @ MENU['top'] }
					{ ? .index_ %4 == 0 }{ ? .index_ }</ul>{ / }<ul>{ / }
						<li><a href="{ BASE_URL }/{ .idno }" class="tit">{ .menu_title }</a>
							<ul class="smList dot">
							{ @ MENU[.idno] }
								<li><a href="{ BASE_URL }/{ ..idno }" class="subtit">{ ..menu_title }</a>
								{ ? sizeof(MENU[..idno]) > 0 }
									<ul>
									{ @ MENU[..idno] }
										<li>- <a href="{ BASE_URL }/{ ...idno }">{ ...menu_title }</a></li>
									{ / }
									</ul>
								{ / }
								</li>
							{ / }
							{ ? !sizeof(MENU[.idno]) }
							{ @ MENU['top'][.key_]['tabs'] }
								<li><a href="{ BASE_URL }/{ .idno }/{ ..key_ }" class="subtit">{ ..value_ }</a></li>
							{ / }
							{ / }
							</ul>
						</li>
					{ / }
					</ul>

				</div>
				<!-- //contStart -->
				<table>
					<tbody>
					<tr>

						{ @ MENU['top'] }
						<td style="background:#c1c1c1; font-size:20px; font-weight:600; color:#000; border:1px solid #ddd;">
							<a href="{ BASE_URL }/{ .idno }" class="tit">{ .menu_title }</a>
						</td>
						{ ? sizeof(MENU[.idno]) > 0 }
					</tr>
					<tr>
						{ @ MENU[.idno] }
						<td>&nbsp;</td>
						<td style="background:#ddd; font-size:14px; color:#000;">
							<a href="{ BASE_URL }/{ ..idno }" class="subtit">{ ..menu_title }</a>
						</td>

					</tr>
					{ ? sizeof(MENU[..idno]) > 0 }
					</tr>
					<tr>
						<td>&nbsp;</td><td>&nbsp;</td>
						{ @ MENU[..idno] }
						<td style="background:#f1f1f1; font-size:14px; color:#000;">
							<a href="{ BASE_URL }/{ ...idno }">{ ...menu_title }</a>
						</td>
						{ / }
					</tr>
					{ / }
					{ / }
					{ / }
					</tr>
					{ / }
					</tbody>
				</table>
			</div>
			<!-- //subContent -->

		</div>
		<!-- //Container -->

{ #footer }
