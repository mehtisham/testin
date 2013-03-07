<? $this->load->view('admin/layouts/template_top_view');
	//check data of category send from controller to view
	if ( $gallery_multimedia_info	!= ''	&&	$gallery_multimedia_info->num_rows() > 0)
	{
		$gallery_multimedia_info	=		$gallery_multimedia_info->row_array();
	}
?>
<div class="grid">
	<form name ="edit_video" method="post" enctype="multipart/form-data">
		<h1 class="breadcrumb_listing_link">
			<a href="<?=$this->backend_url->list_videos()?>">Videos</a> / Edit Video
		</h1>
		<div class="left g260">
			<div class="metro_col dark">
				<ul class="menu">
					<?
					if ( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'edit', 'return_bolean'=>true) ) )
					{ 
						?>
						<li><a href="#" class="active"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" /> <span>Edit Video Link</span></a></li>
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
				<div class="button">
					<input type="submit" name="submit_btn" id="submit_btn" class="publish" value="Publish" />
					<input type="submit" name="save_as_draft" id="save_as_draft" value="Save as draft" class="draft" />
				</div> 
				<div class="select" style="display:none;">
					<?
					$opt = array(
							'select_name'		=> 'category_id',
							'default'			=> 'Categories Types',
							'data_arr'			=> $categories_of_multimedia,
							'post_select'		=> (isset($_POST['category_id']))?$_POST['category_id']:$gallery_multimedia_info['category_id'],
							);
					print build_dropdown( $opt );
					if(form_error('category_id') != '')
					{
						echo '<span class="form_error">'.form_error('category_id').'</span>';
					}
					?>					
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
						onblur="xajax_generate_slug_n_tags( $('#title').val() )" 
						<?
					}
					?> />
							
					
					<span class="form_error"><?php echo form_error('title'); ?></span>
				</div>
				<div class="input">
					<label>Video Link*</label>
					<input  name="video_link" id="video_link" type="text" class="textfield" value="<?php echo $gallery_multimedia_info['youtube_url']; ?>" />
					<span class="form_error"><?php echo form_error('video_link'); ?></span>
				</div>
				<div class="textarea">
					<label>Description</label>
                                        <textarea rows="5" cols="20" name="description" id="description" class="<?php echo multilingual_css_class();?>"><?php echo $gallery_multimedia_info['description'];?></textarea>
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
                                        <input name="tags" id="tags" class="textfield<?php echo multilingual_css_class(); ?>" type="text" value="<?($tags_arr == '')?print'':print implode(', ',$tags_arr);?>" />
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
					<input name="multimedia_type" id="multimedia_type" type="hidden" value="<?=$multimedia_type['VIDEO_URL']['id']?>" />
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