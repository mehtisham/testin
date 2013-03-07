<!-- Side Bar -->
<div class="sidebar">
	<ul>
		<li class="active"><a href="<?=$this->backend_url->dashboard()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/icons/s_home.png" /><strong>Home</strong></a><div class="arrow"></div></li>
		
		<?
		//FOR THE SEARCH ICON ON THE GLOBAL LEFT SIDE MENU OF THE SITE
		if ( acl_premissions( array('module'=>'DIGITAL_NEWS', 'section'=>'listing', 'return_bolean'=>true) ) )
		{
			?>
			 <li><a href="<?=$this->backend_url->list_digital_news()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/icons/s_search.png" /><strong>Search</strong></a></li>
			<?
		}
		else if( acl_premissions( array('module'=>'PRINT_NEWS', 'section'=>'listing', 'return_bolean'=>true) ) )
		{
				?>
				 <li><a href="<?=$this->backend_url->list_print_news()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/icons/s_search.png" /><strong>Search</strong></a></li>
				<?
		}
		else if( acl_premissions( array('module'=>'EPAPER', 'section'=>'listing', 'return_bolean'=>true) ) )
		{
				?>
				 <li><a href="<?=$this->backend_url->list_epapers()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/icons/s_search.png" /><strong>Search</strong></a></li>
				<?
		}
		else if( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'listing', 'return_bolean'=>true) ) )
		{
				?>
				 <li><a href="<?=$this->backend_url->list_gallery_multimedia()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/icons/s_search.png" /><strong>Search</strong></a></li>
				<?
		}
		else if( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'cartoons_listing', 'return_bolean'=>true) ) )
		{
				?>
				 <li><a href="<?=$this->backend_url->list_cartoons()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/icons/s_search.png" /><strong>Search</strong></a></li>
				<?
		}
		else if( acl_premissions( array('module'=>'GALLERY_MULTIMEDIA', 'section'=>'videos_listing', 'return_bolean'=>true) ) )
		{
				?>
				 <li><a href="<?=$this->backend_url->list_videos()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/icons/s_search.png" /><strong>Search</strong></a></li>
				<?
		}
		else if( acl_premissions( array('module'=>'AUTHORS', 'section'=>'listing', 'return_bolean'=>true) ) )
		{
				?>
				 <li><a href="<?=$this->backend_url->list_authors()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/icons/s_search.png" /><strong>Search</strong></a></li>
				<?
		} 
		

		//FOR THE SEARCH ICON ON THE GLOBAL LEFT SIDE MENU OF THE SITE /\
		?>
				 
				 
		<?
		if ( acl_premissions( array('module'=>'DIGITAL_NEWS', 'section'=>'add', 'return_bolean'=>true) ) )
		{
			?>
			 <li><a href="<?=$this->backend_url->add_digital_news()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/icons/Digital_small.png" /><strong>Digital</strong></a></li>
			<?
		}
		else if ( acl_premissions( array('module'=>'DIGITAL_NEWS', 'section'=>'listing', 'return_bolean'=>true) ) )
		{
			?>
			 <li><a href="<?=$this->backend_url->list_digital_news()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/icons/Digital_small.png" /><strong>Digital</strong></a></li>
			<?
		}
		?>
		<?
		if ( acl_premissions( array('module'=>'PRINT_NEWS', 'section'=>'add', 'return_bolean'=>true) ) )
		{
			?>
			 <li><a href="<?=$this->backend_url->add_print_news()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/icons/Print_small.png" /><strong>Print</strong></a></li>
			<?
		}
		else if ( acl_premissions( array('module'=>'PRINT_NEWS', 'section'=>'listing', 'return_bolean'=>true) ) )
		{
			?>
			 <li><a href="<?=$this->backend_url->list_print_news()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/icons/Print_small.png" /><strong>Print</strong></a></li>
			<?
		}
		?>
				 
		<?
		if ( acl_premissions( array('module'=>'EPAPER', 'section'=>'add', 'return_bolean'=>true) ) )
		{
			?>
			 <li><a href="<?=$this->backend_url->add_epaper()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/icons/Epaper_small.png" /><strong>ePaper</strong></a></li>
			<?
		}
		else if ( acl_premissions( array('module'=>'EPAPER', 'section'=>'listing', 'return_bolean'=>true) ) )
		{
			?>
			 <li><a href="<?=$this->backend_url->list_epapers()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/icons/Epaper_small.png" /><strong>ePaper</strong></a></li>
			<?
		}
		?>
				 
		<?
		if ( acl_premissions( array('module'=>'AUTHORS', 'section'=>'add', 'return_bolean'=>true) ) )
		{
			?>
			 <li><a href="<?=$this->backend_url->add_author()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/icons/author_small.png" /><strong>Authors</strong></a></li>		
			<?
		}
		else if ( acl_premissions( array('module'=>'AUTHORS', 'section'=>'listing', 'return_bolean'=>true) ) )
		{
			?>
			 <li><a href="<?=$this->backend_url->list_authors()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/icons/author_small.png" /><strong>Authors</strong></a></li>		
			<?
		}
		?>
		
	</ul>
</div>
<!-- End Sidebar -->