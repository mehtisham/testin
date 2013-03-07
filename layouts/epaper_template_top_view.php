<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<div style="z-index: 1000;top: 0; left: 0; border: medium none; margin: auto; padding: 0pt; width: 100%; height: 100%; background-color: #1E1E1E; cursor: wait; position: fixed;" class="blockUI blockOverlay"></div>
<div style="z-index: 1001; position: fixed; padding: 0px; margin: auto; top: 43%; left: 48%; text-align: center; color: rgb(0, 0, 0); border: none; background-color: none; cursor: wait;" class="blockUI blockMsg blockPage">
    <img src="<?php echo base_url().ADMIN_ASSET_DIR;?>/images/preloader.gif" />
</div>

<!--============================Head============================-->
<head>
	<? $this->load->view('admin/elements/epaper_head_view'); ?>
</head>
<!--End Head-->
<body>
	<? $this->load->view('admin/elements/epaper_header_view'); ?>
	<?$this->load->view('admin/elements/side_menu_view');?>