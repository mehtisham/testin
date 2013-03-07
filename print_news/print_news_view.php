<!--
@this page is for print news listing - head and bottom called in other file
-->
<? $this->load->view('admin/layouts/template_top_view'); ?>

<!--for for date picker-->
<script type="text/javascript">
	$(document).ready(function(){		
		$( "#print_news_from_date" ).datepicker({ dateFormat: '<?=DATEPICKER_DATE_FORMATE?>' });
		$( "#print_news_to_date" ).datepicker({ dateFormat: '<?=DATEPICKER_DATE_FORMATE?>' });
		$( "#date_for_publishing" ).datepicker({ dateFormat: '<?=DATEPICKER_DATE_FORMATE?>' });
	});

	function delete_news(row)
	{
		jConfirm('Can you confirm this?', 'Delete print news', function(responce) 
		{
			if(responce){ 
				document.location = row.href;
			}
			else{
				return false;
			}
		}); 
	}

	function publish_print_edition()
	{
		jConfirm('Are you sure you want to publish this editoin ?', 'Publish news', function(result) {
			if(result)
			{
				if($('#date_for_publishing').val() != '')
				{
					xajax_publish_print_edition($('#date_for_publishing').val());
					//$.blockUI();
					return false;
				}
				else
				{
					jAlert('Please select date publishing print edition.','Alert');					
					//$.unblockUI();
					return false;
				}
			}			
		});
		
		/* junk
		if ( confirm('Are you sure you want to publish this editoin ?') )
		{
			if($('#date_for_publishing').val() != '')
			{
				$.blockUI();
				xajax_publish_print_edition($('#date_for_publishing').val());
			}
			else
			{
				alert('Please select date publishing print edition.');
				$.unblockUI();
				return false;
			}
		}
		else
		{
			$.unblockUI()
			return false;
		}*/
	}


	function print_news_bulk_form_post()
	{
		$('.list_tbl tbody').find('input:checkbox').each(function(){
			if($(this).attr('checked'))
			{
				if(trim($('#news_bulk_action').val()) != '' && trim($('#news_bulk_action').val()) == '3')
				{
					jConfirm('Can you confirm this?', 'Delete print news', function(result) {
						if(result)
						{									
							$('#print_news_bulk_action').submit();
						}
					});
				}
				else if(trim($('#news_bulk_action').val()) != '' && trim($('#news_bulk_action').val()) != '3' )
				{
					$('#print_news_bulk_action').submit();
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

		//digtal news bulk action
		$('#all_print_news').click(function(e){
			if($('#all_print_news').attr('checked') == true )
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
	if( (isset($_SESSION['print_advance_search_print_cat_list']) && $_SESSION['print_advance_search_print_cat_list'] != '')
	||
	( isset($_SESSION['print_advance_search_news_type_id']) && $_SESSION['print_advance_search_news_type_id'] != '' )
	||
	( isset($_SESSION['print_advance_search_title_search']) && $_SESSION['print_advance_search_title_search'] != '' )
	||
	( isset($_SESSION['print_advance_search_status']) && $_SESSION['print_advance_search_status'] != '' )
	||
	( isset($_SESSION['print_advance_search_print_news_from_date']) && $_SESSION['print_advance_search_print_news_from_date'] != '' )
	||
	( isset($_SESSION['print_advance_search_print_news_to_date']) && $_SESSION['print_advance_search_print_news_to_date'] != '' )
	)
	{
			?>
                                        
					 //$(".slidingDiv").show();
                                         //$('#title_search').addClass('abc');
                                         //$("input.textbox").toggleClass('bounce');
			<?
		}
                if( isset($_SESSION['print_advance_search_title_search']))
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
	<div class="right scrolldiv content_grid">
    	<!-- Search Bar -->
    	<div class="metro_col light">
			<div id="msgz">
				<?=print_msg();?>
			</div>
			
			<h1>Print News</h1>
			<div id="search">
				<form name="print_news_view" id="print_news_view" class="search_bar_float" action="" method="post" >
					<div class="input left">
						<input type="text" id="title_search" name="title_search" value="<?php echo set_value('title_search');?><?=((isset($_SESSION['print_advance_search_title_search']) && (!isset($_POST['title_search'])) && ($_SESSION['print_advance_search_title_search'] != "") )? $_SESSION['print_advance_search_title_search'] : '') ;?>" class="textbox<?php echo multilingual_css_class();?>"  /><a href="#" class="sort show_hide"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/arrow_down.png" /></a>
						<div class="slidingDiv">
							<A href="#" class="show_hide" id="cross">x</A>
                                                        <div class="clear">&nbsp;</div>
							<div class="select left<?php echo multilingual_css_class();?>" style="width:45%; margin-left:10px;">
								<label for="print_cat_list">Print Categories</label>
								<?
								$opt = array(
											'select_name'		=> 'print_cat_list',
											'default'			=> 'All Categories',
											'data_arr'			=> $category_info_dropDown,
											'post_select'		=> (isset($_POST['print_cat_list']))?$_POST['print_cat_list']: (( isset($_SESSION['print_advance_search_print_cat_list']) && $_SESSION['print_advance_search_print_cat_list'] != '' )?$_SESSION['print_advance_search_print_cat_list']:'')
											);

								print build_dropdown( $opt );
								?>
							</div>
							<div class="select left" style="width:45%; margin-left:10px;">
								<label for="news_type_id">News Types</label>
									<?
									$opt = array(
												'select_name'		=> 'news_type_id',
												'default'			=> 'All Types',
												'data_arr'			=> $this->config->item('print_news_type'),
												'post_select'		=> (isset($_POST['news_type_id']))?$_POST['news_type_id']: ( ( isset($_SESSION['print_advance_search_news_type_id']) && $_SESSION['print_advance_search_news_type_id'] != '' )?$_SESSION['print_advance_search_news_type_id']:'' ),
												'multi_dimentional' => true
												);

									print build_dropdown( $opt );
									?>
							</div>
							<div class="clr"></div>
							<div class="select left" style="width:45%; margin-left:10px;">                 
								<label for="status_id">Active</label>
								<?
								$opt = array(
											'select_name'		=> 'status_id',
											'default'			=> 'Both',
											'data_arr'			=> $this->config->item('status'),
											'post_select'		=> (isset($_POST['status_id']))?$_POST['status_id']: ( ( isset($_SESSION['print_advance_search_status']) && $_SESSION['print_advance_search_status'] != '')?$_SESSION['print_advance_search_status']:'' ),
											'multi_dimentional' => true
											);

								print build_dropdown( $opt );
								?>
							</div>
							<div class="clr"></div>
							<div class="input left" style="width:45%; margin-left:10px;">
								<label>From Date</label>
								<input type="text" name="print_news_from_date" id="print_news_from_date" value="<?php echo set_value('print_news_from_date');?><?(( isset($_SESSION['print_advance_search_print_news_from_date']) && ($_SESSION['print_advance_search_print_news_from_date'] != '') && (!isset($_POST['print_news_from_date'])) )?$_SESSION['print_advance_search_print_news_from_date']:'')?>" style="width:92%;"  />
							</div>
							<div class="input left" style="width:45%; margin-left:10px;">                
								<label> To Date </label>
									<input type="text" name="print_news_to_date" id="print_news_to_date" value="<?php echo set_value('print_news_to_date');?><?(( isset($_SESSION['print_advance_search_print_news_to_date']) && ($_SESSION['print_advance_search_print_news_to_date'] != '') && (!isset($_POST['print_news_to_date'])) )?$_SESSION['print_advance_search_print_news_to_date']:'')?>" style="width:92%;" />
							</div>
							<div class="button left" style="width:20%;">
								<input type="submit" name="search_btn" id="search_btn" class="search" value="&nbsp;" />
							</div>
							<div class="clr"></div>
							<br />
						</div>
					</div>   
					<div class="button left">
						<input type="submit" name="search_btn" class="search" value="&nbsp;" />
					</div>
					<div class="clr"></div>
				</form>
			</div><!-- end search -->
			<form name="print_news_bulk_action" id="print_news_bulk_action" action="" method="post" >
				<div class="sortbox">
					<div id="news_bulk_action_div" class="select">
						<?
						$status_arr = $this->config->item('status');
						//pr($status_arr);die();
						?>
						<select name="news_bulk_action" id="news_bulk_action" onchange="print_news_bulk_form_post();">
							<option value="">Bulk Action</option>
							<option value="<?=$status_arr['PUBLISH']['id']?>">Publish</option>
							<option value="<?=$status_arr['UNPUBLISH']['id']?>">Save as Draft</option>
							<option value="3">Delete</option>
						</select>								
					</div>						
				</div>
				
				<div style="position:relative; clear:both; padding:5px 0px 5px 0px;">
				<div class="input left" style="width:20%; margin-right:10px;">
					<input type="text" placeholder="Select Publish Date" name="date_for_publishing" id="date_for_publishing" value="<?php echo set_value('date_for_publishing');?>" />
				</div>
			   <div class="button left" style="width:140px; margin-left:20px;">
					<input type="Publish" value="Publish" onclick="publish_print_edition();" href="javascript:void(0);" class="publish" style="text-align:center;" />
			   </div>
			</div>  
			<div class="clr"></div>
			<?php
			$multilingual = multilingual_align_class();
			if($multilingual!='')
			{
				$multilingual = 'direction:rtl;';
				$multilingual_float = 'float:right;';
			}
			else
			{
				$multilingual = '';
				$multilingual_float = '';
			}
			?>
				<table border="0" cellpadding="0" cellspacing="0" class="list_tbl" style="<?php echo $multilingual;?>">
					<thead>
						<tr>
							<th class="<?php echo multilingual_align_class();?>" style="width:4%; text-align:center;"><input id="all_print_news" name="all_print_news" type="checkbox" value="" /></th>
							<th class="<?php echo multilingual_align_class();?>" width="40%" style="text-align:left;"></th>
							<th class="<?php echo multilingual_align_class();?>" style="text-align:left;">Published</th>
							<th class="<?php echo multilingual_align_class();?>" style="text-align:left;">Updated</th>
							<!--<th style="text-align:left;">Status</th>-->
							<th class="<?php echo multilingual_align_class();?>" style="text-align:left;">&nbsp;</th>						
						</tr>
					</thead>
					<tbody>
						<?php
						if ( $print_news_info->num_rows() > 0 )
						{
							foreach ($print_news_info->result_array() as $row)
							{
								$disabled = '';
								if(acl_premissions( array('module'=>'PRINT_CATEGORY', 'section'=>$row['category_id'], 'return_bolean'=>true) )!=true)
								{
									$disabled = 'disabled="disabled"';
								}
							?>
								<tr>
									<td><input <?=$disabled?> name="bulk_print_news[<?=$row['id']?>]" id="<?=$row['id']?>" type="checkbox" /></td>
									<td  class="news_listing_subtitle<?php echo multilingual_css_class();?>"><strong><?php	echo $row['title']; ?></strong><Br /><small><?php	echo $row['cat_name']; ?></small> - <small><?php	echo config_name_by_id($row['news_type_id'],'print_news_type');?></small> - <small class="stat"><?php	echo  config_name_by_id($row['status_id'],'status');?></small></td>
									<td class="listing_date<?php echo multilingual_align_class();?>"><?php	echo  my_date_format($row['dtid'],'N','todays_paper_publish_dateformat'); ?></td>
									<td class="listing_date<?php echo multilingual_align_class();?>"><?php	($row['lup_dtid'] == 0) ? '' :	print my_date_format($row['lup_dtid'],'Y','digital_paper_publish_dateformat'); ?></td>
									<!--<td><?php//	echo  config_name_by_id($row['status_id'],'status');?></td>-->
									<td>
										<?php
										$v = $this->config->item("status");
										if($row['status_id']== $v['PUBLISH']['id']){ ?>
											<a style="<?=$multilingual_float?>" href="<?php echo $this->frontend_url->detail_page($row['cat_slug'], my_date_format($row['publish_dtid'],'N', 'front_url_dateformat'), $row['slug']);?>" target="_new" class="title"><img src="<?=base_url().ADMIN_ASSET_DIR.'images/small/link.png'?>" title="View"  /></a>
										<?php }else{ ?>
											<span style="width:30px; float: left;">&nbsp;</span>
										<?php } ?>
										<?
										if ( acl_premissions( array('module'=>'PRINT_NEWS', 'section'=>'edit', 'return_bolean'=>true) ) && $disabled=='' )
										{
											print '<a style="'.$multilingual_float.'" class="unblock" href="'.$this->backend_url->edit_print_news( $row['id'] ).'"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/edit.png" title="Edit"  /></a> &nbsp;';
										}
										else
										{
											print '<a style="'.$multilingual_float.'" class="unblock" href="#"><img style="opacity:0.5" src="'. base_url().ADMIN_ASSET_DIR.'images/small/edit.png" title="Editing not allowed"  /></a> &nbsp;';
										}
										if ( acl_premissions( array('module'=>'PRINT_NEWS', 'section'=>'delete', 'return_bolean'=>true) ) && $disabled=='' )
										{
											print '<a style="'.$multilingual_float.'" class="unblock" href="'.$this->backend_url->delete_print_news( $row['id'] ).'" onclick="delete_news(this); return false;"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/del.png" title="Delete"  /></a>';
										}
										else
										{
											print '<a style="'.$multilingual_float.'" class="unblock" href="#"><img style="opacity:0.5" src="'. base_url().ADMIN_ASSET_DIR.'images/small/del.png" title="Delete"  /></a>';
										}
										?>
									</td>								
								</tr>								
							<?php
							}
						}
						else
						{
						?>
							<tr>
								<td class="no_record_td" colspan="9">No Record Exist</td>
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
    <div class="clr"></div>
</div>
<? $this->load->view('admin/layouts/template_bottom_view'); ?>