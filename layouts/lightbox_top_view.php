<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<? $this->load->view('admin/elements/epaper_head_view'); ?>

	<?
	if ( ! isset($close_lightbox_refresh) )
		$close_lightbox_refresh = true;
	?>

	<?=(isset($close_lightbox))?close_n_refresh_page($close_lightbox, $close_lightbox_refresh):print_msg();?>
</head>
<body>
<!--HEADING-->
<div class="main_lightbox">
	<!--=========Graph Box=========-->
	<div>
		<!-- A box with class of expose will call expose plugin automatically -->
		