<? $this->load->view('admin/layouts/epaper_template_top_view'); ?>

<?
$epaper_pages_info_o = $epaper_pages_info->row_array();

//for directory
$directory_date = my_date_format(strtotime($epaper_pages_info_o['epaper_date']),'','directory_formate');
$directory_city = ucfirst(strtolower($epaper_pages_info_o['epaper_city']));

//if(isset($epaper_pages_info_o['internal_map_id_arr']) && $epaper_pages_info_o['internal_map_id_arr'] != '')
//	$detail_pages_linked = unserialize($epaper_pages_info_o['internal_map_id_arr']);

//pr($detail_pages_linked);
//pr($epaper_pages_info_o);


$epaper_detail_pages_r = $epaper_detail_pages->result_array();
//echo count($epaper_detail_pages_r);
//pr($epaper_detail_pages_r);

$epaper_map_internal_ids_r = $epaper_map_internal_ids->result_array();
//pr($epaper_map_internal_ids_r); die();

?>

<script type="text/javascript">

$(document).ready(function()
{	
	
	//hide side panel and change width --  template changes
	$('.main_column').css("margin-right","0px");
	//$('.sidebar').css("display","none");

	window.onbeforeunload = function() { return "Are you sure you want to leave?"; }

	//for light box
	//$(".add_epaper_details").colorbox({iframe:true, innerWidth:600, innerHeight:500});


	/** INIT SECTION **************************************************************/

	//instantiate the imgmap component, setting up some basic config values
	myimgmap = new imgmap({
	mode : "editor",
	custom_callbacks : {
		'onStatusMessage' : function(str) {gui_statusMessage(str);},//to display status messages on gui
		'onHtmlChanged'   : function(str) {gui_htmlChanged(str);},//to display updated html on gui
		'onModeChanged'   : function(mode) {gui_modeChanged(mode);},//to switch normal and preview modes on gui
		'onAddArea'       : function(id)  {gui_addArea(id);},//to add new form element on gui
		'onRemoveArea'    : function(id)  {gui_removeArea(id);},//to remove form elements from gui
		'onAreaChanged'   : function(obj) {gui_areaChanged(obj);},
		'onSelectArea'    : function(obj) {gui_selectArea(obj);}//to select form element when an area is clicked
	},
	pic_container: document.getElementById('pic_container'),
	bounding_box : false
	});

	//array of form elements
	props = [];
	imgroot = '<?=base_url().EPAPER_ROOT_FOLDER.$directory_date.'/'.$directory_city.'/'.EPAPER_IMAGE_UPLOAD_DIR;?>';
	outputmode = 'imgmap';
	gui_outputChanged();

	myimgmap.addEvent(document.getElementById('html_container'), 'blur',  gui_htmlBlur);
	myimgmap.addEvent(document.getElementById('html_container'), 'focus', gui_htmlFocus);

	//$('#color1').colorPicker();
	gui_loadImage( '<?=base_url().EPAPER_ROOT_FOLDER.$directory_date.'/'.$directory_city.'/'.EPAPER_IMAGE_UPLOAD_DIR.$epaper_pages_info_o['epaper_image_path'];?>' );
	gui_outputChanged();
	changelabeling( document.getElementById('label_with_no_or_href') );
});


//load internal idss
$(window).load(function () {

	//add map area when page load
	parent.myimgmap.addNewArea();
	//$('#total_image_map_areas').val(parseInt($('#total_image_map_areas').val())+1);

 	/*here set internal id*/
	<?
	if(COUNT($epaper_map_internal_ids_r) > 0)
	{
		?>
		//add total areas saved from db
		$('#total_image_map_areas').val('<?=$epaper_pages_info_o["total_img_maps"]?>');

		<?
		for($assigning_loop=0; $assigning_loop<COUNT($epaper_map_internal_ids_r); $assigning_loop++)
		{
			?>
			$('#internal_id_'+<?=$assigning_loop;?>).val('<?=$epaper_map_internal_ids_r[$assigning_loop]['id']?>');
			<?
		}
	}
	?>

	check_condition_after_load = true;

});

