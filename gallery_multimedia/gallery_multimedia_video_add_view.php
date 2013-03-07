<? $this->load->view('admin/layouts/template_top_view'); ?>
<div class="grid">
	<form name ="add_video" method="post" enctype="multipart/form-data">
		<h1 class="breadcrumb_listing_link">
			<a href="<?=$this->backend_url->list_videos()?>">Videos</a> / Add Video
		</h1>
		<div class="left g260">
			<div class="metro_col dark">
				<ul class="menu">
					<?
					if ( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'videos_add', 'return_bolean'=>true) ) )
					{ 
						?>
						<li><a href="<?=$this->backend_url->add_video()?>" class="active"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" /> <span>Add Video Link</span></a></li>
						<?	
					}
					if ( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'videos_listing', 'return_bolean'=>true) ) == true )
					{
						?>
						<li><a href="<?=$this->backend_url->list_videos()?>" ><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/search_multimedia.png" /><span>List Videos Links</span></a></li>
						<?
					}
					?>
				</ul>    
			</div>
			<div class="metro_col light"  style="padding-bottom: 10px;">
				<div class="select" style="display: none;">
					<?
					$details_of_multimedia_categories_arr = $details_of_multimedia_categories->result_array();
					$gallery_multimedia_selected_category = $this->backend_url->url_segments( URL_SEGMENT_2 );
					foreach($details_of_multimedia_categories_arr AS $key=>$val)
					{
						if($val['slug'] == "video-gallery" && $gallery_multimedia_selected_category == "add_video")
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
					<input type="submit" name="save_as_draft" id="save_as_draft" value="Save as draft" class="draft" />
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
					<input  name="title" id="title" type="text" class="textfield<?php echo multilingual_css_class();?>" value="<?php echo set_value('title'); ?>" onblur="xajax_generate_slug_n_tags( $('#title').val() )" />
					<span class="form_error"><?php echo form_error('title'); ?></span>
				</div>
				<div class="input">
					<label>Video Link*</label>
					<input  name="video_link" id="video_link" type="text" class="textfield" value="" />
					<span class="form_error"><?php echo form_error('video_link'); ?></span>
				</div>
				<div class="textarea">
					<label>Description</label>
                                        <textarea rows="5" cols="20" name="description" id="description" class="<?php echo multilingual_css_class();?>"><?php echo set_value('description');?></textarea>
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
					<input name="multimedia_type" id="multimedia_type" type="hidden" value="<?=$multimedia_type['VIDEO_URL']['id']?>" />
				</div>					
			</div>
		</div>
		<div class="clr"></div>  
	</form>   	
</div>
<? $this->load->view('admin/layouts/template_bottom_view'); ?>