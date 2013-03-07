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

function digital_module_toggle()
{
	$(".authors_module_toggle").hide("slow");	
	$(".videos_module_toggle").hide("slow");	
	$(".cartoons_module_toggle").hide("slow");
	$(".images_module_toggle").hide("slow");
	$(".epaper_module_toggle").hide("slow");
	$(".print_module_toggle").hide("slow");	
	$(".digital_module_toggle").toggle("slow");	
}
function print_module_toggle()
{
	$(".authors_module_toggle").hide("slow");	
	$(".videos_module_toggle").hide("slow");	
	$(".cartoons_module_toggle").hide("slow");
	$(".images_module_toggle").hide("slow");
	$(".epaper_module_toggle").hide("slow");
	$(".digital_module_toggle").hide("slow");	
	$(".print_module_toggle").toggle("slow");	
}
function epaper_module_toggle()
{
	$(".authors_module_toggle").hide("slow");	
	$(".videos_module_toggle").hide("slow");	
	$(".cartoons_module_toggle").hide("slow");
	$(".images_module_toggle").hide("slow");
	$(".print_module_toggle").hide("slow");	
	$(".digital_module_toggle").hide("slow");	
	$(".epaper_module_toggle").toggle("slow");	
}
function images_module_toggle()
{
	$(".authors_module_toggle").hide("slow");	
	$(".videos_module_toggle").hide("slow");	
	$(".cartoons_module_toggle").hide("slow");
	$(".epaper_module_toggle").hide("slow");
	$(".print_module_toggle").hide("slow");	
	$(".digital_module_toggle").hide("slow");	
	$(".images_module_toggle").toggle("slow");	
}
function cartoons_module_toggle()
{
	$(".authors_module_toggle").hide("slow");	
	$(".videos_module_toggle").hide("slow");	
	$(".images_module_toggle").hide("slow");
	$(".epaper_module_toggle").hide("slow");
	$(".print_module_toggle").hide("slow");	
	$(".digital_module_toggle").hide("slow");	
	$(".cartoons_module_toggle").toggle("slow");	
}
function videos_module_toggle()
{
	$(".authors_module_toggle").hide("slow");	
	$(".cartoons_module_toggle").hide("slow");
	$(".images_module_toggle").hide("slow");
	$(".epaper_module_toggle").hide("slow");
	$(".print_module_toggle").hide("slow");	
	$(".digital_module_toggle").hide("slow");	
	$(".videos_module_toggle").toggle("slow");	
}
function authors_module_toggle()
{
	$(".videos_module_toggle").hide("slow");	
	$(".cartoons_module_toggle").hide("slow");
	$(".images_module_toggle").hide("slow");
	$(".epaper_module_toggle").hide("slow");
	$(".print_module_toggle").hide("slow");	
	$(".digital_module_toggle").hide("slow");	
	$(".authors_module_toggle").toggle("slow");	
}
</script>
<?
$page_name = $this->backend_url->url_segments( URL_SEGMENT_2 );
	
	/*		
	 *these conditions for checking the current module selected on news side menu
	 * from url and then apply a classs that show that module selected 
	 */
	if( (strcasecmp($page_name, "digital_news_list") == 0) )
	{
		$epapers_list		= "toggle_close";
		$authors			= "toggle_close";
		$video_listing		= "toggle_close";
		$cartoons_listing	= "toggle_close";
		$multimedia_listing	= "toggle_close";
		$print_news			= "toggle_close";
		$current_news		= "toggle_open";
	}
	else if( (strcasecmp($page_name, "print_news_list") == 0) )
	{
		$epapers_list		= "toggle_close";
		$authors			= "toggle_close";
		$video_listing		= "toggle_close";
		$cartoons_listing	= "toggle_close";
		$multimedia_listing	= "toggle_close";
		$current_news		= "toggle_close";
		$print_news			= "toggle_open";
	}
	else if( (strcasecmp($page_name, "images_listing") == 0) )
	{
		$epapers_list		= "toggle_close";
		$authors			= "toggle_close";
		$video_listing		= "toggle_close";
		$cartoons_listing	= "toggle_close";
		$current_news		= "toggle_close";
		$print_news			= "toggle_close";
		$multimedia_listing		= "toggle_open";
	}
	else if( (strcasecmp($page_name, "cartoon_listing") == 0) )
	{
		$epapers_list		= "toggle_close";
		$authors			= "toggle_close";
		$video_listing		= "toggle_close";
		$current_news		= "toggle_close";
		$multimedia_listing	= "toggle_close";
		$print_news			= "toggle_close";
		$cartoons_listing	= "toggle_open";
	}
	else if( (strcasecmp($page_name, "video_listing") == 0) )
	{
		$epapers_list		= "toggle_close";
		$authors			= "toggle_close";
		$current_news		= "toggle_close";
		$cartoons_listing	= "toggle_close";
		$multimedia_listing	= "toggle_close";
		$print_news			= "toggle_close";
		$video_listing		= "toggle_open";
	}
	else if( (strcasecmp($page_name, "authors") == 0) )
	{
		$epapers_list		= "toggle_close";
		$current_news		= "toggle_close";
		$video_listing		= "toggle_close";
		$cartoons_listing	= "toggle_close";
		$multimedia_listing	= "toggle_close";
		$print_news			= "toggle_close";
		$authors			= "toggle_open";
	}
	else if( (strcasecmp($page_name, "epapers_list") == 0) )
	{
		$current_news		= "toggle_close";
		$authors			= "toggle_close";
		$video_listing		= "toggle_close";
		$cartoons_listing	= "toggle_close";
		$multimedia_listing	= "toggle_close";
		$print_news			= "toggle_close";
		$epapers_list		= "toggle_open";
	}

	
