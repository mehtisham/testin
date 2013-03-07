<? $this->load->view('admin/layouts/lightbox_top_view.php'); ?>

<?
if(isset($epaper_detail_info_o) && $epaper_detail_info_o->num_rows() > 0)
{
	$epaper_detail_info_r		= $epaper_detail_info_o->row();
	
	//for directory
	$directory_date = my_date_format(strtotime($epaper_detail_info_r->epaper_date),'','directory_formate');
	$directory_city = ucfirst(strtolower($epaper_detail_info_r->epaper_city));
	//pr($epaper_detail_info_r);
}
?>

<!--for light box-->
<script type="text/javascript">
	$(document).ready(function(){

		$( "#publish_dtid" ).datepicker({ dateFormat: '<?=EPAPER_DATEPICKER_DATE_FORMATE?>' });

		$('.hasDatepicker').change(function() {
		
			$('#category_id').val("Print Categories");
			$('#news').val("All News");
			$('#category_news').fadeOut('slow');
		});

		<?
		if(isset($epaper_detail_info_r->map_news_category_id) && $epaper_detail_info_r->map_news_category_id != '')
		{	
			?>
			xajax_ajax_filter_category_news(<?=$epaper_detail_info_r->publish_dtid;?>,'<?=$epaper_detail_info_r->map_news_category_id;?>', '<?=$epaper_detail_info_r->map_news_id;?>');
			<?
		}
		else if(isset($_POST['publish_dtid']) && $_POST['publish_dtid'] != '' && isset($_POST['category_id']) && $_POST['category_id'] != '' && isset($_POST['news']) && $_POST['news'] != '')
		{
			?>			
			xajax_ajax_filter_category_news('<?=$_POST['publish_dtid']?>','<?=$_POST['category_id']?>', '<?=$_POST['news'];?>');
			<?
		}
		?>
		//show hide according to selected checkboxes
		var fadein_time = 1000;
		var fadeout_time = 1000;
		
		$('#news_img_checkBox').change(function()
		{
			if ($('#news_img_checkBox').attr('checked'))
			{
				$('.news_img_area').fadeIn(fadein_time);

				//uncheck and hide ad
				$('.ad_area').fadeOut(fadeout_time);
				$("#ad_img_checkBox").attr('checked',false)
			}
			else
			{				
				$('.news_img_area').fadeOut(fadeout_time);				
			}
		});

		$('#news_checkBox').change(function()
		{
			if ($('#news_checkBox').attr('checked'))
			{
				$('.news_ares').fadeIn(fadein_time);
                                if($('#category_id').val()=='')
                                {
                                    $('#category_news').css('display' ,'none');//HIDING THE TRASHBIN IF THE CATEGORY IS EMPTY
                                }
                                
				//uncheck and hide ad
				$('.ad_area').fadeOut(fadeout_time);
				$("#ad_img_checkBox").attr('checked',false)
			}
			else
			{
				$('.news_ares').fadeOut(fadeout_time);
			}
		});

		$('#news_text_checkBox').change(function()
		{
			if ($('#news_text_checkBox').attr('checked'))
			{
				$('.news_text_area').fadeIn(fadein_time);

				//uncheck and hide ad
				$('.ad_area').fadeOut(fadeout_time);
				$("#ad_img_checkBox").attr('checked',false)
			}
			else
			{
				$('#news_text').val('');
				$('.news_text_area').fadeOut(fadeout_time);
			}
		});

		$('#news_link_checkBox').change(function()
		{
			if ($('#news_link_checkBox').attr('checked'))
			{
				$('.news_link_area').fadeIn(fadein_time);

				//uncheck and hide ad
				$('.ad_area').fadeOut(fadeout_time);
				$("#ad_img_checkBox").attr('checked',false)
			}
			else
			{
				$('#news_link').val('');
				$('.news_link_area').fadeOut(fadeout_time);
			}
		});

		$('#ad_img_checkBox').change(function()
		{
			if ($('#ad_img_checkBox').attr('checked'))
			{
				$('.ad_area').fadeIn(fadein_time);

				//uncheck all and hide
				$("#news_img_checkBox").attr('checked',false)
				$('.news_img_area').fadeOut(fadeout_time);


				$("#news_checkBox").attr('checked',false)
				$('.news_ares').fadeOut(fadeout_time);
				
				$("#news_text_checkBox").attr('checked',false)
				$('.news_text_area').fadeOut(fadeout_time);
				
				$("#news_link_checkBox").attr('checked',false)
				$('.news_link_area').fadeOut(fadeout_time);
			}
			else
			{
				$('#ad_img').val('');
				$('.ad_area').fadeOut(fadeout_time);
			}
		});


		//------------on page load------------------//
		if ($('#news_img_checkBox').attr('checked'))
		{
			$('.news_img_area').show();
		}
		else
		{			
			$('.news_img_area').hide();
		}

		if ($('#news_checkBox').attr('checked'))
		{
			$('.news_ares').show();
		}
		else
		{
			$('.news_ares').hide();
		}

		if ($('#news_text_checkBox').attr('checked'))
		{
			$('.news_text_area').show();
		}
		else
		{
			$('#news_text').val('');
			$('.news_text_area').hide();
		}

		if ($('#news_link_checkBox').attr('checked'))
		{
			$('.news_link_area').show();
		}
		else
		{
			$('#news_link').val('');
			$('.news_link_area').hide();
		}

		if ($('#ad_img_checkBox').attr('checked'))
		{
			$('.ad_area').show();
		}
		else
		{
			$('#ad_img').val('');
			$('.ad_area').hide();
		}
		//------------------------------------------//
	});

	function filter_category_news()
	{
		$('#category_news').fadeOut('slow')
		xajax_ajax_filter_category_news($('#publish_dtid').val(), $('#category_id').val());
	}

	
	function form_validations()
	{
		if ($('#news_checkBox').attr('checked'))
		{
			if( $("#category_id").val()  == '' )
			{
				alert('Please select category for news');
				return false;
			}

			if( $("#news").val() == '')
			{
				alert('Please select news');
				return false;
			}
		}

		
		if ($('#active').attr('checked'))
		{
			if( $('#news_img_checkBox').attr('checked') || $('#news_checkBox').attr('checked') || $('#news_text_checkBox').attr('checked') || $('#news_link_checkBox').attr('checked') || $('#ad_img_checkBox').attr('checked') )
			{
				
			}
			else
			{
				alert('Please select atleat one option to activate detail information.');
				return false;
			}
		}

	}

	function delete_detail_info_one_by_one(element, value)
	{
		if(element == 'news_detail_img_thumb')
		{
			$('#delete_news_detail_img_thumb').fadeOut('slow');
			$('#news_detail_img_thumb').fadeOut('slow');
		}
		else if(element == 'news')
		{
			$('#category_id').val("Print Categories");
			$('#news').val("All News");
			$('#category_news').fadeOut('slow');
		}
		else if(element == 'news_text')
		{			
			$('#news_text').val('');
		}
		else if(element == 'news_link')
		{			
			$('#news_link').val('');
		}
		else if(element == 'add_img_thumb')
		{
			$('#delete_add_img_thumb').fadeOut('slow');
			$('#add_img_thumb').fadeOut('slow');
		}

		<?
		if(isset($epaper_detail_info_r))
		{
		?>
			xajax_ajax_delete_detail_info_one_by_one('<?=$epaper_detail_info_r->id?>',element, value, '<?=$directory_date;?>', '<?=$directory_city;?>');
		<?
		}
		?>
	}


