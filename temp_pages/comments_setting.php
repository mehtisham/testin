<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administration Panel - Dashboard</title>
<? $this->load->view('admin/elements/head'); ?>

<link href="<?=base_url().ADMIN_ASSET_DIR;?>css/style.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>

</head>

<body>

<? $this->load->view('admin/elements/header'); ?>
<div class="grid">
	<h1>Comments / Setting</h1>
    
    
<div class="left g260">
       	<div class="metro_col dark">
        	<ul class="menu">
            	<li><a href="<?=base_url().'admin/comments'?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/comment_mod.png" /><span>Moderation</span></a></li>
            	<li><a href="<?=base_url().'admin/comments_setting'?>" class="active"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/setting.png" /> <span>Setting</span></a></li>
            </ul>    
        </div>
     </div> 
     <!-- End Left Sidebar -->
    <div class="left g820 scrolldiv">
      	<div class="metro_col light">
        	<h2>Comment Setting</h2><br />
            
        </div>
   </div>
   <div class="clr"></div>         
     
     
     
</div>
</body>
</html>     
