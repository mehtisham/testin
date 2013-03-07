<!-- Top Bar -->
<div id="topbar">
	<div class="bar_title left"><h1><a href="<?=$this->backend_url->dashboard()?>">Publishrr</a></h1></div>
	<div class="user right">
		<?
		if($_SESSION['users_img'] != '')
		{
			?>
			<img src="<?=base_url().USERS_IMAGE_UPLOAD_DIR.'/'.$_SESSION['users_img'];?>" style="width: 35px; height: 35px;" />
			<?
		}
		else
		{
			?>
			<img src="<?=base_url().ADMIN_ASSET_DIR;?>images/no_pic.png" />
			<?
		}
		?>	
			<span><h2><?=$_SESSION['user_first_name'];?></h2><h3><?=$_SESSION['group_name'];?></h3><a target="_new" href="<?=base_url();?>">Go to Website</a> · <a href="<?=$this->backend_url->edit_admin_user($_SESSION['user_id'])?>">My Account</a> · <a href="<?=$this->backend_url->logout();?>">Sign Out</a></span></div>
	<div class="clr"></div>
</div>
<!-- End Top Bar -->