</script>

<div class="header">
	ePaper detail page
</div>
<div>
	<h2>Add ePaper Detail Information</h2>
</div>
<form name="epaper_detail" id="epaper_detail" method="post" onsubmit="return form_validations();" enctype="multipart/form-data" >
  <table width="100%" border="0" style="margin-top:0px; padding:2px 2px 2px 2px;" cellpadding="0" width="570px">
	  <tr>
		<td class="left_td">
			<input name="news_img_checkBox" id="news_img_checkBox" type="checkbox" value="Y" <?php
				if(isset($epaper_detail_info_r->map_img) && ($epaper_detail_info_r->map_img != ''))
				{
						print 'checked';
				}
				else
				{
					set_value('news_img_checkBox');
					( isset($_POST['news_img_checkBox']) && $_POST['news_img_checkBox']=='Y') ? print 'checked' : '';
				}
				?> />
                        <label>News Image</label>
		</td>	
		<td class="news_img_area">
			<input placeholder="News Image" type="file" name="news_img" id="news_img" tabindex="1" />
		</td>
		<td class="news_img_area" colspan="2">
			<?
			if(isset($epaper_detail_info_r->map_img) && $epaper_detail_info_r->map_img != '')
			{
				?>
				<img class="delete_image" onclick="delete_detail_info_one_by_one('news_detail_img_thumb', '<?=$epaper_detail_info_r->map_img;?>');" title="delete" border="0" id="delete_news_detail_img_thumb" name="delete_news_detail_img_thumb"  src="<?=base_url().ADMIN_ASSET_DIR;?>images/shared/close.png" />
				<img width="150px" height="150px" id="news_detail_img_thumb" name="news_detail_img_thumb" border="0" src="<?=base_url().EPAPER_ROOT_FOLDER.$directory_date.'/'.$directory_city.'/'.EPAPER_DETAIL_NEWS_IMAGES_UPLOAD_DIR.$epaper_detail_info_r->map_img;?>" />
				<?
			}
			
			if(isset($new_img_error) && $new_img_error != '')
			{
				echo $new_img_error;
			}
			?>
		</td>
	  </tr>
	  <tr>
		<td class="left_td">
		  <input name="news_checkBox" id="news_checkBox" type="checkbox" value="Y" <?php
			if(isset($epaper_detail_info_r->map_news_id) && $epaper_detail_info_r->map_news_id != '')
			{
				print 'checked';
			}
			else
			{
				set_value('news_checkBox');
				( isset($_POST['news_checkBox']) && $_POST['news_checkBox']=='Y') ? print 'checked' : '';
			}
			?> />
                  <label>News</label>
		</td>  
		<td  class="news_ares">
			<label for="publish_dtid">Publish date</label>
			<input readonly type="text" id="publish_dtid" name="publish_dtid" value="<?
				if(!(isset($epaper_detail_info_r->map_news_category_id)))
					echo (set_value('publish_dtid') == '' )?(my_date_format(time(),'N','calender')):set_value('publish_dtid');
				?>">
		</td>
		<td  class="news_ares">
			<label for="news_category">Category</label>
			<?