function epaper_details_add(map_no)
{
	if($('#pagemaparea'+map_no).length > 0)
	{

		var internal_id = $('#internal_id_'+map_no).val();
		if(internal_id == '')
		{
			internal_id = -1;
		}

		$.colorbox({ href: '<?=$this->backend_url->epaper_detail_page($epaper_pages_info_o['epaper_id'], $epaper_pages_info_o['id'])?>'+map_no+'/id/'+internal_id, iframe:true, innerWidth:900, innerHeight:500});
	}
	else
	{
		//alert('please first draw canvas then add detail information.');
		$('#message_box').fadeIn(1000);
		$('#message_container').html('Please first draw canvas for point '+map_no+' then add detail information.');
	}
}


function epaper_map_details()
{
//	$('.img_area').each(function()
//	{
//		alert ( $(this).children('.img_coords').val() );
//	});

//	$('#map_detils').val($('#html_container').val());
//	alert($('#html_container').val());
//return false;
}


//furqan adition
/*here we get id of map area which is going to remove.
 * we first remove detail information related to that
 * map area if exist then remove that point
 */
function remove_detail_info_and_reset_canvas_info(deleted_canvas_id)
{
	//delete only those area that have canvas - else it will decrese "total_image_map_areas" value every time button pressed
	if(($('#img_active_'+deleted_canvas_id).length > 0))
	{
		if($('#internal_id_'+deleted_canvas_id).val() != '')
			$('#total_image_map_areas').val(parseInt($('#total_image_map_areas').val())-1);
		
		var internal_id_val = $('#internal_id_'+deleted_canvas_id).val();
		xajax_ajax_delete_detail_info(deleted_canvas_id, internal_id_val, '<?=$directory_date?>', '<?=$directory_city?>');
		myimgmap.removeArea(myimgmap.currentid);
	}
}

//furqan adition
/*
 * before we add map area to db we get ids of maparea, bcoz we save detail information
 * accoring to these points so we save these values in a array and save them in db
 * then according to these values which are map to there indxes we map them with
 * details store in db
 */
function get_internal_map_id_arr()
{

	//first check that detail information is added against all map areas
	//now add detail info about map areas and total areas
	var internal_map_id_arr_array=new Array();
	var total_index = parseInt($('#total_image_map_areas').val()); //+ parseInt(<?//=$epaper_pages_info_o["total_img_maps"]?>);
	var index = 0;

	//check that no canvas would be there without detail - if exist then delete that
	for( loop=0; loop<= total_index; loop++ )
	{
		if($('#internal_id_'+loop).val() == '')
		{
			//remove map area that is empty
			myimgmap.removeArea(loop);
			
			//$('#message_box').fadeIn(1000);
			//$('#message_container').html('Please add detail information for map canvas '+loop);
			//return false;
		}

	}

	//get all internal id\'s
	for( loop=0; loop<= total_index; loop++ )
	{
		if($('#pagemaparea'+loop).length > 0 && $('#internal_id_'+loop).val() != '')
		{
			internal_map_id_arr_array[index] = $('#internal_id_'+loop).val();
			++index;

		}
	}

	$('#internal_map_id_arr').val(serialize(internal_map_id_arr_array));
	//$('#total_image_map_areas').val(index);
}

//this method is used to check values in array
Array.prototype.in_array = function(p_val) {
	for(var i = 0, l = this.length; i < l; i++) {
		if(this[i] == p_val) {
			return true;
		}
	}
	return false;
}


function set_internal_id(map_no, internal_id_value)
{	
	$('#internal_id_'+map_no).val(internal_id_value);
}

//for showing message on parent screen
function message(message)
{
	xajax_ajax_pass_data_between_map_page_and_detail_page(message);
}


$(document).ready(function()
{
	//this is used for blocker appera on if any link clicked
	$('a').click(function() {
		if ( ! ( $(this).attr("href") == '#' || $("href").attr("javascript:void()") || $("href").attr("javascript:void();") || $(this).hasClass('unblock') ) )
		{
			$.unblockUI()
		}
	});
});

