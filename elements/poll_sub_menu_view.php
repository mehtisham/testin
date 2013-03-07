<?
$page_name = $this->backend_url->url_segments( URL_SEGMENT_2 );
	
	/*		
	 *these conditions for checking the current module selected on side menu
	 * from url and then apply a classs that show that module selected 
	 */
	if( in_array($page_name, array('poll_section_listing', 'poll_section_edit')) )
	{
		$poll_section = ' class="active" ';
	}
	else if( in_array($page_name, array('poll_section_add')) )
	{
		$poll_section_add = ' class="active" ';
	}
	else if( in_array($page_name, array('poll_listing', 'poll_edit')) )
	{
		$poll = ' class="active" ';
	}
	else if( in_array($page_name, array('poll_add')) )
	{
		$poll_add = ' class="active" ';
	}
	
?>
<div class="left g260">
	<ul class="menu sub">
		<?
		if ( acl_premissions( array('module'=>'WIDGETS', 'section'=>'listing', 'return_bolean'=>true) ) == true )
		{ 
			?>
			<li><a <?=(isset($poll_section))?$poll_section:'';?> href="<?=$this->backend_url->poll_section_listing()?>"><img src="<?=base_url().ASSET_DIR;?>images/admin/small/category_list.png" /> <span>Poll Sections</span></a></li>
			<? 
		}
		if ( acl_premissions( array('module'=>'WIDGETS', 'section'=>'add', 'return_bolean'=>true) ) )	
		{ 
			?>
			<li><a <?=(isset($poll_section_add))?$poll_section_add:'';?> href="<?=$this->backend_url->poll_section_add()?>" ><img src="<?=base_url().ASSET_DIR;?>images/admin/small/add.png" /> <span>Add Poll Section</span></a></li>
			<? 
		} 
		if ( acl_premissions( array('module'=>'WIDGETS', 'section'=>'listing', 'return_bolean'=>true) ) == true ) 
		{ 
			?>
			<li><a <?=(isset($poll))?$poll:'';?> href="<?=$this->backend_url->poll_listing()?>" ><img src="<?=base_url().ASSET_DIR;?>images/admin/small/poll.png" /> <span>Polls</span></a></li>
			<? 
		} 
		if ( acl_premissions( array('module'=>'WIDGETS', 'section'=>'add', 'return_bolean'=>true) ) ) 
		{ 
			?>
			<li><a <?=(isset($poll_add))?$poll_add:'';?> href="<?=$this->backend_url->poll_add()?>" ><img src="<?=base_url().ASSET_DIR;?>images/admin/small/add.png" /> <span>Add Poll</span></a></li>
			<? 
		} 
		?>
	</ul>
</div>