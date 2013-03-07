<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<? $this->load->view('admin/elements/head'); ?>
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <link href="<?=base_url().ADMIN_ASSET_DIR;?>css/login.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="metro">
    	<!-- Title Metro -->
    	<div class="title">
    	<h1>Start</h1>
        <a href="<?=base_url();?>">&laquo; Back to website</a>
        </div>
        <!-- End Metro -->
        
        <div class="login_form">
        	<div class="metro_box icon">
            	<img src="<?=base_url().ADMIN_ASSET_DIR;?>images/login/lock_48.png"  alt="Login" />
            </div>
            <div class="metro_login">
            <form name="login_frm" id="login_frm" method="post">
            	<div class="input">
				  <label>Username:</label>
				  <input name="email_address" id="email_address" type="text" class="textfield large" style="padding:8px;" />
				</div>
                <div class="input">
                  <label>Password:</label>
				  <input name="passwd" id="passwd" type="password" class="textfield large" style="padding:8px;" />
				</div>
				<div class="metrobutton">
                	<input name="login_btn" id="login_btn" type="submit" value="Enter"  />
				</div>
                <div class="clr"></div>
			</form>
            </div>
        	<div class="clr"></div>
            <?=print_msg(); ?>
						<?
						if ( validation_errors() != '' )
						{
						?>
							<div class="msg info">
                            	<img src="<?=base_url().ADMIN_ASSET_DIR;?>images/login/warning.png"  alt="Error" />
								<p><?=validation_errors()?></p>
								<a href="#" class="close_notification" title="Click to Close">x</a>
                                <div class="clr"></div>
							</div>
						<?
						}
						?>
    
        </div>
        
        
    </div>
    
	
</body>
</html>