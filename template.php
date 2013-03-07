

	<!--============================Main Column============================-->
	<div class="main_column">
		<!--=========Graph Box=========-->
		<div  class="box expose">
			<!-- A box with class of expose will call expose plugin automatically -->
			<div class="header">
			Graph

			</div>
			<div class="body">

				<div class="info"> <img src="<?=base_url().TEMPLATE_DIR;?>images/iinfo_icon.png" alt="Information" width="28" height="29" class="icon" /><strong>Click anywhere on the graph box to expose it in place.</strong><a href="#" class="close_notification" title="Click to Close"><img src="images/close_icon.gif" width="6" height="6" alt="Close" /></a></div>

				<table width="100%" class="graph">
						<!-- Any table with the class ".graph" will be converted into a graph using visualize plugin -->
						<thead>
						<tr>
							<td></td>
							<th scope="col">food</th>
							<th scope="col">auto</th>
							<th scope="col">household</th>
							<th scope="col">furniture</th>
							<th scope="col">kitchen</th>
							<th scope="col">bath</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">Mary</th>
							<td>190</td>
							<td>160</td>
							<td>40</td>
							<td>120</td>
							<td>30</td>
							<td>70</td>
						</tr>
						<tr>
							<th scope="row">Tom</th>
							<td>3</td>
							<td>40</td>
							<td>30</td>
							<td>45</td>
							<td>35</td>
							<td>49</td>
						</tr>
						<tr>
							<th scope="row">Brad</th>
							<td>10</td>
							<td>180</td>
							<td>10</td>
							<td>85</td>
							<td>25</td>
							<td>79</td>
						</tr>
						<tr>
							<th scope="row">Kate</th>
							<td>40</td>
							<td>80</td>
							<td>90</td>
							<td>25</td>
							<td>15</td>
							<td>119</td>
						</tr>
					</tbody>
		</table>
			</div>
		</div>
		<!--End Graph Box-->
		<!--=========Tables Box=========-->
		<div class="box">
			<div class="header">
				<!--===Sub Navigation===-->
				<ul class="sub_nav">
					<!-- To make tabs in box header, just use "sub_nav" class on UL -->
					<li title="Data Table Example"><a href="#" class="current">Data Table</a></li>
					<li title="Data tables that can be printed and exported to excel and csv"><a href="#">Exportable Tables</a></li>
					<li title="A simple table with minimum styling"><a href="#">Simple Table</a></li>
					<li title="Click on any row in the table to expand it"><a href="#">Expandable Table With Pagination</a></li>
				</ul>
				<!--End sub navigation-->
				<img src="<?=base_url().TEMPLATE_DIR;?>images/tables_icon.png" alt="Accordion" width="30" height="30" />Tables
			</div>
			<div class="body">
				<div class="panes">
					<!-- Any div under the class of "panes" will associate itself in the same order as the tabs defined above under "sub_nav"-->
					<!-- Pane 1 -->
					<div class="clearfix">
						<table cellpadding="0" cellspacing="0" border="0" class="display dataTable">
							<thead>
								<tr>
									<th>Rendering engine</th>
									<th>Browser</th>
									<th>Platform(s)</th>
									<th>CSS grade</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Rendering engine</th>
									<th>Browser</th>
									<th>Platform(s)</th>
									<th>CSS grade</th>
								</tr>
							</tfoot>
							<tbody>
								<tr class="gradeX">
									<td>Trident</td>
									<td>Internet Explorer 4.0</td>
									<td>Win 95+</td>
									<td class="center">X</td>
								</tr>
								<tr class="gradeC">
									<td>Trident</td>
									<td>Internet Explorer 5.0</td>
									<td>Win 95+</td>
									<td class="center">C</td>
								</tr>
								<tr class="gradeA">
									<td>Trident</td>
									<td>Internet Explorer 5.5</td>
									<td>Win 95+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Trident</td>
									<td>Internet Explorer 6</td>
									<td>Win 98+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Trident</td>
									<td>Internet Explorer 7</td>
									<td>Win XP SP2+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Trident</td>
									<td>AOL browser (AOL desktop)</td>
									<td>Win XP</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Firefox 1.0</td>
									<td>Win 98+ / OSX.2+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Firefox 1.5</td>
									<td>Win 98+ / OSX.2+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Firefox 2.0</td>
									<td>Win 98+ / OSX.2+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Firefox 3.0</td>
									<td>Win 2k+ / OSX.3+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Camino 1.0</td>
									<td>OSX.2+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Camino 1.5</td>
									<td>OSX.3+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Netscape 7.2</td>
									<td>Win 95+ / Mac OS 8.6-9.2</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Netscape Browser 8</td>
									<td>Win 98SE+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Netscape Navigator 9</td>
									<td>Win 98+ / OSX.2+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.0</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.1</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.2</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.3</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.4</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.5</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.6</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.7</td>
									<td>Win 98+ / OSX.1+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.8</td>
									<td>Win 98+ / OSX.1+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Seamonkey 1.1</td>
									<td>Win 98+ / OSX.2+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Epiphany 2.20</td>
									<td>Gnome</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>Safari 1.2</td>
									<td>OSX.3</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>Safari 1.3</td>
									<td>OSX.3</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>Safari 2.0</td>
									<td>OSX.4+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>Safari 3.0</td>
									<td>OSX.4+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>OmniWeb 5.5</td>
									<td>OSX.4+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>iPod Touch / iPhone</td>
									<td>iPod</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>S60</td>
									<td>S60</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 7.0</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 7.5</td>
									<td>Win 95+ / OSX.2+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 8.0</td>
									<td>Win 95+ / OSX.2+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 8.5</td>
									<td>Win 95+ / OSX.2+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 9.0</td>
									<td>Win 95+ / OSX.3+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 9.2</td>
									<td>Win 88+ / OSX.3+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 9.5</td>
									<td>Win 88+ / OSX.3+</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera for Wii</td>
									<td>Wii</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Nokia N800</td>
									<td>N800</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Nintendo DS browser</td>
									<td>Nintendo DS</td>
									<td class="center">C/A<sup>1</sup></td>
								</tr>
								<tr class="gradeC">
									<td>KHTML</td>
									<td>Konqureror 3.1</td>
									<td>KDE 3.1</td>
									<td class="center">C</td>
								</tr>
								<tr class="gradeA">
									<td>KHTML</td>
									<td>Konqureror 3.3</td>
									<td>KDE 3.3</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>KHTML</td>
									<td>Konqureror 3.5</td>
									<td>KDE 3.5</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeX">
									<td>Tasman</td>
									<td>Internet Explorer 4.5</td>
									<td>Mac OS 8-9</td>
									<td class="center">X</td>
								</tr>
								<tr class="gradeC">
									<td>Tasman</td>
									<td>Internet Explorer 5.1</td>
									<td>Mac OS 7.6-9</td>
									<td class="center">C</td>
								</tr>
								<tr class="gradeC">
									<td>Tasman</td>
									<td>Internet Explorer 5.2</td>
									<td>Mac OS 8-X</td>
									<td class="center">C</td>
								</tr>
								<tr class="gradeA">
									<td>Misc</td>
									<td>NetFront 3.1</td>
									<td>Embedded devices</td>
									<td class="center">C</td>
								</tr>
								<tr class="gradeA">
									<td>Misc</td>
									<td>NetFront 3.4</td>
									<td>Embedded devices</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeX">
									<td>Misc</td>
									<td>Dillo 0.8</td>
									<td>Embedded devices</td>
									<td class="center">X</td>
								</tr>
								<tr class="gradeX">
									<td>Misc</td>
									<td>Links</td>
									<td>Text only</td>
									<td class="center">X</td>
								</tr>
								<tr class="gradeX">
									<td>Misc</td>
									<td>Lynx</td>
									<td>Text only</td>
									<td class="center">X</td>
								</tr>
								<tr class="gradeC">
									<td>Misc</td>
									<td>IE Mobile</td>
									<td>Windows Mobile 6</td>
									<td class="center">C</td>
								</tr>
								<tr class="gradeC">
									<td>Misc</td>
									<td>PSP browser</td>
									<td>PSP</td>
									<td class="center">C</td>
								</tr>
								<tr class="gradeU">
									<td>Other browsers</td>
									<td>All others</td>
									<td>-</td>
									<td class="center">U</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- Pane 2 -->
					<div class="clearfix">
							<table cellpadding="0" cellspacing="0" border="0" class="display dataTable_exportable">
									<thead>
											<tr>
													<th>Rendering engine</th>
													<th>Browser</th>
													<th>Platform(s)</th>
													<th>Engine version</th>
													<th>CSS grade</th>
											</tr>
									</thead>
									<tfoot>
											<tr>
													<th>Rendering engine</th>
													<th>Browser</th>
													<th>Platform(s)</th>
													<th>Engine version</th>
													<th>CSS grade</th>
											</tr>
									</tfoot>
									<tbody>
											<tr class="odd_gradeX">
													<td>Trident</td>
													<td>Internet Explorer 4.0</td>
													<td>Win 95+ (Entity: &amp;)</td>
													<td class="center">4</td>
													<td class="center">X</td>
											</tr>
											<tr class="even_gradeC">
													<td>Trident</td>
													<td>Internet Explorer 5.0</td>
													<td>Win 95+</td>
													<td class="center">5</td>
													<td class="center">C</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Trident</td>
													<td>Internet Explorer 5.5</td>
													<td>Win 95+</td>
													<td class="center">5.5</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>Trident</td>
													<td>Internet Explorer 6</td>
													<td>Win 98+</td>
													<td class="center">6</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Trident</td>
													<td>Internet Explorer 7</td>
													<td>Win XP SP2+</td>
													<td class="center">7</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>Trident</td>
													<td>AOL browser (AOL desktop)</td>
													<td>Win XP</td>
													<td class="center">6</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Gecko (UTF-8: $¢€)</td>
													<td>Firefox 1.0</td>
													<td>Win 98+ / OSX.2+</td>
													<td class="center">1.7</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>Gecko</td>
													<td>Firefox 1.5</td>
													<td>Win 98+ / OSX.2+</td>
													<td class="center">1.8</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Gecko</td>
													<td>Firefox 2.0</td>
													<td>Win 98+ / OSX.2+</td>
													<td class="center">1.8</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>Gecko</td>
													<td>Firefox 3.0</td>
													<td>Win 2k+ / OSX.3+</td>
													<td class="center">1.9</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Gecko</td>
													<td>Camino 1.0</td>
													<td>OSX.2+</td>
													<td class="center">1.8</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>Gecko</td>
													<td>Camino 1.5</td>
													<td>OSX.3+</td>
													<td class="center">1.8</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Gecko</td>
													<td>Netscape 7.2</td>
													<td>Win 95+ / Mac OS 8.6-9.2</td>
													<td class="center">1.7</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>Gecko</td>
													<td>Netscape Browser 8</td>
													<td>Win 98SE+</td>
													<td class="center">1.7</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Gecko</td>
													<td>Netscape Navigator 9</td>
													<td>Win 98+ / OSX.2+</td>
													<td class="center">1.8</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>Gecko</td>
													<td>Mozilla 1.0</td>
													<td>Win 95+ / OSX.1+</td>
													<td class="center">1</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Gecko</td>
													<td>Mozilla 1.1</td>
													<td>Win 95+ / OSX.1+</td>
													<td class="center">1.1</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>Gecko</td>
													<td>Mozilla 1.2</td>
													<td>Win 95+ / OSX.1+</td>
													<td class="center">1.2</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Gecko</td>
													<td>Mozilla 1.3</td>
													<td>Win 95+ / OSX.1+</td>
													<td class="center">1.3</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>Gecko</td>
													<td>Mozilla 1.4</td>
													<td>Win 95+ / OSX.1+</td>
													<td class="center">1.4</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Gecko</td>
													<td>Mozilla 1.5</td>
													<td>Win 95+ / OSX.1+</td>
													<td class="center">1.5</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>Gecko</td>
													<td>Mozilla 1.6</td>
													<td>Win 95+ / OSX.1+</td>
													<td class="center">1.6</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Gecko</td>
													<td>Mozilla 1.7</td>
													<td>Win 98+ / OSX.1+</td>
													<td class="center">1.7</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>Gecko</td>
													<td>Mozilla 1.8</td>
													<td>Win 98+ / OSX.1+</td>
													<td class="center">1.8</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Gecko</td>
													<td>Seamonkey 1.1</td>
													<td>Win 98+ / OSX.2+</td>
													<td class="center">1.8</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>Gecko</td>
													<td>Epiphany 2.20</td>
													<td>Gnome</td>
													<td class="center">1.8</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Webkit</td>
													<td>Safari 1.2</td>
													<td>OSX.3</td>
													<td class="center">125.5</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>Webkit</td>
													<td>Safari 1.3</td>
													<td>OSX.3</td>
													<td class="center">312.8</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Webkit</td>
													<td>Safari 2.0</td>
													<td>OSX.4+</td>
													<td class="center">419.3</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>Webkit</td>
													<td>Safari 3.0</td>
													<td>OSX.4+</td>
													<td class="center">522.1</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Webkit</td>
													<td>OmniWeb 5.5</td>
													<td>OSX.4+</td>
													<td class="center">420</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>Webkit</td>
													<td>iPod Touch / iPhone</td>
													<td>iPod</td>
													<td class="center">420.1</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Webkit</td>
													<td>S60</td>
													<td>S60</td>
													<td class="center">413</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>Presto</td>
													<td>Opera 7.0</td>
													<td>Win 95+ / OSX.1+</td>
													<td class="center">-</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Presto</td>
													<td>Opera 7.5</td>
													<td>Win 95+ / OSX.2+</td>
													<td class="center">-</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>Presto</td>
													<td>Opera 8.0</td>
													<td>Win 95+ / OSX.2+</td>
													<td class="center">-</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Presto</td>
													<td>Opera 8.5</td>
													<td>Win 95+ / OSX.2+</td>
													<td class="center">-</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>Presto</td>
													<td>Opera 9.0</td>
													<td>Win 95+ / OSX.3+</td>
													<td class="center">-</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Presto</td>
													<td>Opera 9.2</td>
													<td>Win 88+ / OSX.3+</td>
													<td class="center">-</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>Presto</td>
													<td>Opera 9.5</td>
													<td>Win 88+ / OSX.3+</td>
													<td class="center">-</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Presto</td>
													<td>Opera for Wii</td>
													<td>Wii</td>
													<td class="center">-</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>Presto</td>
													<td>Nokia N800</td>
													<td>N800</td>
													<td class="center">-</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Presto</td>
													<td>Nintendo DS browser</td>
													<td>Nintendo DS</td>
													<td class="center">8.5</td>
													<td class="center">C/A<sup>1</sup></td>
											</tr>
											<tr class="even_gradeC">
													<td>KHTML</td>
													<td>Konqureror 3.1</td>
													<td>KDE 3.1</td>
													<td class="center">3.1</td>
													<td class="center">C</td>
											</tr>
											<tr class="odd_gradeA">
													<td>KHTML</td>
													<td>Konqureror 3.3</td>
													<td>KDE 3.3</td>
													<td class="center">3.3</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeA">
													<td>KHTML</td>
													<td>Konqureror 3.5</td>
													<td>KDE 3.5</td>
													<td class="center">3.5</td>
													<td class="center">A</td>
											</tr>
											<tr class="odd_gradeX">
													<td>Tasman</td>
													<td>Internet Explorer 4.5</td>
													<td>Mac OS 8-9</td>
													<td class="center">-</td>
													<td class="center">X</td>
											</tr>
											<tr class="even_gradeC">
													<td>Tasman</td>
													<td>Internet Explorer 5.1</td>
													<td>Mac OS 7.6-9</td>
													<td class="center">1</td>
													<td class="center">C</td>
											</tr>
											<tr class="odd_gradeC">
													<td>Tasman</td>
													<td>Internet Explorer 5.2</td>
													<td>Mac OS 8-X</td>
													<td class="center">1</td>
													<td class="center">C</td>
											</tr>
											<tr class="even_gradeA">
													<td>Misc</td>
													<td>NetFront 3.1</td>
													<td>Embedded devices</td>
													<td class="center">-</td>
													<td class="center">C</td>
											</tr>
											<tr class="odd_gradeA">
													<td>Misc</td>
													<td>NetFront 3.4</td>
													<td>Embedded devices</td>
													<td class="center">-</td>
													<td class="center">A</td>
											</tr>
											<tr class="even_gradeX">
													<td>Misc</td>
													<td>Dillo 0.8</td>
													<td>Embedded devices</td>
													<td class="center">-</td>
													<td class="center">X</td>
											</tr>
											<tr class="odd_gradeX">
													<td>Misc</td>
													<td>Links</td>
													<td>Text only</td>
													<td class="center">-</td>
													<td class="center">X</td>
											</tr>
											<tr class="even_gradeX">
													<td>Misc</td>
													<td>Lynx</td>
													<td>Text only</td>
													<td class="center">-</td>
													<td class="center">X</td>
											</tr>
											<tr class="odd_gradeC">
													<td>Misc</td>
													<td>IE Mobile</td>
													<td>Windows Mobile 6</td>
													<td class="center">-</td>
													<td class="center">C</td>
											</tr>
											<tr class="even_gradeC">
													<td>Misc</td>
													<td>PSP browser</td>
													<td>PSP</td>
													<td class="center">-</td>
													<td class="center">C</td>
											</tr>
											<tr class="odd_gradeU">
													<td>Other browsers</td>
													<td>All others</td>
													<td>-</td>
													<td class="center">-</td>
													<td class="center">U</td>
											</tr>
									</tbody>
							</table>
					</div>
					<!-- Pane 3 -->
					<div>
						<table border="0" cellpadding="0" cellspacing="0" class="grid_table wf">
							<thead>
								<tr>
									<th>Lorem</th>
									<th>Ipsum</th>
									<th>Dolor</th>
									<th>Sit Amet</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Lorem</td>
									<td>Ipsum</td>
									<td>Dolor</td>
									<td>Sit Amet</td>
								</tr>
								<tr>
									<td>Lorem</td>
									<td>Ipsum</td>
									<td>Dolor</td>
									<td>Sit Amet</td>
								</tr>
								<tr>
									<td>Lorem</td>
									<td>Ipsum</td>
									<td>Dolor</td>
									<td>Sit Amet</td>
								</tr>
								<tr>
									<td>Lorem</td>
									<td>Ipsum</td>
									<td>Dolor</td>
									<td>Sit Amet</td>
								</tr>
								<tr>
									<td>Lorem</td>
									<td>Ipsum</td>
									<td>Dolor</td>
									<td>Sit Amet</td>
								</tr>
								<tr>
									<td>Lorem</td>
									<td>Ipsum</td>
									<td>Dolor</td>
									<td>Sit Amet</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- Pane 4 -->
					<div>
						<table border="0" cellpadding="0" cellspacing="0" class="grid_table wf expandable">
							<thead>
								<tr>
									<th> </th>
									<th>Lorem</th>
									<th>Ipsum</th>
									<th>Dolor</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="tac"><span class="toggle"></span></td>
									<td>Lorem</td>
									<td>Ipsum</td>
									<td>Dolor</td>
								</tr>
								<tr>
									<td class="tac"> </td>
									<td colspan="3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
								</tr>
								<tr>
									<td class="tac"><span class="toggle"></span></td>
									<td>Lorem</td>
									<td>Ipsum</td>
									<td>Dolor</td>
								</tr>
								<tr>
									<td> </td>
									<td colspan="3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
								</tr>
								<tr>
									<td class="tac"><span class="toggle"></span></td>
									<td>Lorem</td>
									<td>Ipsum</td>
									<td>Dolor</td>
								</tr>
								<tr>
									<td class="grid_dropdown"> </td>
									<td colspan="3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
								</tr>
								<tr>
									<td class="tac"><span class="toggle"></span></td>
									<td>Lorem</td>
									<td>Ipsum</td>
									<td>Dolor</td>
								</tr>
								<tr>
									<td class="grid_dropdown"> </td>
									<td colspan="3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
								</tr>
								<tr>
									<td class="tac"><span class="toggle"></span></td>
									<td>Lorem</td>
									<td>Ipsum</td>
									<td>Dolor</td>
								</tr>
								<tr>
									<td class="grid_dropdown"> </td>
									<td colspan="3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
								</tr>
								<tr>
									<td class="tac"><span class="toggle"></span></td>
									<td>Lorem<small>magna aliqua</small></td>
									<td>Ipsum<small>Ut magna aliqua ut Duis aute irure</small></td>
									<td>Dolor<small>dolor in velit esse cillu</small></td>
								</tr>
								<tr>
									<td class="grid_dropdown"> </td>
									<td colspan="3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
								</tr>
							</tbody>
						</table>
						<!--=========Pagination=========-->
						<ul class="pagination clearfix">
							<li><a href="#">&lt;&lt; Prev</a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">6</a></li>
							<li><a href="#">7</a></li>
							<li><a href="#">Next &gt;&gt;</a></li>
						</ul>
						<!--End Pagination-->
					</div>
				</div>
			</div>
		</div>
		<!--End Tables Box-->
	</div>
	<!--End Main Column-->

	<!--=======================Forms and Further Sub-Navigations==========================-->
	<div class="box clear">
		<div class="header">
			<img src="<?=base_url().TEMPLATE_DIR;?>images/tables_icon.png" alt="Accordion" width="30" height="30" />Forms &amp; Typography
		</div>
		<div class="body_vertical_nav clearfix">
			<!-- Grey backgound applied to box body -->
			<!-- Vertical nav -->
			<ul class="vertical_nav">
				<li class="active"><a href="#">Forms</a></li>
				<li><a href="#">Typography</a></li>
				<li><a href="#">More Horizontal Tabs</a></li>
				<li><a href="#">Editor</a></li>
			</ul>
			<div class="main_column">
				<!-- Content area that wil show the form and stuff -->
				<div class="panes_vertical">
					<!-- All divs inside this div will become panes for navigation above -->
					<div>
						<!-- First Pane -->
						<!--=========Forms=========-->
						<form action="#" method="post">
							<fieldset>
								<legend>Fieldset Legend</legend>
								<p>
									<label>Text field:</label>
									<input name="textfield2" type="text" class="textfield" />
									<span class="form_hint">Form Hint</span> <small>This is a normal text field</small></p>
								<p>
									<label>Medium Textfield:</label>
									<input name="textfield2" type="text" class="textfield med" />
									<small>This is a medium sized text field</small></p>
								<p>
									<label>Textfield with Error:</label>
									<input name="textfield4" type="text" class="textfield med error" />
									<span class="form_error">Form Error</span> <small>This is a large textfield with error</small></p>
								<p>
									<input type="checkbox" name="checkbox" id="checkbox" />
									This is a check box</p>
								<p>
									<input type="radio" name="radio" />
									This is an option box
									<input type="radio" name="radio" />
									This is an option box
									<label>Dropdown:</label>
									<select name="select" id="select">
										<option>This is a dropdown</option>
										<option>Another Value</option>
										<option>And Another Value</option>
									</select>
								</p>
								<p>
									<label>Multi Line Textfield:</label>
									<textarea name="textfield3" rows="8" cols="5" id="textfield3">