</script>
<div class="grid">
	<form name="img_area_form" id="img_area_form" method="post" onsubmit="return get_internal_map_id_arr();">
	<h1 class="breadcrumb_listing_link">
		<a href="<?=$this->backend_url->list_epapers()?>" class="active">ePaper </a>/
		<a href="<?=$this->backend_url->list_epaper_pages($this->backend_url->GetParam('epaper_id'))?>" class="active">Manage Pages </a> 
		/ Image Map
	</h1>
	<div class="left g260">
       	<div class="metro_col dark">			
        	<ul class="menu">
            	<li><a href="javascript:void(0)" class="active"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add_pages.png" /> <span>Image Map</span></a></li>
				<li><a href="<?=$this->backend_url->list_epaper_pages($this->backend_url->GetParam('epaper_id'))?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/epaper.png" /> <span>View Pages</span></a></li>
            </ul>    
        </div>
		<div class="metro_col light"  style="padding-bottom: 10px;">
			<fieldset>
				<legend style="display: none">
					<a class="unblock" onclick="toggleFieldset(this.parentNode.parentNode)">Image map areas</a>
				</legend>
				<div>
					<div id="button_container" style="margin-top: -25px; margin-left: 12%;">
						<!-- buttons come here -->
						<div style="margin-top: 4px; margin-left: 0px;">								
							<img height="15px" src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" onclick="myimgmap.addNewArea()" alt="Add new area" title="Add new area"/>
							<label onclick="myimgmap.addNewArea()" style="margin-left: 0px; margin-top: 0px; cursor: pointer;" for="">Add Map Area</label>
						</div>
						<br clear="all">
						<div>								
							<img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/del.png" onclick="remove_detail_info_and_reset_canvas_info(myimgmap.currentid)" alt="Delete selected area" title="Delete selected area"/>
							<label onclick="remove_detail_info_and_reset_canvas_info(myimgmap.currentid)" style="margin-left: 0px; margin-top: 0px; cursor: pointer;" for="">Delete Map Area</label>
						</div>
							<!--<img src="<?//=base_url().ADMIN_ASSET_DIR;?>js/epaper_js/images/zoom.gif" id="i_preview" onclick="myimgmap.togglePreview();" alt="Preview image map" title="Preview image map"/>-->
							<!--<img src="<?//=base_url().ADMIN_ASSET_DIR;?>js/epaper_js/images/html.gif" onclick="gui_htmlShow()" alt="Get image map HTML" title="Get image map HTML"/>-->

						<div style="display: none;">
							<label style="margin-left: 600px; margin-top: 0px;" for="dd_zoom">Zoom:</label>
							<select onchange="gui_zoom(this)" id="dd_zoom">
								<option value='0.25'>25%</option>
								<option value='0.5'>50%</option>
								<option value='1' selected="1">100%</option>
								<option value='2'>200%</option>
								<option value='3'>300%</option>
							</select>
						</div>

						<div style="display: none;">
							<label for="dd_output">Output:</label>
							<select id="dd_output" onchange="return gui_outputChanged(this)">
								<option selected="selected" value='imagemap'>Standard imagemap</option>
								<option value='css'>CSS imagemap</option>
								<option value='wiki'>Wiki imagemap</option>
							</select>
						</div>
					</div>

					<div style="float: right; margin: 0 5px; display: none;">
						<select id="label_with_no_or_href" onchange="changelabeling(this)">
						<option value=''>No labeling</option>
						<option value='%n' selected='1'>Label with numbers</option>
						<option value='%a'>Label with alt text</option>
						<option value='%h'>Label with href</option>
						<option value='%c'>Label with coords</option>
						</select>
					</div>
				</div>
				<div id="form_container" style="clear: both; min-height: 150px; overflow: auto; overflow-x:hidden; margin-left: -23px;">
				<!-- form elements come here -->
				</div>
			</fieldset>
			<div class="clr"></div>
			<div class="button">
				<input class="publish_butn" style="width: 100%;" action="" type="submit" id="add_epaper_img_map_button" name="add_epaper_img_map_button" value="Save" />
			</div> 
		</div>
     </div> 
	
	<div class="left g820">
		<div class="metro_col light">
			<div class="body">
					
					<!--furqan adition-->
					<div id="message_box" style="display: none; text-align: center;">
						<!--<legend>
							<a class="unblock" onclick="toggleFieldset(this.parentNode.parentNode)">Message</a>
						</legend>-->
						<span id="message_container"></span>
					</div>

					<fieldset>
						<!--<legend>
							<a class="unblock" onclick="toggleFieldset(this.parentNode.parentNode)">Image</a>
						</legend>-->
						<div id="pic_container">
							<div id="option_bar" nanme="option_bar" style="display:none;" onmouseover="$('#option_bar').show();">
								<!--this first image is of no use-->
								<img src="<?=base_url().ADMIN_ASSET_DIR;?>js/epaper_js/images/add.gif" onclick="myimgmap.addNewArea()" alt="Add new area" title="Add new area"/>
								<img style="cursor: pointer;" id="option_bar_delete_img" width="20px" height="20px" src="<?=base_url().ADMIN_ASSET_DIR;?>js/epaper_js/images/delete.gif" onclick="option_bar_operations('delete')" alt="Delete selected area" title="Delete selected area"/>
								<img style="cursor: pointer;" width="20px" height="20px" src="<?=base_url().ADMIN_ASSET_DIR;?>js/epaper_js/images/add.gif" onclick="option_bar_operations('details')" alt="Add detail information" title="Add detail information"/>
								<input type="hidden" name="focus_canvas_id" id="focus_canvas_id" value="" />
							</div>
						</div>
					</fieldset>

					<fieldset style="display:none;">
						<legend>
							<a class="unblock" onclick="toggleFieldset(this.parentNode.parentNode)">Status</a>
						</legend>
						<div id="status_container"></div>
					</fieldset>

					<fieldset id="fieldset_html" class="fieldset_off" style="display:none;">
						<legend>
							<a class="unblock" onclick="toggleFieldset(this.parentNode.parentNode)">Code</a>
						</legend>
						<div>
						<div id="output_help">
						</div>
						<input name="html_container" id="html_container"></div>
					</fieldset>

					<input type="hidden" name="pid" id="pid" value="<?=$epaper_pages_info_o['id'];?>" />
					<input type="hidden" name="eid" id="eid" value="<?=$epaper_pages_info_o['epaper_id'];?>" />
					<input type="hidden" name="p_num" id="p_num" value="<?=$epaper_pages_info_o['epaper_page_no'];?>" />				
					<input type="hidden" name="e_date" id="e_date" value="<?=my_date_format(strtotime($epaper_pages_info_o['epaper_date']),'N','epaper_url_formate');?>" />
					<input type="hidden" name="city" id="city" value="<?=ucfirst(strtolower($epaper_pages_info_o['epaper_city']));?>" />
					<input type="hidden" id="total_image_map_areas" name="total_image_map_areas" value="" />
					<!--this is just for saving internal map array-->
					<input type="hidden" id="internal_map_id_arr" name="internal_map_id_arr" value="0" />
			</div>
		</div>	
	</div>
	</form>
	<div class="clear"></div>
