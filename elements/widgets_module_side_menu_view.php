<script type="text/javascript">
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

function weather_toggle()
{
	$(".poll_module_toggle").hide("slow");
	$(".forex_module_toggle").hide("slow");
	$(".weather_module_toggle").toggle("slow");	
	
}
function forex_toggle()
{
	$(".poll_module_toggle").hide("slow");
	$(".weather_module_toggle").hide("slow");
	$(".forex_module_toggle").toggle("slow");
}
function poll_toggle()
{
	$(".weather_module_toggle").hide("slow");
	$(".forex_module_toggle").hide("slow");
	$(".poll_module_toggle").toggle("slow");
}
</script>
<?
$page_name = $this->backend_url->url_segments( URL_SEGMENT_2 );
//echo $this->backend_url->url_segments( URL_SEGMENT_2 );
	
	$weather_city_add	='';
	$weather_cities		='';
	$weather_city_edit	='';
	$forex_countries ='';
	$forex_countries_add ='';
	$forex_countries_edit ='';
	$poll_section_listing ='';
	$poll_section_add ='';
	$poll_section_edit ='';
	$poll_listing ='';
	$poll_edit ='';
	$poll_add ='';
	/*		
	 *these conditions for checking the current module selected on side menu
	 * from url and then apply a classs that show that module selected 
	 */
	if( in_array($page_name, array('weather_cities', 'weather_city_add', 'weather_city_edit')) )
	{
		$poll_module	= "toggle_close";
		$forex_module	= "toggle_close";
		$weather_module = "toggle_open";
		
		if($page_name == 'weather_city_add')
		{
			$weather_city_add='class="active"';
		}
		else if($page_name == 'weather_cities')
		{
			$weather_cities='class="active"';
		}
		else if($page_name == 'weather_city_edit')
		{
			$weather_city_edit ='class="active"';
		}
	}	
	else if( in_array($page_name, array('forex_countries', 'forex_countries_add', 'forex_countries_edit')) )
	{
		$poll_module	= "toggle_close";
		$weather_module = "toggle_close";
		$forex_module	= "toggle_open";	
		
		if($page_name == 'forex_countries')
		{
			$forex_countries ='class="active"';
		}
		else if($page_name == 'forex_countries_add')
		{
			$forex_countries_add ='class="active"';
		}
		else if($page_name == 'forex_countries_edit')
		{
			$forex_countries_edit ='class="active"';
		}
	}
	else if( in_array($page_name, array('poll_section_listing', 'poll_section_add', 'poll_section_edit', 'poll_listing', 'poll_edit', 'poll_add','poll_results')) )
	{		
		$weather_module = "toggle_close";
		$forex_module	= "toggle_close";
		$poll_module	= "toggle_open";
		
		if($page_name == 'poll_section_listing')
		{
			$poll_section_listing ='class="active"';
		}
		else if($page_name == 'poll_section_add')
		{
			$poll_section_add ='class="active"';
		}
		else if($page_name == 'poll_section_edit')
		{
			$poll_section_edit ='class="active"';
		}
		else if($page_name == 'poll_listing' || $page_name == 'poll_results')
		{
			$poll_listing ='class="active"';
		}
		else if($page_name == 'poll_edit')
		{
			$poll_edit ='class="active"';
		}
		else if($page_name == 'poll_add')
		{
			$poll_add ='class="active"';
		}
	}
