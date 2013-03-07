<? $this->load->view('admin/layouts/template_top_view'); ?>
<style type="text/css">
	#status{
		font-family:Arial; padding:5px;	
	}
	#status_upload_img{
		font-family:Arial; padding:5px; display: none;	
	}
	ul#files{ list-style:none; padding:0; margin:0;}
	ul#files li{ padding:10px; margin-bottom:2px; background-color: #F4F4F4;}
	ul#files li img{ max-width:100px; width: 100px; max-height:90px; vertical-align:middle; display: inline-block; }
	ul#files li label{ display: inline-block; }
	ul#files li input{ width: auto; }

	.success{ background:#99f099; border:1px solid #339933; }
	.error{ background:#f0c6c3; border:1px solid #cc6622; }
	.gallery_captions_class_txt{ color: black; }
	.gallery_captions_class_dtxt{ color: black; width: 70%;}
</style>
<script type="text/javascript" >

	function hide_add_caption_text_image_galler(obj){
		 if(obj.value == 'Add Caption'){
              obj.value = '';
              $(obj).removeClass("gallery_captions_class_dtxt"); 
              $(obj).addClass("gallery_captions_class"); 
          }    
    }
	$(function(){
        xajax_reload_gallery_images();
        //$( ".sortable" ).sortable();

		var btnUpload=$('#upload');
		var status=$('#status');
		new AjaxUpload(btnUpload, {
			action: '<?=base_url();?>admin/gallery_multimedia/ajax_file_upload',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|jpeg)$/.test(ext))){ 
                    // extension is not allowed 
					status.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
                
				$("#status_upload_img").show();
			},
			onComplete: function(file, response){
				//On completion clear the status
				file=file.toLowerCase();
				
				$("#status_upload_img").hide();
					file_name_exploaded = explode('.', file);
					file_name = file_name_exploaded[0];
					//Add uploaded file to list
					if(response==="success")
					{
						var uploaded_images_name    =  $('#uploaded_img_name_arr').val();
						uploaded_img_arr            =   uploaded_images_name.split(',');

						//-1 means that name doesn't exist iin array so upload this image
						if( jQuery.inArray(file_name, uploaded_img_arr) == '-1' )
						{
							<?$img = base_url().GALLERY_MULTIMEDIA_UPLOAD_DIR.'/temp_gallery/';?>;
							var uploaded_img_html = "<li id='"+file_name+"' style='background:#4A4A4A;'>"+'<input type="checkbox" value="'+file+'" name="gallery_images_arr[]" /> <input type="hidden" value="'+file_name+'" name="gallery_images_arr_sorted[]" /><img src="<?=$img?>'+file+'" alt="" /> <textarea style="width: 70%; height: 60px; vertical-align: middle;" contenteditable="true" class="gallery_captions_class_dtxt" onfocus="hide_add_caption_text_image_galler(this)" name="gallery_images_arr_captions[]">Add Caption</textarea><div style="display:inline-block;line-height:40px;"> <input type="radio" id="primary_'+file+'" value="'+file+'" checked="checked" name="is_primary_image[]" /> <label for="primary_'+file+'">Set Primary</label></div> </li>';				
							$(uploaded_img_html).insertAfter("#files #upload_img_after");
							//appen uploaded files name for checking name repetation
							$('#uploaded_img_name_arr').val($('#uploaded_img_name_arr').val()+','+file_name);

							//scroll down div
							$('.scrolldiv').animate({scrollTop : $(document).height()},'slow');
						}
						else
						{
							alert('File '+file_name+' Already Added');
							//$("li").removeClass('error');
							//$("#"+file_name).addClass('error');
						}
					} 
					else
					{
							$("<li '"+file_name+"'></li>").appendTo('#files').text(file).addClass('error');
					}
				}
			});
		
	});
	
    function replace_gallery_images_str(str){
        var ret = '';
        var replace_str = $("#uploaded_img_name_arr").val();
        ret = replace_str.replace(str, "");
        ret = replace_str.replace(str+",", "");
        ret = replace_str.replace(","+str, "");
        
        $("#uploaded_img_name_arr").val(ret);
    }
	
    function delet_gallery_images()
    {
        var selected_images  = new Array();
        $('input[name="gallery_images_arr[]"]:checkbox:checked').each(function() {
                if($(this).parent('li').is(':visible')){
					selected_images.push(this.value);
					replace_gallery_images_str(this.value.replace(".jpg", ""));
				}
                
        });
        //alert(selected_images);
        xajax_delete_gallery_image_ajax(selected_images);
    }
