<? $this->load->view('admin/layouts/template_top_view'); ?>
<script type="text/javascript">
	function delete_seo_categories(row)
	{
		jConfirm('Are you sure you want to delete!', 'Delete seo category', function(responce) 
		{
			if(responce){ 
				document.location = row.href;
			}
			else{
				return false;
			}
		}); 
	}
	
	function seo_categories_bulk_form_post()
	{
		$('.list_tbl tbody').find('input:checkbox').each(function(){
			if($(this).attr('checked'))
			{
				if(trim($('#seo_categories_bulk_action').val()) != '' && trim($('#seo_categories_bulk_action').val()) == '3')
				{
					jConfirm('Are you sure you want to delete!', 'Delete seo categories', function(result) {								
						if(result)
						{									
							$('#seo_categories_bulk_action_form').submit();
						}
						else if(result==false)
						{
							return false;
						}
					});
				}
				else
				{
					$('#seo_categories_bulk_action_form').submit();
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
	$('#all_seo_categories').click(function(e){
		if($('#all_seo_categories').attr('checked') == true )
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
	if( ( isset($_SESSION['seo_categories_advance_search_name']) && $_SESSION['seo_categories_advance_search_name'] != '' )
		)
	{
			
        }
        if( isset($_SESSION['seo_categories_advance_search_name']))
        {
        ?>
            $("input#name").toggleClass('search_bar_glow');
        <?

        }
        ?>
        });
</script>

<div class="grid">			
	<?$this->load->view('admin/elements/seo_side_menu_view');?>
     <div class="right content_grid scrolldiv" >
		<div class="metro_col light">
			<div id="msgz">	
				<?=print_msg();?>
			</div>			
		<h2>Listing</h2>
		</br>
		
		<div id="search">
			<form name="seo_categories_list_view" id="seo_categories_list_view" class="search_bar_float_widget" method="post" action="">
				<div class="input left">
					<input type="text" name="name" id="name" value="<?=trim(set_value('name'));?><?=trim(((isset($_SESSION['seo_categories_advance_search_name']) && (!isset($_POST['name'])) && ($_SESSION['seo_categories_advance_search_name'] != "") )? $_SESSION['seo_categories_advance_search_name'] : ''));?>" />
				</div>
				 <div class="button left">
					<input type="submit" name = "search_btn" class="search" value="&nbsp;" />
				 </div>
				 <div class="clr"></div>
			</form>
		</div>
		<!-- End Search Box -->	
		
		<form name="seo_categories_bulk_action_form" id="seo_categories_bulk_action_form" action="" method="post" >
			<div class="sortbox" style="width: 130px;">						
				<div id="seo_categories_bulk_action_div" class="select">
					<select name="seo_categories_bulk_action" id="seo_categories_bulk_action" onchange="seo_categories_bulk_form_post();">
						<option value="">Bulk Action</option>
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
							<input id="all_seo_categories" name="all_seo_categories" type="checkbox" value="" />
						</th>
						<th class="<?php echo multilingual_align_class();?>" width="40%" style="text-align:left;">Category Name</th>
						<th class="<?php echo multilingual_align_class();?>" style="text-align:left;">Created</th>
						<th class="<?php echo multilingual_align_class();?>" style="text-align:left;">Updated</th>
						<th style="text-align:left;"></th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ( $seo_info->num_rows() > 0 )
					{
						foreach ($seo_info->result_array() as $row)
						{
						?>
							<tr>
								<td><input name="bulk_seo_categories[<?=$row['id']?>]" id="<?=$row['id']?>"  type="checkbox" /></td>
								<td>
									<strong>
										<? 
										if($row['category_id'] == "0")
										{
											echo $row['page_name'];
										}
										else
										{
											echo 'Category-> '.$row['page_name'];
										}
										?>
									</strong>
								</td>	
								<td class="listing_date"><?php echo my_date_format($row['dtid'],'Y', 'digital_paper_publish_dateformat');?></td>
								<td class="listing_date"><?php echo my_date_format($row['lup_dtid'],'Y', 'digital_paper_publish_dateformat');?></td>
								<td>
									<?
									if ( acl_premissions( array('module'=>'AUTHORS', 'section'=>'edit', 'return_bolean'=>true) ) )
									{											
										print '<a style="'.$multilingual_float.'" class="unblock edit" href="'. $this->backend_url->seo_categories_edit((int)$row['id']).'"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/edit.png" title="Edit"  /></a> &nbsp;';										
									}
									if ( acl_premissions( array('module'=>'AUTHORS', 'section'=>'delete', 'return_bolean'=>true) ) )
									{										
										print '<a style="'.$multilingual_float.'" class="unblock del" href="'. $this->backend_url->seo_categories_delete((int)$row['id']).'" onclick="delete_seo_categories(this); return false;"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/del.png" title="Delete"  /></a>';										
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
        <!-- end metro light -->
		<div class="clr"></div>
     </div>
     
</div><!-- End Grid -->
<div class="clr"></div>
</div>
<?$this->load->view('admin/layouts/template_bottom_view');?>