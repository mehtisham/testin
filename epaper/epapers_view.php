<!--@this page is for epaper (city and date) listing - head and bottom called in other file-->
<?
	if ( ! isset($this->css_include_arr) )
	{
		$this->css_include_arr = array( base_url().ADMIN_ASSET_DIR.'css/epaper.css' );
	}
?>

<? $this->load->view('admin/layouts/template_top_view'); ?>

<!--for light box-->
<script type="text/javascript">
	$(document).ready(function(){
		//for date picker
		$("#epaper_from_date").datepicker({ dateFormat: '<?=EPAPER_DATEPICKER_DATE_FORMATE;?>' });
		$("#epaper_to_date").datepicker({ dateFormat: '<?=EPAPER_DATEPICKER_DATE_FORMATE;?>' });
		//current live formate = 'M,d	yy'
	});
</script>

<script type="text/javascript">
function delete_epaper(row)
{
	jConfirm('Are you sure you want to delete!', 'Delete ePaper', function(responce) 
	{
		if(responce){ 
			document.location = row.href;
		}
		else{
			return false;
		}
	}); 
}
function update_epaper_publishing_info(id)
{
	jConfirm('Are you sure you want to change ePaper status!', 'ePaper status', function(responce) 
	{
		if(responce){ 
			xajax_update_epaper_publishing_information(id);
		}
		else{
			return false;
		}
	}); 
}
</script>
<script type="text/javascript">

	function news_bulk_form_post()
	{
		$('.list_tbl tbody').find('input:checkbox').each(function(){
			if($(this).attr('checked'))
			{
				if(trim($('#news_bulk_action').val()) != '')
				{
					if($('#news_bulk_action').val() == '3')
					{
						jConfirm('Are You Sure You Want To Delete!', 'Delete ePaper', function(responce) 
						{
							if(responce){ 
								  $('#epaper_pages_bulk_action').submit();
							}
							else{
								return false;
							}
						}); 
					}
					else
					{
						$('#epaper_pages_bulk_action').submit();
					}
				}
			}
		});		
	}

	$(document).ready(function(){

        $(".slidingDiv").hide();
        $(".show_hide").show();

		$('.show_hide').click(function(){
		$(".slidingDiv").slideToggle();
		
	});


	//epaper bulk action
	$('#all_epaper').click(function(e){
		if($('#all_epaper').attr('checked') == true )
		{
			$('.list_tbl tbody').find('input:checkbox').each(function(){
				$(this).attr('checked','checked');
			});
		}
		else
		{
			$('.list_tbl tbody').find('input:checkbox').each(function(){
				$(this).attr('checked',false);
			});
		}
	});


	//advance search show or hide----- THEME DEPENDENT
	<?
	if( (isset($_SESSION['epaper_advance_search_epaper_city']) && $_SESSION['epaper_advance_search_epaper_city'] != '')
		||
		( isset($_SESSION['epaper_advance_search_active']) && $_SESSION['epaper_advance_search_active'] != 'both' )
		||
		( isset($_SESSION['epaper_advance_search_epaper_from_date']) && $_SESSION['epaper_advance_search_epaper_from_date'] != '' )
		||
		( isset($_SESSION['epaper_advance_search_epaper_to_date']) && $_SESSION['epaper_advance_search_epaper_to_date'] != '' )
		||
		( isset($_SESSION['epaper_advance_search_title_search']) && $_SESSION['epaper_advance_search_title_search'] != '' )	
	  )
	{
                ?>

                                 //$(".slidingDiv").show();
                                 //$('#title_search').addClass('abc');
                                 //$("input.textbox").toggleClass('bounce');
                <?
        }
        if( isset($_SESSION['epaper_advance_search_title_search']))
        {
        ?>
            $("input.textbox").toggleClass('search_bar_glow');
        <?

        }
        ?>
});

</script>

