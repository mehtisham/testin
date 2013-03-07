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

function config_toggle()
{
	$(".user_group_module_toggle").hide("slow");
	$(".user_account_module_toggle").hide("slow");
	$(".config_module_toggle").toggle("slow");	
}
function user_account_toggle()
{
	$(".user_group_module_toggle").hide("slow");
	$(".config_module_toggle").hide("slow");
	$(".user_account_module_toggle").toggle("slow");	
}
function user_group_account_toggle()
{
	$(".config_module_toggle").hide("slow");
	$(".user_account_module_toggle").hide("slow");
	$(".user_group_module_toggle").toggle("slow");	
}
function login_history_toggle()
{
	$(".config_module_toggle").hide("slow");
	$(".user_account_module_toggle").hide("slow");
	$(".user_group_module_toggle").hide("slow");	
}
</script>
<?
$page_name = $this->backend_url->url_segments( URL_SEGMENT_2 );
	$system_settings	='';
	
	$user_groups_listing='';
	$user_group_add		='';
	$group_privileges	='';
	$user_group_edit	='';
	
	$users_list			='';
	$user_add			='';
	$user_edit			='';
	
	$config_list='';
	$config_add='';
	$config_categories_list ='';
	$config_category_add ='';
	$config_category_edit ='';
	$config_edit ='';
	/*		
	 *these conditions for checking the current module selected on news side menu
	 * from url and then apply a classs that show that module selected 
	 */
	if( in_array($page_name, array('login_history')) )
	{
		$config			= "toggle_close";
		$admin_users	= "toggle_close";
		$user_groups	= "toggle_close";
		
		if($page_name == 'system_settings')
		{
			$system_settings ='class="active"';
		}
	}
	else if( in_array($page_name, array('user_groups', 'user_group_add', 'group_privileges', 'user_group_edit')) )
	{
		$config			= "toggle_close";
		$admin_users	= "toggle_close";
		$user_groups_listing	= "toggle_open";
		
		if($page_name == 'user_groups')
		{
			$user_groups_listing='class="active"';
		}
		else if($page_name == 'user_group_add')
		{
			$user_group_add='class="active"';
		}
		else if($page_name == 'group_privileges')
		{
			$group_privileges ='class="active"';
		}
		else if($page_name == 'user_group_edit')
		{
			$user_group_edit ='class="active"';
		}
	}
	else if( in_array($page_name, array('users_list', 'user_add', 'user_edit')) )
	{
		$user_groups	= "toggle_close";
		$config			= "toggle_close";
		$admin_users	= "toggle_open";
		
		if($page_name == 'users_list')
		{
			$users_list='class="active"';
		}
		else if($page_name == 'user_add')
		{
			$user_add='class="active"';
		}
		else if($page_name == 'user_edit')
		{
			$user_edit ='class="active"';
		}
	}
	else if( in_array($page_name, array('config_list', 'config_add', 'config_categories_list', 'config_category_add', 'config_category_edit', 'config_edit')) )
	{		
		$user_groups	= "toggle_close";
		$admin_users	= "toggle_close";
		$config			= "toggle_open";
		
		if($page_name == 'config_list')
		{
			$config_list='class="active"';
		}
		else if($page_name == 'config_add')
		{
			$config_add='class="active"';
		}
		else if($page_name == 'config_categories_list')
		{
			$config_categories_list ='class="active"';
		}
		else if($page_name == 'config_category_add')
		{
			$config_category_add ='class="active"';
		}
		else if($page_name == 'config_category_edit')
		{
			$config_category_edit ='class="active"';
		}
		else if($page_name == 'config_edit')
		{
			$config_edit ='class="active"';
		}
	}		
