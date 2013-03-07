<? $this->load->view('admin/layouts/template_top_view'); ?>
<?php
		//check data of category send from controller to view
		if ( $poll_data != '' && $poll_data->num_rows() > 0)
		{
			$poll_data = $poll_data->row_array();
		}
?>
<div class="grid">
	<?$this->load->view('admin/elements/widgets_module_side_menu_view');?>
     
     <div class="right content_grid scrolldiv">
      	<div class="metro_col light">
			<div id="msgz">
				<?=print_msg();?>
			</div>
        
			<h2>Edit Section</h2><br />
			<form name="" method="post" enctype="multipart/form-data" >
					<div class="input left" style="width:44%; margin-right:4%;">
						<label for="poll_section_name">Name*</label>
						<input class="<?php echo multilingual_css_class();?>" type="text" value="<?=$poll_data['section_name']; ?>" name="poll_section_name" id="poll_section_name" 
							<?						
							if(acl_premissions( array('module'=>'EDIT_SLUG', 'section'=>'edit_slug', 'return_bolean'=>TRUE) ))
							{
								?>
								onblur="xajax_poll_section_generate_slug_xajax( $('#poll_section_name').val() )" 
								<?
							}
							?> />
						<span class="form_error"><?php echo form_error('poll_section_name'); ?></span>
					</div>
					<div class="input left" style="width:44%;">
						<label for="poll_section_slug">Section Slug*</label>
						<?						
						if(acl_premissions( array('module'=>'EDIT_SLUG', 'section'=>'edit_slug', 'return_bolean'=>TRUE) ))
						{
							?>
							<input class="<?php echo multilingual_css_class();?>" type="text" value="<?=$poll_data['section_slug']; ?>" name="poll_section_slug" id="poll_section_slug" />
							<?
						}
						else
						{
							?>
							<input readonly="readonly" type="text" value="<?=$poll_data['section_slug']; ?>" name="poll_section_slug" id="poll_section_slug" />
							<?
						}
						?>	
						
						<span class="form_error"><?php echo form_error('poll_section_slug'); ?></span>
					</div>
					<div class="clr"></div>
					<div class="checkbox">
					<input type="checkbox" <?=($poll_data['active']=='Y')?'checked':'unchecked'; ?> name="poll_section_status" value="Y" />
					<span>Active</span>
					<?php echo form_error('poll_section_status'); ?>
				</div>
				<div class="button left" style="width:50%;">
					<input type="submit" name="edit_btn" id="edit_btn" value="Save"  class="publish" />
				</div>
			</form>
		<div class="clr"></div>
		</div>
	</div>
<div class="clr"></div>
</div>
<?$this->load->view('admin/layouts/template_bottom_view');?>