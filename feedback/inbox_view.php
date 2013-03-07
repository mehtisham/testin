<? $this->load->view('admin/layouts/template_top_view'); ?>
<style type="text/css">
	
	/*	Style Reply and Forward Button */
	.is_message 
	{ 
		display: none; 
	}
	.is_message p 
	{  
	}
	.is_message i 
	{ 
		font-style: italic; padding-left: 20px; 
	}
	.is_message h2 
	{  
		padding-left: 20px; font-size: 16px;
		font-weight: bold;
		margin: 0;
		padding: 0; 
	}
	/* End of Reply and Forward Button	*/
	
	/* This Style is used to bold the message if it is unread 	*/
	#catBody .list_tbl tbody tr.is_unread{
		font-size: 12px;
		font-weight: bold;
	}
	#catBody .list_tbl tbody tr.is_unread td{
		cursor: pointer;
	}
	
	#catBody .list_tbl tbody tr.is_read{}
	#catBody .list_tbl tbody tr.is_read td{ 
		color:#CCCCCC;
		background-color: #2E2D2D;
		cursor: pointer;
	}
	/* End of read and unread style	*/
	
	#catBody .list_tbl tbody tr td div.message_reply 
	{
		width: 95%;
	}
	
	#catBody .list_tbl tbody tr.close
	{
		background-color: darkgray;
		display: none;
	}
	
	#catBody .list_tbl tbody input
	{
		height: 25px;
		width: 350px;
	}
	#catBody .list_tbl tbody .button
	{
		background-color: lightgrey;
		border: 1px solid darkgrey;
		height: 25px; width: 60px;
		padding:3px;
		
	}
	#catBody .list_tbl tbody tr p span
	{
		border-bottom: 1px solid #E4E4E4;
		font-family: Arial,Helvetica,sans-serif;
		font-size: 12px;
		vertical-align: text-top;
		font-weight: bold;
	}
	.reply_farward_button{
		float: right;
		color: #000;
		background-color: #D3D3D3;
	}
	.reply_farward_button:hover{
		background-color: #D3D3D3;
	}
	.dark_inbox_row{
/*		background-color: red;*/
	}
	.light_inbox_row{
/*		background-color: #D3D3D3;*/
	}

	.p{
		font-size: 14px !important;
		line-height: 20px;
	}
	.p span{
		font-size: 12px;
		line-height: 22px;
	}
</style>
<script>
	function delete_inbox(row)
	{
		jConfirm('Are you sure you want to delete!', 'Delete inbox', function(responce) 
		{
			if(responce){ 
				document.location = row.href;
			}
			else{
				return false;
			}
		}); 
	}
</script>	
<div class="grid">
	<h1>Messages</h1>
 <!-- SIDE BAR ------------------------------------------------------->
 <div class="left g260">
       	<div class="metro_col dark">
        	<ul class="menu">
            	<li><a href="#" class="active"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/mail.png" /> <span>Messages</span></a></li>
                <li style="display: none;"><a href="#"><img src="<?=base_url().ADMIN_ASSET_DIR;?>images/small/subscribers.png" /><span>Subscriptions</span></a></li>
            </ul>    
        </div>
     </div>    
