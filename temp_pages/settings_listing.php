<? $this->load->view('admin/layouts/template_top_view'); ?>
<div class="grid">
	<?=$this->load->view('admin/elements/system_settings_side_menu_view');?>
	<!-- End Left Sidebar -->
	<div class="left g820 scrolldiv">
      	<div class="metro_col light">
        	<h2>Recently Logged in Users</h2><br /> 
				<ul class="user_list">
				<?				
				//print '<strong>Digital News</strong>';
				foreach ($this->side_panel['last_users']['last_loged_user_listing']->result_array() as $row)
				{
				?>
					<li>
						<?
						if($row['users_img'] == '')
						{
						?>
							<img src="<?=base_url().TEMPLATE_USED?>images/user_placeholder.gif" width="54" height="54" alt="<?=$row['first_name']?>" />
						<?
						}
						else if(file_exists(getcwd().'/'.USERS_IMAGE_UPLOAD_DIR.'/'.$row['users_img']))
						{
						?>
							<img src="<?=$this->urlmanager->image_manager( array('module'=>'admin_users', 'size'=>55, 'image_name'=> $row['users_img'] ) );?>" alt="<?php echo $row['first_name'];?>" />							
						<?
						}
						else
						{
						?>
							<img src="<?=base_url().TEMPLATE_USED?>images/user_placeholder.gif" width="54" height="54" alt="<?=$row['first_name']?>" />
						<?
						}
						?>
							<?=$row['first_name']?>
						<small><?=my_date_format($row['last_logged_dtid'],'Y')?></small>
					</li>
				<?
				}
				?>			
			</ul>
        </div>
   </div>
   <div class="clr"></div>         
</div>
<?$this->load->view('admin/layouts/template_bottom_view');?>