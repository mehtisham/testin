<? $this->load->view('admin/layouts/template_top_view'); ?>
<!--for light box-->
<script type="text/javascript">
	
	function delete_gallery_multimedia(row, module)
	{
		jConfirm('Are you sure you want to delete!', 'Delete '+module, function(responce) 
		{
			if(responce){ 
				document.location = row.href;
			}
			else{
				return false;
			}
		}); 
	}
	
	function gallery_multimedia_bulk_form_post()
	{
		$('.list_tbl tbody').find('input:checkbox').each(function(){
			if($(this).attr('checked'))
			{
				if(trim($('#gallery_multimedia_bulk_action').val()) != '')
				{
					if($('#gallery_multimedia_bulk_action').val() == '3')
					{
						jConfirm('Are you sure you want to delete!', 'Delete multimedia file', function(result) {								
							if(result)
							{									
								$('#gallery_multimedia_bulk_action_form').submit();
							}
							else if(result==false)
							{
								return false;
							}
						});
					}
					else
					{
						$('#gallery_multimedia_bulk_action_form').submit();
					}
				}
			}
		});		
	}
	
	$(document).ready(function(){
		//for date picker
		$( "#multimedia_from_date" ).datepicker({ dateFormat: '<?=DATEPICKER_DATE_FORMATE?>' });
		$( "#multimedia_to_date" ).datepicker({ dateFormat: '<?=DATEPICKER_DATE_FORMATE?>' });
	});
	
	function open_in_new_window(url){
		window.open(url);
	}

	$(document).ready(function(){
		
		//gallery multimedia bulk action
		$('#all_multimedia_files').click(function(e){
			if($('#all_multimedia_files').attr('checked') == true )
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
		
        $(".slidingDiv").hide();
        $(".show_hide").show();

		$('.show_hide').click(function(){
			$(".slidingDiv").slideToggle();
		});
	//advance search show or hide----- THEME DEPENDENT
	<?
	if( ( isset($_SESSION['gallery_multimedia_advance_search_active']) && $_SESSION['gallery_multimedia_advance_search_active'] != 'both' )
		||
		( isset($_SESSION['gallery_multimedia_advance_search_multimedia_from_date']) && $_SESSION['gallery_multimedia_advance_search_multimedia_from_date'] != '' )
		||
		( isset($_SESSION['gallery_multimedia_advance_search_multimedia_to_date']) && $_SESSION['gallery_multimedia_advance_search_multimedia_to_date'] != '' )
	  )
	{
		?>

                                 //$(".slidingDiv").show();
                                 //$('#title_search').addClass('abc');
                                 //$("input.textbox").toggleClass('bounce');
                <?
        }
        if( isset($_SESSION['gallery_multimedia_advance_search_multimedia_name']))
        {
        ?>
            $("input#multimedia_name").toggleClass('search_bar_glow');
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
			
			<h1>
				<?
				$module_url = $this->backend_url->url_segments( URL_SEGMENT_2 );
				if($module_url == "images_listing")
				{
					print "Images";
				}
				else if($module_url == "cartoon_listing")
				{
					print "Cartoons";
				}
				else if($module_url == "video_listing")
				{
					print "Videos";
				}
				?>
			</h1>
			<div id="search" >
				<form  class="search_bar_float" name="gallery_multimedia_list_view" id="gallery_multimedia_list_view" method="post">
					<div class="input left">
                                            <input class="<?php echo multilingual_css_class();?>" type="text" name="multimedia_name" id="multimedia_name" value="<?php echo set_value('multimedia_name');?><?=((isset($_SESSION['gallery_multimedia_advance_search_multimedia_name']) && (!isset($_POST['multimedia_name'])) && ($_SESSION['gallery_multimedia_advance_search_multimedia_name'] != "") )? $_SESSION['gallery_multimedia_advance_search_multimedia_name'] : '')?>" />
						<a href="#" class="sort show_hide">
							<img src="<?=base_url().ADMIN_ASSET_DIR;?>images/arrow_down.png" />
						</a>
						<div class="slidingDiv">
							<A href="#" class="show_hide" id="cross">x</A>
                                                        <div class="clear">&nbsp;</div>
							<div class="clr"></div>
							<div class="select left" style="width:45%; margin-left:10px;">
								<label for="active">Active</label>
								<select name="active" id="active">
									<option value="both" <?=(set_value('active') == "both")? "selected":  ( (isset($_SESSION['gallery_multimedia_advance_search_active']) && $_SESSION['gallery_multimedia_advance_search_active'] == 'Both')?'selected':'' ) ; ?>>Both</option>
									<option value="active" <?=(set_value('active') == "active")? "selected": ( (isset($_SESSION['gallery_multimedia_advance_search_active']) && $_SESSION['gallery_multimedia_advance_search_active'] == 'active')?'selected':'' ) ; ?>>Active</option>
									<option value="inactive" <?=(set_value('active') == "inactive")? "selected":  ( (isset($_SESSION['gallery_multimedia_advance_search_active']) && $_SESSION['gallery_multimedia_advance_search_active'] == 'inactive')?'selected':'' ); ?>>Inactive</option>
								</select>
							</div>
							<div class="clr"></div>
							<div class="input left" style="width:45%; margin-left:10px;">
								<label>From Date</label>
								<input type="text" id="multimedia_from_date" class="advance_search_inner_input_width" name="multimedia_from_date" value="<?php echo set_value('multimedia_from_date');?><?=(( isset($_SESSION['gallery_multimedia_advance_search_multimedia_from_date']) && ($_SESSION['gallery_multimedia_advance_search_multimedia_from_date'] != '') && (!isset($_POST['multimedia_from_date'])) )?$_SESSION['gallery_multimedia_advance_search_multimedia_from_date']:'')?>" />
							</div>
							<div class="input left" style="width:45%; margin-left:10px;">
								<label> To Date </label>
								<input type="text" name="multimedia_to_date" id="multimedia_to_date" class="advance_search_inner_input_width" value="<?php echo set_value('multimedia_to_date');?><?=(( isset($_SESSION['gallery_multimedia_advance_search_multimedia_to_date']) && ($_SESSION['gallery_multimedia_advance_search_multimedia_to_date'] != '') && (!isset($_POST['multimedia_to_date'])) )?$_SESSION['gallery_multimedia_advance_search_multimedia_to_date']:'')?>" />
							</div>
							<div class="clr"></div>
							<div class="button left">
								<input type="submit" name = "search_btn" id="search_btn" value="&nbsp;"  class="search" />
							</div>
							<div class="clr"></div>
							<Br />
						</div>        
					</div><!-- end input -->
					<div class="button left">
						<input type="submit" name = "search_btn" id="search_btn" value="&nbsp;"  class="search" />
					</div>
					<div class="clr"></div>
					<!-- end select -->
				</form>
			</div>
            <!-- end search -->
            
			
			<form name="gallery_multimedia_bulk_action_form" id="gallery_multimedia_bulk_action_form" action="" method="post" >
				<div class="sortbox">						
					<div id="gallery_multimedia_bulk_action_div" class="select">
						<select name="gallery_multimedia_bulk_action" id="gallery_multimedia_bulk_action" onchange="gallery_multimedia_bulk_form_post();">
							<option value="">Bulk Action</option>
							<option value="Y">Publish</option>
							<option value="N">Save as Draft</option>
							<option value="3">Delete</option>
						</select>								
					</div>						
				</div>
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
                                                    <th class="<?php echo multilingual_align_class();?>" style="width:4%; text-align:center;"><input id="all_multimedia_files" name="all_multimedia_files" type="checkbox" value="" /></th>
							<th class="<?php echo multilingual_align_class();?>" width="25%" style="text-align:left;"></th>
							<th class="<?php echo multilingual_align_class();?>" style="text-align:left;">Published</th>
							<th class="<?php echo multilingual_align_class();?>" width="33%" style="text-align:left;">Updated</th>
							<th class="<?php echo multilingual_align_class();?>">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ( $gallery_multimedia_info == '' || $gallery_multimedia_info->num_rows() < 1)
						{
							?>
							<tr>
								<td class="tac"><span class="toggle"></span></td>
								<td class="no_record_td" colspan="7">No Record Exist</td>
							</tr>
							
							<?
						}
						else
						{
							foreach ($gallery_multimedia_info->result_array() as $row)
							{
							?>
							<tr>
								<td valign="top"><input name="bulk_gallery_multimedia[<?=$row['id']?>]" id="<?=$row['id']?>" type="checkbox" /></td>
                                                                <td style="cursor: pointer;" class="news_listing_subtitle<?php //echo multilingual_align_class();?>">
									<?
									
									if($row['img_name'] != "")
									{	?>
										<a style="height: auto; float: none;" href="<?=$this->backend_url->return_event_gallery_page_url($row['slug']);?>" target="_blank">
											<img src="<?=$this->urlmanager->image_manager( array('module'=>'gallery_image', 'size'=>95, 'image_name'=> $row['img_name'] ) );?>" />											
										</a>
										<?
										
									}
									else if($row['youtube_url'] != "")
									{
										?>
										<a href="<?=$row['youtube_url']?>" target="_blank">
											<?=$row['youtube_url'];?>
										</a>
										<?	
									}
									?><div class="clr"></div>
                                                                        <small> <?=$row['title'];?></small> - <small>
                                                                        <?php	if($row['active'] == 'Y') 
									{
										print 'Published'; 
									}
									else
									{
										print 'Saved as Draft';
									}
									?>
                                                                        </small>
								</td>
								<!--this name get from category using left join to get category name-->
                                                                <td class="listing_date<?php echo multilingual_align_class();?>"><?=my_date_format($row['dtid'],'Y','digital_paper_publish_dateformat');?></td>
								<td class="listing_date<?php echo multilingual_align_class();?>"><?=($row['lup_dtid'] == 0) ? '' :	my_date_format($row['lup_dtid'],'Y','digital_paper_publish_dateformat');?></td>
								
                                                                <td class="<?php echo multilingual_align_class();?>">
									<?
									if ( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'edit', 'return_bolean'=>true) ) )
									{	if($row['category_slug'] == "picture-gallery")
										{
											print '<a style="'.$multilingual_float.'" class="unblock edit" href="'.$this->backend_url->edit_multimedia_images($row['id']).'"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/edit.png" title="Edit" /></a> &nbsp;';
										}
										else if($row['category_slug'] == "cartoons")
										{
											print '<a style="'.$multilingual_float.'" class="unblock edit" href="'.$this->backend_url->edit_cartoon($row['id']).'"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/edit.png" title="Edit" /></a> &nbsp;';
										}
										else if($row['category_slug'] == "video-gallery")
										{
											print '<a style="'.$multilingual_float.'" class="unblock edit" href="'.$this->backend_url->edit_video($row['id']).'"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/edit.png" title="Edit" /></a> &nbsp;';
										}
									}							
									if ( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'delete', 'return_bolean'=>true) ) )
									{		
										if($row['category_slug'] == "picture-gallery")
										{
											print '<a style="'.$multilingual_float.'" class="unblock del" href="'.$this->backend_url->delete_gallery_multimedia($row['id']).'"  onclick="delete_gallery_multimedia(this,\'Picture Gallery\'); return false;"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/del.png" title="Delete" /></a>';
										}
										else if($row['category_slug'] == "cartoons")
										{
											print '<a style="'.$multilingual_float.'" class="unblock del" href="'.$this->backend_url->delete_cartoon($row['id']).'"  onclick="delete_gallery_multimedia(this,\'Cartoons\'); return false;"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/del.png" title="Delete"  /></a>';
										}
										else if($row['category_slug'] == "video-gallery")
										{
											print '<a style="'.$multilingual_float.'" class="unblock del" href="'.$this->backend_url->delete_video($row['id']).'"  onclick="delete_gallery_multimedia(this,\'Link\'); return false;"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/del.png" title="Delete"  /></a>';
										}
									}
									?>
								</td>
							</tr>
							<?
							}
						}?>
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