<? $this->load->view('admin/layouts/template_top_view'); ?>


<style>
#status{
	font-family:Arial; padding:5px;	
}
#status_upload_img{
	font-family:Arial; padding:5px; display: none;	
}
ul#files{ list-style:none; padding:0; margin:0; width: 800px}
ul#files li{ padding:10px; margin-bottom:2px; background-color: #F4F4F4;}
ul#files li img{ max-width:100px; max-height:90px; vertical-align:middle; display: inline-block; }
ul#files li label{ display: inline-block; }

.success{ background:#99f099; border:1px solid #339933; }
.error{ background:#f0c6c3; border:1px solid #cc6622; }
.gallery_captions_class_txt{ color: #FFF; }
.gallery_captions_class_dtxt{ color: #CCC; }
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
        
        //hide side panel and change width
        $('.main_column').css("margin-right","0px");
        $('.sidebar').css("display","none");
        
        $( ".sortable" ).sortable();
		//$( ".sortable" ).disableSelection();
        
		var btnUpload=$('#upload');
		var status=$('#status');
		new AjaxUpload(btnUpload, {
			action: '<?=base_url();?>admin/gallery_multimedia/ajax_file_upload',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    // extension is not allowed 
					status.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
                
				$("#status_upload_img").show();
			},
			onComplete: function(file, response){
				//On completion clear the status
				//alert(file +'---'+ response);
				
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
										var uploaded_img_html = "<li id='"+file_name+"'>"+'<input type="checkbox" value="'+file+'" name="gallery_images_arr[]" /> <input type="hidden" value="'+file_name+'" name="gallery_images_arr_sorted[]" /><img src="<?=$img?>'+file+'" alt="" /> <textarea style="width: 450px; height: 60px; vertical-align: middle;" contenteditable="true" class="gallery_captions_class_dtxt" onfocus="hide_add_caption_text_image_galler(this)" name="gallery_images_arr_captions[]">Add Caption</textarea> <input type="radio" id="primary_'+file+'" value="'+file+'" checked="checked" name="is_primary_image[]" /> <label for="primary_'+file+'">Is_Primary</label> </li>';				
                                        $(uploaded_img_html).insertAfter("#files #upload_img_after");
                                        //appen uploaded files name for checking name repetation
                                        $('#uploaded_img_name_arr').val($('#uploaded_img_name_arr').val()+','+file_name);
                                    }
                                    else
                                    {
                                        $("li").removeClass('error');
                                        $("#"+file_name).addClass('error');
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
	<h1>Multimedia</h1>
	<div class="left g260">
		<div class="metro_col dark">
        	<ul class="menu">
            	<?
				if ( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'listing', 'return_bolean'=>true) ) == true )
				{
					?>
					<li><a href="<?=$this->backend_url->list_gallery_multimedia()?>" ><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/search_multimedia.png" /><span>Multimedia</span></a></li>
					<?
				}
				if ( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'add', 'return_bolean'=>true) ) )
				{ 
					?>
					<li><a href="<?=base_url().'admin/dashboard/multimedia_add'?>" class="active"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" /> <span>Add Media</span></a></li>
					<?	
				} 
				?>
            </ul>    
        </div>
     </div> 
     <!-- End Left Sidebar -->
    <div class="left g820 scrolldiv">
      	<div class="metro_col light">
        	<h2>Add Multimedia</h2><br />
            
            <form name ="add_multimedia" method="post" enctype="multipart/form-data">
                <div class="clr"></div>
                <h3>Add Multimedia</h3><Br />
                <div class="select left" style="width:40%;">
                	<label>Section</label>
                    <?
					$opt = array(
								'select_name'		=> 'category_id',
								'default'			=> 'Categories Types',
								'data_arr'			=> $categories_of_multimedia,
								'post_select'		=> (isset($_POST['category_id']))?$_POST['category_id']:'',
								'select_css_or_js'	=> 'onChange="place_category_name_for_dir()"'
								);

					print build_dropdown( $opt );
					if(form_error('category_id') != '')
					{
						echo form_error('category_id');
					}
					?>
                </div>
                <div class="clr"></div>
                <div class="input">
                	<label>Title</label>
                    <input  name="title" id="title" type="text" class="textfield" value="<?php echo set_value('title'); ?>" onblur="xajax_generate_slug_n_tags( $('#title').val() )" />
					<?php echo form_error('title'); ?>
                </div>
                <div class="textarea">
                	<label>Description:</label>
					<textarea rows="5" cols="20" name="description" id="description"><?php echo set_value('description');?></textarea>
                </div>
                <div class="input">
                	<label>Slug</label>
                    <input name="slug" id="slug" class="textfield" type="text" value="<?php echo set_value('slug'); ?>" />
					<?php echo form_error('slug'); ?>
                </div>
				<div class="input">
                	<label>Tags</label>
                    <input name="tags" id="tags" class="textfield" type="text" value="<?php echo set_value('tags'); ?>" />
					<?php echo form_error('tags'); ?>
                </div>
				<div class="input" style="display: none;">
                	<label>Sort Order</label>
                    <input type="text" id="sort_order" name="sort_order" class="textfield" value="<?php echo set_value('sort_order'); ?>" />
					<?php echo form_error('sort_order'); ?>
                </div>
				
				<div class="input">
                	<label>Upload Gallery Images</label>
                    <table>
						<tr>
							<td>
								<!--upload image or link-->
								<label for="gallery">Upload Gallery Images:</label>
							</td>
							<td colspan="2" style="height: auto; background-color: #F4F4F4">
							<input class="button2" type="button" id="upload" value="Upload file" />
							<input class="button2" type="button" id="delete_gallery_images" value="Delete file" onclick="delet_gallery_images()" />
							<div id="add_edit_caption" style="display:none;"></div>
							<div style="padding: 2px 2px 2px 2px; background-color: white; height: auto;">                                            

								<span id="status" ></span><span id="status_upload_img" >Uploading... <img src="<?=base_url().ADMIN_ASSET_DIR .'images/ajax-loader.gif';?>" alt="" /></span>		
								<ul class="sortable" id="files" >
									<li id="upload_img_after" style="display:none;"></li>
								</ul>   

							</div>
							<input type="hidden" id="uploaded_img_name_arr" name="uploaded_img_name_arr" value="" />
							<input type="hidden" id="image_dir_name" name="image_dir_name" value="" />
						</td>
						</tr>	
					</table>	
                </div>
				
				<div class="input">
                	<label>Status</label>
                    <input type="checkbox" name="active" value="Y" checked="checked" />
                </div>
            </form>
            
        </div>
   </div>
   <div class="clr"></div>         
</div>
<script type="text/javascript">

function change_upload_option()
{
	<?
	$gallery_multimedia			= $this->config->item( 'multimedia_type');
	$multimedai_type			= $gallery_multimedia['IMAGE']['id'];
	?>
	if ( $('#multimedia_type').val() == <?=$multimedai_type?>  )
	{
		$('#upload_image_id').css( {'display':''} );
		$('#youtube_link_id').css( {'display':'none'} );
	}
	else
	{
		$('#youtube_link_id').css( {'display':''} );
		$('#upload_image_id').css( {'display':'none'} );
	}
}
function place_category_name_for_dir(){
	var cat_id = $("#category_id").val();
	xajax_get_category_slug(cat_id);
}
</script>
<? $this->load->view('admin/layouts/template_bottom_view'); ?>