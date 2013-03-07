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

function seo_toggle()
{
	$(".seo_module_toggle").toggle("slow");
}
function key_phrases_toggle()
{
	$(".seo_module_toggle").hide("slow");
}
function data_dictionary_toggle()
{
	$(".seo_module_toggle").hide("slow");
}
function news_tags_toggle()
{
	$(".seo_module_toggle").hide("slow");
}
</script>
<?
	$page_title = 'SEO';
	$page_name = $this->backend_url->url_segments( URL_SEGMENT_2 );
	
	$seo_listing='';
	$seo_add='';
	$seo_edit ='';
	$news_tags ='';
	$data_dictionary ='';
	$key_phrases ='';
	/*		
	 *these conditions for checking the current module selected on side menu
	 * from url and then apply a classs that show that module selected 
	 */
	if( in_array($page_name, array('seo_listing', 'seo_add', 'seo_edit')) )
	{
		$key_phrases		= "toggle_close";
		$data_dictionary	= "toggle_close";
		$news_tags			= "toggle_close";
		$seo_listing		= "toggle_open";
		
		$page_title = "SEO";
		
		if($page_name == 'seo_listing')
		{
			$seo_listing='active';
		}
		else if($page_name == 'seo_add')
		{
			$seo_add='active';
		}
		else if($page_name == 'seo_edit')
		{
			$seo_edit ='active';
		}
	}
	else if( in_array($page_name, array('news_tags')) )
	{
		$key_phrases		= "toggle_close";
		$data_dictionary	= "toggle_close";
		$seo_listing		= "toggle_close";
		$news_tags		= "toggle_open";
		
		$page_title = "SEO / News Tags";
		
		$news_tags ='class="active"';
	}
	else if( in_array($page_name, array('data_dictionary')) )
	{
		$key_phrases		= "toggle_close";
		$news_tags			= "toggle_close";
		$seo_listing		= "toggle_close";
		$data_dictionary	= "toggle_open";
		
		$page_title = "SEO / Data Dictionary";
		
		$data_dictionary ='class="active"';
	}
	else if( in_array($page_name, array('key_phrases')) )
	{
		$news_tags			= "toggle_close";
		$data_dictionary	= "toggle_close";
		$seo_listing		= "toggle_close";
		$key_phrases		= "toggle_open";
		
		$page_title = "SEO / Key Phrases";
		
		$key_phrases ='class="active"';
	}
		
?>
<h1><?=$page_title;?></h1>
<div class="left g260">
	<div class="metro_col dark">
		<ul class="menu">
			<? 
			//SEO Module
			if ( acl_premissions( array('module'=>'SEO','section'=>'listing', 'return_bolean'=>true) ) == true
				||
				acl_premissions( array('module'=>'SEO', 'section'=>'add', 'return_bolean'=>true) ) == true	
				) 
			{ 
				?>
				<li onclick="seo_toggle();"><a <?=$seo_edit?> href="#"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/seo.png" /><span>SEO</span></a></li>
				<?
			}
			if ( acl_premissions( array('module'=>'SEO', 'section'=>'listing', 'return_bolean'=>true) ) == true )
			{ 
				?>
				<li class="seo_module_toggle submenu <?=(isset($seo_listing))?$seo_listing:'';?>">
                                    <a href="<?=$this->backend_url->seo_categories_listing()?>">
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/view_pages.png" width="17px" />Listing</span>
                                    </a>
                                </li>
				<? 
			}
			if ( acl_premissions( array('module'=>'SEO', 'section'=>'add', 'return_bolean'=>true) ) == true )	
			{ 
				?>
				<li class="seo_module_toggle submenu <?=(isset($seo_listing))?$seo_listing:'';?>">
                                    <a href="<?=$this->backend_url->seo_categories_add()?>" >
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" width="17px" />Add</span>
                                    </a>
                                </li>
				<? 
			}
					
			//news tags		
			if ( acl_premissions( array('module'=>'NEWS_TAGS','section'=>'listing', 'return_bolean'=>true) ) == true  ) 
			{ 
				?>
				<li onclick="news_tags_toggle();"><a <?=$news_tags?> href="<?=$this->backend_url->news_tags()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/seo_tag.png" /> <span>News Tags</span></a></li>
				<? 
			} 
			
			//stop words
			if ( acl_premissions( array('module'=>'STOP_WORDS','section'=>'listing', 'return_bolean'=>true) ) == true  )	
			{ 
				?>
				<li onclick="data_dictionary_toggle();"><a <?=$data_dictionary?> href="<?=$this->backend_url->data_dictionary()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/seo_stop.png" /> <span>Stop Words</span></a></li>
				<? 
			} 
			
			//key phrases
			if ( acl_premissions( array('module'=>'KEY_PHRASES','section'=>'listing', 'return_bolean'=>true) ) == true  ) 
			{ 
				?>
				<li onclick="key_phrases_toggle();"><a <?=$key_phrases?> href="<?=$this->backend_url->key_phrases()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/seo_phrase.png" /> <span>Key Phrases</span></a></li>
				<? 
			} 
			?>
		</ul>    
	</div>
</div>