<?$this->load->view('admin/layouts/template_top_view');?><?phpif ( $forex_countries_data != '' && $forex_countries_data->num_rows() > 0){	$forex_countries_data = $forex_countries_data->row_array();}?><div class="grid">	<?$this->load->view('admin/elements/widgets_module_side_menu_view');?>	<!-- End Left Sidebar -->     <div class="left g820 scrolldiv" >		<div class="metro_col light">		<div id="msgz">				<?=print_msg();?>		</div>		<h2>Edit</h2><br />					<form name ="edit_forex_countries" method="post" enctype="multipart/form-data" >						<div id="msgz">						<?=print_msg();?>				</div>				<div class="input left" style="width:44%; margin-right:4%;">					<label for="name">Country Name *</label>					<input type="text" value="<?php echo $forex_countries_data['country_name']; ?>" name="name" id="name" />					<span class="form_error"><?php echo form_error('name'); ?></span>				</div>				<div class="input left" style="width:44%;">					<label for="country_api_slug">Country API Slug *</label><input type="text" value="<?php echo $forex_countries_data['google_api_country_slug']; ?>" name="country_api_slug" id="country_api_slug" />					<span class="form_error"><?php echo form_error('country_api_slug'); ?></span>				</div>				<div class="input left" style="width:44%; display: none;">					<label for="sort_order">Sort Order</label><input type="text" id="sort_order" name="sort_order" value="<?php echo sort_order_functionality($forex_countries_data['sort_order']); ?>" /><span class="form_error"><?php echo form_error('sort_order'); ?></span>				</div>				<div class="clr"></div>				<div class="checkbox">					<input type="checkbox" name="active" value="Y" <?( $forex_countries_data['active'] == 'Y') ? print 'checked' : '';?> />					<span>Active</span>				</div>				<div class="button left" style="width:50%;">					<input type="submit" name="edit_btn" id="edit_btn" value="Save"  class="publish" />				</div>   				<div class="clr"></div>		<div class="clr"></div>      	</form></div><div class="clr"></div></div></div>	<div class="clr"></div></div><?$this->load->view('admin/layouts/template_bottom_view');?>