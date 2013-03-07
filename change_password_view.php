<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<? $this->load->view('admin/elements/head_view'); ?>
</head>

<body id="login-bg">

	<!-- Start: login-holder -->
	<div id="login-holder">

		<!-- start logo -->
		<div id="logo-login">
			<a href="index.html"><img src="<?=base_url();?>images/admin/shared/logo.png" width="156" height="40" alt="" /></a>
		</div>
		<!-- end logo -->

		<div class="clear"></div>

		<!--  start loginbox ................................................................................. -->
		<div id="loginbox">

			<!--  start login-inner -->
			<div id="login-inner" style="width: 450px;">
				<? print validation_errors(); ?>
				<? print print_msg(); ?>
				<br />

				<form name="change_passwd_frm" id="change_passwd_frm" method="post">
				<table border="0" cellpadding="0" cellspacing="0">
				<tr>
					<th style="width: 150px;">Password</th>
					<td><input name="passwd" id="passwd" type="password"  class="login-inp" /></td>
				</tr>
				<tr>
					<th>Confirm Password</th>
					<td><input name="passwd_confirm" id="passwd_confirm" type="password" class="login-inp" /></td>
				</tr>
				<tr>
					<th>&nbsp;</th>
					<td><input name="change_passwd_btn" id="change_passwd_btn" type="submit" class="submit-login"  /></td>
				</tr>
				</table>
				</form>
			</div>
			<!--  end login-inner -->
			<div class="clear"></div>
		</div>
		<!--  end loginbox -->

	</div>
	<!-- End: login-holder -->
</body>
</html>