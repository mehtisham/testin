<!--@this page is for epaper (city and date) listing - head and bottom called in other file-->
<?
	if ( ! isset($this->css_include_arr) )
	{
		$this->css_include_arr = array( base_url().ADMIN_ASSET_DIR.'css/epaper.css' );
	}
?>

<? $this->load->view('admin/layouts/template_top_view'); ?>
<form name ="add_epaper_pages" id="add_epaper_pages" method="post" enctype="multipart/form-data" >
<div class="grid">
	<h1 class="breadcrumb_listing_link">
		<a href="<?=$this->backend_url->list_epapers()?>" class="active">ePaper </a>/
		<a href="<?=$this->backend_url->list_epaper_pages($this->backend_url->GetParam('epaper_id'))?>" class="active">Manage Pages </a> 
		/ Add
	</h1>
	<div class="left g260">
       	<div class="metro_col dark">			
        	<ul class="menu">
            	<li><a href="<?=$this->backend_url->add_epaper_page($this->backend_url->GetParam('epaper_id'))?>" class="active"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add_pages.png" /> <span>Upload Pages</span></a></li>					
				<li><a href="<?=$this->backend_url->list_epaper_pages($this->backend_url->GetParam('epaper_id'))?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/epaper.png" /> <span>View Pages</span></a></li>
            </ul>    
        </div>
     </div> 
     <!-- End Left Sidebar -->
    <div class="right content_grid scrolldiv">
      	<div class="metro_col light">
		<div id="msgz">
			<?=print_msg();?>
		</div>	
        <h2>Upload Pages</h2><Br />
        

		
        
        <div class="select left" style="margin-right:10px; width:40%;">
        <label for="epaper_page_no">ePaper Page No *</label><?
				$opt = array(
							'select_name'		=> 'epaper_page_no',
							'default'			=> 'ePaper Page No',
							'data_arr'			=> $this->config->item('epaper_page_no'),
							'post_select'		=> (isset($_POST['epaper_page_no']))?$_POST['epaper_page_no']:'',
							'multi_dimentional' => true,
							);

				print build_dropdown( $opt );
				?><span class="form_error"><? echo form_error('epaper_page_no');?></span>
        </div>
         <div class="select left" style="margin-right:10px; width:40%;">
         <label for="epaper_cat_list">Category Name</label><?
				$opt = array(
							'select_name'		=> 'epaper_cat_list',
							'default'			=> 'Category',
							'data_arr'			=> $epaper_category_info_dropDown,
							'post_select'		=> (isset($_POST['epaper_cat_list']))?$_POST['epaper_cat_list']:''
							);

				print build_dropdown( $opt );
				?><? echo form_error('epaper_cat_list');?></div>
                <div class="clr"></div>
                <div class="input" style="width:40%; display: none;">
                <label for="sort_order">Sort Order</label><input type="text" id="sort_order" name="sort_order" value="<?php echo set_value('sort_order'); ?>" /><? echo form_error('sort_order');?>
                </div>
                
					<div class="clear"></div>
				<label for="epaper_image">Upload ePaper</label>
				<input name="epaper_image" id="epaper_image" type="file" style="opacity:0;position: absolute;
					   z-index: 100; margin-top: 0px; width:12% !important;cursor: pointer;" />
                                <input type="button" id="hackButton" class="draft" onclick="document.getElementById('epaper_image').click();" value="Choose File" 
					   style=" margin-top: -3px; color: #000; z-index: 1; position: absolute; width:12%;cursor: pointer; " >
				<div class="clear">&nbsp;</div><br />
				<small style="font-family:Arial, Helvetica, sans-serif; font-size:11px;">Please provide PDF images for better quality, you can also upload jpgs</small>
					<?php
					if(isset($error))
						print '<div class="error_info">'.$error.'</div>';
					?>
				<div style="margin: auto;" id="imagebox" style="height: 100px; width: 100px;"></div>
                


</div>
</div>
	 <div class="left g260">
        <div class="metro_col light">
            <!--<input type="submit" name="submit_btn" id="submit_btn" value="Save as Draft"  class="publish" />-->
            <input type="submit" name="submit_btn" id="submit_btn" value="Save"  class="publish" />
        </div>
    </div>
    <div class="clr"></div>
</div>
</form>
<? $this->load->view('admin/layouts/template_bottom_view'); ?>
<script>
	//this is html 5 based
	$(function(){
		$('#epaper_image').bind('change', function(evt) {
			var i = 0, len = this.files.length, img, reader, file;
			for ( ; i < len; i++ ) {
				file = this.files[i];
				if (!!file.type.match(/image.*/)) 
				{
					if ( window.FileReader ) {
						reader = new FileReader();
						reader.onloadend = function (e) {
							$('#imagebox').css('height', '80px' );
							$('#imagebox').css('background-repeat', 'no-repeat' );
							$('#imagebox').css('background-image', 'url(' + e.target.result + ')' );
							$('#imagebox').css('background-size', 'contain' );
							};
						reader.readAsDataURL(file);
					}
				}
			}
		});
	});
</script>