<div class="grid">
	<?$this->load->view('admin/elements/news_side_menu_view');?>
     <!-- End Left Sidebar -->
    <div class="right content_grid scrolldiv">
      	<div class="metro_col light">
			<div id="msgz">
				<?=print_msg();?>
			</div>
			
			<h1>ePaper</h1>
            <form name="epaper_view" id="epaper_view" class="search_bar_float" method="post" action="" >
				<div id="search">
					<div class="input left">
						<input type="text" id="title_search" name="title_search" value="<?php echo set_value('title_search');?><?=((isset($_SESSION['epaper_advance_search_title_search']) && (!isset($_POST['title_search'])) && ($_SESSION['epaper_advance_search_title_search'] != "") )? $_SESSION['epaper_advance_search_title_search'] : '') ;?>" class="textbox custom_input_size"  /><a href="#" class="sort show_hide"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/arrow_down.png" /></a>
						<div class="slidingDiv">
							<A href="#" class="show_hide" id="cross">x</A>
                                                        <div class="clear">&nbsp;</div>
							<div class="select left" style="width:45%; margin-left:10px;">
								<label>ePaper City</label>
								<?
								$opt = array(
											'select_name'		=> 'epaper_city',
											'default'			=> 'All Cities',
											'data_arr'			=> $this->config->item('epaper_cities'),
											'post_select'		=> (isset($_POST['epaper_city']))?$_POST['epaper_city']: ( isset($_SESSION['epaper_advance_search_epaper_city']) && $_SESSION['epaper_advance_search_epaper_city'] != '')?$_SESSION['epaper_advance_search_epaper_city']:'',
											'multi_dimentional' => true
											);

								print build_dropdown( $opt );
								?>
							</div>
							<div class="select left" style="width:45%; margin-left:10px;">
								<label>Active</label>
								<select name="active" id="active">
									<option value="both" <?=(set_value('active') == "both")? "selected": ( (isset($_SESSION['epaper_advance_search_active']) && $_SESSION['epaper_advance_search_active'] == 'Both')?'selected':'' );  ?>>Both</option>
									<option value="active" <?=(set_value('active') == "active")? "selected":( (isset($_SESSION['epaper_advance_search_active']) && $_SESSION['epaper_advance_search_active'] == 'active')?'selected':'' );  ?>>Active</option>
									<option value="inactive" <?=(set_value('active') == "inactive")? "selected": ( (isset($_SESSION['epaper_advance_search_active']) && $_SESSION['epaper_advance_search_active'] == 'inactive')?'selected':'' ); ?>>Inactive</option>
								</select>
							</div>
							<div class="clr"></div>
							<div class="input left" style="width:45%; margin-left:10px;">
								<label>From Date</label>
								<input type="text" id="epaper_from_date" class="advance_search_input_width" name="epaper_from_date" value="<?php echo set_value('epaper_from_date');?><?=(( isset($_SESSION['epaper_advance_search_epaper_from_date']) && ($_SESSION['epaper_advance_search_epaper_from_date'] != '') && (!isset($_POST['epaper_from_date'])) )?$_SESSION['epaper_advance_search_epaper_from_date']:'')?>" />
							</div>
							<div class="input left" style="width:45%; margin-left:10px;">
								<label> To Date </label>
								<input type="text" name="epaper_to_date" id="epaper_to_date" class="advance_search_input_width" value="<?php echo set_value('epaper_to_date');?><?=(( isset($_SESSION['epaper_advance_search_epaper_to_date']) && ($_SESSION['epaper_advance_search_epaper_to_date'] != '') && (!isset($_POST['epaper_to_date'])) )?$_SESSION['epaper_advance_search_epaper_to_date']:'')?>" />
							</div>
							<div class="clr"></div>
							<div class="button left" style="width:20%;">
								<input type="submit" name="search_btn" id="search_btn" class="search" value="&nbsp;" />
							</div>
							<div class="clr"></div>
							<Br />
							<!-------Advance Search Table------->
						</div>
					</div><!-- end input -->
					<div class="button left">
						<input type="submit" name="search_btn" class="search" value="&nbsp;" />
					</div>
					<div class="clr"></div>
				</div><!-- end search -->
			</form>
            
            
			<form name="epaper_pages_bulk_action" id="epaper_pages_bulk_action" action="" method="post" >
				<div class="sortbox" >						
					<div id="news_bulk_action_div" class="select">
						<select name="news_bulk_action" id="news_bulk_action" onchange="news_bulk_form_post();">
							<option value="">Bulk Action</option>
							<option value="Y">Publish</option>
							<option value="N">Save as Draft</option>
							<option value="3">Delete</option>
						</select>								
					</div>						
				</div>
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
							<th class="<?php echo multilingual_align_class();?>" style="width:4%; text-align:center;"><input id="all_epaper" name="all_epaper" type="checkbox" value="" /></th>
							<th class="<?php echo multilingual_align_class();?>" width="30%" style="text-align:left;">ePaper</th>
							<th class="<?php echo multilingual_align_class();?>" style="text-align:left;">Created</th>
							<th class="<?php echo multilingual_align_class();?>" style="text-align:left;">Updated</th>
							<th style="text-align:left;">&nbsp;</th>
							<th style="text-align:left;">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ( $epaper_info->num_rows() > 0 )
						{
							//loop for listing all user_groups
							foreach ($epaper_info->result_array() as $row)
							{
							?>
								<tr>
									<td><input name="bulk_epaper_pages[<?=$row['id']?>]" id="<?=$row['id']?>"  type="checkbox" /></td>								
									<td class="listing_date news_listing_subtitle"><?php echo my_date_format(strtotime($row['epaper_date']),'N'); ?> - <?php echo  $row['epaper_city']; ?><br><small class="stat" id="stat_<?php echo $row['id']; ?>"><?php	echo  ($row['active'] == 'Y'? 'Published':'Saved as Draft');?></small></td>
									<td class="listing_date "><?php ($row['dtid'] == 0) ? '' :	print my_date_format($row['dtid'],'Y','digital_paper_publish_dateformat'); ?></td>
									<td class="listing_date "><?php ($row['lup_dtid'] == 0) ? '' :	print my_date_format($row['lup_dtid'],'Y','digital_paper_publish_dateformat'); ?></td>
									<td>								
										<?
										print '<a style="font-family: Arial,Helvetica,sans-serif; font-size: 11px; color: #CCCCCC;" id="epaper_publishing_info_'.$row['id'].'" class="unblock" href="javascript:void(0);"  onclick="return update_epaper_publishing_info('.$row['id'].')">
											'.(($row['active'] == 'Y')? '<span>Save as Draft</span>':'<span>Publish</span>').'
											</a>'
										?>
									</td>
									<td>
										<?
										
										if ( acl_premissions( array('module'=>'EPAPER', 'section'=>'edit', 'return_bolean'=>true) ) )
										{
											($row['total_pages'] == 0)? print '<a style="'.$multilingual_float.'" class="edit" href="'.$this->backend_url->edit_epaper( $row['id'] ).'"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/edit.png" title="Edit" /></a>' : print '<span style="width:30px; float: left;">&nbsp;</span>';
										}
										
										if ( EPAPER_TYPE == 'normal' )
										{
											if ( acl_premissions( array('module'=>'EPAPER_PAGES', 'section'=>'listing', 'return_bolean'=>true) ) )
											{
												print '&nbsp;<a style="'.$multilingual_float.'" href="'.$this->backend_url->list_epaper_pages( $row['id'] ).'"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/folder.png" title="List All Pages" /></a> &nbsp;';
											}
										}
										if ( acl_premissions( array('module'=>'EPAPER', 'section'=>'delete', 'return_bolean'=>true) ) )
										{
											print '<a style="'.$multilingual_float.'" class="unblock del" href="'.$this->backend_url->delete_epaper( $row['id'] ).'" onclick="delete_epaper(this); return false;"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/del.png" title="Delete" /></a>';
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
								<td class="no_record_td" colspan="5">No Record Exist</td>
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
		</div>
	</div>
</div>

<? $this->load->view('admin/layouts/template_bottom_view'); ?>
