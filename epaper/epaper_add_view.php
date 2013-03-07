<!--@this page is for epaper add - head and bottom called in other file-->
<?
	if ( ! isset($this->css_include_arr) )
	{
		$this->css_include_arr = array( base_url().ADMIN_ASSET_DIR.'css/epaper.css' );
	}
?>

<? $this->load->view('admin/layouts/template_top_view'); ?>



<script type="text/javascript">
	$(document).ready(function(){
		//for date picker
		$(function() {
			//M,d	yy
			$( "#epaper_date" ).datepicker({ dateFormat: '<?=EPAPER_DATEPICKER_DATE_FORMATE;?>' });
		});
	});
</script>
<div class="grid">
    <h1 class="breadcrumb_listing_link"><a href="<?=$this->backend_url->list_epapers()?>">ePaper</a> / Add</h1>
    
<div class="left g260">
       	<div class="metro_col dark">
        	<ul class="menu">
            <?
			if ( acl_premissions( array('module'=>'EPAPER', 'section'=>'add', 'return_bolean'=>true) ) )
			{
				?>
				<li><a href="<?=$this->backend_url->add_epaper()?>" class="active"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/seo.png" /><span>Add ePaper</span></a></li><?
			}
			?>
            <? if ( acl_premissions( array('module'=>'EPAPER', 'section'=>'listing', 'return_bolean'=>true) ) == true )	{ ?>
				<li><a href="<?=$this->backend_url->list_epapers()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/seo_tag.png" /> <span>View ePaper</span></a></li>
			<?	} ?>
                
                
				
            </ul>    
        </div>
     </div> 
     <!-- End Left Sidebar -->
    <div class="right content_grid scrolldiv">
      	<div class="metro_col light">
			<div id="msgz">
				<?=print_msg();?>
			</div>
        	<h2>Add ePaper</h2><br/>
            <form name ="add_epaper" id="add_epaper" method="post" enctype="multipart/form-data" >
            <div class="input left fixed_min_width" style="width:25%; margin-right:20px;">
				<label for="epaper_date">Publish Date</label>
				<input class="fixed_min_width custom_input_size" name="epaper_date" readonly id="epaper_date" type="text" value="<?=(set_value('epaper_date') == '')?(my_date_format(time(),'N','calender')):set_value('epaper_date') ?>" /><?=form_error('epaper_date');?>

				<?
				if ( EPAPER_TYPE == 'flash' )
				{
				?>
					<br /><br />
					<label for="active">Upload PDF *</label>
					<input name="epaper_pdf_image" id="epaper_pdf_image" type="file" style="" />
				<?
				}
				?>
				
            </div>
			<div class="select left" style="width:45%; margin-right:10px;">
            <label for="active">City *</label><?
				$opt = array(
							'select_name'		=> 'epaper_city',
							'default'			=> 'ePaper City',
							'data_arr'			=> $this->config->item('epaper_cities'),
							'post_select'		=> (isset($_POST['epaper_city']))?$_POST['epaper_city']:'',
							'multi_dimentional' => true
							);

				print build_dropdown( $opt );
				?><span class="form_error"><?=form_error('epaper_city');?></span>
            </div>
            <div class="button" style="width:25%; float: left">
                <label for="active">&nbsp;</label>
                <input type="submit" name="submit_btn" id="submit_btn" value="Save as Draft"  class="draft" />
            </div>
                <div class="clr"></div>
</form>
</div>

<? $this->load->view('admin/layouts/template_bottom_view'); ?>