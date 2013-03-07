<? $this->load->view('admin/layouts/template_top_view'); ?>



<script type="text/javascript">
	$(document).ready(function(){
		//for date picker
		$(function() {
			$( "#epaper_date" ).datepicker({ dateFormat: '<?=EPAPER_DATEPICKER_DATE_FORMATE;?>' });
		});
	});
</script>

<?php
if ( $epaper_info != '' && $epaper_info->num_rows() > 0)
{
	$epaper_info = $epaper_info->row_array();
}
?>
<div class="grid">
    <h1 class="breadcrumb_listing_link"><a href="<?=$this->backend_url->list_epapers()?>">ePaper</a> / Edit</h1>
    
    
<div class="left g260">
       	<div class="metro_col dark">
        	<ul class="menu">
            <?
			if ( acl_premissions( array('module'=>'EPAPER', 'section'=>'edit', 'return_bolean'=>true) ) )
			{
				?>
				<li><a href="<?=$this->backend_url->add_epaper()?>" class="active"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/seo.png" /><span>Edit ePaper</span></a></li><?
			}
			?>
            <? if ( acl_premissions( array('module'=>'EPAPER', 'section'=>'listing', 'return_bolean'=>true) ) == true )	
			{ 
				?>
				<li><a href="<?=$this->backend_url->list_epapers()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/seo_tag.png" /> <span>View ePaper</span></a></li>
				<?	
			} 
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
        	<h2>Edit ePaper</h2><br/>
			<form name ="edit_epaper" id="edit_epaper" method="post">
            <div class="input left" style="width:25%; margin-right:20px;">
            <label for="epaper_date">Publish Date</label><input id="epaper_date" readonly name="epaper_date" type="text" value="<?php echo my_date_format(strtotime($epaper_info['epaper_date']),'N','calender');?>" /><?php echo form_error('epaper_date'); ?>
            </div>
            <div class="select left" style="width:45%; margin-right:10px;">
            <label for="epaper_city">City *</label><?
				$opt = array(
							'select_name'		=> 'epaper_city',
							'default'			=> 'ePaper City',
							'data_arr'			=> $this->config->item('epaper_cities'),
							'post_select'		=> (isset($_POST['epaper_city']))?$_POST['epaper_city']:$epaper_info['epaper_city'],
							'multi_dimentional' => true
							);

				print build_dropdown( $opt );
				?><span class="form_error"><?php echo form_error('epaper_city'); ?></span>
            </div>
            
            <div class="button" style="width:25%; float: left;">
                <label for="epaper_city">&nbsp;</label>
                <input type="submit" name="edit_btn" id="edit_btn" value="Save as Draft"  class="draft" />
            </div>        
            <div class="clr"></div>
	
</form>
</div>
</div>
</div>

<? $this->load->view('admin/layouts/template_bottom_view'); ?>