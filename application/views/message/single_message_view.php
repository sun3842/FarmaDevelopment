<div class="row">
	<div class="col-lg-11">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $this->lang->line('message_details');?>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12" id="gm_details">
                           <div class="form-group" align="center">
								<p style="font-size:larger; font-style:italic;"><b><?php echo $msg_details['ref_message_message_type_id']==MSG_TYPE_NORMAL_ID?$this->lang->line('general'):($msg_details['ref_message_message_type_id']==MSG_TYPE_PERSONAL_ID?$this->lang->line('personal'):$this->lang->line('group'));  ?></b></p>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1"><?php echo $this->lang->line('title');?></label>
								<p><?php echo $msg_details['message_title'];?></p>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1"><?php echo $this->lang->line('details');?></label>
								<p><?php echo $msg_details['message_details'];?></p>
							</div>
							<div class="form-group">
								<div class="row row-padding-small">
									<div class="col-sm-6">
										<label for="exampleInputEmail1"><?php echo $this->lang->line('created_time');?></label>
										<p><?php echo $msg_details['message_created_date_time'];?></p>
									</div>
									<div class="col-sm-6">
										<label for="exampleInputEmail1"><?php echo $this->lang->line('sending_time');?></label>
										<p><?php echo $msg_details['message_sending_date_time'];?></p>
									</div>
								</div>
							</div>
                            
                            <?php
							if($msg_details['ref_message_message_type_id']==MSG_TYPE_GROUP_ID)
							{
								?>
                             <div class="form-group" align="center">
								<p style="font-size:larger; font-style:italic;"><b><?php echo $this->lang->line('group_conditions');?></b></p>
							</div>
                            <?php if($msg_details['is_condition_sex']==1) {?>
                            <div class="form-group">
								<label class="control-label">SEX</label>
								<p><?php echo $msg_details['condition_sex']==0?$this->lang->line('female'):($msg_details['condition_sex']==1?$this->lang->line('male'):$this->lang->line('others'));?></p>
							</div>
                            <?php } ?>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
										<label class="control-label"><?php echo $this->lang->line('send_by_birth_year');?></label>
										<p><?php echo $msg_details['is_condition_birth_year']==1?$msg_details['condition_birth_year']:"";?></p>
									</div>
									<div class="col-sm-4">
										<label class="control-label"><?php echo $this->lang->line('send_by_birth_month');?></label>
										<p><?php $months=$this->lang->line('months_name');echo $msg_details['is_condition_birth_month']==1?$months[$msg_details['condition_birth_month']]:"";?></p>
									</div>
									<div class="col-sm-4">
										<label class="control-label"><?php echo $this->lang->line('send_by_age_limit');?></label>
										<p><?php echo $msg_details['is_condition_age_range']==1?$msg_details['condition_age_starting_range']." - ".$msg_details['condition_age_ending_range']:"";?></p>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
										<label class="control-label"><?php echo $this->lang->line('send_by_city');?></label>
										<p><?php echo $msg_details['is_condition_city']==1?$msg_details['condition_city_name']:"";?></p>
									</div>
									<div class="col-sm-4">
										<label class="control-label"><?php echo $this->lang->line('send_by_region');?></label>
										<p><?php echo $msg_details['is_condition_region']==1?$msg_details['condition_region_name']:"";?></p>
									</div>
									<div class="col-sm-4">
										<label class="control-label"><?php echo $this->lang->line('send_by_post_code');?></label>
										<p><?php echo $msg_details['is_condition_post_code']==1?$msg_details['condition_post_code']:"";?></p>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-6">
										<label class="control-label"><?php echo $msg_details['is_condition_and_gate']==1?$this->lang->line('match_all_conditions'):$this->lang->line('match_any_conditions');?></label>
									</div>
								</div>
							</div>
								
							
							
                                <?php
							}
							
                            else if($msg_details['ref_message_message_type_id']==MSG_TYPE_PERSONAL_ID)
							{
								?>
                             <div class="form-group" align="center">
								<p style="font-size:larger; font-style:italic;"><b><?php echo $this->lang->line('app_user_info');?></b></p>
							</div>
                            
                            <div class="form-group" align="center">
								<label class="control-label"><?php echo $this->lang->line('name');?></label>
								<p><?php echo $msg_details['app_user_first_name']." ".$msg_details['app_user_last_name'];?></p>
							</div>
                            
							<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
										<label class="control-label"><?php echo $this->lang->line('birth_date');?></label>
										<p><?php echo $msg_details['app_user_birth_date'];?></p>
									</div>
									<div class="col-sm-4">
										<label class="control-label"><?php echo $this->lang->line('sex');?></label>
                                       <p> <?php echo $msg_details['app_user_sex']==0?$this->lang->line('female'):($msg_details['app_user_sex']==1?$this->lang->line('male'):$this->lang->line('others'));?></p>
									</div>
									<div class="col-sm-4">
										<label class="control-label"><?php echo $this->lang->line('address');?></label>
										<p><?php echo $msg_details['app_user_address'];?></p>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
										<label class="control-label"><?php echo $this->lang->line('city');?></label>
										<p><?php echo $msg_details['app_user_city'];?></p>
									</div>
									<div class="col-sm-4">
										<label class="control-label"><?php echo $this->lang->line('post_code');?></label>
										<p><?php echo $msg_details['app_user_post_code'];?></p>
									</div>
									<div class="col-sm-4">
										<label class="control-label"><?php echo $this->lang->line('country');?></label>
										<p><?php echo $msg_details['app_user_country'];?></p>
									</div>
								</div>
							</div>
                            <div class="form-group">
								<div class="row">
									<div class="col-sm-4">
										<label class="control-label"><?php echo $this->lang->line('email');?></label>
										<p><?php echo $msg_details['app_user_email'];?></p>
									</div>
									<div class="col-sm-4">
										<label class="control-label"><?php echo $this->lang->line('cell_phone');?></label>
										<p><?php echo $msg_details['app_user_cell_phone'];?></p>
									</div>
									
								</div>
							</div>
							
								
							
							
                                <?php
							}
							?>
						<div class="form-group">
								<center><a class="btn-send" href="<?php echo site_url('message');?>"><?php echo $this->lang->line('back');?></a></center>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>