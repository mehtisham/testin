<? $this->load->view('admin/layouts/template_top_view'); ?>
<script type="text/javascript">
	function delete_weather_cities(row)
	{
		jConfirm('Are you sure you want to delete!', 'Delete city', function(responce) 
		{
			if(responce){ 
				document.location = row.href;
			}
			else{
				return false;
			}
		}); 
	}
	
	function weather_cities_bulk_form_post()
	{
		$('.list_tbl tbody').find('input:checkbox').each(function(){
			if($(this).attr('checked'))
			{
				if(trim($('#weather_cities_bulk_action').val()) != '' && trim($('#weather_cities_bulk_action').val()) == '3')
				{
					jConfirm('Are you sure you want to delete!', 'Delete weather cities', function(result) {								
						if(result)
						{									
							$('#weather_cities_bulk_action_form').submit();
						}
						else if(result==false)
						{
							return false;
						}
					});
				}
				else
				{
					$('#weather_cities_bulk_action_form').submit();
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
	$('#all_weather_cities').click(function(e){
		if($('#all_weather_cities').attr('checked') == true )
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

	//advance search show or hide
	<?
	if( ( isset($_SESSION['weather_cities_advance_search_name']) && $_SESSION['weather_cities_advance_search_name'] != '' )
		||
		( isset($_SESSION['weather_cities_advance_search_active']) && $_SESSION['weather_cities_advance_search_active'] != 'both' )
		)
	{
			
        }
        if( isset($_SESSION['weather_cities_advance_search_name']))
        {
        ?>
            $("input#name").toggleClass('search_bar_glow');
        <?

        }
        ?>
        });
</script>

<div class="grid">			
	<?$this->load->view('admin/elements/widgets_module_side_menu_view');?>
     <!-- End Left Sidebar -->
     <div class="right content_grid content_grid" >
		<div class="metro_col light">
			<div id="msgz">
					<?=print_msg();?>
			</div>	
			<h1>Listing</h1>	
			<div id="search">
			<form name="weather_cities_list_view" id="weather_cities_list_view" class="search_bar_float_widget" method="post" action="">
				<div class="input left">
					<input type="text" name="name" id="name" value="<?=trim(set_value('name'));?><?=trim(((isset($_SESSION['weather_cities_advance_search_name']) && (!isset($_POST['name'])) && ($_SESSION['weather_cities_advance_search_name'] != "") )? $_SESSION['weather_cities_advance_search_name'] : ''));?>" /><a href="#" class="sort show_hide"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/arrow_down.png" /></a>
					<div class="slidingDiv">
					<A href="#" class="show_hide" id="cross">x</A>
					<div class="clear">&nbsp;</div>
					<div class="select left" style="width:45%; margin-left:10px;">
						<label for="active">Active</label>
						<select name="active" id="active">
							<option value="both" <?=(set_value('active') == "both")? "selected": ( (isset($_SESSION['author_advance_search_active']) && $_SESSION['author_advance_search_active'] == 'Both')?'selected':'' ); ?>>Both</option>
							<option value="active" <?=(set_value('active') == "active")? "selected": ( (isset($_SESSION['author_advance_search_active']) && $_SESSION['author_advance_search_active'] == 'active')?'selected':'' ); ?>>Active</option>
							<option value="inactive" <?=(set_value('active') == "inactive")? "selected": ( (isset($_SESSION['author_advance_search_active']) && $_SESSION['author_advance_search_active'] == 'inactive')?'selected':'' ); ?>>Inactive</option>
						</select>
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
		<!-- End Search Box -->	
		
		<form name="weather_cities_bulk_action_form" id="weather_cities_bulk_action_form" action="" method="post" >
			<div class="sortbox">
				<div id="weather_cities_bulk_action_div" class="select">
					<select name="weather_cities_bulk_action" id="weather_cities_bulk_action" onchange="weather_cities_bulk_form_post();">
						<option value="">Bulk Action</option>
						<option value="Y">Active</option>
						<option value="N">Inactive</option>
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
						<th class="<?php echo multilingual_align_class();?>" style="width:4%; text-align:center;">
							<input id="all_weather_cities" name="all_weather_cities" type="checkbox" value="" />
						</th>
						<th class="<?php echo multilingual_align_class();?>" width="25%" style="text-align:left;" width="30%">City Name</th>
						<th class="<?php echo multilingual_align_class();?>" style="text-align:left;" width="35%">Created</th>
						<th class="<?php echo multilingual_align_class();?>" style="text-align:left;" width="25%">Updated</th>
						<th style="text-align:left;"></th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ( $weather_cities_info->num_rows() > 0 )
					{
						foreach ($weather_cities_info->result_array() as $row)
						{
						?>
							<tr>
								<td><input name="bulk_weather_cities[<?=$row['id']?>]" id="<?=$row['id']?>"  type="checkbox" /></td>
                                                                <td class="news_listing_subtitle">
									<strong><?php echo  $row['city_name'];?></strong><br />
                                                                        <small><?php echo  ($row['active']=='Y')?'Active':'Inactive';?></small>
									<small style="display: none;">
										<?=($row['sort_order'] == '0' || $row['sort_order'] == Null)?'':'sort order: '.sort_order_functionality($row['sort_order']);?> 									
									</small>
								</td>	
								<td class="listing_date"><?php print ($row['dtid'] == 0) ?'': my_date_format($row['dtid'],'Y');?></td>
								<td class="listing_date"><?php print ($row['lup_dtid'] == 0) ?'': my_date_format($row['lup_dtid'],'Y');?></td>
								<td>
									<?
									if ( acl_premissions( array('module'=>'AUTHORS', 'section'=>'edit', 'return_bolean'=>true) ) )
									{								
										print '<a style="'.$multilingual_float.'" class="unblock edit" href="'. $this->backend_url->weather_city_edit((int)$row['id']).'"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/edit.png" title="Edit"  /></a> &nbsp;';
									}
									if ( acl_premissions( array('module'=>'AUTHORS', 'section'=>'delete', 'return_bolean'=>true) ) )
									{
										print '<a style="'.$multilingual_float.'" class="unblock del" href="'. $this->backend_url->weather_city_delete((int)$row['id']).'" onclick="delete_weather_cities(this); return false;"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/del.png" title="Delete"  /></a>';
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
<div class="clr"></div>

</div>
</div>
	<div class="clr"></div>
</div>
<?$this->load->view('admin/layouts/template_bottom_view');?>