?>
<h1>Settings</h1>
<div class="left g260">
	<div class="metro_col dark">
		<ul class="menu">
			<?
			//configuration module
			if ( acl_premissions( array('module'=>'CONFIG', 'section'=>'listing', 'return_bolean'=>true) ) == true
				||
				acl_premissions( array('module'=>'CONFIG', 'section'=>'add', 'return_bolean'=>true) ) == true
				||
				acl_premissions( array('module'=>'CONFIG_CATEGORIES', 'section'=>'listing', 'return_bolean'=>true) ) == true
				||
				acl_premissions( array('module'=>'CONFIG', 'section'=>'add', 'return_bolean'=>true) ) == true
				)
			{ 
				?>
				<li onClick="config_toggle();"><a <?=$config_category_edit?><?=$config_edit?> href="#"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/arrow_right.png" /><span>Configurations</span></a></li>
				<? 
			}
			if ( acl_premissions( array('module'=>'CONFIG', 'section'=>'listing', 'return_bolean'=>true) ) == true )
			{ 
				?>
				<li class="config_module_toggle <?=(isset($config))?$config:'';?> submenu">
                                    <a <?=$config_list?> href="<?=$this->backend_url->list_config()?>">
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/view_pages.png" width="17px" />Listing</span>
                                    </a>
                                </li>
				<? 
			}
			if ( acl_premissions( array('module'=>'CONFIG', 'section'=>'add', 'return_bolean'=>true) ) == true )	
			{ 
				?>
				<li class="config_module_toggle <?=(isset($config))?$config:'';?> submenu">
                                    <a <?=$config_add?> href="<?=$this->backend_url->add_config()?>" >
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" width="17px" />Add</span>
                                    </a>
                                </li>
				<? 
			} 
			if ( acl_premissions( array('module'=>'CONFIG_CATEGORIES', 'section'=>'listing', 'return_bolean'=>true) ) == true ) 
			{ 
				?>
				<li class="config_module_toggle <?=(isset($config))?$config:'';?> submenu">
                                    <a <?=$config_categories_list?> <?=(isset($config_category_list_edit))?$config_category_list_edit:'';?> href="<?=$this->backend_url->list_config_categories()?>" >
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/view_pages.png" width="17px" />Category Listing</span>
                                    </a>
                                </li>
				<? 
			} 
			if ( acl_premissions( array('module'=>'CONFIG_CATEGORIES', 'section'=>'add', 'return_bolean'=>true) ) == true ) 
			{ 
				?>
				<li class="config_module_toggle <?=(isset($config))?$config:'';?> submenu">
                                    <a <?=$config_category_add?> <?=(isset($config_category_add))?$config_category_add:'';?> href="<?=$this->backend_url->add_config_category()?>" >
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" width="17px" />Category Add</span>
                                    </a>
                                </li>
				<? 
			} 
			
			
			//user groups
			if ( acl_premissions( array('module'=>'ADMIN_USER_GROUP', 'section'=>'listing', 'return_bolean'=>true) ) == true 
				||
				acl_premissions( array('module'=>'ADMIN_USER_GROUP', 'section'=>'add', 'return_bolean'=>true) ) == true
				||
				acl_premissions( array('module'=>'ADMIN_USERS', 'section'=>'listing', 'return_bolean'=>true) ) == true	
				)
			{ 
				?>
				<li onClick="user_group_account_toggle();"><a <?=$user_group_edit?> href="#"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/arrow_right.png" /> <span>User Groups</span></a></li>
				<? 
			} 
			if ( acl_premissions( array('module'=>'ADMIN_USERS', 'section'=>'listing', 'return_bolean'=>true) ) == true )
			{ 
				?>
				<li class="user_group_module_toggle <?=(isset($user_groups))?$user_groups:'';?> submenu">
                                    <a <?=$user_groups_listing; ?> href="<?=$this->backend_url->list_admin_user_groups()?>">
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/view_pages.png" width="17px" />Listing</span>
                                    </a>
                                </li>
				<? 
			}
			if ( acl_premissions( array('module'=>'ADMIN_USER_GROUP', 'section'=>'add', 'return_bolean'=>true) ) == true )
			{ 
				?>
				<li class="user_group_module_toggle <?=(isset($user_groups))?$user_groups:'';?> submenu">
                                    <a <?=$user_group_add; ?> href="<?=$this->backend_url->add_admin_user_group()?>">
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" width="17px" />Add</span>
                                    </a>
                                </li>
				<? 
			}
			
			//admin users
			if ( acl_premissions( array('module'=>'ADMIN_USERS', 'section'=>'listing', 'return_bolean'=>true) ) == true 
				||
				acl_premissions( array('module'=>'ADMIN_USERS', 'section'=>'add', 'return_bolean'=>true) ) == true	
				)
			{
				?>
				<li onClick="user_account_toggle();"><a <?=$user_edit?> href="#"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/arrow_right.png" /> <span>User Accounts</span></a></li>
				<? 
			} 
			if ( acl_premissions( array('module'=>'ADMIN_USERS', 'section'=>'listing', 'return_bolean'=>true) ) == true )
			{
				?>
				<li class="user_account_module_toggle <?=(isset($admin_users))?$admin_users:'';?> submenu">
                                    <a <?=$users_list?> href="<?=$this->backend_url->list_admin_users()?>">
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/view_pages.png" width="17px" />Listing</span>
                                    </a>
                                </li>
				<? 
			}
			if ( acl_premissions( array('module'=>'ADMIN_USERS', 'section'=>'add', 'return_bolean'=>true) ) )
			{ 
				?>
				<li class="user_account_module_toggle <?=(isset($admin_users))?$admin_users:'';?> submenu">
                                    <a <?=$user_add?> href="<?=$this->backend_url->add_admin_user()?>">
                                        <span><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/add.png" width="17px" />Add</span>
                                    </a>
                                </li>
				<? 
			}			
			?>
				
				
			<li onClick="login_history_toggle();"><a <?=$system_settings; ?> href="<?=$this->backend_url->login_history()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/system.png" /> <span>Login History</span></a></li>	
		</ul>    
	</div>
 </div>