</textarea>
								</p>
								<p>
									<input name="button2" type="submit" class="button2" id="button2" value="Submit" />
									<input name="button" type="submit" class="button" id="button" value="Cancel" />
								</p>
							</fieldset>
						</form>
					</div>
					<div>
						<!-- Second Pane -->
						<!--=========Typography=========-->
						<h1>Heading 1</h1>
						<p>Lorem ipsum dolor sit amet, <a href="#">consectetur</a> adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo <a href="#">consequat</a>. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<h2>Heading 2</h2>
						Lorem ipsum dolor sit amet, <a href="#">consectetur</a> adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo <a href="#">consequat</a>. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						<blockquote>
							<p>Lorem ipsum dolor sit amet, <a href="#">consectetur</a> adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo <a href="#">consequat</a>.</p>
						</blockquote>
						<p>Lorem ipsum dolor sit amet, <a href="#">consectetur</a> adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo <a href="#">consequat</a>.</p>
						<h3>Heading 3</h3>
						<ul>
							<li>Lorem ipsum dolor sit amet,</li>
							<li>consectetur adipisicing elit</li>
							<li>sed do eiusmod tempor incididunt</li>
						</ul>
						<h4>Heading 4</h4>
						<ol>
							<li>Lorem ipsum dolor sit amet,</li>
							<li>consectetur adipisicing elit</li>
							<li>sed do eiusmod tempor incididunt</li>
						</ol>
						<h5>Heading 5</h5>
						<ul class="bulleted_list">
							<li>Lorem ipsum dolor sit amet,</li>
							<li>consectetur adipisicing elit</li>
							<li>sed do eiusmod tempor incididnt</li>
						</ul>
						<h6>Heading 6</h6>
						<p>Lorem ipsum dolor sit amet, <a href="#">consectetur</a> adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo <a href="#">consequat</a>. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<p> </p>
						<hr />
						<!-- Heading with borders -->
						<h1 class="border_blue">Heading 1 with border style</h1>
						<h2 class="border_lt_blue">Heading 2 with another border style</h2>
						<h3 class="border_grey">Heading 3 with yet another border style</h3>
					</div>
					<div>
						<!-- Third Pane -->


						<!-- Horizontal Navigation -->
						<ul class="horizontal_nav">
							<li class="active"><a href="#">Tab1 With Long Text</a></li>
							<li><a href="#">Tab 2</a></li>
							<li><a href="#">Tab 3</a></li>
							<li><a href="#">Tab 4</a></li>
						</ul>

						<!-- All divs inside this div will become panes for navigation above -->
						<div class="panes_horizontal">


						<!-- Pane 1 -->
						<div>
						<h5> Tab 1</h5>
						Lorem ipsum dolor sit amet, <a href="#">consectetur</a> adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo <a href="#">consequat</a>. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>

						<!-- Pane 2 -->
						<div>
						<h5> Tab 2</h5>
						Lorem ipsum dolor sit amet, <a href="#">consectetur</a> adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo <a href="#">consequat</a>. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>


    				<!-- Pane 3 -->
						<div>
						<h5> Tab 3</h5>
						Lorem ipsum dolor sit amet, <a href="#">consectetur</a> adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo <a href="#">consequat</a>. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>

						<!-- Pane 4 -->
						<div>
						<h5> Tab 4</h5>
						Lorem ipsum dolor sit amet, <a href="#">consectetur</a> adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo <a href="#">consequat</a>. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>




						</div>
					</div>
					<!-- Fourth Pane -->
					<div>
						<form action="#">
							<div>
								<textarea name="textfield3" rows="8" cols="50" id="wysiwyg" class="wysiwyg"></textarea>
								<!-- WYSIWYG Editor -->
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End Forms and Sub-Nav's Box-->
	<!--=========Containers for boxes which are placed side by side=========-->
	<!--=========Container Box on the left=========-->
	<div class="box column-left">
		<!--Begin Box-->
		<div class="header">
			<p><img src="<?=base_url().TEMPLATE_DIR;?>images/half_width_icon.png" alt="Half Width Box" width="30" height="30" />Half Width</p>
		</div>
		<div class="body">
			Lorem ipsum dolor sit amet, <a href="#">consectetur</a> adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo <a href="#">consequat</a>. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</div>
	</div>
	<!--=========Container for Box on the Right=========-->
	<div class="box column-right">
		<!--Begin Box-->
		<div class="header">
			<p><img src="<?=base_url().TEMPLATE_DIR;?>images/half_width_icon.png" alt="Half Width Box" width="30" height="30" />Half Width</p>
		</div>
		<div class="body">
			<ul class="bulleted_list">
				<li>Lorem ipsum dolor sit amet,</li>
				<li>consectetur adipisicing elit</li>
				<li>sed do eiusmod tempor incididunt</li>
				<li>ut labore et dolore magna aliqua.</li>
			</ul>
		</div>
	</div>




