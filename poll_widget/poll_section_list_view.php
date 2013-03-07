<? $this->load->view('admin/layouts/template_top_view');?>

<script type="text/javascript">
	function delete_poll_section(row)
	{
		jConfirm('Are you sure you want to delete!', 'Delete poll section', function(responce) 
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
	if( (isset($_SESSION['poll_section_advance_search_section_name']) && $_SESSION['poll_section_advance_search_section_name'] != '')
		||
		( isset($_SESSION['poll_section_advance_search_active']) && $_SESSION['poll_section_advance_search_active'] != 'both' )
	   )
	{
			
        }
        if( isset($_SESSION['poll_section_advance_search_section_name']))
        {
        ?>
            $("input#section_name").toggleClass('search_bar_glow');
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
		
		<h1>Sections</h1>	
		<div id="search">
			<form name="poll_section_list_view" id="poll_section_list_view" method="post" action="">
				<div class="input left">
					<input type="text" name="section_name" id="section_name" value="<?php echo set_value('section_name');?><?=((isset($_SESSION['poll_section_advance_search_section_name']) && (!isset($_POST['section_name'])) && ($_SESSION['poll_section_advance_search_section_name'] != "") )? $_SESSION['poll_section_advance_search_section_name'] : '') ;?>" /><a href="#" class="sort show_hide"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/arrow_down.png" /></a>
					<div class="slidingDiv">
					<A href="#" class="show_hide" id="cross">x</A>
					<div class="clear">&nbsp;</div>
					<div class="select left" style="width:45%; margin-left:10px;">
						<label for="active">Active</label>
						<select name="active" id="active">
							<option value="both" <?=(set_value('active') == "both")? "selected": ( (isset($_SESSION['poll_section_advance_search_active']) && $_SESSION['poll_section_advance_search_active'] == 'both')?'selected':'' ); ?>>Both</option>
							<option value="active" <?=(set_value('active') == "active")? "selected": ( (isset($_SESSION['poll_section_advance_search_active']) && $_SESSION['poll_section_advance_search_active'] == 'active')?'selected':'' ); ?>>Active</option>
							<option value="inactive" <?=(set_value('active') == "inactive")? "selected": ( (isset($_SESSION['poll_section_advance_search_active']) && $_SESSION['poll_section_advance_search_active'] == 'inactive')?'selected':'' ); ?>>Inactive</option>
						</select>
					</div>
					<br />
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
            
			<form name="poll_secction_bulk_action_form" id="poll_secction_bulk_action_form" action="" method="post" >
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
						<th class="<?php echo multilingual_align_class();?>" style="width:7%; text-align:center; display: none;"><input type="checkbox" /></th>
						<th class="<?php echo multilingual_align_class();?>" width="30%" style="text-align:left;">Title</th>
						<th class="<?php echo multilingual_align_class();?>" width="30%" style="text-align:left;">Created</th>
						<th class="<?php echo multilingual_align_class();?>" width="30%" style="text-align:left;">Updated</th>
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
                                                                <td class="news_listing_subtitle<?php echo multilingual_css_class();?>"><strong><?php echo  $row['section_name'];?></strong><br />
                                                                        <small><?php echo  ($row['active']=='Y')?'Active':'Inactive';?></small>
                                                                </td>
								<td class="listing_date<?php echo multilingual_align_class();?>"> <?=my_date_format($row['dtid'],'Y');?></td>
								<td class="listing_date<?php echo multilingual_align_class();?>"> <? ($row['lup_dtid'] == 0)? print '' : print my_date_format($row['lup_dtid'],'Y');?> </td>
								<td>
									<?
									if ( acl_premissions( array('module'=>'WIDGETS', 'section'=>'edit', 'return_bolean'=>true) ) )
									{								
										print '<a style="'.$multilingual_float.'" class="poll_edit unblock" href="'. $this->backend_url->poll_section_edit($row['id']).'"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/edit.png" title="Edit"  /></a> &nbsp;';
									}
									if ( acl_premissions( array('module'=>'WIDGETS', 'section'=>'delete', 'return_bolean'=>true) ) )
									{										
										//print '<a class="unblock" href="'. $this->backend_url->poll_listing().'">Manage Poll</a> &nbsp;';
									}
									if ( acl_premissions( array('module'=>'WIDGETS', 'section'=>'delete', 'return_bolean'=>true) ) )
									{
										print '<a style="'.$multilingual_float.'" class="unblock" href="'. $this->backend_url->poll_section_delete($row['id']).'" onclick="delete_poll_section(this); return false;"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/del.png" title="Delete"  /></a>';
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
<? $this->load->view('admin/layouts/template_bottom_view'); ?>