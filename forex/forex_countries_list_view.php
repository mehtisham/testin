<? $this->load->view('admin/layouts/template_top_view'); ?>
<script type="text/javascript">
	function delete_forex_countries(row)
	{
		jConfirm('Are you sure you want to delete!', 'Delete country', function(responce) 
		{
			if(responce){ 
				document.location = row.href;
			}
			else{
				return false;
			}
		}); 
	}
	
	function forex_countries_bulk_form_post()
	{
		$('.list_tbl tbody').find('input:checkbox').each(function(){
			if($(this).attr('checked'))
			{
				if(trim($('#forex_countries_bulk_action').val()) != '' && trim($('#forex_countries_bulk_action').val()) == '3')
				{
					jConfirm('Are you sure you want to delete!', 'Delete forex countries', function(result) {								
						if(result)
						{									
							$('#forex_countries_bulk_action_form').submit();
						}
						else if(result==false)
						{
							return false;
						}
					});
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
	$('#all_forex_countries').click(function(e){
		if($('#all_forex_countries').attr('checked') == true )
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
	if( ( isset($_SESSION['forex_countries_rate_advance_search_name']) && $_SESSION['forex_countries_rate_advance_search_name'] != '' )
		||
		( isset($_SESSION['forex_countries_rate_advance_search_active']) && $_SESSION['forex_countries_rate_advance_search_active'] != 'both' )
		)
	{
			
        }
        if( isset($_SESSION['forex_countries_rate_advance_search_name']))
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
     <div class="right content_grid scrolldiv" >
		<div class="metro_col light">
		<div id="msgz">	
			<?=print_msg();?>
		</div>
		<h1>Listing</h1>	
		<div id="search">
			<form name="forex_countries_list_view" id="forex_countries_list_view" class="search_bar_float_widget" method="post" action="">
				<div class="input left">
					<input type="text" name="name" id="name" value="<?=trim(set_value('name'));?><?=trim(((isset($_SESSION['forex_countries_rate_advance_search_name']) && (!isset($_POST['name'])) && ($_SESSION['forex_countries_rate_advance_search_name'] != "") )? $_SESSION['forex_countries_rate_advance_search_name'] : ''));?>" /><a href="#" class="sort show_hide"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/arrow_down.png" /></a>
					<div class="slidingDiv">
					<A href="#" class="show_hide" id="cross">x</A>
					<div class="clear">&nbsp;</div>
					<div class="select left" style="width:45%; margin-left:10px;">
						<label for="active">Active</label>
						<select name="active" id="active">
							<option value="both" <?=(set_value('active') == "both")? "selected": ( (isset($_SESSION['forex_countries_rate_advance_search_active']) && $_SESSION['forex_countries_rate_advance_search_active'] == 'Both')?'selected':'' ); ?>>Both</option>
							<option value="active" <?=(set_value('active') == "active")? "selected": ( (isset($_SESSION['forex_countries_rate_advance_search_active']) && $_SESSION['forex_countries_rate_advance_search_active'] == 'active')?'selected':'' ); ?>>Active</option>
							<option value="inactive" <?=(set_value('active') == "inactive")? "selected": ( (isset($_SESSION['forex_countries_rate_advance_search_active']) && $_SESSION['forex_countries_rate_advance_search_active'] == 'inactive')?'selected':'' ); ?>>Inactive</option>
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
		
		<form name="forex_countries_bulk_action_form" id="forex_countries_bulk_action_form" action="" method="post" >
			<div class="sortbox" style="width: 130px;">						
				<div id="forex_countries_bulk_action_div" class="select">
					<select name="forex_countries_bulk_action" id="forex_countries_bulk_action" onchange="forex_countries_bulk_form_post();">
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
			<table border="0" cellpadding="0" cellspacing="0" class="list_tbl"  style="<?php echo $multilingual;?>">
				<thead>
					<tr>
						<th class="<?php echo multilingual_align_class();?>" style="width:4%; text-align:center;">
							<input id="all_forex_countries" name="all_forex_countries" type="checkbox" value="" />
						</th>
						<th class="<?php echo multilingual_align_class();?>" width="25%" style="text-align:left;">Country Name</th>
						<th class="<?php echo multilingual_align_class();?>" style="text-align:left;">Created</th>
						<th class="<?php echo multilingual_align_class();?>" style="text-align:left;">Updated</th>
						<th style="text-align:left;"></th>
						<th style="text-align:left;"></th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ( $forex_countries_info->num_rows() > 0 )
					{
						foreach ($forex_countries_info->result_array() as $row)
						{
						?>
							<tr>
								<td><input name="bulk_forex_countries[<?=$row['id']?>]" id="<?=$row['id']?>"  type="checkbox" /></td>
								<td>
									<strong><?php echo  $row['country_name'];?></strong>
									<br />
									<small>
										<?=($row['google_api_country_slug'] != '')?$row['google_api_country_slug']:'';?> 	
									</small>
								</td>	
								<td class="listing_date"><?php echo my_date_format($row['dtid'],'Y','digital_paper_publish_dateformat');?></td>
								<td class="listing_date"><?php ($row['lup_dtid'] == 0) ?'':print my_date_format($row['lup_dtid'],'Y','digital_paper_publish_dateformat');?></td>
								<td>
									<?php	if($row['active'] == 'Y') 
									{
										print '<span>Active</span>'; 
									}
									else
									{
										print '<span>Inactive</span>';
									}
									?>
								</td>	
								<td>
									<?
									if ( acl_premissions( array('module'=>'AUTHORS', 'section'=>'edit', 'return_bolean'=>true) ) )
									{								
										print '<a style="'.$multilingual_float.'" class="unblock edit" href="'. $this->backend_url->forex_countries_edit((int)$row['id']).'"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/edit.png" title="Edit" /></a> &nbsp;';
									}
									if ( acl_premissions( array('module'=>'AUTHORS', 'section'=>'delete', 'return_bolean'=>true) ) )
									{
										print '<a style="'.$multilingual_float.'" class="unblock del" href="'. $this->backend_url->forex_countries_delete((int)$row['id']).'" onclick="delete_forex_countries(this); return false;"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/del.png" title="Delete" /></a>';
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