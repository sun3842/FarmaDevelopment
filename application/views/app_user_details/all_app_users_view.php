<style type="text/css">
	.datepicker-dropdown{
		position:absolute !important;
		
		}
	#group_lawyer_name_text_field
	{
		width:300px;
		border:solid 1px orange;
		padding:5px;
		font-size:14px;
	}
	#result #result_personal_client #result_company_client
	{
		position:relative;
		width:auto;
		display:none;
		margin-top:-1px;
		border-top:0px;
		overflow:hidden;
		border:1px #4fc0e9 solid;
		background-color: white;
		border-top: 0;
		
	}
	.show
	{
		padding:10px; 
		
		font-size:15px; 
		height:auto;
	}
	.show:hover
	{
		background:#4fc0e9;
		color:#FFF;
		cursor:pointer;
	}
	.show span{
		padding: 15px 0;
	}
	.error{
		color:#F00 !important;
	}
	
	.submit_button_search_user {
    background-color: #2a84dc;
    border: 0 solid #00ad00;
    border-radius: 5px;
    color: #fff;
    font-size: 1.9em;
    margin-top: 5px;
   /* padding: 20px 50px;*/
    text-transform: uppercase;
    transition: background-color 200ms linear 0s;
}
</style>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<?php echo $this->lang->line('app_users');?> 
				
			</div>
            
            
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="app_user_list">
							<table width="100%">
                            <tr style="vertical-align:top;" align="center">
                            <form action="" method="post">
                                <div class='form-group'>
						            <label><?php echo $this->lang->line('search_by_app_user_name');?></label>
						            <input type='text' class='form-control app_user_name_class'   name="app_user_name_text_field" id="app_user_name_text_field"   >
						            <div id="result_personal_client"></div>
                                    <span class='text-danger'><?php  //echo form_error('app_user_name_text_field'); ?></span>
                                 </div>
                       
                                   <div class='form-group' style="display:none;">
						
						           <input type='hidden' class='form-control'   name='app_user_hidden_id' id='app_user_hidden_id' >
						
					               </div>
                                    <?php
							
							if($search_result==1)
							{
								?>
                                <div class='form-group'>
									<td><img src="<?php echo base_url();?>assets/img/app_user.png" alt="image"></td>
									<td>
										<b><?php echo $search_user_details['ref_app_user_details_app_user_id']==NULL?$this->lang->line('not_registered'):$search_user_details['app_user_first_name']." ".$search_user_details['app_user_last_name'];?> </b><br/>
										<b><?php echo $search_user_details['ref_app_user_device_type_id']==ANDROID_DEVICE_TYPE_ID?$this->lang->line('android_user'):$this->lang->line('iphone_user');?></b><br/>
										<a href="#"  onclick="show_user_details_model(<?php echo htmlspecialchars( json_encode($search_user_details)); ?>,'<?php echo $this->lang->line('male');?>','<?php echo $this->lang->line('female');?>','<?php echo $this->lang->line('others');?>')"><?php echo $this->lang->line('details');?></a> | <a href="#" onclick="show_send_message_form(<?php echo $search_user_details['app_user_id'];?>)"><?php echo $this->lang->line('send_message');?></a>
									</td>
                                </div>
                                
                                <?php
							}
							
							?>
                                   <div class='form-group'>
                                   <center>
                                   <input type="submit" name="search_user_submit" value="<?php echo $this->lang->line('search_button_text');?>" class="submit_button_search_user" />
								   
					               </center>
                                   </div>
                                   
                            </form>
                            </tr>
                           
                            <?php foreach($all_app_users as $app_user)
							{
								?>
                               <tr style="vertical-align:top;">
									<td><img src="<?php echo base_url();?>assets/img/app_user.png" alt="image"></td>
									<td>
										<b><?php echo $app_user['ref_app_user_details_app_user_id']==NULL?$this->lang->line('not_registered'):$app_user['app_user_first_name']." ".$app_user['app_user_last_name'];?> </b><br/>
										<b><?php echo $app_user['ref_app_user_device_type_id']==ANDROID_DEVICE_TYPE_ID?$this->lang->line('android_user'):$this->lang->line('iphone_user');?></b><br/>
										<a href="#"  onclick="show_user_details_model(<?php echo htmlspecialchars( json_encode($app_user)); ?>,'<?php echo $this->lang->line('male');?>','<?php echo $this->lang->line('female');?>','<?php echo $this->lang->line('others');?>')"><?php echo $this->lang->line('details');?></a> | <a href="#" onclick="show_send_message_form(<?php echo $app_user['app_user_id'];?>)"><?php echo $this->lang->line('send_message');?></a>
									</td>
								</tr>
                                <?php
							}
							?>
								
						
								
							</table>
							 <?php echo $paging->create_links(); ?>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