//			$category_id_selected = '';
//			if(isset($epaper_detail_info_r->epaper_page_id) && $epaper_detail_info_r->epaper_page_id != '')
//			{
//				$category_id_selected = ;
//			}

			$opt = array(
						'select_name'		=> 'category_id',
						'default'			=> 'Today\'s Paper',
						'data_arr'			=> $print_news_info_filtered_from_categories,						
						'post_select'		=> (isset($epaper_detail_info_r->map_news_category_id) && $epaper_detail_info_r->map_news_category_id != '')?$epaper_detail_info_r->map_news_category_id:'',
						'post_select'		=> (isset($_POST['category_id']))?$_POST['category_id']:((isset($epaper_detail_info_r->map_news_category_id) && $epaper_detail_info_r->map_news_category_id != '')?$epaper_detail_info_r->map_news_category_id:''),
						'select_css_or_js'	=> 'onChange="filter_category_news()"'
						);

			print build_dropdown( $opt );
			?>
		</td>		
		<td class="news_ares" id="category_news" style="display:none">
			<label for="news">News</label>
			<div id="filtered_print_news" style="display: inline-block"></div>
<!--			<img class="delete_image" onclick="delete_detail_info_one_by_one('news', '');" title="delete" border="0" id="delete_news" name="delete_news"  src="<?=base_url().ADMIN_ASSET_DIR;?>images/shared/close.png" />-->
		</td>		
	  </tr>
	  <tr>
		<td class="left_td">
		  <input name="news_text_checkBox" id="news_text_checkBox" type="checkbox" value="Y" <?php
			if(isset($epaper_detail_info_r->map_text) && $epaper_detail_info_r->map_text != '')
			{
				print 'checked';
			}
			else
			{
				set_value('news_text_checkBox');
				( isset($_POST['news_text_checkBox']) && $_POST['news_text_checkBox']=='Y') ? print 'checked' : '';
			}
			?> />
                  <label>News Text</label>
		</td>  
		<td class="news_text_area" colspan="3" style="vertical-align: middle">
<!--			<label>News Text</label>-->
			<textarea style="width: 91%;" name="news_text" id="news_text" cols="45" rows="5" tabindex="1">
				<?php 
				if(isset($epaper_detail_info_r->map_text) && $epaper_detail_info_r->map_text != '')
				{
					echo trim($epaper_detail_info_r->map_text);
				}
				else
				{
					echo trim(set_value('news_text'));
				}
				?>
			</textarea>
