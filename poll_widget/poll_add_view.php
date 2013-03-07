<? $this->load->view('admin/layouts/template_top_view'); ?>

<script type="text/javascript">
	
	//number of option - start from 0
	var option_no = 1;
	
	$(document).ready(function(){
		//for date picker
		//M,d	yy
		$( "#poll_start_date" ).datepicker({ dateFormat: '<?=DATEPICKER_DATE_FORMATE;?>' });
		$( "#poll_end_date" ).datepicker({ dateFormat: '<?=DATEPICKER_DATE_FORMATE;?>' });
	});
</script>

<script type="text/javascript">
	function add_an_other_option() 
	{
		input = $('<div style="width:100%; margin-top:3px;"><input style="width: 120px" id="option_input_'+option_no+'" placeholder="Poll Question" name="poll_option_add_another[]" /><span id="option_sort_label_'+option_no+'">&nbsp;</span><input style="width: 60px" placeholder="Sort Order" id="option_sort_'+option_no+'" name="poll_option_sort_order[]" /><span onclick="remove_option('+option_no+')" id="option_no_'+option_no+'" style="vertical-align:super;">&nbsp;<img  src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/seo_stop.png" style="cursor: pointer;"  align="middle" /></span></div>');
		$('#add_an_other_option').append(input);
		++option_no;
	}
	
	function remove_option(option)
	{
		$("#option_no_"+option).remove();
		$("#option_input_"+option).remove();
		$("#option_sort_"+option).remove();
		$("#option_sort_label_"+option).remove();
		
	}
	
	function option_validation()
	{
		for(op_loop=0; op_loop<option_no; op_loop++)
		{
			if(trim($('#option_input_'+op_loop).val()) != '')
			{
				return true;
			}
		}
		
		jAlert('Pleae select minimum 1 option!');
		return false;
	}
	
</script>


<div class="grid">
	<?$this->load->view('admin/elements/widgets_module_side_menu_view');?>
     
     <div class="right content_grid scrolldiv">
      	<div class="metro_col light">
			<div id="msgz">
				<?=print_msg();?>
			</div>
        
        	<h2>Add</h2><br />
			<form name="" method="post" enctype="multipart/form-data" onsubmit="return option_validation()">
				<div class="textarea">
					<label for="poll_title">Poll Title*</label>
					<? 
						$content = '';
						if (!isset($empty_field))
						{
							$content	=	set_value('poll_title');
						}
						else
						{
							$content	=	$empty_field;
						} 
					?>
                                        <textarea class="<?php echo multilingual_css_class();?>" id="poll_title" name="poll_title" placeholder="Question"><?=trim($content);?></textarea>
					<span class="form_error"><?php echo form_error('poll_title'); ?></span>
				</div>
				<div class="textarea">			
				<label for="">Description</label>
				<? 
					$content = '';
					if (!isset($empty_field))
					{
						$content	=	set_value('poll_description');
					}
					else
					{
						$content	=	$empty_field;
					} 
				?>
				<textarea class="<?php echo multilingual_css_class();?>" id="poll_title" name="poll_description" placeholder="Description"><?=trim($content);?></textarea>
					<span class="form_error"><?php echo form_error('poll_description'); ?></span>
				</div>	
				<div class="input" style="width:48%; margin-right: 10px; float: left;">
					<label>Start Date*</label>
					<input type="text" value="<?=(set_value('poll_start_date') == '' )?date('j F Y'):set_value('poll_start_date'); ?>" name="poll_start_date" id="poll_start_date" />
					<?php echo form_error('poll_start_date'); ?>
				</div>
				<div class="input" style="width:48%; margin-right: 10px; float: left;">
					<label>End Date*</label>
					<input type="text" value="<?php echo set_value('poll_end_date'); ?>" name="poll_end_date" id="poll_end_date" />
					<?php echo form_error('poll_end_date'); ?>
				</div>
				<div class="clr"></div>
				<div class="select left" style="width:48%; margin-right: 10px;">
					<label for="poll_section_option">Poll Section*</label>
					<select name="poll_section_option" id="poll_section_option">
						<option selected value="">Select section</option>	
						<?
						foreach( $poll_scetion AS $key => $val )
						{
							?>
							<option value="<?=$val['id'];?>"><?=$val['section_name'];?></option>
							<?
						}
						?>
					</select>
					<?php echo form_error('poll_section_option'); ?>
				</div>
				<div class="select left" style="width:48%; margin-right: 10px;">
					<label for="poll_status">Poll Status*</label>
					<select name="poll_status" id="poll_status">
						<option value="">Select Option</option>
						<option selected value="open">Open</option>
						<option value="closed">Closed</option>
						<option value="inactive">Inactive</option>
						<option value="draft">Draft</option>
					</select>
					<?php echo form_error('poll_status'); ?>
				</div>
				<div class="clr"></div>
				
				<div class="right" style="width:48%; margin-bottom: 25px; margin-right: 10px;">
					<div style="display:block; width: 250px;" id="add_an_other_option">
                                            <div>
                                                <input style="width: 120px" placeholder="Poll Question" id="option_input_0" name="poll_option_add_another[]" />
                                                <input style="width: 60px" placeholder="Sort Order" id="option_sort_0" name="poll_option_sort_order[]" />
                                                <span onclick="remove_option(0)" id="option_no_0" style="float: right;vertical-align:super;">
                                                    <img  src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/seo_stop.png" style="margin-top: 20%; alignment-adjust: middle; cursor: pointer;"  />
                                                </span>
                                            </div>
                                        </div><br><br>
                                    <div class="left" style="width:48%; margin-bottom: 25px; margin-right: 10px;">
					<input class="draft" type="button" onclick="add_an_other_option()" name="add" value="Add options" />	
                                    </div>
					<?php echo form_error('poll_option_add_another'); ?>
				</div>
				<div class="clr"></div>
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