</script>
<div class="grid">
    <form name ="add_multimedia" method="post" enctype="multipart/form-data">
	<h1 class="breadcrumb_listing_link">
		<?
		$gallery_multimedia_selected_category = $this->backend_url->url_segments( URL_SEGMENT_2 );
		if($gallery_multimedia_selected_category == "add_cartoon")
		{
			?>
			<a href="<?=$this->backend_url->list_cartoons()?>">Cartoons</a> / Add Cartoons
			<?
		}
		else if($gallery_multimedia_selected_category == "add_images")
		{
			?>
			<a href="<?=$this->backend_url->list_gallery_multimedia()?>">Images</a> / Add Images
			<?
		}
		else
		{
			message_handler("no_such_multimedia_category_exist");
			redirect($this->backend_url->list_gallery_multimedia());
		}
		?>
	</h1>
	<div class="left g260">
		<div class="metro_col dark">
        	<ul class="menu">
            	<?
//				if ( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'add', 'return_bolean'=>true) ) == true )
//				{
					if($gallery_multimedia_selected_category == "add_cartoon" && acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'cartoons_add', 'return_bolean'=>true) ) == true)
					{
						?>
						<li><a class="active" href="<?=$this->backend_url->add_cartoon()?>" ><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" /><span>Add Cartoons</span></a></li>
						<?
					}
					else if($gallery_multimedia_selected_category == "add_images" && acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'add', 'return_bolean'=>true) ) == true)
					{
						?>
						<li><a class="active" href="<?=$this->backend_url->add_multimedia_images()?>" ><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" /><span>Add Images</span></a></li>
						<?
					}
					else
					{
						message_handler("no_such_multimedia_category_exist");
						redirect($this->backend_url->list_gallery_multimedia());
					}					
//				}
//				if ( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'listing', 'return_bolean'=>true) ) )
//				{ 
					if($gallery_multimedia_selected_category == "add_cartoon" && acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'cartoons_listing', 'return_bolean'=>true) ) == true)
					{
						?>
						<li><a href="<?=$this->backend_url->list_cartoons()?>" ><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/search_multimedia.png" /><span>List Cartoons</span></a></li>
						<?
					}
					else if($gallery_multimedia_selected_category == "add_images" && acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'listing', 'return_bolean'=>true) ) == true)
					{
						?>
						<li><a href="<?=$this->backend_url->list_gallery_multimedia()?>" ><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/search_multimedia.png" /><span>List Images</span></a></li>
						<?
					}
