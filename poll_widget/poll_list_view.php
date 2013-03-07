<? $this->load->view('admin/layouts/template_top_view'); ?>
<?
	//check data of poll section and plot dropdown
	if ( $poll_section_info != '' && $poll_section_info->num_rows() > 0)
	{
		$poll_section_info = $poll_section_info->result_array();
	}
?>
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
	<?
	if( (isset($_SESSION['poll_search_advance_search_section_option']) && $_SESSION['poll_search_advance_search_section_option'] != '')
		||
		( isset($_SESSION['poll_advance_search_status']) && $_SESSION['poll_advance_search_status'] != '' )
		||
		( isset($_SESSION['poll_advance_search_startdate']) && $_SESSION['poll_advance_search_startdate'] != '' )	
		||
		( isset($_SESSION['poll_advance_search_enddate']) && $_SESSION['poll_advance_search_enddate'] != '' )
		||	
		( isset($_SESSION['poll_advance_search_title']) && $_SESSION['poll_advance_search_title'] != '' )	
	   )
	{
			
        }
        if( isset($_SESSION['poll_advance_search_title']))
        {
        ?>
            $("input#poll_search_title").toggleClass('search_bar_glow');
        <?

        }
        ?>
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
		<h1>Listing</h1>	
		<div id="search">
				<form name="poll_list_view" id="poll_list_view" method="post" action="">
					<div class="input left">
						<input name="poll_search_title" id="poll_search_title" type="text" value="<?php echo set_value('poll_search_title');?> <?=((isset($_SESSION['poll_advance_search_title']) && (!isset($_POST['poll_search_title'])) && ($_SESSION['poll_advance_search_title'] != "") )? $_SESSION['poll_advance_search_title'] : '') ;?>" />
						<a href="#" class="sort show_hide">
							<img src="<?=base_url().ADMIN_ASSET_DIR;?>images/arrow_down.png" />
						</a>
						<div class="slidingDiv">
							<A href="#" class="show_hide" id="cross">x</A>
							<div class="clear">&nbsp;</div>
							<div class="select left" style="width:45%; margin-left:10px;">
								<label for="poll_search_section_option">Poll Section</label>
									<select name="poll_search_section_option" id="poll_search_section_option">
										<option value="">All Sections</option>
										<?									
										foreach( $poll_section_info AS $key => $val )
										{

											$selected_option = (set_value('poll_section_status') != "")? set_value('poll_section_status'): ( (isset($_SESSION['poll_search_advance_search_section_option']) && $_SESSION['poll_search_advance_search_section_option'] != '')?$_SESSION['poll_search_advance_search_section_option']:'' );
											if($selected_option == $val['id'])
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
							</div>
							<div class="select left" style="width:45%; margin-left:10px;">
								<label for="poll_search_status">Poll Status</label>
								<select name="poll_search_status" id="poll_search_status">
									<option value="">ALL</option>
									<option value="open" <?=(set_value('poll_search_status') == "open")? "selected": ( (isset($_SESSION['poll_advance_search_status']) && $_SESSION['poll_advance_search_status'] == 'open')?'selected':'' ); ?>>Open</option>
									<option value="closed" <?=(set_value('poll_search_status') == "closed")? "selected": ( (isset($_SESSION['poll_advance_search_status']) && $_SESSION['poll_advance_search_status'] == 'closed')?'selected':'' ); ?>>Closed</option>
									<option value="inactive" <?=(set_value('poll_search_status') == "inactive")? "selected": ( (isset($_SESSION['poll_advance_search_status']) && $_SESSION['poll_advance_search_status'] == 'inactive')?'selected':'' ); ?>>Inactive</option>
									<option value="draft" <?=(set_value('poll_search_status') == "draft")? "selected": ( (isset($_SESSION['poll_advance_search_status']) && $_SESSION['poll_advance_search_status'] == 'draft')?'selected':'' ); ?>>Draft</option>
								</select>
							</div>
							<div class="clr"></div>
							
							<div class="input left" style="width:45%; margin-left:10px;">                     
								<label for="poll_search_start_date">Start Date</label>
								<input style="width:92%;" type="text" name="poll_search_start_date" id="poll_search_start_date" value="<?php echo ( (set_value('poll_search_start_date') != '')?set_value('poll_search_start_date'):(( isset($_SESSION['poll_advance_search_startdate']) && ($_SESSION['poll_advance_search_startdate'] != '') && (!isset($_POST['poll_search_start_date'])) )?$_SESSION['poll_advance_search_startdate']:'') )?>" />
							 </div>

							<div class="input left" style="width:45%; margin-left:10px;">
								<label for="poll_search_end_date">End Date</label>
								<input style="width:92%;" type="text" name="poll_search_end_date" id="poll_search_end_date" value="<?php echo (set_value('poll_search_end_date') != '')?set_value('poll_search_end_date'):(( isset($_SESSION['poll_advance_search_enddate']) && ($_SESSION['poll_advance_search_enddate'] != '') && (!isset($_POST['poll_search_end_date'])) )?$_SESSION['poll_advance_search_enddate']:'')?>" />
							</div>

							<div class="clr"></div> 
							
							<div class="button left">
								<input type="submit" name="search_btn" id="search_btn" class="search" value="&nbsp;" />
							</div>
							<div class="clr"></div>
							<Br />
						</div>
					</div>
					<div class="button left">
						<input type="submit" name = "search_btn" class="search" value="&nbsp;" />
					</div>
					<div class="clr"></div>
				</form> 
			</div>
			
            <form name="poll_bulk_action_form" id="poll_bulk_action_form" action="" method="post" >
          	<!-------List Table------->
			<?php
					$multilingual = '';
					$multilingual_float = '';
					$multilingual = multilingual_align_class();
					if($multilingual!='')
					{
						$multilingual = 'direction:rtl;';
						$multilingual_float = 'float:right;';
					}
				?>
			<table border="0" cellpadding="0" cellspacing="0" class="list_tbl" style="<?php echo $multilingual;?>">
				<thead>
					<tr>
						<th class="<?php echo multilingual_align_class();?>" style="width:4%; display: none; text-align:center;"><input type="checkbox" /></th>
						<th class="<?php echo multilingual_align_class();?>" width="30%" style="text-align:left;">Title</th>
						<th class="<?php echo multilingual_align_class();?>" width="25%" style="text-align:left;">Section</th>
						<th class="<?php echo multilingual_align_class();?>" style="text-align:left;">Start Date</th>
						<th class="<?php echo multilingual_align_class();?>" style="text-align:left;">End Date</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php
					//if no record found then
					if ( $poll_info->num_rows() > 0 )
					{
						
						foreach ( $poll_info->result_array() as $row)
						{
						?>
							<tr>
								<td style="display: none;"><input type="checkbox" /></td>		
								<td class="news_listing_subtitle<?php echo multilingual_css_class();?>"><strong><?php echo  $row['question_title'];?></strong><br />
                                                                <small><?=$row['poll_status']; ?></small>
                                                                </td>
                                                                <td class="<?php echo multilingual_align_class();?>"><?=$row['section_name']; ?></td>
								<td class="listing_date<?php echo multilingual_align_class();?>"><?=date(FRONTEND_TODAYS_PAPER_DATE_FORMATE,$row['start_date'])?></td>
								<td class="listing_date<?php echo multilingual_align_class();?>"><?=date(FRONTEND_TODAYS_PAPER_DATE_FORMATE,$row['end_date'])?></td>
								<td>
									<a  style="<?=$multilingual_float?>" class="poll_edit unblock" href="<?=$this->backend_url->poll_results($row['poll_id']);?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/graph-white.png" width="20px" title="Results"  /></a> &nbsp;
									<?
									if ( acl_premissions( array('module'=>'WIDGETS', 'section'=>'edit', 'return_bolean'=>true) ) )
									{								
										print '<a style="'.$multilingual_float.'" class="poll_edit unblock" href="'. $this->backend_url->poll_edit($row['poll_id']).'"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/edit.png" title="Edit"  /></a> &nbsp;';
									}
									if ( acl_premissions( array('module'=>'WIDGETS', 'section'=>'delete', 'return_bolean'=>true) ) )
									{
										print '<a style="'.$multilingual_float.'" class="unblock" href="'. $this->backend_url->poll_delete($row['poll_id']).'" onclick="delete_poll(this); return false;"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/del.png" title="Delete"  /></a>';
									}
									?>
								</td>
							</tr>
						<?
						}
					}
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
			<ul class="pagination clearfix">
				<li><?=$pagination; ?></li>
			</ul>
<div class="clr"></div>
</div>
</div>
</div>

<? $this->load->view('admin/layouts/template_bottom_view'); ?>