<!--			<img class="delete_image" onclick="delete_detail_info_one_by_one('news_text', '');" title="delete" border="0" id="delete_news_text" name="delete_news_text"  src="<?=base_url().ADMIN_ASSET_DIR;?>images/shared/close.png" />-->
		</td>
	  </tr>
	  <tr>
		<td class="left_td">
		  <input name="news_link_checkBox" id="news_link_checkBox" type="checkbox" value="Y" <?php
			if(isset($epaper_detail_info_r->map_link) && $epaper_detail_info_r->map_link != '')
			{
					print 'checked';
			}
			else
			{
				set_value('news_link_checkBox');
				( isset($_POST['news_link_checkBox']) && $_POST['news_link_checkBox']=='Y') ? print 'checked' : '';
			}
			?> />
                  <label>News Link</label>
		</td>  
		<td  class="news_link_area" colspan="3">
			<?			
			if(isset($epaper_detail_info_r->map_link) && $epaper_detail_info_r->map_link != '')
			{
				$news_link = $epaper_detail_info_r->map_link;
			}
			else
			{
				$news_link = set_value('news_link');
			}
			?>
<!--			<label for="news_link">News Link</label>-->
			<input type="text" name="news_link" id="news_link" tabindex="1" value="<?=trim($news_link)?>" />			
<!--			<img class="delete_image" onclick="delete_detail_info_one_by_one('news_link', '');" title="delete" border="0" id="delete_news_link" name="delete_news_link"  src="<?=base_url().ADMIN_ASSET_DIR;?>images/shared/close.png" />-->
			<p style="font-size: x-small; font-style: italic">please add complete address: http://exapmle.com</p>
		</td>		
	  </tr>
	  <tr>
		<td class="left_td">
		  <input name="ad_img_checkBox" id="ad_img_checkBox" type="checkbox" value="Y" <?php
			if(isset($epaper_detail_info_r->map_ad_img) && $epaper_detail_info_r->map_ad_img != '')
			{
				print 'checked';
			}
			else
			{
				set_value('ad_img_checkBox');
				( isset($_POST['ad_img_checkBox']) && $_POST['ad_img_checkBox']=='Y') ? print 'checked' : '';
			}
			?> />
                  <label>Advertisement Image</label>
		</td>  
		<td  class="ad_area">
<!--			<label for="ad_img">Advertisement Image</label>-->
			<input type="file" name="ad_img" id="ad_img" tabindex="1" />
		</td>
		<td  class="ad_area" colspan="2">
			<?
			if(isset($epaper_detail_info_r->map_ad_img) && $epaper_detail_info_r->map_ad_img != '')
			{
				?>
<!--				<img class="delete_image" onclick="delete_detail_info_one_by_one('add_img_thumb','<?=$epaper_detail_info_r->map_ad_img;?>');" title="delete" border="0" id="delete_add_img_thumb" name="delete_add_img_thumb"  src="<?=base_url().ADMIN_ASSET_DIR;?>images/shared/close.png" />-->
				<img width="150px" height="150px" id="add_img_thumb" name="add_img_thumb" border="0" src="<?=base_url().EPAPER_ROOT_FOLDER.$directory_date.'/'.$directory_city.'/'.EPAPER_DETAIL_ADVERTISMENT_IMAGES_UPLOAD_DIR.$epaper_detail_info_r->map_ad_img;?>" />
				<?
			}
			if(isset($advertisment_img_error) && $advertisment_img_error != '')
			{
				echo $advertisment_img_error;
			}
			?>
		</td>
	  </tr>
          <tr style="display:none">
		<td colspan="4" class="left_td">
			<input type="checkbox" name="active" id="active" value="Y" <?php								
//			if(isset($epaper_detail_info_r->active) && $epaper_detail_info_r->active == 'Y')
//			{
//					print 'checked';
//			}
//			else if(isset($_POST['active']))
//			{
//				set_value('active');
//				( isset($_POST['active']) && $_POST['active']=='Y') ? print 'checked' : '';
//			}
//
//			if( !isset($epaper_detail_info_r->active) )
//			{
//					print 'checked';
//			}
			?> />
			ePaper Detail News Active
		</td>		
	  </tr>
	  <tr>		
		<td colspan="4">
			<div style="margin-left: 45%;">
                <input style="width:20%;" type="submit" name="add_details_butn" id="add_details_butn" value="Save"  class="publish" />
				<input style="display: none" type="reset" name="reset_btn" id="reset_btn" value="Reset"  class="button" />
			</div>
		</td>		
	  </tr>
	</table>
</form>
<? $this->load->view('admin/layouts/lightbox_bottom_view.php'); ?>