//				} 
				?>
            </ul>    
        </div>
		<div class="clear"></div>
		<script>
		function clickUploadButton()
		{
			document.getElementsByName('uploadfile')[0].click();
		}//FUNCTION ADDED TO HANDLE THE UPLOADIFY UPLOAD BUTTON
		</script>
			
		
		<div class="clear"></div>
		<div class="metro_col light"  style="padding-bottom: 10px;">
                    
			<div class="select" style="display: none;">
				<?
				$details_of_multimedia_categories_arr = $details_of_multimedia_categories->result_array();
				//$gallery_multimedia_selected_category = $this->backend_url->url_segments( URL_SEGMENT_2 );
				foreach($details_of_multimedia_categories_arr AS $key=>$val)
				{
					if($val['slug'] == "cartoons" && $gallery_multimedia_selected_category == "add_cartoon")
					{
						$gallery_multimedia_category_id = $val['id'];
					}
					else if($val['slug'] == "picture-gallery" && $gallery_multimedia_selected_category == "add_images")
					{
						$gallery_multimedia_category_id = $val['id'];
					}
				}
				if(!isset($gallery_multimedia_category_id))
				{
					message_handler("no_such_multimedia_category_exist");
					redirect($this->backend_url->list_gallery_multimedia());
				}
				$opt = array(
							'select_name'		=> 'category_id',
							'default'			=> 'Categories Types',
							'data_arr'			=> $categories_of_multimedia,
							'post_select'		=> $gallery_multimedia_category_id,
							'select_css_or_js'	=> 'onChange="place_category_name_for_dir()"'
							);

				print build_dropdown( $opt );
				if(form_error('category_id') != '')
				{
					echo '<span class="form_error">'.form_error('category_id').'</span>';
				}
				?>					
			</div>			
			<div class="button">
				<input type="submit" name="submit_btn" id="submit_btn" class="publish" value="Publish" />
				<input type="submit" name="save_as_draft" id="save_as_draft" value="Save as Draft" class="draft" />
			</div>
		</div>
			<!-- end light -->
     </div> 
     <!-- End Left Sidebar -->
	 
		<div class="right content_grid scrolldiv">
			<div class="metro_col light">
				<div id="msgz">
					<?=print_msg();?>
				</div>
					<div class="clr"></div>
					<div class="input">
						<label>Title*</label>
						<input  name="title" id="title" type="text" class="textfield<?php echo multilingual_css_class();?>" value="<?php echo set_value('title'); ?>" onblur="xajax_generate_slug_n_tags( $('#title').val(),'','' )" />
						<span class="form_error"><?php echo form_error('title'); ?></span>
					</div>
					<div class="textarea">
						<label>Description</label>
                                                <textarea class="<?php echo multilingual_css_class();?>" rows="5" cols="20" name="description" id="description"><?php echo set_value('description');?></textarea>
					</div>
					<div class="input left" style="width:44%; margin-right:10%;">
						<label>Slug*</label>
						<input name="slug" id="slug" class="textfield" type="text" value="<?php echo set_value('slug'); ?>" />
						<span class="form_error"><?php echo form_error('slug'); ?></span>
					</div>
					<div class="input left" style="width:44%;">
						<label>Tags</label>
						<input name="tags" id="tags" class="textfield<?php echo multilingual_css_class();?>" type="text" value="<?php echo set_value('tags'); ?>" />
						<span class="form_error"><?php echo form_error('tags'); ?></span>
					</div>
					<div class="clr"></div>
					<div class="input" style="display: none;">
						<label>Sort Order</label>
						<input type="text" id="sort_order" name="sort_order" class="textfield" value="<?php echo set_value('sort_order'); ?>" />
						<span class="form_error"><?php echo form_error('sort_order'); ?></span>
					</div>
					<div>
						<?
						$multimedia_type = $this->config->item('multimedia_type');						
						?>
						<input name="multimedia_type" id="multimedia_type" type="hidden" value="<?=$multimedia_type['IMAGE']['id']?>" />
					</div>
					<div>
						<input name="youtube_link" id="youtube_link" type="hidden" value="" />
					</div>
					<div class="input">
						<label>Gallery Images* (jpg/jpeg files only)</label>
						<table>
							<tr>
								<td colspan="2" style="height: auto; background-color: #4A4A4A">								
								<div id="add_edit_caption" style="display:none;"></div>
								<div style="padding: 2px 2px 2px 2px; background-color: #585858; height: auto;">
                                                                    <div class="metro_col light" style="width:27%; padding: 5px 10px 6px; margin-bottom: 1px;">
                                                                            <input type="button" id="upload" value="Browse files" class="publish"  onclick="clickUploadButton(); " />
                                                                            <input type="button" id="delete_gallery_images" value="Delete file" onclick="delet_gallery_images()" class="draft" />
                                                                    </div>
									<!--<span id="status" ></span><span id="status_upload_img" >Uploading... <img src="<?=base_url().ADMIN_ASSET_DIR .'images/ajax-loader.gif';?>" alt="" /></span>-->		
									<ul class="sortable" id="files" >
										<li id="upload_img_after" style="display:none;"></li>
									</ul>   
								</div>
								<input type="hidden" id="uploaded_img_name_arr" name="uploaded_img_name_arr" value="" />
								<input type="hidden" id="image_dir_name" name="image_dir_name" value="" />
							</td>
							</tr>	
						</table>	
						<span class="form_error"><?echo form_error('upload_image');?></span>
					</div>
			</div>
		</div>
		
		<div class="clr"></div>  
	</form>   	
</div>
<script type="text/javascript">
function place_category_name_for_dir(){
	var cat_id = $("#category_id").val();
	xajax_get_category_slug(cat_id);
}

$( function() {
	var cat_id = $("#category_id").val();
	xajax_get_category_slug(cat_id);
} );

</script>
<? $this->load->view('admin/layouts/template_bottom_view'); ?>