<!-- END SIDE BAR ------------------------------------------------------->
<div class="right content_grid scrolldiv" >
	<div class="metro_col light">
      	<h1>Inbox</h1><br />
        <div id="catBody">
		
	
			<!-------List Table------->
			<?php
					$multilingual = '';
					$multilingual = multilingual_align_class();
					if($multilingual!='')
					{
						$multilingual = 'direction:rtl;text-align:left';
					}
				?>
			<table border="0" cellpadding="0" cellspacing="0" class="list_tbl">
				<thead>
					<tr>
						<th style="text-align:left; width: 25%;">Name</th>
						<th style="text-align:left; width: 30%;">Email</th>
						<th style="text-align:left;width: 20%;">Subject</th>
						<th style="text-align:left;width: 20%;">Date</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
				<?php
					//if no record found then
					if ( $inbox_listing == '' || $inbox_listing <  1)
					{
					?>
						<tr>							
							<td class="no_record_td" colspan="6">No Record Exist</td>
						</tr>						
					<?
					}
					else
					{
						//loop for listing all categories
						foreach( $inbox_listing AS $key=>$val )
						{
							// Check message is read or not then apply the style 
							if($val['is_read']=='Y')
						    {
								$class = 'is_read';
							}
							else
							{
								$class = 'is_unread';
							}
							?>
							<tr id="message_<?=$key;?>" class="<?=$class;?>" >
								<td onclick="$('#inbox_message_<?=$key;?>').toggle(); xajax_mark_message_is_read_xajax(<?=$val['id'];?>,'message_<?=$key;?>')">
									<strong><?=$val['first_name']. ' ' . $val['last_name'];?></strong>
								</td>
								<td onclick="$('#inbox_message_<?=$key;?>').toggle(); xajax_mark_message_is_read_xajax(<?=$val['id'];?>,'message_<?=$key;?>')">
									<?=$val['email'];?>
								</td>
								<td onclick="$('#inbox_message_<?=$key;?>').toggle(); xajax_mark_message_is_read_xajax(<?=$val['id'];?>,'message_<?=$key;?>')">
									<?
									$subject = config_name_by_id($val['feedback_category_id'],'frontend_feedback_category_type_for_feedback');
									?>
									<?=$subject?>
								</td>
								<td style=" white-space: nowrap;<?=$multilingual?>" onclick="$('#inbox_message_<?=$key;?>').toggle(); xajax_mark_message_is_read_xajax(<?=$val['id'];?>,'message_<?=$key;?>')">
									<?
										if($val['date']!='')
										{
                                                                                    echo my_date_format($val['date'],'Y', 'digital_paper_publish_dateformat');
											
										}
									?>	
								</td>
								
							</tr>
							
							<tr id="inbox_message_<?=$key;?>" class="is_message">
							<td colspan="4">
								<div id="<?=$key?>">	
									<p style="width: 80%; line-height: 20px; "><?=$val['comments'];?></p>
									<br />
									<?
									if( isset($val['country']) && $val['country']!='' )
									{
										?>
										<p><span><strong>Address:</strong> <?= (isset ($val['address'])?$val['address']:'') .",  ". $val['country'];?></span></p>
										<?
									}
									if( isset($val['phone_no']) && $val['phone_no']!='' )
									{
										?>
										<p><span><strong>Contact #:</strong> <?=$val['phone_no'];?></span></p>
										<?
									}
									if ( $val['reply_comment'] != '' )
									{
										?>
										<h2>Mail Reply</h2>
										<i><?=$val['reply_comment'];?></i>
										<br/>
										<a href="javascript:void(0); $.unblockUI();" onclick="$('#forward_mail_<?=$key;?>').toggle();  $('#reply_message_<?=$key;?>').hide();">Forward</a>
									<?
									}
									else
									{
										?>
										<a class="reply_farward_button unblock" href="<?=$this->backend_url->mark_message_deleted($val['id']); ?>" onclick="delete_inbox(this); return false;">Delete</a>
										<a class="reply_farward_button" href="javascript:void(0); $.unblockUI();" onclick="$('#reply_message_<?=$key;?>').toggle(); $('#forward_mail_<?=$key;?>').hide();">Reply</a>
										<a class="reply_farward_button" href="javascript:void(0); $.unblockUI();" onclick="$('#forward_mail_<?=$key;?>').toggle();  $('#reply_message_<?=$key;?>').hide();">Forward</a>
										<?
									}
									?>
								</div>
								
								
							</td>
							</tr>

							<tr id="reply_message_<?=$key;?>" class="close">
							<td colspan="4">

								<!--		Inner Form box to send reply for user mail		-->
								<div id="<?=$key?>" class="message_reply">	
									<form name="cms_list_view" id="cms_list_view" method="post" action="">
										<div>
											<table cellspacing="0" border="0" width="105%">
												<tr>
													<td>
														<label for="cms_cat_list">Subject</label>
													</td>
													<td>
														<input type="text" name="subject" id="subject_<?=$key;?>" value="<?=$subject;?>" />
													</td>
												</tr>
												<tr>
													<td>
														<label for="cms_cat_list">Message</label>
													</td>
													<td>
														<textarea type="text" name="message" id="message_<?=$key;?>" value=""></textarea>
													</td>
												</tr>
												<tr>
													<td colspan="2">
														<input type="button" name="submit" id="submit" value="Send" 
															   onclick="xajax_message_reply_xajax(<?=$val['feedback_id']?>, 
																								  <?=$val['frontend_user_id']?>,
																								  <?=$val['feedback_category_id']?>,
																								  '<?=urlencode($val['email']);?>',
																								  $('#subject_<?=$key?>').val(),
																								  $('textarea#message_<?=$key?>').val(),
																								  'reply_message_<?=$key;?>',
																								  'inbox_message_<?=$key;?>');" class="button"/>
														<input type="reset" name="reset" id="reset" value="Reset" class="button"/>
													</td>
												</tr>
											</table>
										</div>
									 </form>
									
								</div>
								<!-- End of mail form -->
							</td>
							</tr>

							<tr id="forward_mail_<?=$key;?>" class="close">
							<td colspan="4">
								<!--		Inner Form box to send reply for user mail		-->
								<div id="<?=$key?>" class="message_reply">	
									<form name="cms_list_view" id="cms_list_view" method="post" action="">
										<div>
											<table cellspacing="0" border="0" width="105%">
												<tr>
													<td>
														<label for="cms_cat_list">To</label>
													</td>
													<td>
														<input type="text" name="to" id="forward_to_<?=$key;?>" value="" placeholder="Eamil Address"/>
													</td>
												</tr>
												<tr>
													<td>
														<label for="cms_cat_list">Subject</label>
													</td>
													<td>
														<input type="text" name="subject" id="forward_subject_<?=$key;?>" value="<?=$subject;?>" />
													</td>
												</tr>
												<?
												 if( isset ($val['country']) && $val['country']!='' )
											     {
												 ?>
													<tr>
														<td>
															<label for="cms_cat_list">Address</label>
														</td>
														<td>
															<input type="text" name="subject" id="address_<?=$key;?>" value="<?=$val['address'] .",   ". $val['country'];?>"/>
														</td>
													</tr>
												 <?
												 }
												 if( isset ($val['phone_no']) && $val['phone_no']!='' )
											     {
												 ?>	
													<tr>
														<td>
															<label for="cms_cat_list">Phone #</label>
														</td>
														<td>
															<input type="text" name="subject" id="phone_no<?=$key;?>" value="<?=$val['phone_no'];?>" />
														</td>
													</tr>
												 <?
												 }
												 ?>
												<tr>
													<td>
														<label for="cms_cat_list">Message</label>
													</td>
													<td>
														<textarea type="text" name="message" id="forward_message_<?=$key;?>" value="" readonly="readonly" style="height: 150px;"><?=$val['comments'];?></textarea>
													</td>
												</tr>
												<tr>
													<td colspan="2">
														<input type="button" name="submit" id="submit" value="Send" 
															   onclick="xajax_message_forward_xajax('<?=$val['first_name']."  ".$val['last_name']?>',
																								    '<?=urlencode($val['email']);?>',
																									$('#forward_to_<?=$key?>').val(),
																									$('#forward_subject_<?=$key?>').val(),
																									$('textarea#forward_message_<?=$key?>').val(),
																									$('#address_<?=$key?>').val(),
																									$('#phone_no<?=$key;?>').val(),
																									'forward_mail_<?=$key;?>');" 
																									class="button"/>
														<input type="reset" name="reset" id="reset" value="Reset"  class="button"/>
													</td>
												</tr>
											</table>
										</div>
									 </form>
									
								</div>
								<!-- End of mail form -->
							</td>
							</tr>
						<?
						}
					}
					?>
				</tbody>
			</table>
			
			<ul class="pagination clearfix">
				<li><?=$pagination; ?></li>
			</ul>
	</div>
    </div>
</div>
<!-- END CENTER BAR ------------------------------------------------------->
<?//=pr($inbox_listing);die();?>
<div class="main_column">
</div>
</div>
<?$this->load->view('admin/layouts/template_bottom_view');?>