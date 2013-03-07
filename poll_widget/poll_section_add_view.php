<? $this->load->view('admin/layouts/template_top_view'); ?>
<div class="grid">
	<?$this->load->view('admin/elements/widgets_module_side_menu_view');?>
     
     <div class="right content_grid scrolldiv">
      	<div class="metro_col light">
			<div id="msgz">
				<?=print_msg();?>
			</div>         
        
        	<h2>Add Section</h2><br />
			<form name="" method="post" enctype="multipart/form-data" >
				<div class="input left" style="width:44%; margin-right:4%;">
					<label for="poll_section_name">Name*</label>
                                        <input class="<?php echo multilingual_css_class();?>" type="text" value="<?php echo set_value('poll_section_name'); ?>" name="poll_section_name" id="poll_section_name" onblur="xajax_poll_section_generate_slug_xajax( $('#poll_section_name').val() )" />
					<span class="form_error"><?php echo form_error('poll_section_name'); ?></span>
				</div>
				<div class="input left" style="width:44%;">
					<label for="poll_section_slug">Poll Section Slug*</label>
					<input class="<?php echo multilingual_css_class();?>" type="text" value="<?php echo set_value('poll_section_slug'); ?>" name="poll_section_slug" id="poll_section_slug" />
					<span class="form_error"><?php echo form_error('poll_section_slug'); ?></span>
				</div>
				<div class="clr"></div>
				<div class="checkbox">
					<input type="checkbox" checked="checked" name="active" value="Y" />
					<span>Active</span>
				</div>
				<div class="button left" style="width:50%;">
					<input type="submit" name = "submit_btn" id="submit_btn" value="Save"  class="publish" />
				</div>
			</form>
		<div class="clr"></div>
		</div>
	</div>
<div class="clr"></div>
</div>
<?$this->load->view('admin/layouts/template_bottom_view');?>