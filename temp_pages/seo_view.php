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
	<h1>SEO</h1>
    
    
<div class="left g260">
       	<div class="metro_col dark">
        	<ul class="menu">
            	<li><a href="<?=base_url().'admin/dashboard/seo_listing'?>" class="active"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/seo.png" /><span>SEO</span></a></li>
                
                <? if ( acl_premissions( array('module'=>'NEWS_TAGS','section'=>'listing', 'return_bolean'=>true) ) == true  ) { ?>
					<li><a href="<?=$this->backend_url->news_tags()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/seo_tag.png" /> <span>News Tags</span></a></li>
				<? } ?>
				<? if ( acl_premissions( array('module'=>'STOP_WORDS','section'=>'listing', 'return_bolean'=>true) ) == true  )	{ ?>
					<li><a href="<?=$this->backend_url->data_dictionary()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/seo_stop.png" /> <span>Stop Words</span></a></li>
				<? } ?>
				<? if ( acl_premissions( array('module'=>'KEY_PHRASES','section'=>'listing', 'return_bolean'=>true) ) == true  ) { ?>
                    <li><a href="<?=$this->backend_url->key_phrases()?>"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/seo_phrase.png" /> <span>Key Phrases</span></a></li>
				<? } ?>
            </ul>    
        </div>
     </div> 
     <!-- End Left Sidebar -->
    <div class="left g820 scrolldiv">
      	<div class="metro_col light">
        	<h2>Search Engine Optimization</h2><br />
            
            <form>
            	<div class="input left" style="width:30%;">
                	<label>Sitemap</label>
                    <input type="text" value="http://www.publishrr.com/demo/english/sitemap.xml" />
                </div>
                <div class="clr"></div>
                <h3>Meta Data &amp; Open Graph</h3><Br />
                <div class="select left" style="width:40%;">
                	<label>Section</label>
                    <select>
                    	<option>Home Page</option>
                        <option>Category Page</option>
                    </select>
                </div>
                <div class="clr"></div>
                <div class="input">
                	<label>Meta Title</label>
                    <input type="text" value="The Newspaper Today | Pakistan News | Politics" />
                </div>
                <div class="textarea">
                	<label>Meta Description</label>
                    <textarea>Pakistan Newspaper</textarea>
                </div>
                <div class="textarea">
                	<label>Meta Keywords</label>
                    <textarea>Pakistan, News, Lahore, Politics, Entertainment</textarea>
                </div>
            </form>
            
        </div>
   </div>
   <div class="clr"></div>         
     
     
     
</div>
</body>
</html>     