?>
<h1>Widgets</h1>
<div class="left g260">
	<div class="metro_col dark">
		<ul class="menu">
			<?	
			if ( acl_premissions( array('module'=>'WEATHER', 'section'=>'listing', 'return_bolean'=>true) ) == true 
				||
				acl_premissions( array('module'=>'WEATHER', 'section'=>'add', 'return_bolean'=>true) )					
				)
			{ 
				?>
			<li onClick="weather_toggle();"><a <?=$weather_city_edit; ?> href="#"><img id="weather_img" src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/arrow_right.png" /> <span>Weather</span></a></li>				
				<? 
			} 
			if ( acl_premissions( array('module'=>'WEATHER', 'section'=>'listing', 'return_bolean'=>true) ) == true)
			{ 
				?>
				<li class="weather_module_toggle <?=(isset($weather_module))?$weather_module:'';?> submenu">
                                    <a <?=$weather_cities; ?> href="<?=$this->backend_url->weather_cities_listing()?>">
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/view_pages.png" width="17px" />Listing</span>
                                    </a>
                                </li>				
				<? 
			}
			if ( acl_premissions( array('module'=>'WEATHER', 'section'=>'add', 'return_bolean'=>true) ) == true)
			{ 
				?>
				<li class="weather_module_toggle <?=(isset($weather_module))?$weather_module:'';?> submenu">
                                    <a <?=$weather_city_add; ?> href="<?=$this->backend_url->weather_city_add()?>" >
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" width="17px" />Add</span>
                                    </a>
                                </li>
				<? 
			}
			
			//forex
			if ( acl_premissions( array('module'=>'FOREX', 'section'=>'listing', 'return_bolean'=>true) ) == true 
				||				
				acl_premissions( array('module'=>'FOREX', 'section'=>'add', 'return_bolean'=>true) )	
				)
			{ 
				?>			
				<li onClick="forex_toggle();"><a <?=$forex_countries_edit; ?> href="#"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/arrow_right.png" /> <span>Forex</span></a></li>				
				<? 
			}
			if ( acl_premissions( array('module'=>'FOREX', 'section'=>'listing', 'return_bolean'=>true) ) == true )
			{ 
				?>
				<li class="forex_module_toggle <?=(isset($forex_module))?$forex_module:'';?> submenu">
                                    <a <?=$forex_countries; ?> href="<?=$this->backend_url->forex_countries_listing()?>">
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/view_pages.png" width="17px" />Listing</span>
                                    </a>
                                </li>
				<? 
			}
			if ( acl_premissions( array('module'=>'FOREX', 'section'=>'add', 'return_bolean'=>true) ) )	
			{ 
				?>
				<li class="forex_module_toggle <?=(isset($forex_module))?$forex_module:'';?> submenu">
                                    <a <?=$forex_countries_add; ?> href="<?=$this->backend_url->forex_countries_add()?>" >
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" width="17px" />Add</span>
                                    </a>
                                </li>
				<? 
			} 
			
			//polls
			if ( acl_premissions( array('module'=>'WIDGETS', 'section'=>'listing', 'return_bolean'=>true) ) == true 
				||
				acl_premissions( array('module'=>'WIDGETS', 'section'=>'section_listing', 'return_bolean'=>true) ) == true	
				||
				acl_premissions( array('module'=>'WIDGETS', 'section'=>'section_add', 'return_bolean'=>true) ) == true
				||
				acl_premissions( array('module'=>'WIDGETS', 'section'=>'add', 'return_bolean'=>true) ) == true	
				)
			{ 
				?>
				<li onClick="poll_toggle();"><a <?=$poll_section_edit; ?><?=$poll_edit; ?> href="#"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/arrow_right.png" /><span>Polls</span></a></li>
				<? 
			}
			if ( acl_premissions( array('module'=>'WIDGETS', 'section'=>'section_listing', 'return_bolean'=>true) ) == true )
			{ 
				?>
				<li class="poll_module_toggle <?=(isset($poll_module))?$poll_module:'';?> submenu">
                                    <a <?=$poll_section_listing; ?> href="<?=$this->backend_url->poll_section_listing()?>">
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/view_pages.png" width="17px" />Sections</span>
                                    </a>
                                </li>
				<? 
			}			
			if ( acl_premissions( array('module'=>'WIDGETS', 'section'=>'section_add', 'return_bolean'=>true) ) == true )	
			{ 
				?>
				<li class="poll_module_toggle <?=(isset($poll_module))?$poll_module:'';?> submenu">
                                    <a <?=$poll_section_add; ?> href="<?=$this->backend_url->poll_section_add()?>" >
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" width="17px" />Add Section</span>
                                    </a>
                                </li>
				<? 
			} 
			if ( acl_premissions( array('module'=>'WIDGETS', 'section'=>'listing', 'return_bolean'=>true) ) == true ) 
			{ 
				?>
				<li class="poll_module_toggle <?=(isset($poll_module))?$poll_module:'';?> submenu">
                                    <a <?=$poll_listing; ?> href="<?=$this->backend_url->poll_listing()?>" >
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/view_pages.png" width="17px" />Listing</span>
                                    </a>
                                </li>
				<? 
			} 
			if ( acl_premissions( array('module'=>'WIDGETS', 'section'=>'add', 'return_bolean'=>true) ) == true ) 
			{ 
				?>
				<li class="poll_module_toggle <?=(isset($poll_module))?$poll_module:'';?> submenu">
                                    <a <?=$poll_add; ?> href="<?=$this->backend_url->poll_add()?>" >
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" width="17px" />Add</span>
                                    </a>
                                </li>
				<? 
			} 
			?>
		</ul>    
	</div>
</div> 