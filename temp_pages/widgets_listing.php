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
	<h1>Widgets</h1>
    
    
<div class="left g260">
       	<div class="metro_col dark">
        	<ul class="menu">
            	<li><a href="#" class="active"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/poll.png" /><span>Poll</span></a></li>
            	<li><a href="#"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/weather.png" /> <span>Weather</span></a></li>
                <li><a href="#"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/forex.png" /> <span>Forex</span></a></li>
                <li><a href="#"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/rss.png" /> <span>RSS</span></a></li>
            </ul>    
        </div>
     </div> 
     <!-- End Left Sidebar -->
    <div class="left g820 scrolldiv" >
      	<div class="metro_col light">
        	<div class="left g260">
			<ul class="menu sub">
            	<li><a href="#" class="active"><img src="<?=base_url().ASSET_DIR;?>images/admin/small/list.png" /><span>View Poll</span></a></li>
            	<li><a href="#"><img src="<?=base_url().ASSET_DIR;?>images/admin/small/add.png" /> <span>Add Poll</span></a></li>
            </ul>   
            </div>
            <div class="left g820" style="border-left:#666 solid 1px;">
        	<h2 style="padding-left:10px;">View Polls</h2><br /> 
            <!-------List Table------->
			<table border="0" cellpadding="0" cellspacing="0" class="list_tbl">
				<thead>
					<tr>
						<th width="5%"><input type="checkbox" /></th>
						<th width="45%" style="text-align:left;">Title</th>
                        <th width="10%" style="text-align:left;">Category</th>
                        <th width="15%" style="text-align:left;">Status</th>
                        <th width="25%" style="text-align:left;">Option</th>
					</tr>
				</thead>
				<tbody>
                	<tr>
                    	<td><input type="checkbox" /></td>
                        <td>Who will be the next PM?</td>
                        <td>Home</td>
                        <td>Closed</td>
                        <td><a href="#"><img src="<?=base_url().ASSET_DIR?>images/admin/small/edit.png" />Edit</a> <A href="#"><img src="<?=base_url().ASSET_DIR?>images/admin/small/del.png" />Delete</A></td>
                     </tr>
                     
                     <tr>
                    	<td><input type="checkbox" /></td>
                        <td>Who will be the next PM?</td>
                        <td>Home</td>
                        <td>Closed</td>
                        <td><a href="#"><img src="<?=base_url().ASSET_DIR?>images/admin/small/edit.png" />Edit</a> <A href="#"><img src="<?=base_url().ASSET_DIR?>images/admin/small/del.png" />Delete</A></td>
                     </tr>
                     
                     <tr>
                    	<td><input type="checkbox" /></td>
                        <td>Who will be the next PM?</td>
                        <td>Home</td>
                        <td>Closed</td>
                        <td><a href="#"><img src="<?=base_url().ASSET_DIR?>images/admin/small/edit.png" />Edit</a> <A href="#"><img src="<?=base_url().ASSET_DIR?>images/admin/small/del.png" />Delete</A></td>
                     </tr>
                     <tr>
                    	<td><input type="checkbox" /></td>
                        <td>Who will be the next PM?</td>
                        <td>Home</td>
                        <td>Closed</td>
                        <td><a href="#"><img src="<?=base_url().ASSET_DIR?>images/admin/small/edit.png" />Edit</a> <A href="#"><img src="<?=base_url().ASSET_DIR?>images/admin/small/del.png" />Delete</A></td>
                     </tr>
                     
                     <tr>
                    	<td><input type="checkbox" /></td>
                        <td>Who will be the next PM?</td>
                        <td>Home</td>
                        <td>Closed</td>
                        <td><a href="#"><img src="<?=base_url().ASSET_DIR?>images/admin/small/edit.png" />Edit</a> <A href="#"><img src="<?=base_url().ASSET_DIR?>images/admin/small/del.png" />Delete</A></td>
                     </tr>
                     
                     <tr>
                    	<td><input type="checkbox" /></td>
                        <td>Who will be the next PM?</td>
                        <td>Home</td>
                        <td>Closed</td>
                        <td><a href="#"><img src="<?=base_url().ASSET_DIR?>images/admin/small/edit.png" />Edit</a> <A href="#"><img src="<?=base_url().ASSET_DIR?>images/admin/small/del.png" />Delete</A></td>
                     </tr>
                </tbody>
            </table>
            
           
            </div>
            <div class="clr"></div>
        </div>
   </div>
   <div class="clr"></div>         
     
     
     
</div>
</body>
</html>     
