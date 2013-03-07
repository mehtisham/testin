<? $this->load->view('admin/layouts/template_top_view');
	//check data of category send from controller to view
	if ( $gallery_multimedia_info	!= ''	&&	$gallery_multimedia_info->num_rows() > 0)
	{
		$gallery_multimedia_info	=		$gallery_multimedia_info->row_array();
	}
?>
<style type="text/css">
	#status_upload_img{
		font-family:Arial; padding:5px; display: none;	
	}
	ul#files{ list-style:none; padding:0; margin:0;}
	ul#files li{ padding:10px; margin-bottom:2px; background-color: #F4F4F4;}
	ul#files li img{ width:20%; max-width: 100px; max-height:90px; vertical-align:middle; display: inline-block; }
	ul#files li label{ display: inline-block; }
	ul#files li input{ width: auto; }

	.success{ background:#99f099; border:1px solid #339933; }
	.error{ background:#f0c6c3; border:1px solid #cc6622; }
	.gallery_captions_class_txt{ color: black; }
	.gallery_captions_class_dtxt{ color: black; width: 350px;}
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
        xajax_uploaded_images_gallery('<?=Encode($gallery_multimedia_info['gallery_images_arr']);?>',"<?=$gallery_multimedia_info['img_name'];?>");
        
        //hide side panel and change width
        $('.main_column').css("margin-right","0px");
        $( ".sortable" ).sortable();
        
		var btnUpload=$('#upload');
		var status=$('#status');
		var uploaded_dir = $("#uploaded_image_dir_name").val();
		var upload_dir_ajax = uploaded_dir.replace('/', '---');
		var slug = $("#slug").val().split('/');
		slug = slug[1];
		new AjaxUpload(btnUpload, {
			action: '<?=base_url();?>admin/gallery_multimedia/ajax_file_upload_edit/'+upload_dir_ajax.replace('/', '---')+'/'+slug,
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
				file=file.toLowerCase();
				
				$("#status_upload_img").hide();
						file_name_exploaded = explode('.', file);
						file_name = file_name_exploaded[0];
						//Add uploaded file to list
						if(response === 'error')
						{
							$("<li '"+file_name+"'></li>").appendTo('#files').text(file).addClass('error');
						} 
						else
						{ 
							var uploaded_images_name    =  $('#uploaded_img_name_arr').val();
							uploaded_img_arr            =   uploaded_images_name.split(',');

							//-1 means that name doesn't exist iin array so upload this image
							if( jQuery.inArray(response, uploaded_img_arr) == '-1' )
							{
								<?$img = base_url().GALLERY_MULTIMEDIA_UPLOAD_DIR.'/';?>;
								var uploaded_img_html = "<li class='new_upload' id='"+response+"' style='background:#4A4A4A'>"+'<input type="checkbox" value="'+response+'.jpg" name="gallery_images_arr[]" /> <input type="hidden" value="'+response+'" name="gallery_images_arr_sorted[]" /><img src="<?=$img?>'+uploaded_dir+"/"+response+'.jpg" alt="" /> <textarea style="width: 70%; height: 60px; vertical-align: middle;" contenteditable="true" class="gallery_captions_class_dtxt" onfocus="hide_add_caption_text_image_galler(this)" name="gallery_images_arr_captions[]">Add Caption</textarea><div style="display:inline-block;line-height:40px;">  <input type="radio" id="primary_'+response+'.jpg" value="'+response+'.jpg" checked="checked" name="is_primary_image[]" /> <label for="primary_'+response+'.jpg">Set Primary</label></div> </li>';				
								$(uploaded_img_html).insertAfter("#files #upload_img_after");//$(uploaded_img_html).insertAfter("#files #upload_img_after");
                                //$("<li id='"+file_name+"'></li>").appendTo('#files').html('<input type="checkbox" value="'+file+'" name="gallery_images_arr[]" /> <img src="<?=$img?>'+uploaded_dir+"/"+file+'" alt="" /> <textarea style="width: 300px; height: 60px; vertical-align: middle;" class="gallery_captions_class_dtxt" onfocus="hide_add_caption_text_image_galler(this)" name="gallery_images_arr_captions[]">Add Caption</textarea> <input type="radio" id="primary_'+file+'" value="'+file+'" checked="checked" name="is_primary_image[]" /> <label for="primary_'+file+'">Is_Primary</label> &nbsp;&nbsp; | &nbsp;&nbsp;  <label for="gallery_order_'+file+'">Order</label> <input type="text" id="gallery_order_'+file+'" size="2" name="gallery_images_orders[]" />');
								//appen uploaded files name for checking name repetation
								$('#uploaded_img_name_arr').val($('#uploaded_img_name_arr').val()+','+response);
								
								//scroll down div
								$('.scrolldiv').animate({scrollTop : $(document).height()},'slow');
							}
							else
							{
								$("li").removeClass('error');
								$("#"+file_name).addClass('error');
							}
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
        var imgIds = new Array();

        $("#files img").each(function(){
            imgIds.push($(this).attr('id'));
        });
        
        var selected = new Array();
        $('#files input:checked').each(function() {
            selected.push($(this).attr('value'));
        });
        var selected_chk_boxes = selected.length-1;
        if(imgIds.length < 2){
            jAlert('There must be atlest one image.');
            return false;
        }
        if(imgIds.length == selected_chk_boxes){
            jAlert('There must be atlest one image.');
            return false;
        }
        xajax_delete_gallery_uploaded_images_ajax(selected_images,"<?=$gallery_multimedia_info['img_name'];?>",'<?=Encode($gallery_multimedia_info['gallery_images_arr']);?>');
    }
    
</script>

<div class="grid">
	<form name ="edit_multimedia" method="post" enctype="multipart/form-data">
		<h1 class="breadcrumb_listing_link">
			<?
			$gallery_multimedia_selected_category = $this->backend_url->url_segments( URL_SEGMENT_2 );
			if($gallery_multimedia_selected_category == "edit_cartoon" && acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'cartoons_listing', 'return_bolean'=>true) ) == true)
			{
				?>
				<a href="<?=$this->backend_url->list_cartoons()?>">Cartoons</a> / Edit Cartoons
				<?
			}
			else if($gallery_multimedia_selected_category == "edit_images" && acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'listing', 'return_bolean'=>true) ) == true)
			{
				?>
				<a href="<?=$this->backend_url->list_gallery_multimedia()?>">Images</a> / Edit Images
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
					if ( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'edit', 'return_bolean'=>true) ) == true )
					{
						if($gallery_multimedia_selected_category == "edit_cartoon")
						{
							?>
							<li><a class="active" href="javascript:void(0);" ><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" /><span>Edit Cartoons</span></a></li>
							<?
						}
						else if($gallery_multimedia_selected_category == "edit_images")
						{
							?>
							<li><a class="active" href="javascript:void(0);" ><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" /><span>Edit Images</span></a></li>
							<?
						}
						else
						{
							message_handler("no_such_multimedia_category_exist");
							redirect($this->backend_url->list_gallery_multimedia());
						}					
					}
					if ( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'listing', 'return_bolean'=>true) ) )
					{ 
						if($gallery_multimedia_selected_category == "edit_cartoon")
						{
							?>
							<li><a href="<?=$this->backend_url->list_cartoons()?>" ><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/search_multimedia.png" /><span>List Cartoons</span></a></li>
							<?
						}
						else if($gallery_multimedia_selected_category == "edit_images")
						{
							?>
							<li><a href="<?=$this->backend_url->list_gallery_multimedia()?>" ><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/search_multimedia.png" /><span>List Images</span></a></li>
							<?
						}
					} 
					?>
				</ul>    
			</div>
			<script>
			function clickUploadButton()
			{
				document.getElementsByName('uploadfile')[0].click();
			}//FUNCTION ADDED TO HANDLE THE UPLOADIFY UPLOAD BUTTON
			</script>
			
		
			
			<div class="metro_col light"  style="padding-bottom: 10px;">
				 <div class="select" style="display: none;">
					<label for="category_id">Section*</label>
					<?
					$opt = array(
							'select_name'		=> 'category_id',
							'default'			=> 'Categories Types',
							'data_arr'			=> $categories_of_multimedia,
							'post_select'		=> (isset($_POST['category_id']))?$_POST['category_id']:$gallery_multimedia_info['category_id'],
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
						<input  name="title" id="title" type="text" class="textfield<?php echo multilingual_css_class();?>" value="<?php echo $gallery_multimedia_info['title']; ?>"								
							<?						
							if(acl_premissions( array('module'=>'EDIT_SLUG', 'section'=>'edit_slug', 'return_bolean'=>TRUE) ))
							{
								?>
								onblur="xajax_generate_slug_n_tags( $('#title').val(), $('#slug').val(), 'edit');"
								<?
							}
							?> />
						<span class="form_error"><?php echo form_error('title'); ?></span>
					</div>
					<div class="textarea">
						<label>Description</label>
                                                <textarea class="<?php echo multilingual_css_class();?>" rows="5" cols="20" name="description" id="description"><?php echo $gallery_multimedia_info['description'];?></textarea>
					</div>
					<div class="input left" style="width:44%; margin-right:10%;">
						<label>Slug*</label>
						<?						
						if(acl_premissions( array('module'=>'EDIT_SLUG', 'section'=>'edit_slug', 'return_bolean'=>TRUE) ))
						{
							?>
							<input name="slug" id="slug" class="textfield" type="text" value="<?php echo $gallery_multimedia_info['slug']; ?>" />
							<?
						}
						else
						{
							?>
							<input readonly="readonly" name="slug" id="slug" class="textfield" type="text" value="<?php echo $gallery_multimedia_info['slug']; ?>" />
							<?
						}
						?>		
						
						<span class="form_error"><?php echo form_error('slug'); ?></span>
					</div>
					<div class="input left" style="width:44%;">
						<label>Tags</label>
						<?php $tags_arr = unserialize($gallery_multimedia_info['tags_arr']);?>
						<input name="tags" id="tags" class="textfield<?php echo multilingual_css_class();?>" type="text" value="<?($tags_arr == '')?print'':print implode(', ',$tags_arr);?>" />
						<span class="form_error"><?php echo form_error('tags'); ?></span>
					</div>
					<div class="clr"></div>
					<div class="input" style="display: none;">
						<label>Sort Order</label>
						<input type="text" id="sort_order" name="sort_order" class="textfield" value="<?php echo sort_order_functionality($gallery_multimedia_info['sort_order']);?>" />
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
								<td colspan="2" style="height: auto; background-color: #585858; padding: 0px">
									<div id="add_edit_caption" style="display:none;"></div>
									<div style="padding: 2px 2px 2px 2px; background-color: #585858; height: auto;">                                            
                                                                            <div class="metro_col light" style="width:27%; padding: 5px 10px 6px; margin-bottom: 1px;">
                                                        <input type="button" id="upload" value="Browse files" class="publish" onclick="clickUploadButton(); " />
                                                        <input type="button" id="delete_gallery_images" value="Delete file" onclick="delet_gallery_images()" class="draft" />
                                                </div>
										<span id="status"></span><span id="status_upload_img" >Uploading... <img src="<?=base_url().ADMIN_ASSET_DIR .'images/ajax-loader.gif';?>" alt="" /></span>		
										<ul class="sortable<?php echo multilingual_css_class();?>" id="files" >
											<li id="upload_img_after" style="display:none;"></li>
										</ul>   
									</div>
									<input type="hidden" id="uploaded_img_name_arr" name="uploaded_img_name_arr" value="" />
									<? 
									   $p_img = explode("/",$gallery_multimedia_info['img_name']);
									   $img_dir_name = $p_img[0]. '/' .$p_img[1]. '/' .$p_img[2];
									?>
									<input type="hidden" id="image_dir_name" name="image_dir_name" value="<?=$img_dir_name;?>" />
									<input type="hidden" id="uploaded_image_dir_name" value="<?=$img_dir_name;?>" />
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
<!--java script for changing the components according to the multimedia type-->
<script type="text/javascript">
function place_category_name_for_dir(){
	var e = document.getElementById("category_id");
	$('#image_dir_name').val(e.options[e.selectedIndex].text);
}
</script>
<? $this->load->view('admin/layouts/template_bottom_view'); ?>