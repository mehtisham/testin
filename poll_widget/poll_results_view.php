<? $this->load->view('admin/layouts/template_top_view'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		//for date picker
		$(function() {
			//M,d	yy
			$( "#poll_search_start_date" ).datepicker({ dateFormat: '<?=DATEPICKER_DATE_FORMATE;?>' });
			$( "#poll_search_end_date" ).datepicker({ dateFormat: '<?=DATEPICKER_DATE_FORMATE;?>' });
		});
	});

	function delete_poll(row)
	{
		jConfirm('Are you sure you want to delete!', 'Delete poll', function(responce) 
		{
			if(responce){ 
				document.location = row.href;
			}
			else{
				return false;
			}
		}); 
	}

$(document).ready(function(){

	$(".slidingDiv").hide();
	$(".show_hide").show();

	$('.show_hide').click(function(){
	$(".slidingDiv").slideToggle();
	});
	
	//advance search show or hide
	
        });

</script>


<div class="grid">			
	
	<?$this->load->view('admin/elements/widgets_module_side_menu_view');?>
            
     <!-- End Left Sidebar -->
     <div class="right content_grid scrolldiv" >
		<div class="metro_col light">
		<div id="msgz">	
			<?=print_msg();?>
		</div>		
			<?php $poll_name_arr = $poll_data->result_array();?>
		<h1>Results : <?php echo $poll_name_arr[0]['question_title']?></h1>	
			
            <form name="poll_bulk_action_form" id="poll_bulk_action_form" action="" method="post" >
          	<!-------List Table------->
			<table border="0" cellpadding="0" cellspacing="0" class="list_tbl">
				<thead>
					<tr>
						<th class="<?php echo multilingual_align_class();?>" width="30%" style="text-align:left;">Option</th>
						<th class="<?php echo multilingual_align_class();?>" width="25%" style="text-align:left;">No of votes</th>
						<th class="<?php echo multilingual_align_class();?>" width="25%" style="text-align:left;">Percentage</th>
					</tr>
				</thead>
				<tbody>
					<?php
					//if no record found then
					if ( $poll_data->num_rows() > 0 )
					{
						$total_votes = 0;
						foreach( $poll_data->result_array() AS $row )
						{
							$total_votes = $total_votes  + $row['answer_count'];
						}
						
						foreach ( $poll_data->result_array() as $row)
						{
						?>
							<tr>
								<td class="news_listing_subtitle<?php echo multilingual_css_class();?>">
									<strong>
										<?php echo  $row['option_name'];?>
									</strong>
								</td>
								<td class="<?php echo multilingual_align_class();?>"><?=$row['answer_count']; ?></td>
								<td class="<?php echo multilingual_align_class();?>"><?php echo @round(($row['answer_count']/$total_votes)*100); ?>%</td>
							</tr>
							
							<?
							} ?>
							<tr>
								<td class="news_listing_subtitle<?php echo multilingual_css_class();?>">
									<strong style="text-decoration: underline">
										Total Votes
									</strong>
								</td>
								<td class="<?php echo multilingual_align_class();?>"><?php echo $total_votes; ?></td>
								<td class="<?php echo multilingual_align_class();?>"><?php echo ($total_votes>0?'100':'0')?>%</td>
							</tr>	
					<? }
					else
					{
					?>
						<tr>
							<td class="no_record_td" colspan="7">No Record Exist</td>
						</tr>											
					<?
					}
					?>
				</tbody>
			</table>
			</form>
<div class="clr"></div>
</div>
</div>
</div>

<? $this->load->view('admin/layouts/template_bottom_view'); ?>
