<? $this->load->view('admin/layouts/template_top_view'); ?>
<?php
		//check data of category send from controller to view
		if ( $poll_data != '' && $poll_data->num_rows() > 0)
		{
			$poll_data = $poll_data->row_array();
		}
?>
<script type="text/javascript">
	
	var total_options = 0;
	
	$(document).ready(function(){
		//for date picker
		$(function() {
			//M,d	yy
			$( "#poll_start_date" ).datepicker({ dateFormat: '<?=DATEPICKER_DATE_FORMATE;?>' });
			$( "#poll_end_date" ).datepicker({ dateFormat: '<?=DATEPICKER_DATE_FORMATE;?>' });
			
		});
	});
	
	function option_validation()
	{
		for($op_loop=0; $op_loop<total_options; $op_loop++)
		{
			if(trim($('#option_input_'+$op_loop).val()) != '')
			{
				return true;
			}
		}
		
		alert('Pleae slect minimum 1 option!');
		return false;
	}
	
</script>

<script type="text/javascript">
	function add_an_other_option() 
	{
		input = $('<input placeholder="Poll Question" style="width: 120px" name="poll_option_add_another_new[]"/><input type="checkbox" name="poll_question_option_status_new[]" style="display:none"/>&nbsp;<input placeholder="Sort Order" style="width: 60px" name="poll_option_sort_order_new[]" /><input style="display: inline-block; width: 10px; margin-left: 3px;" type="checkbox" name="poll_option_active_new['+total_options+']" checked />&nbsp;Active<br /><br />');
		$('#add_an_other_option').append(input);
		++total_options;
	}
</script>


<div class="grid">
	<?$this->load->view('admin/elements/widgets_module_side_menu_view');?>
     
     <div class="right content_grid scrolldiv">
      	<div class="metro_col light">
			<div id="msgz">
				<?=print_msg();?>
			</div>
			       
        	<h2>Edit</h2><br />
			<form name="" method="post" enctype="multipart/form-data" onsubmit="return option_validation()">
				<div class="textarea">
					<label for="poll_title">Poll Title*</label>
					<? 
						$content = '';
						if (isset($poll_data['question_title']))
						{
							$content	=	$poll_data['question_title'];
						}
					?>
					<textarea class="<?php echo multilingual_css_class();?>" id="poll_title" name="poll_title" placeholder="Question"><?=trim($content);?></textarea>
					<?php echo form_error('poll_title'); ?>
				</div>
				<div class="textarea">			
					<label for="poll_description">Description</label>
					<textarea class="<?php echo multilingual_css_class();?>"  name="poll_description" id="poll_description" placeholder="Description"><?php echo trim($poll_data['description']);?></textarea>
					<?php echo form_error('poll_description'); ?>
				</div>
				<div class="input" style="width:48%; margin-right: 10px; float: left;">
					<label for="poll_start_date">Start Date*</label>
					<input type="text" value="<?php echo my_date_format($poll_data['start_date'],'N', 'calender');?>" name="poll_start_date" id="poll_start_date" onblur="" />
					<?php echo form_error('poll_start_date'); ?>
				</div>
				<div class="input" style="width:48%; margin-right: 10px; float: left;">	
					<label for="poll_end_date">End Date*</label>
					<input type="text" value="<?php echo my_date_format($poll_data['end_date'],'N', 'calender');?>" name="poll_end_date" id="poll_end_date" onblur="" />
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
								if($val['id'] == $poll_data['poll_section_id'])
								{
									?>
									<option selected value="<?=$val['id'];?>"><?=$val['section_name'];?></option>
									<?
								}
								else
								{
									?>
									<option value="<?=$val['id'];?>"><?=$val['section_name'];?></option>
									<?
								}
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
					<div id="add_an_other_option">
						<?
						$total_options = 0;
						//check data of category send from controller to view
						if ( $poll_options_listing != '' && $poll_options_listing->num_rows() > 0)
						{

							$poll_options_listing = $poll_options_listing->result_array();

							foreach( $poll_options_listing AS $key => $val )
							{
								?>
                                            <input placeholder="Poll Question" style="width: 120px" type="text" name="poll_option_add_another[<?=$val['poll_option_id'];?>]" value="<?=$val['poll_option_name'];?>" />&nbsp;<input placeholder="Sort Order" style="width: 60px" id="option_sort_0" name="poll_option_sort_order[<?=$val['poll_option_id'];?>]" value="<?=$val['sort_order'];?>" /><input style="display: inline-block; width: 10px; margin-left: 3px;" type="checkbox" name="poll_option_active[<?=$total_options;?>]" <?=($val['active'] == 'Y')?'checked':'unchecked'?> />&nbsp;Active
									<br />
									<br />
								<?
								++$total_options;
							}					
						}
						?>
						<Script>
							total_options = <?=$total_options++;?>
						</script>			
					</div>	
                                    <div class="left" style="width:48%; margin-bottom: 25px; margin-right: 10px;">	
					<input class="draft" type="button" onclick="add_an_other_option()" name="poll_option_add_another[]" value="Add options" />	
				</div>
				</div>
				<div class="clr"></div>
				<div class="button left" style="width:50%;">
					<input type="submit" name="edit_btn" id="edit_btn" value="Publish"  class="publish" />
				</div>	
	</form>
			 <div class="clr"></div>
		</div>
		</div>
	<div class="clr"></div>
		</div>
<?$this->load->view('admin/layouts/template_bottom_view');?>