</div>	
<script>

//furqan adition
//for adding image map from DB
$(document).ready(function()
{
	gui_setMapHTML('<?=$epaper_pages_info_o['epaper_image_map'];?>');
	$('canvas').animate({"top": "+=10px"});
});

//option bar
function option_bar(canvas_id)
{
//	pic_container_position = $('#pic_container'+canvas_id).position();
//	pic_container_top = pic_container_position.top;
//	pic_container_left = pic_container_position.left;

	canvas_position = $('#pagemaparea'+canvas_id).position();
	canvas_top = canvas_position.top;
	canvas_left = canvas_position.left;

	$('#option_bar').css( {
                position: 'absolute',
                zIndex: 999,
                left: canvas_left+10,
                top: canvas_top-20
        } );

		$('#focus_canvas_id').val(canvas_id);

		$('#option_bar').fadeIn('slow');
}

function option_bar_operations(element)
{
	if(element == 'details')
	{
		epaper_details_add($('#focus_canvas_id').val());
	}

	if(element == 'delete')
	{
		$('#option_bar').fadeOut('slow');
		remove_detail_info_and_reset_canvas_info($('#focus_canvas_id').val());

		selected_canvas_id = $('#focus_canvas_id').val();

		if(($('#img_active_'+selected_canvas_id).length > 0))
		{
			if($('#internal_id_'+selected_canvas_id).val() != '')
				$('#total_image_map_areas').val(parseInt($('#total_image_map_areas').val())-1);

			var internal_id_val = $('#internal_id_'+selected_canvas_id).val();
			
			xajax_ajax_delete_detail_info(selected_canvas_id, internal_id_val, '<?=$directory_date?>', '<?=$directory_city?>');
			myimgmap.removeArea(selected_canvas_id);
		}
	}
}

</script>

<? $this->load->view('admin/layouts/epaper_template_bottom_view'); ?>