<!--@this page is for digital news editing - head and bottom called in other file-->

<? $this->load->view('admin/layouts/template_top_view'); ?>

<?=tinymce_editor();?>

<?
if ( $digital_news_info != '' && $digital_news_info->num_rows() > 0)
{
	$digital_news_info = $digital_news_info->row_array();
	//pr($digital_news_info); die();
}
?>

<script type="text/javascript">

function update_digital_news_js()
{
	if ( $('#category_id').val() == '' )
	{
		jAlert( "Please select a category");
		$('#category_id').focus();
		$('html').animate({scrollTop : 0},'slow');
		return false;
	}
	else if ( $('#category_id option:selected').html() == 'Regional' )
	{
		jAlert( "You canot select 'Regional' as category");
		$('#category_id').focus();
		$('html').animate({scrollTop : 0},'slow');
		return false;
	}

	if ( $('#news_type_id').val() == '' )
	{
		jAlert( "please select a news type");
		$('#news_type_id').focus();
		$('html').animate({scrollTop : 0},'slow');
		return false;
	}

	if ( $('#title').val() == '' )
	{
		jAlert( "please select a news title");
		$('#title').focus();
		$('html').animate({scrollTop : 0},'slow');
		return false;
	}

	if ( $('#slug').val() == '' )
	{
		jAlert( "News slug cannot be empty.");
		$('#slug').focus();
		return false;
	}

	//	if ( $('#news_content').val() == '' )
	if ( tinyMCE.get('news_content').getContent() == '' )
	{
		jAlert( "News content cannot be empty.");
		$('#news_content').focus();
		$('html').animate({scrollTop : 0},'slow');
		return false;
	}

	cat_id				= $('#category_id').val();
	author_id			= $('#author_id').val();
	news_type_id		= $('#news_type_id').val();
	if ($('#is_braeking').attr('checked'))
		is_braeking			= 'Y';
	else
		is_braeking			= 'N';
	news_title			= $('#title').val();
	slug				= $('#slug').val();
	caption_heading		= $('#caption_heading').val();
	tags_arr			= $('#tags_arr').val();
//	news_content		= $('#news_content').val();
	news_content		= tinyMCE.get('news_content').getContent();
	youtube_link		= $('#youtube_link').val();
	meta_tags_keywords	= $('#meta_tags_keywords').val();
	meta_tags_description = $('#meta_tags_description').val();
	source_name			= $('#source_name').val();
	source_url			= $('#source_url').val();
	sort_order			= $('#sort_order').val();
	has_comments		= $('#has_comments').val();
	status_id			= $('#status_id').val();
	news_images			= $('#news_images').val();

	//$.blockUI({ message: '<h1>Please wait while we update the news ...</h1>' });
}

function remove_news_images_js(obj, news_id, img_name)
{
	
	jConfirm('Can you confirm this?', 'Delete image', function(responce) 
	{
		if(responce){ 
			$.blockUI();

		$(obj).parent().remove();

		imgs_arr = $('#news_images').val();

		xajax_remove_news_images( news_id, img_name, imgs_arr );
		}
		else{
			return false;
		}
	});
}

$(function() {
	$('#file_upload').uploadify({
		'uploader'       : '<?=$this->backend_url->build_relative_base().ADMIN_ASSET_DIR?>js/uploadify/uploadify.swf',
		'script'         : '<?=$this->backend_url->digital_images_upload();?>',
		'cancelImg'      : '<?=$this->backend_url->build_relative_base().ADMIN_ASSET_DIR?>js/uploadify/cancel.png',
		'multi'          : true,
		'auto'           : true,
		'fileExt'        : '*.jpg;*.gif;*.png',
		'fileDesc'       : 'Image Files (.JPG, .GIF, .PNG)',
		'queueID'        : 'custom-queue',
		//'queueSizeLimit' : 3,
		//'simUploadLimit' : 3,
		'buttonText'	 : 'Browse',
		'removeCompleted': true,
		'onSelectOnce'   : function(event,data) {
				$('#status-message').text(data.filesSelected + ' files have been added to the queue.');
		},
		'onAllComplete'  : function(event,data) {
			// alert('all complete');
			imgO = document.getElementById("trash").getElementsByTagName('img');
                        var str=new Array();
                        for(i=0; i < imgO.length; i++){
                         str [i]= imgO[i].src;
                        }

                        xajax_load_temp_gallery(str);
			$('#status-message').text(data.filesUploaded + ' files uploaded, ' + data.errors + ' errors.');
		}
	});
});


