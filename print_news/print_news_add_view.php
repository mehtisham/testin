<!--@this page is for print news add - head and bottom called in other file-->


<? $this->load->view('admin/layouts/template_top_view'); ?>

<?=tinymce_editor(); ?>

<script type="text/javascript">

function add_news_js()
{
	if ( $('#category_id').val() == '' )
	{
		jAlert( "please select a category");
		$('#category_id').focus();
		$('html').animate({scrollTop : 0},'slow');
		return false;
	}
	else if ( $('#category_id option:selected').html() == 'Opinion' )
	{
		jAlert( "You canot select 'Opinion' as category");
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

	if ( $('#publish_dtid').val() == '' )
	{
		jAlert( "please select publish date");
		$('#publish_dtid').focus();
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

//	if ( $('#print_page_no').val() == '' )
//	{
//		alert( "please select page number");
//		$('#print_page_no').focus();
//		return false;
//	}

	if ( tinyMCE.get('news_content').getContent() == '' )
//	if ( $('#news_content').val() == '' )
	{
		jAlert( "News content cannot be empty.");
		$('#news_content').focus();
		$('html').animate({scrollTop : 0},'slow');
		return false;
	}

	cat_id				= $('#category_id').val();
	author_id			= $('#author_id').val();
	news_type_id		= $('#news_type_id').val();
	news_title			= $('#title').val();
	publish_dtid		= $('#publish_dtid').val();
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
	has_comments		= $('#has_comments').val();
	status_id			= $('#status_id').val();
	news_images			= $('#news_images').val();
	print_page_no		= $('#print_page_no').val();

	$.blockUI({ message: '<h1>Please wait while we add the news ...</h1>' });

	xajax_add_print_news( cat_id, author_id, news_type_id, news_title, publish_dtid, slug, caption_heading, tags_arr, news_content, youtube_link, meta_tags_keywords, meta_tags_description, source_name, source_url, has_comments, status_id, news_images, print_page_no );
}

$(function() {
	$('#file_upload').uploadify({
		'uploader'       : '<?=$this->backend_url->build_relative_base().ADMIN_ASSET_DIR?>js/uploadify/uploadify.swf',
		'script'         : '<?=$this->backend_url->print_images_upload();?>',
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

$(document).ready(function()
{
	$('#is_breaking_check_box').hide();

	xajax_load_temp_gallery(new Array());
	xajax_ajax_filter_authors($('#author_type_id').val());

	$('#news_images').val('');

	$( "#publish_dtid" ).datepicker({ dateFormat: 'd MM yy' });
	
	//hide side panel and change width
	$('.main_column').css("margin-right","0px");

});
</script>

<style type="text/css">
/*	#gallery { float: left; min-height: 12em; } * html #gallery { height: 12em; }  IE6 */
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
        .ui-resizable{position:absolute; top: 5px !important;}
</style>


<div class="grid">
	<?
	$page_name = $this->backend_url->url_segments( URL_SEGMENT_2 );
	if($page_name == "opinion_add")
	{
		?>
		<h1 class="breadcrumb_listing_link"><a href="<?=$this->backend_url->list_print_news()?>">Opinions</a> / Add</h1>
		<?
	}
	else
	{
		?>
		<h1 class="breadcrumb_listing_link"><a href="<?=$this->backend_url->list_print_news()?>">Print News</a> / Add</h1>
		<?
	}
	?>	
	<form name="add_print_news_frm" id="add_print_news_frm" method="post">
		<div class="left g260">
			<div class="metro_col dark metro_col_equal_space">
				<div class="input">
				   <input type="text" id="publish_dtid" name="publish_dtid" value="<?=(set_value('publish_dtid') == '' )?date('j F Y'):''; ?>"  style="width:93%;">
				   <div class="clr"></div>
				</div>
				<div class="input">
					<?
					$opt = array(
								'select_name'		=> 'print_page_no',
								'default'			=> 'Print Page No',
								'data_arr'			=> $this->config->item('print_page_no'),
								'post_select'		=> (isset($_POST['print_page_no']))?$_POST['print_page_no']:'',
								'multi_dimentional' => true
								);

					print build_dropdown( $opt );
					?>
					<div class="clr"></div>
				</div>
				<div class="select <?php echo multilingual_css_class();?>">
						<?
						if($page_name == "opinion_add")
						{
							?>
							<select name="category_id" id="category_id">
								<?
								$all_categories				= unserialize($this->project_categories_info);
								
								$opinions_child_categories	= $all_categories[FRONTEND_OPINIONS_SLUG];
								
								//pr($opinions_child_categories); die();
								if(is_array($opinions_child_categories))
								{
									foreach($opinions_child_categories AS $key=>$val)
									 {
										if( isset($val['name']) )
										{
											?> 
											<option value=""><?=$val['name']?></option>
											<?
											if( isset($opinions_child_categories['child_array']) && count($opinions_child_categories['child_array'])>0 )
											{                                        
												$childs_arr = $opinions_child_categories['child_array'];
												foreach( $childs_arr AS $child_key=>$child_val )
												{
													if(acl_premissions( array('module'=>'PRINT_CATEGORY', 'section'=>$child_val['info']['id'], 'return_bolean'=>true) )==true)
													{
														?>
														 <option value="<?=(isset($child_val['info']['id']))?$child_val['info']['id']:'';?>"><?=$child_val['info']['name']?></option>
														<?
													}
												}											
											}
										}
									}
								}
							?>
							</select>					 
							<?
							
						}
						else
						{
//							$opt = array(
//										'select_name'		=> 'category_id',
//										'default'			=> 'Select Print Categories',
//										'data_arr'			=> $print_news_info_filtered_from_categories,
//										'post_select'		=> (isset($_POST['category_id']))?$_POST['category_id']:'',
//										'select_css_or_js'	=> 'onChange="change_upload_option()"'
//										);
//
//							print build_dropdown( $opt );
							?>
							<select name="category_id" onchange="change_upload_option();" id="category_id" >
									<option value="">Select Print Categories</option>
								<?php
		//						echo acl_premissions( array('module'=>'DIGITAL_CATEGORY', 'section'=>$key,'return_boolean' => true));exit;
								foreach($print_news_info_filtered_from_categories as $key => $val){ 
									if(acl_premissions( array('module'=>'PRINT_CATEGORY', 'section'=>$key, 'return_bolean'=>true) )==true)
									{
										echo "<option value='".$key."'>".$val."</option>";
									}
								} ?>
							</select>
					<?
						}
						?>
						<?php echo form_error('category_id'); ?>  
					<div class="clr"></div>
				</div>
				<div class="select">
					<?
					$opt = array(
								'select_name'		=> 'news_type_id',
								'default'			=> 'Select Print News Types',
								'data_arr'			=> $this->config->item('print_news_type'),
								'post_select'		=> (isset($_POST['news_type_id']))?$_POST['news_type_id']:'',
								'multi_dimentional' => true

								);

					print build_dropdown( $opt );
					?><?php echo form_error('news_type_id'); ?>	  		
					<div class="clr"></div>
				</div>
				<div class="select<?php echo multilingual_css_class();?>">					
						<?
						$opt = array(
									'select_name'		=> 'author_type_id',
									'default'			=> 'Source Type',
									'data_arr'			=> $this->config->item('author_type'),
									'post_select'		=> (isset($author_info_r))?$author_info_r->author_type_id:'',
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

			<!-- ======== Light BOX ========= -->
			<div class="metro_col light" style="padding-bottom: 10px;">
				<div class="button">
					<input class="publish" type="button" name="submit_btn" id="submit_btn" value="Save as Draft" onclick="add_news_js()" />
				</div>
				
			</div>
		</div>    
		<!-- ========== LEFT PANEL ============================== -->
		<!-- ========== CENTER PANEL ============================== -->
		<div class="right content_grid scrolldiv">
			<div class="metro_col light">
				<div id="msgz">
					<?=print_msg();?>
				</div>
				<div class="input title">
					<label for="title">Title*</label>
                                        <input class="<?php echo multilingual_css_class();?>" name="title" id="title" type="text" value="<?php echo set_value('title'); ?>" onblur="xajax_generate_slug_n_tags( $('#title').val() )" /><?php echo form_error('title'); ?>
					<div class="clr"></div>
				</div>
				<div class="input left" style="min-width:44%; margin-right:10%;">
					<label for="caption_heading">News Header</label>
                                        <input type="text"  name="caption_heading" id="caption_heading" value="<?php echo set_value('caption_heading'); ?>"  class="darker<?php echo multilingual_css_class();?>" />		
					<div class="clr"></div>
				</div>
				<div class="input left" style="min-width:44%;">
					<label for="tags_arr">Tags</label><input name="tags_arr" id="tags_arr" type="text" value="<?php echo set_value('tags_arr'); ?>"  class="darker<?php echo multilingual_css_class();?>" />	
					<div class="clr"></div>
				</div>
				<div class="clr"></div>

				<div class="textarea" id="editor_div" style="display: none;">
				   <label for="content">Content*</label><div ><textarea rows="20" name="news_content" id="news_content" style="width:98%; height: 325px;" class="mceEditor" ><?php echo set_value('content'); ?></textarea><?php echo form_error('content'); ?>	</div>
				   <div class="clr"></div>
				</div>
				<div id="editor_pre_loader" name="editor_pre_loader" style="position: relative; text-align: center;">
					<img src="<?=base_url().ADMIN_ASSET_DIR;?>images/ajax-loader.gif" />
				</div> 
				
				<div class="clr"></div>
				<div class="metro_col light news_image_uploader">
					<div class="image_add">
						<label>News Images</label>
						<div class="images_display">
							<div class="img_holder">
								<div id="trash"  class="imgbox">
									<p style="font-size: x-small; font-style: oblique; z-index: 0; text-align: center;">Drag news images here</p>
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
					<input type="button" class="advanced_features_button" value="Advance Features" onclick="advance_features_toggle();" /><br />
					<div class="advance_feature_class">
						
						<div class="input">
							<label for="youtube_link">YouTube Link</label><input name="youtube_link" id="youtube_link" type="text" value="<?php echo set_value('youtube_link'); ?>" /><?php echo form_error('youtube_link'); ?>
							<div class="clr"></div>
						 </div>
						
						<div class="textarea">
							<label for="meta_tags_keywords">Meta Tags Keywords</label><textarea  rows="3" cols="15" name="meta_tags_keywords" id="meta_tags_keywords" type="text"><?php echo set_value('meta_tags_keywords');?></textarea>
							<div class="clr"></div>
						</div>
						<div class="textarea">
							<label for="meta_tags_decsription">Meta Tags Description</label><textarea  rows="3" cols="15" name="meta_tags_description" id="meta_tags_description" type="text"><?php echo set_value('meta_tags_description'); ?></textarea>
							<div class="clr"></div>
						</div>
						<div class="input">
							<label for="slug">Slug</label><input name="slug" id="slug" type="text" value="<?php echo set_value('slug'); ?>" /><?php echo form_error('slug'); ?>
							<div class="clr"></div>
						</div>
						<div class="checkbox">
							<input name="has_comments" id="has_comments" value="Y" checked="checked" type="checkbox"
							   <?php set_value('has_comments');
								( isset($_POST['has_comments']) && $_POST['has_comments']=='Y') ? print 'checked' : '';?> />
								Show Comments
							<div class="clr"></div>
						</div>
					</div><!-- end grid -->
				</div>
			</div>
		 </div>       
		<div class="clr"></div>
		<div class="news_form">
			<div class="clr"></div>        
			<div class="news_story"></div>
		</div>
	</form>
</div>

<!--hidden temporary-->
<div class="status" style="display:none;">
<label for="status_id">Status:</label><?
							$selected_status = $this->config->item('status');

							$selected_status = $selected_status['UNPUBLISH']['id'];

							$opt = array(
										'select_name'		=> 'status_id',
										'data_arr'			=> $this->config->item('status'),
										'post_select'		=> (isset($_POST['status_id']))?$_POST['status_id']:$selected_status,
										'multi_dimentional' => true
										);

							print build_dropdown( $opt );
							?><?php echo form_error('status_id'); ?>
		 <div class="clr"></div>
  </div> 
<!--end hidden temporary-->


<script type="text/javascript">
function change_upload_option()
{
	<?
	$config_print_news_type					= $this->config->item( 'print_news_type');
	$config_print_news_type_name			= $config_print_news_type['PRINT_NEWS_TYPE_1']['name'];
	?>

	if ( ( $('#category_id option:selected').html() == '&nbsp;&nbsp;Columns')		||
			( $('#category_id option:selected').html() == '&nbsp;&nbsp;Editorials')	||
			( $('#category_id option:selected').html() == '&nbsp;&nbsp;Letters') )
	{		
		$("#news_type_id option").each(function(){
			if( $(this).text() == "<?=$config_print_news_type_name;?>" )
			{
				$(this).attr('selected','selected');
			}
		});
		$('#news_type_div').css( {'display':'none'} );
	}
	else
	{
		$('#news_type_div').fadeIn('slow');
	}
}
</script>
<? //$this->load->view('admin/layouts/template_bottom_view'); ?>


<? $this->load->view('admin/layouts/template_bottom_view'); ?>