<?
$page_name = $this->backend_url->url_segments( URL_SEGMENT_2 );
	
	/*		
	 *these conditions for checking the current module selected on side menu
	 * from url and then apply a classs that show that module selected 
	 */
	if( in_array($page_name, array('config_list', 'config_edit', 'config_text')) )
	{
		$config_list_edit = ' class="active" ';
	}
	else if( in_array($page_name, array('config_add')) )
	{
		$config_add = ' class="active" ';
	}
	else if( in_array($page_name, array('config_categories_list', 'config_category_edit')) )
	{
		$config_category_list_edit = ' class="active" ';
	}
	else if( in_array($page_name, array('config_category_add')) )
	{
		$config_category_add = ' class="active" ';
	}
	
?>
<div class="left g260">
	<ul class="menu sub">
		<?
		if ( acl_premissions( array('module'=>'CONFIG', 'section'=>'listing', 'return_bolean'=>true) ) == true )
		{ 
			?>
			<li><a <?=(isset($config_list_edit))?$config_list_edit:'';?> href="<?=$this->backend_url->list_config()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/setting.png" /> <span>Configuration</span></a></li>
			<? 
		}
		if ( acl_premissions( array('module'=>'CONFIG', 'section'=>'add', 'return_bolean'=>true) ) )	
		{ 
			?>
			<li><a <?=(isset($config_add))?$config_add:'';?> href="<?=$this->backend_url->add_config()?>" ><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" /> <span>Add Configuration</span></a></li>
			<? 
		} 
		if ( acl_premissions( array('module'=>'CONFIG_CATEGORIES', 'section'=>'listing', 'return_bolean'=>true) ) == true ) 
		{ 
			?>
			<li><a <?=(isset($config_category_list_edit))?$config_category_list_edit:'';?> href="<?=$this->backend_url->list_config_categories()?>" ><img src="<?=base_url().ASSET_DIR;?>images/admin/small/category_list.png" /> <span>Config Category</span></a></li>
			<? 
		} 
		if ( acl_premissions( array('module'=>'CONFIG_CATEGORIES', 'section'=>'add', 'return_bolean'=>true) ) ) 
		{ 
			?>
			<li><a <?=(isset($config_category_add))?$config_category_add:'';?> href="<?=$this->backend_url->add_config_category()?>" ><img src="<?=base_url().ASSET_DIR;?>images/admin/small/add.png" /> <span>Add Config Category</span></a></li>
			<? 
		} 
		?>
	</ul>
</div>