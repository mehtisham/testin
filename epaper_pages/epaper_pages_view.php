<!--@this page is for epaper (city and date) listing - head and bottom called in other file-->
<?
	if ( ! isset($this->css_include_arr) )
	{
		$this->css_include_arr = array( base_url().ADMIN_ASSET_DIR.'css/epaper.css' );
	}
?>

<? $this->load->view('admin/layouts/template_top_view'); ?>


<!--conformation box on delete-->
<script type="text/javascript">
function delete_epaper_page(row)
{
	jConfirm('Are you sure you want to delete!', 'Delete ePaper page', function(responce) 
	{
		if(responce){ 
			document.location = row.href;
		}
		else{
			return false;
		}
	}); 
}
function news_bulk_form_post()
{
	$('.list_tbl tbody').find('input:checkbox').each(function(){
		if($(this).attr('checked'))
		{
			if(trim($('#news_bulk_action').val()) != '')
			{
				if($('#news_bulk_action').val() == '3')
				{
					jConfirm('Are you sure you want to delete!', 'Delete ePaper', function(responce) 
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

</script>

<!--for light box-->
<script type="text/javascript">
	$(document).ready(function(){
		$(".add_epaper_page").colorbox({iframe:true, innerWidth:600, innerHeight:500});
		$(".edit_epaper_page").colorbox({iframe:true, innerWidth:600, innerHeight:500});

		//for date picker
		$( "#epaper_page_from_date" ).datepicker({ dateFormat: '<?=DATEPICKER_DATE_FORMATE?>' });
		$( "#epaper_page_to_date" ).datepicker({ dateFormat: '<?=DATEPICKER_DATE_FORMATE?>' });
		//current live formate = 'M,d	yy'
	
	
		//epaper bulk action
	$('#all_epaper_pages').click(function(e){
		if($('#all_epaper_pages').attr('checked') == true )
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
	if( (isset($_SESSION['epaper_advance_search_epaper_pages_category_id']) && $_SESSION['epaper_advance_search_epaper_pages_category_id'] != '')
		||
		( isset($_SESSION['epaper_advance_search_epaper_pages_active']) && $_SESSION['epaper_advance_search_epaper_pages_active'] != 'both' )		
	  )
	{
		?>
				 $(".slidingDiv").show();
		<?
	}
	?>
		
	});
</script>
<?// $this->load->view('admin/elements/header'); ?>

<div class="grid">
	<h1 class="breadcrumb_listing_link">
		<a href="<?=$this->backend_url->list_epapers()?>" class="active">ePaper </a>
		/ Manage Pages
	</h1>
    
    
	<div class="left g260">
       	<div class="metro_col dark">
        	<ul class="menu">
            	<li><a href="<?=$this->backend_url->list_epaper_pages($this->backend_url->GetParam('epaper_id'))?>" class="active"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/epaper.png" /> <span>View Pages</span></a></li>
             <?
				if ( acl_premissions( array('module'=>'EPAPER_PAGES', 'section'=>'add', 'return_bolean'=>true) ) )
				{?>
					<li><a href="<?=$this->backend_url->add_epaper_page($this->backend_url->GetParam('epaper_id'))?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add_pages.png" /> <span>Upload Pages</span></a></li>
					
				<? }
				?>
                
                
				
            </ul>    
        </div>
     </div> 
     <!-- End Left Sidebar -->
    <div class="right content_grid scrolldiv">
      	<div class="metro_col light">
			<div id="msgz">
				<?=print_msg();?>
			</div>
            <!-- Search -->
             <div id="search" style="display: none;">
             <form name="epaper_page_view" id="epaper_page_view" method="post" action="" >
             <div class="select left" style="margin-right:10px;">
								<?
								$opt = array(
											'select_name'		=> 'epaper_cat_list',
											'default'			=> 'All Categories',
											'data_arr'			=> $epaper_category_info_dropDown,
											'post_select'		=> (isset($_POST['epaper_cat_list']))?$_POST['epaper_cat_list']: ( isset($_SESSION['epaper_advance_search_epaper_pages_category_id']) && $_SESSION['epaper_advance_search_epaper_pages_category_id'] != '')?$_SESSION['epaper_advance_search_epaper_pages_category_id']:'',
											);

								print build_dropdown( $opt );
								?>
             </div>
			<div class="select left">
				<select name="active" id="active">
					<option value="both" <?=(set_value('active') == "both")? "selected": ( (isset($_SESSION['epaper_advance_search_epaper_pages_active']) && $_SESSION['epaper_advance_search_epaper_pages_active'] == 'Both')?'selected':'' );  ?>>Both</option>
					<option value="active" <?=(set_value('active') == "active")? "selected":( (isset($_SESSION['epaper_advance_search_epaper_pages_active']) && $_SESSION['epaper_advance_search_epaper_pages_active'] == 'active')?'selected':'' );  ?>>Active</option>
					<option value="inactive" <?=(set_value('active') == "inactive")? "selected": ( (isset($_SESSION['epaper_advance_search_epaper_pages_active']) && $_SESSION['epaper_advance_search_epaper_pages_active'] == 'inactive')?'selected':'' ); ?>>Inactive</option>
				</select>
			</div>
             <div class="button left">
             	<input type="submit" name="search_btn" id="search_btn" class="search" style="padding-top:10px; padding-bottom:10px;" value="&nbsp;" />
             </div>
             <div class="clr"></div>
			<!-------Advance Search Table------->
			</form>
             </div>
             <!-- end search -->
             
             <h2>ePaper <?php echo my_date_format(strtotime($epaper_publish_date->epaper_date),'N'); ?>, <?php echo  $epaper_publish_date->epaper_city; ?></h2>
             <div class="heading_datetime">
             </div>
			 <form name="epaper_pages_bulk_action" id="epaper_pages_bulk_action" action="" method="post" >
				 <div class="sortbox" style="width: 130px;">						
						<div id="news_bulk_action_div" class="select" style="padding-top:10px;">
							<select name="news_bulk_action" id="news_bulk_action" onchange="news_bulk_form_post();">
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
				<table border="0" cellpadding="0" cellspacing="0" class="list_tbl"  style="<?php echo $multilingual;?>">
					<thead>
						<tr>
							<th class="<?php echo multilingual_align_class();?>" style="width:5%"><input id="all_epaper_pages" name="all_epaper_pages" type="checkbox" value="" /></th>
							<th class="<?php echo multilingual_align_class();?>" style="text-align:left; width: 20%">&nbsp;</th>
							<th class="<?php echo multilingual_align_class();?>" style="text-align:left; width:25%;" >Created</th>
							<th class="<?php echo multilingual_align_class();?>" style="text-align:left; width:30%;" >Updated</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php
						//if no record found then
						if ( $epaper_pages_info->num_rows() > 0 )
						{//pr($epaper_pages_info->result_array()); die();
							//loop for listing all user_groups
							foreach ($epaper_pages_info->result_array() as $row)
							{
							?>
								<tr>
									<td><input name="bulk_epaper_pages[<?=$row['id']?>]" id="<?=$row['id']?>"  type="checkbox" /></td>
									<td valign="top" class="news_listing_subtitle"><? ($row['epaper_image_path'] == '')? '': print ''; ?>
										
										
										<img src="<?=$this->urlmanager->image_manager( array('module'=>'epaper_image', 'size'=>100, 'date'=>my_date_format(strtotime($row['epaper_date']),'N','directory_formate'), 'city'=>ucfirst(strtolower($row['epaper_city'])), 'image_name'=>$row['epaper_image_path'] ) );?>" /><br>
										
										<small><?php echo  ($row['category_name']=='')?'':$row['category_name'].' -'; ?> Page No: <?php echo  $row['epaper_page_no']; ?></small> <Br />
									</td>
									<td valign="top">
										<?php ($row['epaper_date'] == 0)?'':print my_date_format(strtotime($row['epaper_date']),'Y','todays_paper_publish_dateformat'); ?>
									</td>
									<td valign="top">
										<?php ($row['lup_dtid'] == 0)?'':print my_date_format($row['lup_dtid'],'Y','digital_paper_publish_dateformat'); ?>
									</td>
									<td valign="top">
										<?
										if ( EPAPER_TYPE == 'normal' )
										{
											if ( acl_premissions( array('module'=>'EPAPER_PAGES', 'section'=>'edit', 'return_bolean'=>true) ) )
											{
												print '<a style="'.$multilingual_float.'" class="edit" href="'. $this->backend_url->edit_epaper_page($row['id'] ).'"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/edit.png" title="Edit" /></a> &nbsp;';
											}
											if ( acl_premissions( array('module'=>'EPAPER_PAGES', 'section'=>'image_map', 'return_bolean'=>true) ) )
											{
												print '<a style="'.$multilingual_float.'" href="'.$this->backend_url->page_image_map( $this->backend_url->GetParam('epaper_id'), $row['id'] ).'"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/cut.png" title="Image Maps" /></a> &nbsp;';
											}
											if ( acl_premissions( array('module'=>'EPAPER_PAGES', 'section'=>'delete', 'return_bolean'=>true) ) )
											{
												print '<a style="'.$multilingual_float.'" class="unblock del" href="'.$this->backend_url->delete_epaper_page($row['id'] ).'" onclick="delete_epaper_page(this); return false;"><img src="'. base_url().ADMIN_ASSET_DIR.'images/small/del.png" title="Delete" /></a>';
											}
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
								<td class="no_record_td" colspan="6">No Record Exist</td>
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
<div class="clr"></div>
</div>

<? $this->load->view('admin/layouts/template_bottom_view'); ?>