$send_message=$this->lang->line('send_message');
$msg_title=$this->lang->line('msg_title');
$msg_details=$this->lang->line('msg_details');
$send=$this->lang->line('send');
$required=$this->lang->line('required');

?>

<div class="modal fade" id="modal-user-send">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
			<div class="row">
				<div class="col-sm-12">
					<h3><?php echo $send_message;?></h3>
					<form id="send_msg_form" action="" method="post">
						<div class="form-group">
						<input type="text" name="message_title" class="form-control" id="" placeholder="<?php echo $msg_title;?>">
                        <input type="hidden" id="hidden_app_user_id" name="hidden_app_user_id" />
                        <span class='text-danger'><?php echo $required;?></span>
						</div>
						<div class="form-group">
						<textarea class="form-control" name="message_details" rows="3" placeholder="<?php echo $msg_details;?>"></textarea>
                        <span class='text-danger'><?php echo $required;?></span>
						</div>
						<center>
							<button class="btn-send">
								<?php echo $send;?><i class="fa fa-send fa-spacing-left"></i>
							</button>	
						</center>
					</form>
				</div>
			</div>
		</div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
$name=$this->lang->line('name');
$sex=$this->lang->line('sex');
$birth_date=$this->lang->line('birth_date');
$cf=$this->lang->line('cf');
$member_since=$this->lang->line('member_since');
$address=$this->lang->line('address');
$city=$this->lang->line('city');
$country=$this->lang->line('country');
$email=$this->lang->line('email');
$telephone=$this->lang->line('telephone');
?>

<div class="modal fade" id="modal-user-detail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
			<div class="col-sm-12">
				<center><a href=""><img src="<?php echo base_url();?>assets/img/app_user_detail.png" alt="image"></a></center>
			</div>
			<div class="col-sm-12">
				<div id="app_user_detail">
					<table width="100%">
                        <tr style="vertical-align:top;">
                            <td><b><?php echo $this->lang->line('pharmacy_name')?></b></td>
                            <td id="td_pharmacy"></td>
                        </tr>
						<tr style="vertical-align:top;">
							<td><b><?php echo $name;?></b></td>
							<td id="td_name"></td>
						</tr>
						<tr style="vertical-align:top;">
							<td><b><?php echo $sex;?></b></td>
							<td id="td_sex"></td>
						</tr>
                        <tr style="vertical-align:top;">
							<td><b><?php echo $birth_date;?></b></td>
							<td id="td_birth_date"></td>
						</tr>
                        
						<tr style="vertical-align:top;">
							<td><b><?php echo $member_since;?></b></td>
							<td id="td_member_since"></td>
						</tr>
						<tr style="vertical-align:top;">
							<td><b><?php echo $address;?></b></td>
							<td id="td_address"></td>
						</tr>
                        
						<tr style="vertical-align:top;">
							<td><b><?php echo $city;?></b></td>
							<td id="td_city"> </td>
						</tr>
                        <tr style="vertical-align:top;">
							<td><b><?php echo $country;?></b></td>
							<td id="td_country"></td>
						</tr>
						<tr style="vertical-align:top;">
							<td><b><?php echo $email;?></b></td>
							<td id="td_email"></td>
						</tr>
                        <tr style="vertical-align:top;">
							<td><b><?php echo $telephone;?></b></td>
							<td id="td_telephone"></td>
						</tr>
						
					</table>
				</div>
			</div>
		</div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->