function show_breaking_news_check_box()
{
	if($('#news_type_id').val() == '')
		{
			$('#is_breaking_check_box').fadeOut('slow');
			$("#is_braeking").attr('checked',false)
		}
	else
		$('#is_breaking_check_box').fadeIn('slow');
}

$(document).ready(function()
{

	xajax_load_temp_gallery(new Array());
	xajax_ajax_filter_authors('<?=$digital_news_info['author_type_id']?>', '<?=$digital_news_info['author_id']?>');

	$('#news_images').val( '<?=$digital_news_info['gallery_images_arr']?>' );

	//hide side panel and change width
	$('.main_column').css("margin-right","0px");
});

window.onload = function() {
	$("#editor_div").css({'display':'block'});
	$('#editor_pre_loader').hide();
};

function filter_source()
{
	xajax_ajax_filter_authors($('#author_type_id').val());
}


$(document).ready(function()
{
	$(".advance_feature_class").hide();

	//this is used for blocker appera on if any link clicked
	$('a').click(function() {
		if ( ! ( $(this).attr("href") == '#' || $("href").attr("javascript:void()") || $("href").attr("javascript:void();") || $(this).hasClass('unblock') ) )
		{
			$.unblockUI()
		}
	});
});

	function advance_features_toggle()
	{
		$(".advance_feature_class").toggle("slow");
	}

	function news_status(news_status_id)
	{
		$('#status_id').val(news_status_id);
		update_digital_news_js();
	}

</script>

