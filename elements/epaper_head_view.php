<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex,nofollow" />

<!--=========Title=========-->
<title>Administration Panel | ePaper Image Map</title>

<?
$css_arr = array(
				base_url().ADMIN_ASSET_DIR . "evolution_theme/simple/css/epaper_style.css",
				base_url().ADMIN_ASSET_DIR . "evolution_theme/simple/css/invalid.css",
				//base_url().ADMIN_ASSET_DIR . "evolution_theme/simple/css/evolution_color_styles.css",
				// End Theme Files (Zeeshan Hasan)
				
				base_url().ADMIN_ASSET_DIR . "js/jquery/colorbox/css/colorbox.css",			// used from lightbox
				base_url().ADMIN_ASSET_DIR . "js/jquery/jqueryui/css/ui-darkness/css/jquery-ui-1.8.7.custom.css",		// used from jquery ui lib
				base_url().ADMIN_ASSET_DIR . "js/epaper_js/css/imgmap.css",					// used from epaper script
				base_url().ADMIN_ASSET_DIR . "js/uploadify/uploadify.css",					// used from uploadify script
				);


$js_arr = array( 
				base_url().ADMIN_ASSET_DIR . "js/jquery/jquery-1.4.4.min.js",					// jquery main file loaded from file or jquery server
				base_url().ADMIN_ASSET_DIR . "js/jquery/colorbox/jquery.colorbox-min.js",		// used from lightbox
				base_url().ADMIN_ASSET_DIR . "js/jquery/jqueryui/js/jquery-ui-1.8.7.custom.min.js",	// used from jquery ui lib
				base_url().ADMIN_ASSET_DIR . "js/epaper_js/js/imgmap.js",						// used from epaper script
				//base_url().ADMIN_ASSET_DIR . "js/epaper_js/js/excanvas.js",					// used from epaper script
				base_url().ADMIN_ASSET_DIR . "js/epaper_js/js/default_interface.js",			// used from epaper script
				base_url().ADMIN_ASSET_DIR . "js/phpjs.js",									// common php javascripts functions
				base_url().ADMIN_ASSET_DIR . "js/jquery/jquery.blockUI.js",					// common php javascripts functions
				//base_url().ADMIN_ASSET_DIR . "js/ajaxupload.3.5.js",                      // ajax upload - gallery page
    
				///base_url().TEMPLATE_USED. "js/preloadCssImages.jQuery_v5.js",			// Theme - Preload script for css and images
				//base_url().TEMPLATE_USED. "js/script.js",								// Theme - Scripts
				//base_url().TEMPLATE_USED. "js/jCal.js",									// Theme - Date picker
				//base_url().TEMPLATE_USED. "js/jquery.animate.clip.js",					// Theme - Date picker
				//base_url().TEMPLATE_USED. "js/visualize.jQuery.js",						// Theme - Visualize for charting
				//base_url().TEMPLATE_USED. "js/jquery.wysiwyg.js",						// Theme - wysiwyg editor
				//base_url().TEMPLATE_USED. "js/jExpand.js",								// Theme - jExpand for Expanding Tables
				//base_url().TEMPLATE_USED. "js/jquery.dataTables.min.js",					// Theme - Data Tables
				//base_url().TEMPLATE_USED. "js/TableTools.min.js",						// Theme - Data Tables
				//base_url().TEMPLATE_USED. "js/ZeroClipboard.js",						// Theme - Data Tables
				);


$js_standalone_arr = array(
					//base_url().ADMIN_ASSET_DIR . "js/uploadify/swfobject.js",						// used from uploadify script
					//base_url().ADMIN_ASSET_DIR . "js/uploadify/jquery.uploadify.v2.1.4.min.js",	// used from uploadify script
					);


// add absolute url to add files in array
if ( ! isset($this->css_include_arr) )
{
	$this->css_include_arr = array( '' );
}

// you have to pass absolute url OR pass "all" to exculde all
if ( ! isset($this->css_exclude_arr) )
{
	$this->css_exclude_arr = array('');
}

// add absolute url to add files in array
if ( ! isset($this->js_include_arr) )
{
	$this->js_include_arr = array( '' );
}

// you have to pass absolute url OR pass "all" to exculde all
if ( ! isset($this->js_exclude_arr) )
{
	$this->js_exclude_arr = array( '' );
}

// pr($css_arr);

print print_css( $css_arr, $this->css_include_arr, $this->css_exclude_arr );
print print_js( $js_arr, $js_standalone_arr, $this->js_include_arr, $this->js_exclude_arr );

if ( isset($this->xajax_js) )
{
	print $this->xajax_js;
}
?>

<!--<link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css' />-->

<script type="text/javascript">

$(document).ready(function()
{
	$.unblockUI()

	$("body").css("display", "none");
	$("body").fadeIn(1500);

	$('a').click(function() {

//		alert( $(this).hasClass('unblock') );
		
		if ( ! ( $(this).attr("href") == '#' || $("href").attr("javascript:void()") || $("href").attr("javascript:void();") || $(this).hasClass('unblock') ) )
		{
			$.blockUI();
		}
	});
});

</script>


<!--[if lt IE 8]>
			<link href="<?=base_url().TEMPLATE_DIR;?>css/ie.css" rel="stylesheet" type="text/css"/>
<![endif]-->

<!--=========Visualize for charting=========-->
<!--[if IE]><script language="javascript" type="text/javascript" src="<?=base_url().TEMPLATE_DIR;?>js/excanvas.min.js"></script><![endif]-->

<!--========= Feeling sorry for ie6=========-->
<!--[if lt IE 7]>
			<script type="text/javascript" src="<?=base_url().TEMPLATE_DIR;?>js/dd_png_fix.js"></script>
			<script>DD_belatedPNG.fix('img, div, a');</script>
 <![endif]-->