/*@search ACL
 */	
?>
<h1>Search</h1>
<div class="left g260">
	<div class="metro_col dark">
		<ul class="menu">
			<?	
			//digital module
			if ( acl_premissions( array('module'=>'DIGITAL_NEWS', 'section'=>'listing', 'return_bolean'=>true) ) == true 
				||
				acl_premissions( array('module'=>'DIGITAL_NEWS', 'section'=>'add', 'return_bolean'=>true) ) == true 	
				)
			{ 
				//menu_add_class - delete this styling
				?>
				<li onclick="digital_module_toggle()">
					<a href="#">
						<img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/search_current.png" /><span>Digital News</span>
					</a>					
				</li>
				<? 				
			} 
			if ( acl_premissions( array('module'=>'DIGITAL_NEWS', 'section'=>'listing', 'return_bolean'=>true) ) == true )
			{ 
				?>
				<li class="digital_module_toggle <?=(isset($current_news))?$current_news:'';?> submenu">
					<a href="<?=$this->backend_url->list_digital_news()?>">
					<span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/view_pages.png" width="17px" />Listing</span>
					</a>					
				</li>
				<?
			}
			if ( acl_premissions( array('module'=>'DIGITAL_NEWS', 'section'=>'add', 'return_bolean'=>true) ) == true )
			{ 
				?>
				<li class="digital_module_toggle <?=(isset($current_news))?$current_news:'';?> submenu">
					<a href="<?=$this->backend_url->add_digital_news()?>">
                                            <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" width="17px" />Add</span>
					</a>					
				</li>
				<?
			}
			
			
			//print module
			if ( acl_premissions( array('module'=>'PRINT_NEWS', 'section'=>'listing', 'return_bolean'=>true) ) == true 
				||
				acl_premissions( array('module'=>'PRINT_NEWS', 'section'=>'add', 'return_bolean'=>true) ) == true 	
			   )
			{ 
				?>
				<li onclick="print_module_toggle();"><a href="#" ><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/search_print.png" /><span>Print News</span></a></li>
				<? 
			} 
			if ( acl_premissions( array('module'=>'PRINT_NEWS', 'section'=>'listing', 'return_bolean'=>true) ) == true )
			{ 
				?>
				<li class="print_module_toggle <?=(isset($print_news))?$print_news:'';?> submenu">
                                    <a <?=(isset($print_news))?$print_news:'';?> href="<?=$this->backend_url->list_print_news()?>" >
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/view_pages.png" width="17px" />Listing</span>
                                    </a>
                                </li>
				<? 
			} 
			if ( acl_premissions( array('module'=>'PRINT_NEWS', 'section'=>'add', 'return_bolean'=>true) ) == true )
			{ 
				?>
				<li class="print_module_toggle <?=(isset($print_news))?$print_news:'';?> submenu"><a <?=(isset($print_news))?$print_news:'';?> href="<?=$this->backend_url->add_print_news()?>" >
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" width="17px" />Add</span>
                                    </a>
                                </li>
				<? 
			} 
			
			
			
			//epaper module
			if ( acl_premissions( array('module'=>'EPAPER', 'section'=>'listing', 'return_bolean'=>true) ) == true 
				||
				acl_premissions( array('module'=>'EPAPER', 'section'=>'add', 'return_bolean'=>true) ) == true	
			   )
			{ 
				?>
				<li onclick="epaper_module_toggle();"><a href="#"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/search_epaper.png" />
                                        <span>ePaper</span>
                                    </a>
                                </li>
				<? 
			}
			if ( acl_premissions( array('module'=>'EPAPER', 'section'=>'listing', 'return_bolean'=>true) ) == true )
			{ 
				?>
				<li class="epaper_module_toggle <?=(isset($epapers_list))?$epapers_list:'';?> submenu">
                                    <a href="<?=$this->backend_url->list_epapers()?>" >
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/view_pages.png" width="17px" />Listing</span>
                                    </a>
                                </li>
				<? 
			}
			if ( acl_premissions( array('module'=>'EPAPER', 'section'=>'add', 'return_bolean'=>true) ) == true )
			{ 
				?>
				<li class="epaper_module_toggle <?=(isset($epapers_list))?$epapers_list:'';?> submenu">
                                    <a href="<?=$this->backend_url->add_epaper()?>" >
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" width="17px" />Add</span>
                                    </a>
                                </li>
				<? 
			}
			
			
			//images module
			if ( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'listing', 'return_bolean'=>true) ) == true 
				||
				acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'add', 'return_bolean'=>true) ) == true					
				)
			{ 
				?>
				<li onclick="images_module_toggle()"><a href="#" ><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/search_multimedia.png" /><span>Images</span></a></li>
				<? 
			}
			if ( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'listing', 'return_bolean'=>true) ) == true )
			{ 
				?>
				 <li class="images_module_toggle <?=(isset($multimedia_listing))?$multimedia_listing:'';?> submenu">
                                     <a href="<?=$this->backend_url->list_gallery_multimedia()?>" >
                                         <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/view_pages.png" width="17px" />Listing</span>
                                     </a>
                                 </li>
				<? 
			}
			if ( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'add', 'return_bolean'=>true) ) == true )
			{ 
				?>
				 <li class="images_module_toggle <?=(isset($multimedia_listing))?$multimedia_listing:'';?> submenu">
                                     <a href="<?=$this->backend_url->add_multimedia_images()?>" >
                                         <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" width="17px" />Add</span>
                                     </a>
                                 </li>
				<? 
			}
			
			//cartoon module
			if ( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'cartoons_listing', 'return_bolean'=>true) ) == true 
				||
				acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'cartoons_add', 'return_bolean'=>true) ) == true	
				)
			{ 
				?>
				 <li onclick="cartoons_module_toggle()"><a href="#" ><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/Cartoons_small.png" /><span>Cartoons</span></a></li>
				<? 
			}
			if ( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'cartoons_listing', 'return_bolean'=>true) ) == true )
			{ 
				?>
				 <li class="cartoons_module_toggle <?=(isset($cartoons_listing))?$cartoons_listing:'';?> submenu">
                                     <a href="<?=$this->backend_url->list_cartoons()?>" >
                                         <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/view_pages.png" width="17px" />Listing</span>
                                     </a>
                                 </li>
				<? 
			}
			if ( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'cartoons_add', 'return_bolean'=>true) ) == true )
			{ 
				?>
				 <li class="cartoons_module_toggle <?=(isset($cartoons_listing))?$cartoons_listing:'';?> submenu">
                                     <a href="<?=$this->backend_url->add_cartoon()?>" >
                                         <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" width="17px" />Add</span>
                                     </a>
                                 </li>
				<? 
			}
			
			//video module
			if ( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'videos_listing', 'return_bolean'=>true) ) == true 
				||
				acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'videos_add', 'return_bolean'=>true) ) == true	
				)
			{ 
				?>
				 <li onclick="videos_module_toggle()" ><a href="#" ><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/Videos_small.png" /><span>Videos</span></a></li>
				<? 
			}
			if ( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'videos_listing', 'return_bolean'=>true) ) == true )
			{ 
				?>
				 <li class="videos_module_toggle <?=(isset($video_listing))?$video_listing:'';?> submenu">
                                     <a href="<?=$this->backend_url->list_videos()?>" >
                                         <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/view_pages.png" width="17px" />Listing</span>
                                     </a>
                                 </li>
				<? 
			}
			if ( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'videos_add', 'return_bolean'=>true) ) == true )
			{ 
				?>
				 <li class="videos_module_toggle <?=(isset($video_listing))?$video_listing:'';?> submenu">
                                     <a href="<?=$this->backend_url->add_video()?>" >
                                         <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" width="17px" />Add</span>
                                     </a>
                                 </li>
				<? 
			}
			
			//author module
			if ( acl_premissions( array('module'=>'AUTHORS', 'section'=>'listing', 'return_bolean'=>true) ) == true 
				||
				acl_premissions( array('module'=>'AUTHORS', 'section'=>'add', 'return_bolean'=>true) ) == true 	
				)
			{
				?>
				<li onclick="authors_module_toggle();"><a href="#" ><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/view_author.png" /><span>Authors</span></a></li>
				<?
			}
			if ( acl_premissions( array('module'=>'AUTHORS', 'section'=>'listing', 'return_bolean'=>true) ) == true )
			{
				?>
				<li class="authors_module_toggle <?=(isset($authors))?$authors:'';?> submenu">
                                    <a href="<?=$this->backend_url->list_authors()?>" >
                                         <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/view_pages.png" width="17px" />Listing</span>
                                    </a>
                                </li>
				<?
			}
			if ( acl_premissions( array('module'=>'AUTHORS', 'section'=>'add', 'return_bolean'=>true) ) == true )
			{
				?>
				<li class="authors_module_toggle <?=(isset($authors))?$authors:'';?> submenu">
                                    <a <?=(isset($authors))?$authors:'';?> href="<?=$this->backend_url->add_author()?>" >
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" width="17px" />Add</span>
                                    </a>
                                </li>
				<?
			}
			?>
		</ul>    
	</div>
</div> 