<style type="text/css">
	#gallery { float: left; } * html #gallery { height: 12em; } /* IE6 */
	#gallery li { display: inline  } /* IE6 */

	.gallery.custom-state-active { background: #eee; }
	.gallery li { float: left; width: 88px; padding: 0.4em; margin: 0 0.4em 0.4em 0; text-align: center; }
	.gallery li h5 { margin: 0 0 0.4em; cursor: move; }
	.gallery li a { float: right; }
	.gallery li a.ui-icon-zoomin { float: left; }
	.gallery li img { width: 100%; cursor: move; }

	#trash { } * html #trash { } /* IE6 */
	#trash h4 { line-height: 16px; margin: 0 0 0.4em; }
	#trash h4 .ui-icon { float: left; }
	#trash .gallery h5 { display: none; }

	.ui-icon-trash { background-position: -16px -128px; }
	.ui-icon-refresh { background-position: -176px -96px; }
        .ui-icon-refresh2 { background-position: -176px -96px; }
        .ui-resizable{position:absolute; top: 5px !important;}
</style>

<div class="grid">
	<h1 class="breadcrumb_listing_link"><a href="<?=$this->backend_url->list_digital_news()?>">Digital News</a> / Edit</h1>
    <form name="add_digital_news_frm" id="add_digital_news_frm" method="post" onsubmit="return update_digital_news_js()" >
		 <div class="left g260">
			<div class="metro_col dark metro_col_equal_space">
				<div class="select<?php echo multilingual_css_class();?>">
					<?
					$opt = array(
								'select_name'		=> 'category_id',
								'default'			=> 'Select Digital Categories',
								'data_arr'			=> $digital_news_info_filtered_from_categories,
								'post_select'		=> (isset($_POST['category_id']))?$_POST['category_id']:$digital_news_info['category_id'],
								);

					print build_dropdown( $opt );
					?>
					<?php echo form_error('category_id'); ?>
					<div class="clr"></div>
				</div>
				<div class="select">
					<?
					$opt = array(
								'select_name'		=> 'news_type_id',
								'default'			=> 'Select Digital News Types',
								'data_arr'			=> $this->config->item('digital_news_type'),
								'post_select'		=> (isset($_POST['news_type_id']))?$_POST['news_type_id']:$digital_news_info['news_type_id'],
								'multi_dimentional' => true,
								'select_css_or_js'	=> 'OnChange="show_breaking_news_check_box()"'
								);

					print build_dropdown( $opt );
					?>
				</div>
				<?php echo form_error('news_type_id'); ?>
				
				<div name="is_breaking_check_box" id="is_breaking_check_box" class="checkbox">
					<input name="is_braeking" id="is_braeking" value="Y" type="checkbox"<?=(isset($_POST['is_braeking']) && $_POST['is_braeking'] = 'Y')?'checked':(($digital_news_info['is_breaking']) == 'Y')?'checked':''?>/>
					<span>Breaking</span>
				</div><?php echo form_error('news_type_id'); ?>  		
				
				
				<div class="select<?php echo multilingual_css_class();?>">					
					<?
					$opt = array(
								'select_name'		=> 'author_type_id',
								'default'			=> 'Source Type',
								'data_arr'			=> $this->config->item('author_type'),
								'post_select'		=> (isset($digital_news_info['author_type_id']))?$digital_news_info['author_type_id']:'',
								'multi_dimentional' => true,
								'select_css_or_js'  => "OnChange='filter_source();'",
								);

					print build_dropdown( $opt );
					?>
				</div>
				<div class="select">
					<div id="source_name" name="source_name"></div>
				</div>
					<?php echo form_error('author_id'); ?>	
			</div>
			<!-- end dark -->
			<div class="metro_col light"  style="padding-bottom: 10px;">
				<?
				$status_arr = $this->config->item('status');
				//pr($status_arr);
				?>
				<div class="button" style="padding-bottom: 5px;">
					<input class="publish" type="submit" name="edit_digital_news_btn" id="edit_digital_news_btn" value="Publish" onClick="news_status('<?=$status_arr['PUBLISH']['id']?>')" />
					<input class="draft" type="submit" name="edit_digital_news_btn" id="unpublish_digital_news" value="Save as Draft" onClick="news_status('<?=$status_arr['UNPUBLISH']['id']?>')" />
				</div>
				<div>
					<input type="hidden" name="status_id" id="status_id" value="" />
				</div> 
			</div>
			<!-- end light -->
		</div>
		<!-- End LEFT GRID -->
		<div class="right content_grid scrolldiv">
			<div class="metro_col light">
				<div id="msgz">
					<?=print_msg();?>
				</div>
				<div class="input title">
					<?
					//slug cant be change on edit screen
					$digital_news_status = $this->config->item( 'status');
					?>
					<label for="title">Title*</label>
                                        <input class="<?php echo multilingual_css_class();?>" name="title" id="title"  type="text" value="<?php echo $digital_news_info['title']; ?>" onblur="<?=((acl_premissions( array('module'=>'EDIT_SLUG', 'section'=>'edit_slug', 'return_bolean'=>TRUE) )))?'xajax_generate_slug_n_tags( $(\'#title\').val() )':'';?>" /><?php echo form_error('title'); ?>
					<?php echo form_error('title'); ?>
					<div class="clr"></div>
				</div>
			   <div class="input left" style="min-width:44%; margin-right:10%;">
					<label for="caption_heading">News Header</label>
					<input type="text" name="caption_heading" id="caption_heading" value="<?php echo $digital_news_info['caption_heading']; ?>" class="darker<?php echo multilingual_css_class();?>"/>
				</div>
				<div class="input left" style="min-width:44%;">
					<label for="tags_arr">Tags</label>
					<input name="tags_arr" id="tags_arr" type="text" value="<?php echo (isset($digital_news_info['tags_arr']) && $digital_news_info['tags_arr'] != '')? implode(', ', unserialize($digital_news_info['tags_arr'])):''; ?>" class="darker<?php echo multilingual_css_class();?>" />
				</div>
				<div class="clr"></div>
				<div class="textarea" id="editor_div" style="display: none;">
					<label for="content">Content*</label>
					<div><textarea rows="20" name="news_content" id="news_content" style="width:98%; height: 325px;" class="mceEditor" ><?php echo $digital_news_info['content']; ?></textarea>
						<?php echo form_error('content'); ?>
					</div>
					 <div class="clr"></div>
				</div>
				<div id="editor_pre_loader" name="editor_pre_loader" style="position: relative; text-align: center;">
					<img src="<?=base_url().ADMIN_ASSET_DIR;?>images/ajax-loader.gif" />
				</div>	
				
				<div class="clr"></div>
				<div class="metro_col light news_image_uploader">
					<div class="image_add">
                                            <label>News Images</label>
                                            <div class="clear"></div>
						<div class="images_display">
							
							<div class="img_holder">
								<div id="trash" class="imgbox">
									<p style="font-size: x-small; font-style: oblique; z-index: 0; text-align: center;">Drag news images here</p>
									<ul class="gallery ui-helper-reset">
										<?
										$digital_news_images_arr = unserialize($digital_news_info['gallery_images_arr']);
										if ( $digital_news_images_arr )
										{
											foreach( $digital_news_images_arr as $imgs_key=>$imgs_val )
											{
											?>      
												<li class="ui-widget-content ui-corner-tr ui-draggable" style="display: block; width: 48px;">
													<img width="96" height="72" alt="" src="<?=base_url().DIGITAL_NEWS_IMAGE_UPLOAD_DIR.$imgs_val['image_name'];?>" style="display: inline-block; height: 36px;">
													<a class="ui-icon ui-icon-zoomin unblock" title="View larger image" href="../../<?=DIGITAL_NEWS_IMAGE_UPLOAD_DIR.$imgs_val['image_name'];?>">View larger</a>
													<a class="ui-icon ui-icon-refresh2 unblock" onclick="remove_news_images_js(this, '<?=$digital_news_info['id'];?>', '<?=$imgs_val['image_name'];?>');" title="Recycle this image" href="#">Recycle image</a>
												</li>
											<?
											}
										}
										?>
									</ul>
									<input name="news_images" id="news_images" type="hidden" value="" />
								</div>
								<p style="font-size: x-small">First image is primary image*</p>
							</div>
							<div class="clr"></div>
						</div><!-- end imag display -->
						<div class="image_uploader">
							<div id="temp_image_gallery">
								<div class="button" style="background-color:#2F2F2F; padding:3px 23% 0px 2px; text-align: center;">
									<input id="file_upload" name="file_upload" type="file" />
                                                                        <input type="button" onClick="xajax_empty_temp_dir();"  value="Delete All"  class="delete_all_images">
								</div>
								<div id="status-message"></div>
                                                                <br /><br />
								<div id="custom-queue" class="uploadifyQueue"></div>
								<div class="demo ui-widget ui-helper-clearfix" style="padding-left: 30px;">
									<ul id="gallery" class="gallery ui-helper-reset ui-helper-clearfix">
										<!-- ajax call -->
									</ul>
                                                                
								</div>
                                                                <div class="clr"></div>
							</div>
						</div>
						<div class="clr"></div>
					 </div>
				</div>
				<div class="clr"></div>
				
			   <div class="advanced_stuff">
                                        <input type="button" class="advanced_features_button" value="Advance Features" onclick="advance_features_toggle();">
					<br />
					<div class="advance_feature_class">
						
						<div class="input">
							<label for="youtube_link">YouTube Link</label><input name="youtube_link" id="youtube_link" type="text" value="<?php echo $digital_news_info['youtube_link']; ?>" /><?php echo form_error('youtube_link'); ?>
							<div class="clr"></div>
						 </div>
						
						<div class="textarea">
							<label for="meta_tags_keywords">Meta Tags Keywords</label>
							<textarea  rows="3" cols="15" name="meta_tags_keywords" id="meta_tags_keywords" type="text"><?php echo $digital_news_info['meta_tags_keywords'];?></textarea>
							<div class="clr"></div>
						</div>

						<div class="textarea">
							<label for="meta_tags_decsription">Meta Tags Description</label>
							<textarea  rows="3" cols="15" name="meta_tags_description" id="meta_tags_description" type="text"><?php echo $digital_news_info['meta_tags_desc']; ?></textarea>
							<div class="clr"></div>
						</div>

						<div style="display:none;">
							<label for="source_name">Secondary Source</label>
							<input type="text" name="source_name" id="source_name" value="<?php echo set_value('source_name'); ?>" /><label for="source_url">Secondary Source URL:</label><input type="text" name="source_url" id="source_url" value="<?php echo set_value('source_url'); ?>" />
						 </div>

						 <div class="clr"></div>
						 <div class="input" style="display: none;">
							<label for="sort_order">Sort Order:</label>
							<input type="text" id="sort_order" name="sort_order" value="<?php echo $digital_news_info['sort_order']; ?>" />
							<?	echo form_error('sort_order');	?>
							<div class="clr"></div>
						 </div>
						 
						<?						
						if(acl_premissions( array('module'=>'EDIT_SLUG', 'section'=>'edit_slug', 'return_bolean'=>TRUE) ))
						{
							?>
							<div class="input">
								<label for="slug">Slug:</label><input name="slug" id="slug" type="text" value="<?php echo $digital_news_info['slug']; ?>" /><?php echo form_error('slug'); ?>
								<div class="clr"></div>
							</div>
							<?
						}
						else
						{
							?>						
							<div class="input">
								<label for="slug">Slug:</label><input readonly="readonly" name="slug" id="slug" type="text" value="<?php echo $digital_news_info['slug']; ?>" /><?php echo form_error('slug'); ?>
								<div class="clr"></div>
							</div>
							<?
						}
						?>
						<div class="checkbox">
							<input name="has_comments" id="has_comments" value="Y" checked="checked" type="checkbox"
							<?php set_value('has_comments');
							( isset($_POST['has_comments']) && $_POST['has_comments']=='Y') ? print 'checked' : '';?> />
							<span>Show Comments</span>
							<div class="clr"></div>
						</div> 
					  <!-- end -->
					</div>
				</div>
			</div>
                    <div class="metro_col light revision_history">
                        <h2>Revision History</h2>
                        <hr>
                        <table cellspacing="0" cellpadding="0" border="0" class="list_tbl">
                                <thead>
                                        <tr>
                                                <th style="width:15%; text-align:left;">Revised By</th>
                                                <th width="40%" style="text-align:left;">Revised At</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <?php 
                                        if(isset($revision_array))
                                        {
                                            foreach($revision_array as $arr_values){ ?>
                                            <tr>
                                                    <td style="width:15%; text-align:left;"><?php echo $arr_values['user_name']; ?></td>
                                                    <td width="40%" style="text-align:left;"><?php echo $arr_values['dtid']; ?></td>
                                            </tr>
                                            <?php 
                                            }                                        
                                        }else{ ?>
                                        <tr>
                                            <td colspan="2" style="text-align:center;">No revisions found.</td>
                                        </tr>
                                        <?php } ?>
                                </tbody>
                        </table>
                        <?php //print_r($print_news_info['admins_id_arr']); ?>
                    </div>
        <!-- end center div -->
       
        <!-- end right -->
		<div class="clr"></div>     
		<div class="news_form">
			<div class="clr"></div>        
			<div class="news_story"></div>
		</div>
	</form>
</div>
<? $this->load->view('admin/layouts/template_bottom_view'); ?>